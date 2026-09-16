<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Vite;
use Symfony\Component\HttpFoundation\Response;

/**
 * Security response headers, ported from the Next.js app's next.config.ts.
 *
 * Two Content-Security-Policy profiles, because the two halves of this app
 * have genuinely different needs:
 *
 *  - The public site runs on hand-written DOM code and loads no framework at
 *    runtime, so it takes a strict policy with neither 'unsafe-inline' nor
 *    'unsafe-eval' in script-src. That is the whole reason the mobile menu is
 *    not Alpine.
 *
 *  - The authenticated area runs Livewire and Alpine. Alpine compiles its
 *    expressions with new Function() and Livewire emits an inline
 *    configuration block, so that half cannot have the strict policy without
 *    breaking. It is behind a login and serves no anonymous traffic, so the
 *    looser policy applies to a much smaller audience.
 */
class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // PHP adds this itself when expose_php is on; the version number is
        // free reconnaissance for anyone probing for known CVEs. It is not in
        // the Symfony response, so header_remove() is the only way to drop it
        // -- guarded, because calling it after output has begun is a warning.
        if (! headers_sent()) {
            header_remove('X-Powered-By');
        }

        $response->headers->remove('X-Powered-By');

        $headers = [
            'Content-Security-Policy' => $this->contentSecurityPolicy($request),
            // Belt and braces for browsers predating frame-ancestors.
            'X-Frame-Options' => 'DENY',
            // Stops an uploaded file being sniffed and executed as HTML.
            'X-Content-Type-Options' => 'nosniff',
            'Referrer-Policy' => 'strict-origin-when-cross-origin',
            'Permissions-Policy' => 'camera=(), microphone=(), geolocation=(), payment=(), interest-cohort=()',
            'X-DNS-Prefetch-Control' => 'on',
            // Keeps the site out of Google's cache-preview and translation
            // proxies re-hosting the markup on another origin.
            'Cross-Origin-Opener-Policy' => 'same-origin',
        ];

        // Only meaningful over TLS. Sending it in local development would pin
        // localhost to https in the developer's browser for two years.
        if ($request->isSecure()) {
            $headers['Strict-Transport-Security'] = 'max-age=63072000; includeSubDomains; preload';
        }

        foreach ($headers as $name => $value) {
            $response->headers->set($name, $value, false);
        }

        return $response;
    }

    protected function contentSecurityPolicy(Request $request): string
    {
        $fontHost = 'https://fonts.bunny.net';

        // While `npm run dev` is up the assets come off the Vite dev server on
        // its own port -- a different origin -- so 'self' does not cover them.
        // Empty the rest of the time, which is every deployed environment.
        $vite = $this->viteDevOrigins();
        $viteAssets = $vite ? ' '.implode(' ', $vite['assets']) : '';
        $viteConnect = $vite ? ' '.implode(' ', $vite['connect']) : '';

        $directives = [
            "default-src 'self'",
            "object-src 'none'",
            "base-uri 'self'",
            // Blocks a classic CSRF trick: a form on our page POSTing to
            // someone else's.
            "form-action 'self'",
            // The modern X-Frame-Options; keeps the site out of a phishing
            // iframe.
            "frame-ancestors 'none'",
            "img-src 'self' data: https:",
            "font-src 'self' data: {$fontHost}",
            "connect-src 'self'{$viteConnect}",
            // The venue page embeds a Google Maps iframe.
            'frame-src https://maps.google.com https://www.google.com',
        ];

        if ($this->isPublicSite($request)) {
            // No 'unsafe-inline' and no 'unsafe-eval'. The only inline
            // <script> the public pages emit is the JSON-LD block, and a
            // non-JavaScript type is a data block the browser never executes,
            // so script-src does not apply to it.
            $directives[] = "script-src 'self'{$viteAssets}";

            // In dev, Vite serves the stylesheet as a module that puts the CSS
            // into an inline <style>, and its error overlay does the same, so
            // the strict style-src has to give way for as long as it is up.
            $directives[] = $vite
                ? "style-src 'self' 'unsafe-inline' {$fontHost}{$viteAssets}"
                : "style-src 'self' {$fontHost}";
        } else {
            // Livewire injects an inline config block; Alpine needs eval.
            $directives[] = "script-src 'self' 'unsafe-inline' 'unsafe-eval'{$viteAssets}";
            $directives[] = "style-src 'self' 'unsafe-inline' {$fontHost}{$viteAssets}";
        }

        if ($request->isSecure()) {
            $directives[] = 'upgrade-insecure-requests';
        }

        return implode('; ', $directives);
    }

    /**
     * The Vite dev server's origins, split into the ones the asset tags load
     * from and the ones HMR talks to. Keyed off public/hot, which the dev
     * server writes on start and removes on exit, so a deployment -- where the
     * file never exists -- keeps the policy exactly as it was.
     *
     * The file holds one spelling of the address, but the browser matches a
     * CSP source against the URL it is actually fetching, and the two differ
     * between localhost, 127.0.0.1 and [::1]. All three go in, on whatever
     * port the dev server picked.
     *
     * @return array{assets: list<string>, connect: list<string>}|null
     */
    protected function viteDevOrigins(): ?array
    {
        if (! Vite::isRunningHot()) {
            return null;
        }

        $hot = trim((string) @file_get_contents(public_path('hot')));
        $parts = parse_url($hot);

        if ($parts === false || empty($parts['scheme'])) {
            return null;
        }

        $secure = $parts['scheme'] === 'https';
        $port = isset($parts['port']) ? ':'.$parts['port'] : '';
        $scheme = $secure ? 'https://' : 'http://';

        $hosts = ['localhost', '127.0.0.1', '[::1]'];

        // Whatever host the dev server reported, if it is not one of those --
        // a machine's LAN address, say, when the server is bound to 0.0.0.0.
        if (! empty($parts['host']) && ! in_array($parts['host'], $hosts, true)) {
            $hosts[] = $parts['host'];
        }

        $assets = array_map(fn (string $host): string => $scheme.$host.$port, $hosts);
        $connect = array_map(
            fn (string $host): string => ($secure ? 'wss://' : 'ws://').$host.$port,
            $hosts,
        );

        return ['assets' => $assets, 'connect' => [...$assets, ...$connect]];
    }

    /**
     * The public marketing site, which is everything the strict policy covers.
     * Anything else -- the dashboard, the Jetstream auth screens, Livewire's
     * own update endpoint -- gets the relaxed policy.
     */
    protected function isPublicSite(Request $request): bool
    {
        return $request->routeIs('site.*') || $request->routeIs('sitemap');
    }
}
