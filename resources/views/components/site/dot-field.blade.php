@props([
    // Which plate. Every page gets its own, so no two read as the same
    // picture. The home page keeps the two photographic ones -- 'prism', white
    // light opened out by a prism, and 'laser', an adaptive-optics guide star
    // under star trails. The inner pages take a figure apiece, each an optical
    // phenomenon stippled in the same language: see $plates below.
    'plate' => 'laser',

    // 'right' mirrors the plate and hangs it off the other edge. With a plate
    // per page nothing needs it any more, but a panel whose copy sits on the
    // left can still push the light out of its way with it.
    'side' => 'left',

    // For panels whose copy runs their whole height: the same plate, dimmer,
    // so it stays behind the text rather than competing with it.
    'soft' => false,

    // Fills the whole panel instead of standing on its foot. For a short,
    // wide, mostly empty panel, where a foot-piece would leave the emptiness
    // above it untouched.
    'fill' => false,

    // How many copies of the plate run down the panel: 1 stands on the foot,
    // 2 takes the head and the foot, 3 adds the middle. For a long page, where
    // one plate at the bottom leaves everything above it bare. Each copy is
    // turned differently, so the repeat does not read as a repeat.
    'repeat' => 1,
])

@php
    $plates = [
        // Photographs, stippled.
        'prism' => ['src' => 'photos/prism-dots.webp', 'w' => 2400, 'h' => 1966],
        'laser' => ['src' => 'photos/laser-dots.webp', 'w' => 2200, 'h' => 1465],

        // Figures, drawn in the same idiom.
        'rings' => ['src' => 'photos/rings-dots.webp', 'w' => 1800, 'h' => 1199],      // Airy rings off a circular aperture
        'fringes' => ['src' => 'photos/fringes-dots.webp', 'w' => 1800, 'h' => 1199],  // two-slit interference
        'fan' => ['src' => 'photos/fan-dots.webp', 'w' => 1800, 'h' => 1199],          // a grating's orders opened out
        'strands' => ['src' => 'photos/strands-dots.webp', 'w' => 1800, 'h' => 1199],  // a bundle of waveguides
        'lattice' => ['src' => 'photos/lattice-dots.webp', 'w' => 1800, 'h' => 1199],  // a photonic crystal with a guided channel
        'caustic' => ['src' => 'photos/caustic-dots.webp', 'w' => 1800, 'h' => 1199],  // light folded by a rippled surface
    ];

    $art = $plates[$plate] ?? $plates['laser'];

    // Where each copy sits and how it is turned. Mirrored, then turned right
    // over, so three copies of one plate read as three different pieces of
    // light. Percentages rather than a fixed rhythm, so they hold their
    // stations whatever height the panel comes out at.
    $tiles = [
        1 => [['', '']],
        2 => [['top-0', ''], ['bottom-0', 'scale-x-[-1]']],
        3 => [['top-0', ''], ['top-1/2 -translate-y-1/2', 'scale-x-[-1]'], ['bottom-0', 'scale-y-[-1]']],
    ][max(1, min(3, (int) $repeat))];
@endphp

{{-- Stands on the foot of the panel at its own proportions rather than being
     stretched over it, and the class fades its top out, so the light rises into
     the copy instead of sitting behind it. Both plates are laid on the very
     navy the panels are painted in, so only the points read.

     The parent must be `relative` and clip -- `overflow-clip` rather than
     `overflow-hidden` on a panel with a sticky child, since hidden makes the
     panel a scroll container and sticky then has nothing to stick to -- and the
     content that sits over it `relative z-10`. --}}
@if (count($tiles) > 1)
    {{-- Tiled: each copy at its natural proportions, full width, fading out top
         and bottom so they melt into the panel and into each other. --}}
    <div aria-hidden="true" class="pointer-events-none absolute inset-0 z-0">
        @foreach ($tiles as [$at, $turn])
            <img
                src="{{ asset($art['src']) }}"
                alt=""
                width="{{ $art['w'] }}"
                height="{{ $art['h'] }}"
                loading="lazy"
                @class(['dot-field-tile absolute inset-x-0 w-full', 'dot-field-soft' => $soft, $at, $turn])
            >
        @endforeach
    </div>
@else
    <div @class([
        'pointer-events-none absolute inset-0 z-0',
        'flex items-end' => ! $fill,
    ]) aria-hidden="true">
        <img
            src="{{ asset($art['src']) }}"
            alt=""
            width="{{ $art['w'] }}"
            height="{{ $art['h'] }}"
            loading="lazy"
            @class([
                // Fill mode takes the whole panel, cropped to it, and is masked in
                // from all four edges instead of only the top.
                'dot-field-fill size-full object-cover' => $fill,

                // Otherwise: full width and its own height on a panel with room for
                // it. On a short one -- a page whose copy is only a few lines --
                // max-h stops it filling the panel and running through the text,
                // and object-cover takes a strip across the middle of the plate
                // instead, where the light is, so its foot still carries something.
                'dot-field w-full max-h-[45%] object-cover' => ! $fill,

                'dot-field-soft' => $soft,
                'object-right scale-x-[-1]' => $side === 'right',
                'object-left' => $side !== 'right',
            ])
        >
    </div>
@endif
