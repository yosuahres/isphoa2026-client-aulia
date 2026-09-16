@php
    $announcement = config('isphoa.announcement');

    // A destination that is an image opens over the page instead of being
    // navigated to; anything else is an ordinary link.
    $opensPoster = $announcement
        && preg_match('/\.(jpe?g|png|webp|avif|gif)$/i', $announcement['href']);
@endphp

@if ($announcement)
    {{-- The mark's orange with white type, one line centred, wrapping on a
         narrow screen rather than being cut. An anchor, not a button, for the
         same reason the Call for Papers poster is one: without JS it still
         reaches the file, and a modified click (cmd, ctrl, middle) opens it in
         a tab of its own. app.js takes the plain click for the panel below.

         z-20 because the home hero is z-10 and bleeds its navy and photograph
         4rem up behind the bar -- straight over this strip -- without it. --}}
    <a
        href="{{ $announcement['href'] }}"
        @if ($opensPoster)
            aria-label="{{ $announcement['text'] }}. View the announcement poster full size."
            data-lightbox-open="site-announcement"
        @endif
        class="group field-flare relative z-20 block w-full cursor-pointer px-4 py-2.5 text-center text-white sm:py-3"
    >
        <span class="text-balance text-[0.82rem] font-bold uppercase tracking-[0.13em] underline-offset-4 [text-shadow:0_1px_2px_rgb(0_0_0/0.3)] group-hover:underline sm:text-[0.92rem]">
            {{ $announcement['text'] }}
        </span>
    </a>

    @if ($opensPoster)
        {{-- The full-size view, built the same way the Call for Papers
             poster's is and driven by the same code in app.js. --}}
        <div
            id="site-announcement"
            hidden
            role="dialog"
            aria-modal="true"
            aria-label="{{ $announcement['text'] }}"
            class="fixed inset-0 z-[70] flex items-center justify-center bg-deep/95 p-4 opacity-0 backdrop-blur-sm transition-opacity duration-200 md:p-8"
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
                src="{{ $announcement['href'] }}"
                alt="{{ $announcement['text'] }}"
                width="{{ $announcement['imageWidth'] ?? null }}"
                height="{{ $announcement['imageHeight'] ?? null }}"
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
    @endif
@endif
