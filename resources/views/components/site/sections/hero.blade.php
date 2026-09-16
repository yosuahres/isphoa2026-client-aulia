@php
    $event = config('isphoa.event');
    $hostCity = config('isphoa.hostCity');
@endphp

{{-- Fills the window below the header -- 3.5rem of it, 4rem at xl -- and centres
     the copy in it, with the padding even top and bottom so the centring is the
     box's own. z-10 keeps the photograph above the section below it. --}}
<section
    id="home"
    class="relative z-10 flex flex-col pb-16 pt-12 max-lg:pt-0 md:pb-20 lg:flex lg:min-h-[calc(100svh-3.5rem)] lg:flex-col lg:justify-center lg:pb-24 lg:pt-24 xl:min-h-[calc(100svh-4rem)]"
>
    {{-- Base colour, photograph and scrim all run up behind the sticky bar --
         one bar height, 4rem -- so the picture reaches the top of the window
         and the bar floats on it. --}}
    <div aria-hidden="true" class="field-navy pointer-events-none absolute inset-x-0 bottom-0 -top-16 -z-10"></div>

    {{-- Wide enough from lg up that the seminar name and the theme each hold a
         single line; below that they wrap as they must. --}}
    <x-site.container class="relative z-10">
        {{-- Pulled out past the container's gutter, but in steps: below xl the
                 container is the window itself, so there is barely any room to
                 the left, and the full shift would take the copy off-screen. --}}
            <div class="lg:-ml-4 lg:max-w-[36rem] xl:-ml-10 xl:max-w-[48rem] min-[1400px]:-ml-24 2xl:-ml-32 min-[1800px]:-ml-56">
            <x-site.reveal as="h1" class="font-display text-[clamp(3.25rem,10vw,7rem)] font-semibold leading-[0.85] tracking-[-0.05em]">
                {{ $event['shortName'] }}
            </x-site.reveal>

            <x-site.reveal as="p" :delay="120" class="mt-4 text-balance text-[clamp(0.95rem,1.6vw,1.15rem)] font-medium leading-[1.4] text-sand/80 lg:whitespace-nowrap">
                {{ $event['fullName'] }}
            </x-site.reveal>

            <x-site.reveal as="p" :delay="240" class="mt-7 text-balance font-display text-[clamp(1.3rem,2.4vw,1.85rem)] font-semibold leading-[1.2] tracking-[-0.025em] text-sand lg:whitespace-nowrap">
                {{ $event['theme'] }}
            </x-site.reveal>

            <x-site.reveal :delay="360" class="mt-10 flex flex-wrap items-center gap-3">
                <x-site.link-button
                    href="{{ asset('photos/call-for-papers-poster.jpg') }}"
                    variant="flare"
                    class="!rounded-lg font-bold uppercase tracking-wider"
                >Call for Papers</x-site.link-button>
            </x-site.reveal>
        </div>
    </x-site.container>

    {{-- The scroll cue, centred on the foot of the hero. Absolute so it sits at
         the bottom of the window regardless of where the copy centres, and z-10
         to clear the photograph on the right. Only from lg: below that the hero
         is not a window's height, the photograph already runs off the bottom
         edge, and there is nothing for the cue to say. --}}
    <a
        href="#about"
        class="group absolute inset-x-0 bottom-8 z-10 mx-auto hidden w-fit flex-col items-center gap-2 text-sand/60 transition-colors hover:text-sand lg:flex"
    >
        <span class="sr-only">Scroll to the seminar overview</span>

        <span aria-hidden="true" class="flex h-10 w-6 justify-center rounded-full border border-current pt-2 transition-colors">
            <span class="scroll-cue-wheel block size-1 rounded-full bg-current"></span>
        </span>

        <x-site.icon name="chevron" aria-hidden="true" class="size-4 transition-transform group-hover:translate-y-0.5" />
    </a>

    {{-- Below lg the photograph leads instead: full-bleed at the top of the
         hero, pulled up behind the sticky bar the way the colour field is, and
         given out downward into the navy so the copy underneath starts on clean
         colour rather than against a cut edge.

         The photograph, whole and on the right, standing the hero's full height.
         Sized off its height with the width left to follow -- h-full w-auto and
         no max-width -- so it fills top to bottom at its own 3:2 with nothing
         cropped and nothing letterboxed. The box shrink-wraps to it, so how far
         left it reaches is the hero's height times 1.5 -- capped at 66% of the
         window, because on a narrow, tall one that is most of the width and the
         picture would swallow the copy.

         Where the cap bites, object-cover keeps it filling the height and shares
         the difference between the two ends -- 30/70, mostly off the right --
         which pushes the subject away from the copy by most of what the cap is
         trimming. Panning the picture inside the box rather than moving the box
         is the point: the fade is a mask on the box, so a box that moves takes
         the fade with it, and the boundary between navy and photograph would
         shift too. Both cuts this leaves are at the window's own edges, where
         they read as the frame rather than as cuts. --}}
    <div class="hero-photo relative max-lg:order-first max-lg:-mt-14 max-lg:mb-2 lg:absolute lg:inset-y-0 lg:right-0 lg:z-0 lg:w-auto">
        <img
            src="{{ asset($hostCity['feature']['photo']) }}"
            alt="{{ $hostCity['feature']['caption'] }}"
            width="2000"
            height="1333"
            fetchpriority="high"
            class="w-full lg:h-full lg:w-auto lg:max-w-[66vw] lg:object-cover lg:object-[30%_center]"
        >
    </div>
</section>
