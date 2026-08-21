@php
    $event = config('isphoa.event');
    $venue = config('isphoa.venue');
    $pin = $venue['coords']['lat'] . ',' . $venue['coords']['lng'];
@endphp

@section('title', 'Venue')
@section('description', "{$event['shortName']} {$event['edition']} is held at {$venue['name']}, {$event['city']}, {$event['region']}, {$event['country']}, {$event['dates']}. Venue address and map.")

<x-layouts.site>
    {{-- Outside surface-light on purpose: the banner sits on the dark
         site-ground palette so its wash matches the home hero. --}}
    <div class="relative h-[46vh] min-h-[280px] w-full overflow-hidden bg-paper md:h-[62vh]">
        <img
            src="{{ asset('photos/gedung.png') }}"
            alt="{{ $venue['name'] }}, {{ $event['city'] }}"
            fetchpriority="high"
            class="absolute inset-0 size-full object-cover opacity-[0.55]"
        >
        <div aria-hidden="true" class="absolute inset-0 bg-[radial-gradient(115%_85%_at_50%_16%,rgb(var(--site-beam)/0.22),transparent_62%)]"></div>
        <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-b from-shell/55 via-shell/25 to-paper"></div>
    </div>

    <div class="surface-light flex-1 border-t border-line bg-mist">
        <x-site.container class="py-16 md:py-20">
            <h1 class="font-display text-[clamp(1.75rem,4vw,2.75rem)] font-semibold leading-[1.15] tracking-[-0.03em]">
                {{ $venue['name'] }}
            </h1>

            <p class="mt-5 flex items-start gap-2.5 text-[0.95rem] leading-[1.6] text-subtle">
                <x-site.icon name="pin" class="mt-0.5 size-4 shrink-0 text-navy" />
                <span>{{ implode(', ', $venue['addressLines']) }}</span>
            </p>

            <p class="mt-8 text-[1rem] leading-[1.8]">
                {{ $event['shortName'] }} {{ $event['edition'] }} takes place here on {{ $event['dates'] }}.
                {{ $event['format'] }}.
            </p>

            <div class="relative mt-12 aspect-[16/10] w-full overflow-hidden rounded-2xl border border-line bg-mist md:aspect-[21/9]">
                <iframe
                    title="Map showing {{ $venue['name'] }}, {{ $event['city'] }}"
                    src="https://maps.google.com/maps?q={{ $pin }}&z=16&output=embed"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    class="absolute inset-0 size-full border-0"
                ></iframe>
            </div>
        </x-site.container>
    </div>
</x-layouts.site>
