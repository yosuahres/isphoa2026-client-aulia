{{-- A white panel on the navy field, for the fee tables and the date timelines.
     The heading slot sits in a band above the body; the body runs edge to edge
     so tables can carry their own header row. --}}
@props(['heading' => null])

<div {{ $attributes->class('surface-light overflow-hidden shadow-[0_24px_60px_-24px_rgb(0_0_0/0.6)] ring-1 ring-white/10') }}>
    @if ($heading)
        <div class="flex flex-wrap items-center gap-x-3 gap-y-2 border-b border-line px-5 py-5 md:px-7">
            {{ $heading }}
        </div>
    @endif

    {{ $slot }}
</div>
