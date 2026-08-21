<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
            "connect-src 'self'",
            // The venue page embeds a Google Maps iframe.
            'frame-src https://maps.google.com https://www.google.com',
        ];

        if ($this->isPublicSite($request)) {
            // No 'unsafe-inline' and no 'unsafe-eval'. The only inline
            // <script> the public pages emit is the JSON-LD block, and a
            // non-JavaScript type is a data block the browser never executes,
            // so script-src does not apply to it.
            $directives[] = "script-src 'self'";
            $directives[] = "style-src 'self' {$fontHost}";
        } else {
            // Livewire injects an inline config block; Alpine needs eval.
            $directives[] = "script-src 'self' 'unsafe-inline' 'unsafe-eval'";
            $directives[] = "style-src 'self' 'unsafe-inline' {$fontHost}";
        }

        if ($request->isSecure()) {
            $directives[] = 'upgrade-insecure-requests';
        }

        return implode('; ', $directives);
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
