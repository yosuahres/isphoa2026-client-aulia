<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public site
|--------------------------------------------------------------------------
|
| The ISPhOA 2026 site, ported from the (public) route group of the Next.js
| app. Content lives in config/isphoa.php; these routes only pick a view.
| Paths match the Next.js ones so existing and indexed links keep working.
|
*/

Route::name('site.')->group(function () {
    Route::view('/', 'site.home')->name('home');
    Route::view('/committee', 'site.committee')->name('committee');
    Route::view('/venue', 'site.venue')->name('venue');
    Route::view('/important-dates', 'site.important-dates')->name('important-dates');
    Route::view('/speakers', 'site.speakers')->name('speakers');
    Route::view('/call-for-papers', 'site.call-for-papers')->name('call-for-papers');
    Route::view('/submission', 'site.submission')->name('submission');
});

/*
|--------------------------------------------------------------------------
| Authenticated area
|--------------------------------------------------------------------------
|
| Jetstream's dashboard. The (dashboard) and admin route groups from the
| Next.js app have not been ported yet.
|
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->name('admin.')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
});
