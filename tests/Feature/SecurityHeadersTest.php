<?php

namespace Tests\Feature;

use Tests\TestCase;

class SecurityHeadersTest extends TestCase
{
    public function test_public_pages_carry_the_security_headers(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertHeader('X-Frame-Options', 'DENY');
        $response->assertHeader('X-Content-Type-Options', 'nosniff');
        $response->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->assertHeader('Cross-Origin-Opener-Policy', 'same-origin');
        $this->assertStringContainsString('camera=()', $response->headers->get('Permissions-Policy'));
    }

    public function test_public_pages_get_a_strict_content_security_policy(): void
    {
        $csp = $this->get('/')->headers->get('Content-Security-Policy');

        $this->assertStringContainsString("script-src 'self'", $csp);
        $this->assertStringContainsString("frame-ancestors 'none'", $csp);
        $this->assertStringContainsString("object-src 'none'", $csp);
        $this->assertStringContainsString("form-action 'self'", $csp);

        // The whole point of not using Alpine on the public site.
        $this->assertStringNotContainsString("'unsafe-eval'", $csp);
        $this->assertStringNotContainsString("'unsafe-inline'", $csp);
    }

    public function test_the_venue_map_origin_is_allowed_to_frame(): void
    {
        $csp = $this->get('/venue')->headers->get('Content-Security-Policy');

        $this->assertStringContainsString('https://maps.google.com', $csp);
    }

    public function test_the_livewire_area_gets_the_relaxed_policy(): void
    {
        // Livewire emits an inline config block and Alpine needs eval, so this
        // half cannot use the strict policy. Asserted so the two profiles do
        // not silently collapse into one.
        $csp = $this->get('/login')->headers->get('Content-Security-Policy');

        $this->assertStringContainsString("'unsafe-eval'", $csp);
    }

    public function test_hsts_is_only_sent_over_tls(): void
    {
        $this->assertNull($this->get('/')->headers->get('Strict-Transport-Security'));

        $secure = $this->get('https://localhost/');

        $this->assertStringContainsString('max-age=', (string) $secure->headers->get('Strict-Transport-Security'));
    }

    public function test_public_pages_emit_nothing_the_strict_policy_would_block(): void
    {
        foreach (['/', '/venue', '/speakers', '/committee', '/submission'] as $path) {
            $html = $this->get($path)->getContent();

            $this->assertSame(0, preg_match_all('/\sstyle="/', $html), "inline style attribute on {$path}");
            $this->assertSame(0, preg_match_all('/<style\b/', $html), "<style> block on {$path}");

            preg_match_all('/<script\b([^>]*)>/i', $html, $matches);

            foreach ($matches[1] as $attributes) {
                $isExecutable = ! str_contains($attributes, 'src=')
                    && ! str_contains($attributes, 'application/ld+json');

                $this->assertFalse($isExecutable, "inline executable script on {$path}");
            }
        }
    }

    public function test_the_auth_area_is_not_indexable(): void
    {
        foreach (['/login', '/register'] as $path) {
            $this->get($path)->assertSee('noindex', false);
        }
    }
}
