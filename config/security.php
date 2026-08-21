<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Trusted proxies
    |--------------------------------------------------------------------------
    |
    | Comma-separated list of proxy IPs, or "*" to trust whatever fronts the
    | app. Leave empty to trust none, which is the safe default: X-Forwarded-*
    | is then ignored entirely and cannot be spoofed.
    |
    | It matters for more than IPs. When TLS is terminated upstream -- which is
    | how cPanel serves HTTPS -- the request reaching PHP is plain http. Until
    | the proxy is trusted, Request::isSecure() is false, so HSTS and
    | upgrade-insecure-requests are suppressed and url() emits http:// links on
    | a site that is actually served over TLS.
    |
    | Read through config rather than env() directly, because once
    | `php artisan config:cache` runs, .env is no longer loaded and env()
    | returns null.
    |
    */

    'trusted_proxies' => env('TRUSTED_PROXIES', ''),

];
