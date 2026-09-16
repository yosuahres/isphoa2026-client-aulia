@php
    $event = config('isphoa.event');
    $venue = config('isphoa.venue');
    $pin = $venue['coords']['lat'] . ',' . $venue['coords']['lng'];
    $directions = 'https://www.google.com/maps/dir/?api=1&destination=' . urlencode($venue['mapQuery']);
@endphp

@section('title', 'Venue')
@section('description', "{$event['shortName']} {$event['edition']} is held at {$venue['name']}, {$event['city']}, {$event['region']}, {$event['country']}, {$event['dates']}. Venue address and map.")

<x-layouts.site>
    <div class="field-navy flex-1">
        {{-- Only the navy half takes the plate: the sand map band below paints
             its own ground, and a plate spanning both would sit over it. --}}
        <div class="relative overflow-clip">
            <x-site.dot-field plate="caustic" :soft="true" />

            <x-site.container wide class="relative z-10 py-16 md:py-24">
                <x-site.page-header>Venue &amp; Getting Here</x-site.page-header>

                <x-site.reveal as="p" :delay="120" class="mt-6 max-w-xl text-balance text-[1.15rem] leading-[1.65] text-subtle">
                    {{ $event['city'] }}, {{ $event['region'] }}: the historic seat of the Minangkabau
                    Kingdom, and the setting for {{ $event['shortName'] }} {{ $event['edition'] }}.
                </x-site.reveal>

                {{-- The particulars on the left, the building on the right. --}}
                <div class="mt-14 grid items-start gap-12 md:mt-20 lg:grid-cols-[1.1fr_1fr] lg:gap-10">
                    <x-site.reveal class="order-2 lg:order-1">
                        <p class="eyebrow">Main Conference Venue</p>

                        <h2 class="mt-4 font-display text-[clamp(1.6rem,3.2vw,2.4rem)] font-semibold leading-[1.15] tracking-[-0.03em]">
                            {{ $venue['name'] }}
                        </h2>

                        <p class="mt-4 max-w-xl text-[1.15rem] leading-[1.8] text-subtle">
                            {{ $event['shortName'] }} {{ $event['edition'] }} takes place here on
                            {{ $event['dates'] }}. {{ $event['format'] }}.
                        </p>

                        <ul class="mt-8 space-y-4 text-[1.15rem] leading-[1.65]">
                            <li class="flex items-start gap-3">
                                <x-site.icon name="pin" class="mt-0.5 size-5 shrink-0 text-navy" />
                                <span class="text-subtle">
                                    @foreach ($venue['addressLines'] as $line)
                                        <span class="block sm:whitespace-nowrap">{{ $line }}</span>
                                    @endforeach
                                </span>
                            </li>

                            <li class="flex items-center gap-3">
                                <x-site.icon name="arrow" class="size-5 shrink-0 text-navy" />
                                <a
                                    href="{{ $directions }}"
                                    target="_blank"
                                    rel="noopener"
                                    class="underline decoration-white/25 underline-offset-4 transition-colors hover:text-ink"
                                >Directions</a>
                            </li>
                        </ul>
                    </x-site.reveal>

                    {{-- The photograph sits on a block offset behind it, so it reads
                         as pinned to the page rather than set into it. The block
                         takes the mark's own orange. --}}
                    <x-site.reveal :delay="120" class="relative order-1 lg:order-2">
                        <div aria-hidden="true" class="field-flare absolute inset-0 translate-x-4 -translate-y-4 md:translate-x-6 md:-translate-y-6"></div>

                        <img
                            src="{{ asset('photos/gedung.jpg') }}"
                            alt="{{ $venue['name'] }}, {{ $event['city'] }}"
                            width="1600"
                            height="896"
                            fetchpriority="high"
                            class="relative aspect-[4/3] w-full object-cover lg:aspect-square"
                        >
                    </x-site.reveal>
                </div>

            </x-site.container>
        </div>

        {{-- The map takes a band of its own: a sand drawn off the mark's orange,
             so it carries real contrast against the navy without falling back on
             white. surface-light flips the tokens with it, so the eyebrow and
             the frame set dark without touching their classes. --}}
        <div class="field-sand surface-light border-t border-line">
            <x-site.container wide class="py-14 md:py-16">
                <x-site.reveal>
                    <p class="eyebrow">Getting Here</p>

                    <div class="relative mt-6 aspect-[16/10] w-full overflow-hidden border border-line bg-shell md:aspect-[21/9]">
                        <iframe
                            title="Map showing {{ $venue['name'] }}, {{ $event['city'] }}"
                            src="https://maps.google.com/maps?q={{ $pin }}&z=16&output=embed"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            class="absolute inset-0 size-full border-0"
                        ></iframe>
                    </div>
                </x-site.reveal>
            </x-site.container>
        </div>
    </div>
</x-layouts.site>
