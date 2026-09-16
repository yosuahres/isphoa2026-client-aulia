@props([
    // Only pages that anchor to an id (currently /speakers) need the eased
    // hash scroll; everywhere else it would just be dead weight.
    'scrollToHash' => false,
])

@php
    use App\Support\Seo;

    $event = config('isphoa.event');
    $siteName = Seo::siteName();
    $defaultDescription = Seo::description();

    // Canonical must name the production origin, not whatever host served the
    // request, or staging and localhost would advertise themselves as the
    // canonical copy. Seo::siteUrl() resolves that.
    $canonical = Seo::absoluteUrl(request()->getPathInfo());
@endphp

<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- The homepage passes no title and takes the bare site name; every
             other page fills the template, matching the Next.js metadata. --}}
        <title>@hasSection('title')@yield('title') · {{ $siteName }}@else{{ $siteName }}@endif</title>
        <meta name="description" content="@yield('description', $defaultDescription)">
        <link rel="canonical" href="{{ $canonical }}">

        <meta name="keywords" content="{{ implode(', ', Seo::keywords()) }}">
        <meta name="author" content="{{ $siteName }} Organizing Committee">
        <meta name="publisher" content="{{ $siteName }}">
        <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">

        <meta property="og:type" content="website">
        <meta property="og:site_name" content="{{ $siteName }}">
        <meta property="og:locale" content="en_US">
        <meta property="og:title" content="@hasSection('title'){{ Seo::socialTitle(trim($__env->yieldContent('title'))) }}@else{{ Seo::socialTitle() }}@endif">
        <meta property="og:description" content="@yield('description', $defaultDescription)">
        <meta property="og:url" content="{{ $canonical }}">
        <meta property="og:image" content="{{ Seo::absoluteUrl('/og-image.png') }}">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:image:alt" content="{{ $siteName }} · {{ $event['fullName'] }}">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="@hasSection('title'){{ Seo::socialTitle(trim($__env->yieldContent('title'))) }}@else{{ Seo::socialTitle() }}@endif">
        <meta name="twitter:description" content="@yield('description', $defaultDescription)">
        <meta name="twitter:image" content="{{ Seo::absoluteUrl('/og-image.png') }}">

        <x-favicon />

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|inter-tight:600,700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @stack('head')
    </head>

    <body class="font-sans antialiased" @if ($scrollToHash) data-scroll-to-hash @endif>
        <div class="site-ground flex min-h-screen flex-col font-sans">
            <x-site.header />

            <main class="flex flex-1 flex-col">
                {{ $slot }}
            </main>

            <x-site.footer />
        </div>
    </body>
</html>
