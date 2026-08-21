@props([
    // Only pages that anchor to an id (currently /speakers) need the eased
    // hash scroll; everywhere else it would just be dead weight.
    'scrollToHash' => false,
])

@php
    $event = config('isphoa.event');
    $siteName = $event['shortName'] . ' ' . $event['edition'];
    $defaultDescription = $event['fullName'] . ' — ' . $event['theme'] . '. ' . $event['venue'] . ', ' . $event['dates'] . '.';
@endphp

<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- The homepage passes no title and takes the bare site name; every
             other page fills the template, matching the Next.js metadata. --}}
        <title>@hasSection('title')@yield('title') · {{ $siteName }}@else{{ $siteName }} · {{ $event['fullName'] }}@endif</title>
        <meta name="description" content="@yield('description', $defaultDescription)">
        <link rel="canonical" href="{{ url()->current() }}">

        <meta property="og:type" content="website">
        <meta property="og:site_name" content="{{ $siteName }}">
        <meta property="og:title" content="@yield('title', $siteName)">
        <meta property="og:description" content="@yield('description', $defaultDescription)">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:image" content="{{ asset('brand/logo-main.png') }}">
        <meta name="twitter:card" content="summary_large_image">

        <link rel="icon" href="{{ asset('brand/logo-circle.jpeg') }}">

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

            <x-site.copyright />
        </div>
    </body>
</html>
