@php
    $event = config('isphoa.event');
    $hostCity = config('isphoa.hostCity');
@endphp

<section id="home" class="relative flex min-h-[72svh] flex-col items-center justify-center pb-40 pt-16 md:pb-44 md:pt-20">
    <div aria-hidden="true" class="pointer-events-none absolute inset-0 z-0 overflow-hidden">
        <img
            src="{{ asset($hostCity['feature']['photo']) }}"
            alt=""
            fetchpriority="high"
            class="absolute inset-0 size-full object-cover opacity-[0.55]"
        >
        <div class="absolute inset-0 bg-[radial-gradient(115%_85%_at_50%_16%,rgb(var(--site-beam)/0.22),transparent_62%)]"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-shell/55 via-shell/25 to-paper"></div>
    </div>

    <x-site.container class="relative z-10 text-center">
        <x-site.reveal as="h1" class="font-display text-[clamp(3.5rem,15vw,12.5rem)] font-semibold leading-[0.85] tracking-[-0.05em]">
            {{ $event['shortName'] }}
        </x-site.reveal>

        <x-site.reveal as="p" :delay="120" class="mx-auto mt-4 max-w-2xl text-balance text-[clamp(0.95rem,1.6vw,1.15rem)] font-medium leading-[1.4] text-subtle">
            {{ $event['fullName'] }}
        </x-site.reveal>

        <x-site.reveal as="p" :delay="240" class="mx-auto mt-8 max-w-3xl text-balance font-display text-[clamp(1.35rem,2.6vw,2rem)] font-semibold leading-[1.2] tracking-[-0.025em] text-ink">
            {{ $event['theme'] }}
        </x-site.reveal>

        <x-site.reveal as="p" :delay="360" class="mt-10 font-display text-[clamp(1rem,1.7vw,1.25rem)] font-semibold leading-[1.5] tracking-[-0.015em]">
            {{ $event['venue'] }}
            <br>
            {{ $event['dates'] }}
        </x-site.reveal>

        <x-site.reveal :delay="480" class="mt-10 flex flex-wrap items-center justify-center gap-3">
            <x-site.link-button
                href="{{ asset('photos/call-for-papers-poster.jpg') }}"
                class="!rounded-lg font-bold uppercase tracking-wider"
            >Call for Papers</x-site.link-button>
        </x-site.reveal>
    </x-site.container>
</section>
