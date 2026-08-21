<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <x-partials.head />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>

    <body class="font-sans antialiased">

        <div class="max-w-7xl px-4 sm:px-6 lg:px-8 mx-auto">
            @unless (Auth::check())
                <x-partials.header />
            @else
                <x-banner />
                @livewire('navigation-menu')
                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white shadow">
                        {{ $header }}
                    </header>
                @endif
            @endunless

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <x-partials.footer />
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
