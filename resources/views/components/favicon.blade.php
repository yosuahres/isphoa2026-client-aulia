{{-- Shared by the public shell and the dashboard shell so the two never drift.
     favicon.ico carries 16/32/48 for browsers that request /favicon.ico
     directly; the PNGs cover everything else. --}}
<link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icon-32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icon-16.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-icon.png') }}">
<link rel="manifest" href="{{ asset('site.webmanifest') }}">
<meta name="theme-color" content="#0e0e43">
