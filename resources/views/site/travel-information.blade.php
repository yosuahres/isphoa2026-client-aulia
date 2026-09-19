@php
    $event = config('isphoa.event');
    $travel = config('isphoa.travel');
@endphp

@section('title', 'Travel Information')
@section('description', "Things to see around {$event['city']} and across {$event['region']} during {$event['shortName']} {$event['edition']}: Istano Basa Pagaruyung, Nagari Tuo Pariangan, Bukittinggi, Harau Valley, Sawahlunto, Padang, and more.")

<x-layouts.site :scroll-to-hash="true">
    <div class="field-navy relative flex-1 overflow-clip">
        {{-- The same plate as /venue, the other half of this pair of pages, so
             the two Venue tabs read as one place seen twice. The guide runs
             long, so the figure takes the full 3 copies rather than leaving
             everything above the foot of the panel bare. --}}
        <x-site.dot-field plate="caustic" :soft="true" :repeat="3" />

        <x-site.container wide class="relative z-10 pb-16 pt-12 md:pb-24 md:pt-16">
            {{-- The tab is called Travel Information; the h1 is the invitation
                 the guide opens with, so the label rides above it. --}}
            <x-site.reveal as="p" class="eyebrow">Travel Information</x-site.reveal>

            <x-site.page-header class="mt-4 max-w-none">{{ $travel['heading'] }}</x-site.page-header>

            <x-site.reveal as="p" :delay="120" class="mt-6 text-balance text-[1.15rem] leading-[1.65] text-subtle">
                {{ $travel['standfirst'] }}
            </x-site.reveal>

            {{-- The opening runs on the narrower measure the destinations keep
                 to, so the whole page sets on one column edge. --}}
            <x-site.reveal :delay="180" class="mt-10 space-y-5 md:mt-12">
                @foreach ($travel['intro'] as $paragraph)
                    <p class="text-[1.15rem] leading-[1.8] text-ink">{{ $paragraph }}</p>
                @endforeach

                {{-- The planning caveat. Set off on a rule rather than folded
                     into the prose, because a reader skimming for the itinerary
                     has to meet it before the durations below. --}}
                <p class="border-l-2 border-flare pl-5 text-[1.05rem] leading-[1.8] text-subtle">
                    {{ $travel['note'] }}
                </p>
            </x-site.reveal>

            {{-- One entry per destination: the photograph first, then the
                 narration, then the particulars. --}}
            <div class="mt-16 grid gap-16 md:mt-20 md:gap-24">
                @foreach ($travel['destinations'] as $destination)
                    <x-site.reveal
                        as="section"
                        id="{{ $destination['slug'] }}"
                        class="scroll-mt-24 border-t border-line pt-8 md:pt-10 xl:scroll-mt-28"
                    >
                        {{-- Numbered the way the guide itself numbers them:
                             plain text in the heading, not a label above it. --}}
                        <h2 class="font-display text-[clamp(1.5rem,3vw,2.15rem)] font-semibold leading-[1.15] tracking-[-0.03em]">
                            {{ $destination['n'] }}. {{ $destination['title'] }}
                        </h2>

                        <p class="mt-2 text-[1.15rem] leading-[1.5] text-subtle">{{ $destination['subtitle'] }}</p>

                        {{-- The pictures lead the entry, across the full width
                             of the page and whole: they came in as one sheet per
                             destination, several views laid out side by side, so
                             they are set as the committee arranged them rather
                             than cut into tiles. --}}
                        <img
                            src="{{ asset($destination['photo']['src']) }}"
                            alt="{{ $destination['alt'] }}"
                            width="{{ $destination['photo']['w'] }}"
                            height="{{ $destination['photo']['h'] }}"
                            loading="lazy"
                            decoding="async"
                            class="mt-7 block h-auto w-full"
                        >

                        <div class="mt-8 space-y-4">
                            @foreach ($destination['body'] as $paragraph)
                                <p class="text-[1.15rem] leading-[1.8] text-ink">{{ $paragraph }}</p>
                            @endforeach
                        </div>

                        {{-- The particulars as a description list rather than a
                             table: four labelled lines, not a grid of data, and
                             the label column folds above its value on a phone. --}}
                        <dl class="mt-8 border-t border-line text-[1.02rem] leading-[1.7]">
                            @foreach ($destination['facts'] as $term => $value)
                                <div class="grid gap-x-6 gap-y-1 border-b border-line py-3.5 sm:grid-cols-[11rem_1fr]">
                                    <dt class="font-semibold text-ink">{{ $term }}</dt>
                                    <dd class="text-ink">{{ $value }}</dd>
                                </div>
                            @endforeach
                        </dl>
                    </x-site.reveal>
                @endforeach
            </div>
        </x-site.container>
    </div>
</x-layouts.site>
