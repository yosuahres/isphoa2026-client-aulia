@php
    $event = config('isphoa.event');
    $tracks = config('isphoa.tracks');
    $poster = asset('photos/call-for-papers-poster.jpg');
@endphp

@section('title', 'Call for Papers')
@section('description', "Topics of interest for {$event['shortName']} {$event['edition']}: " . implode(', ', array_column($tracks, 'title')) . '.')

<x-layouts.site>
    <div class="field-navy relative flex-1 overflow-clip">
        {{-- This page's plate, dimmed. Each inner page draws a different optical
             figure, so no two of them read as the same picture; this one runs
             far enough that it takes 2 copies, turned differently, rather than
             leaving everything above the foot of the panel bare. --}}
        <x-site.dot-field plate="fan" :soft="true" :repeat="2" />

        <x-site.container wide class="relative z-10 pb-8 pt-12 md:pb-10 md:pt-16">
            <x-site.page-header class="mb-10 md:mb-14">Call for Papers</x-site.page-header>

            {{-- The topics carry the page, so they keep the measure; the poster
                 stands beside them on the right, and follows them into a single
                 column below lg where there is no room for the pair. --}}
            <div class="grid items-start gap-10 lg:grid-cols-[1fr_minmax(0,20rem)] lg:gap-12">
                <section class="order-2 lg:order-1">
                    <x-site.label>Topics of Interest</x-site.label>
                    <x-site.body>
                        {{ $event['shortName'] }} {{ $event['edition'] }} welcomes original and unpublished
                        research on light-based technology. Submissions are invited in, but
                        not limited to, the following topics.
                    </x-site.body>

                    <ul class="mt-3 grid gap-y-1.5">
                        @foreach ($tracks as $track)
                            <x-site.bullet>
                                <span class="font-semibold">{{ $track['title'] }}</span>@if (! empty($track['desc'])) {{ $track['desc'] }}@endif
                            </x-site.bullet>
                        @endforeach
                    </ul>
                </section>

                {{-- The poster sits on a block offset behind it, the same way the
                     venue photograph does, and opens full size over the page
                     rather than in a tab of its own -- the topics above are the
                     readable copy, this is the artwork, and sending the reader
                     to a bare image file loses the page they were reading.
                     It sticks below the bar's 64px while the topics scroll on. --}}
                <figure class="order-1 lg:order-2 lg:sticky lg:top-20">
                    {{-- An anchor, not a button: without JS it still reaches the
                         image, and a modified click (cmd, ctrl, middle) opens the
                         file in a tab of its own the way any picture link does.
                         app.js takes the plain click for the panel below. --}}
                    <a
                        href="{{ $poster }}"
                        class="group relative block cursor-pointer"
                        aria-label="View the Call for Papers poster full size"
                        data-lightbox-open="cfp-poster"
                    >
                        <div aria-hidden="true" class="field-flare absolute inset-0 translate-x-3 -translate-y-3 md:translate-x-4 md:-translate-y-4"></div>

                        <img
                            src="{{ $poster }}"
                            alt="Call for Papers poster for {{ $event['shortName'] }} {{ $event['edition'] }}"
                            width="1365"
                            height="2048"
                            loading="lazy"
                            class="relative w-full max-w-sm object-contain lg:max-w-none"
                        >

                        {{-- The affordance, held back until the pointer is on the
                             poster. Hidden from the reader on a touch screen,
                             which has no hover to reveal it, and from assistive
                             tech, which has the button's own label. --}}
                        <span
                            aria-hidden="true"
                            class="pointer-events-none absolute bottom-3 right-3 hidden items-center gap-1.5 rounded-full bg-deep/85 px-3 py-1.5 text-xs font-semibold text-ink opacity-0 backdrop-blur transition-opacity duration-200 group-hover:opacity-100 group-focus-visible:opacity-100 lg:flex"
                        >
                            <x-site.icon name="expand" :stroke-width="2" class="size-3.5" />
                            Click to enlarge
                        </span>
                    </a>
                </figure>
            </div>
        </x-site.container>
    </div>

    {{-- The full-size view. Fixed to the window and outside the container's
         measure, so it covers the page whole; it stays in the markup rather
         than being built by script, so its image is a plain <img> the
         browser can size and cache. Driven by resources/js/app.js. --}}
    <div
        id="cfp-poster"
        hidden
        role="dialog"
        aria-modal="true"
        aria-label="Call for Papers poster"
        class="fixed inset-0 z-[60] flex items-center justify-center bg-deep/95 p-4 opacity-0 backdrop-blur-sm transition-opacity duration-200 md:p-8"
        data-lightbox
    >
        {{-- The backdrop takes the click that closes the view. A button
             rather than a handler on the panel, so the keyboard reaches it
             and the image itself can be clicked without closing. --}}
        <button
            type="button"
            aria-label="Close"
            class="absolute inset-0 cursor-pointer"
            data-lightbox-close
        ></button>

        <img
            src="{{ $poster }}"
            alt="Call for Papers poster for {{ $event['shortName'] }} {{ $event['edition'] }}"
            width="1365"
            height="2048"
            loading="lazy"
            class="relative max-h-full w-auto max-w-full rounded-sm object-contain shadow-2xl"
        >

        <button
            type="button"
            aria-label="Close"
            class="absolute right-4 top-4 rounded-full bg-ink/10 p-2.5 text-ink backdrop-blur transition-colors hover:bg-ink/20 md:right-6 md:top-6"
            data-lightbox-close
        >
            <x-site.icon name="close" :stroke-width="2.2" class="size-6" />
        </button>
    </div>
</x-layouts.site>