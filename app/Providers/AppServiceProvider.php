<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureTrustedProxies();
        $this->configurePasswordPolicy();

        // Behind a TLS-terminating proxy the app can still emit http:// links
        // if the forwarded headers are not trusted. Forcing the scheme is the
        // belt to that braces, and costs nothing when already on https.
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }

    /**
     * Trusted proxies cannot be configured in bootstrap/app.php: the
     * withMiddleware closure runs before configuration is loaded, so config()
     * is unavailable there. See config/security.php for why this matters.
     */
    protected function configureTrustedProxies(): void
    {
        $proxies = array_values(array_filter(array_map(
            'trim',
            explode(',', (string) config('security.trusted_proxies')),
        )));

        if ($proxies === []) {
            return;
        }

        Request::setTrustedProxies(
            $proxies === ['*'] ? ['0.0.0.0/0', '2000::/3'] : $proxies,
            Request::HEADER_X_FORWARDED_FOR
                | Request::HEADER_X_FORWARDED_HOST
                | Request::HEADER_X_FORWARDED_PORT
                | Request::HEADER_X_FORWARDED_PROTO,
        );
    }

    /**
     * Fortify's default is eight characters and nothing else. Accounts here
     * can submit and withdraw conference papers, so the floor is raised and
     * every password is checked against Have I Been Pwned's breach corpus
     * (k-anonymity: only a five-character hash prefix leaves the server, and
     * a failed lookup is treated as a pass rather than blocking signup).
     */
    protected function configurePasswordPolicy(): void
    {
        Password::defaults(fn () => $this->app->isProduction()
            ? Password::min(12)->letters()->numbers()->uncompromised()
            : Password::min(8));
    }
}
