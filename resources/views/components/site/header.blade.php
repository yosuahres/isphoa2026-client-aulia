@php
    $brand = config('isphoa.brand');
    $event = config('isphoa.event');
    $nav = config('isphoa.nav');

    // A nav item is active when its own href matches, or -- for a dropdown,
    // which has no destination of its own -- when one of its children does.
    $matches = function (string $href) {
        if ($href === '/') {
            return request()->path() === '/';
        }

        return request()->is(ltrim($href, '/')) || request()->is(ltrim($href, '/').'/*');
    };

    $isActive = function (array $item) use ($matches) {
        $hrefs = isset($item['children'])
            ? array_column($item['children'], 'href')
            : [$item['href']];

        foreach ($hrefs as $href) {
            if ($matches($href)) {
                return true;
            }
        }

        return false;
    };

    $navLink = 'flex h-full items-center gap-1.5 whitespace-nowrap text-[0.95rem] font-semibold text-ink transition-colors hover:text-navy';

    // The rule under the current page's label, in the brand orange. It hangs
    // off the label rather than the link box -- the links are h-full, so a rule
    // pinned to their bottom would sit on the bar's edge, well below the
    // frost's fade. flare is a constant in both palettes, so the mark holds its
    // colour when the bar drops from the light shell to glass over the navy.
    //
    // The mark rather than the label carries the orange: flare on the light bar
    // is 3.08:1, fine for a rule but under 4.5:1 for 15px text, so the label
    // stays ink and legible.
    $navRule = 'pointer-events-none absolute -bottom-1.5 left-0 h-[3px] w-full rounded-full bg-flare';
@endphp

{{-- Driven by resources/js/app.js rather than Alpine. Alpine evaluates its
     attribute expressions with new Function(), which would force
     'unsafe-eval' into the script-src of every page; this menu is small
     enough that plain JS is the cheaper trade. All state lives in data-*
     attributes so the markup still describes it. --}}
{{-- display:contents, so this wrapper forms no box of its own. It exists only
     to group the bar and its mobile panel for app.js; as a real box it would be
     exactly as tall as the bar (the panel is fixed, so it adds no height), and a
     sticky child can only travel inside its parent -- the bar would scroll away
     at once and not return until the top of the document. Dissolving the box
     hands the bar the page-tall column in the layout as its container. --}}
<div class="contents" data-site-nav>
    {{-- No will-change on this element: it would establish a new backdrop root,
         and the blurred pane inside it has a backdrop-filter that needs the page
         behind the header to sample.

         The bar is a soft off-white at the top of every page -- shell rather than
         paper, so it is light without glaring -- and goes to plain glass once
         the page scrolls. surface-light rides with that ground: it sets the
         links dark on the light bar, and dropping it hands them back to the
         site-ground tokens, which set them light over the navy below. --}}
    <header
        class="surface-light sticky top-0 z-50 bg-shell transition duration-300"
        data-nav-header
    >
        <div
            aria-hidden="true"
            class="site-topbar pointer-events-none absolute inset-0 -z-10 transition-opacity duration-300"
            data-nav-frost
        ></div>

        {{-- Not x-site.container: the bar ignores the 1200px measure the page
             content keeps to, so the logo and the nav sit out on the window's
             own corners with nothing but the page gutter beside them. --}}
        <div class="relative flex h-16 w-full items-center px-6 md:px-10" data-nav-bar>
            {{-- While the mobile menu is open the logo takes the centre of the
                 bar, leaving the close button alone on the right. --}}
            <a
                href="{{ route('site.home') }}"
                class="relative flex shrink-0 flex-col items-start transition-opacity duration-200"
                data-nav-logo
            >

                <img
                    src="{{ asset($brand['logoMain']) }}"
                    alt="{{ $event['shortName'] }} {{ $event['edition'] }}"
                    width="{{ $brand['logoMainWidth'] }}"
                    height="{{ $brand['logoMainHeight'] }}"
                    class="h-10 w-auto sm:h-11"
                    data-nav-logo-wide
                >
                <img
                    src="{{ asset($brand['logo']) }}"
                    alt=""
                    width="{{ $brand['logoWidth'] }}"
                    height="{{ $brand['logoHeight'] }}"
                    class="hidden h-24 w-auto xl:hidden"
                    data-nav-logo-mark
                >
            </a>

            {{-- Where and when, beside the mark -- it reads as part of the
                 masthead, so the hero no longer carries it. It rides beside the
                 mark at every width, set small enough below xl that the venue
                 line clears the menu button on a narrow phone; min-w-0 with the
                 clip is the backstop, so a bar too tight for it loses the tail
                 of the line rather than pushing the page sideways. An open menu
                 centres the logo over this space, so app.js drops it there.

                 Both this and the mark fade out once the page leaves the top:
                 the bar that follows the reader back up carries the menu alone.
                 Faded rather than hidden, so the nav does not jump sideways. --}}
            <p
                class="ml-3 min-w-0 overflow-hidden whitespace-nowrap text-[0.75rem] font-medium leading-[1.35] text-ink transition-opacity duration-200 sm:ml-4 sm:text-[0.82rem] xl:ml-6 xl:text-[0.9rem]"
                data-nav-meta
            >
                {{ $event['venue'] }}
                <br>
                {{ $event['dates'] }}
            </p>

            <nav class="ml-auto hidden h-full items-center gap-9 xl:flex" aria-label="Primary">
                @foreach ($nav as $item)
                    @php $active = $isActive($item); @endphp

                    @if (isset($item['children']))
                        <div class="group relative flex h-full items-center">
                            <button
                                type="button"
                                aria-haspopup="true"
                                @class([$navLink, 'cursor-pointer', 'group-hover:text-ink' => ! $active])
                            >
                                <span class="relative">
                                    {{ $item['label'] }}
                                    @if ($active)
                                        <span aria-hidden="true" class="{{ $navRule }}"></span>
                                    @endif
                                </span>
                                <x-site.icon name="caret" class="size-3.5 transition-transform group-hover:translate-y-0.5" />
                            </button>

                            {{-- Anchored from the right: the nav sits against the
                                 window's right gutter, so a panel hung off the
                                 left of the last trigger runs off the screen.
                                 top-full is the bar's real bottom edge, 80px down,
                                 but the frost fades out from 44px so the bar
                                 reads as ending well above that -- hence the
                                 pull up, or the panel looks adrift. pt-2 rather
                                 than a margin for the daylight: padding is part
                                 of the hover target, so the pointer can cross it
                                 without the menu closing. --}}
                            <div class="invisible absolute -right-6 top-full z-50 -mt-5 pt-2 opacity-0 transition-opacity duration-150 group-focus-within:visible group-focus-within:opacity-100 group-hover:visible group-hover:opacity-100">
                                {{-- Only hover paints a fill. The current page is marked
                                     by an orange dot and dark type instead, so it never
                                     stands as a second pill beside the hovered one; the
                                     1px of daylight keeps two neighbours' edges apart. --}}
                                <ul class="site-dropdown surface-light grid min-w-[260px] gap-px rounded-2xl p-2 shadow-2xl">
                                    @foreach ($item['children'] as $child)
                                        @php $current = $matches($child['href']); @endphp
                                        <li>
                                            <a
                                                href="{{ $child['href'] }}"
                                                @if ($current) aria-current="page" @endif
                                                @class([
                                                    'flex cursor-pointer items-center gap-2.5 whitespace-nowrap rounded-xl px-4 py-2.5 text-left text-[0.95rem] transition-colors hover:bg-ink/[0.06] hover:text-ink',
                                                    'font-semibold text-ink' => $current,
                                                    'text-subtle' => ! $current,
                                                ])
                                            >
                                                <span aria-hidden="true" @class(['size-1.5 shrink-0 rounded-full', 'bg-flare' => $current, 'bg-transparent' => ! $current])></span>
                                                {{ $child['label'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @else
                        <a
                            href="{{ $item['href'] }}"
                            @if ($active) aria-current="page" @endif
                            class="{{ $navLink }}"
                        >
                            <span class="relative">
                                {{ $item['label'] }}
                                @if ($active)
                                    <span aria-hidden="true" class="{{ $navRule }}"></span>
                                @endif
                            </span>
                        </a>
                    @endif
                @endforeach
            </nav>

            <button
                type="button"
                aria-expanded="false"
                aria-controls="mobile-menu"
                aria-label="Open menu"
                class="-mr-3 ml-auto shrink-0 self-center rounded-full p-3 xl:hidden"
                data-nav-toggle
            >
                <span data-nav-icon-menu><x-site.icon name="menu" :stroke-width="2.4" class="size-6" /></span>
                <span class="hidden" data-nav-icon-close><x-site.icon name="close" :stroke-width="2.4" class="size-6" /></span>
            </button>
        </div>
    </header>

    <div
        id="mobile-menu"
        hidden
        class="surface-light fixed inset-x-0 bottom-0 top-28 z-40 overflow-y-auto bg-shell xl:hidden"
        data-nav-panel
    >
        <x-site.container class="pb-10 pt-8">
            <nav aria-label="Mobile">
                {{-- Top level. Tapping a group swaps this list for that group's
                     own panel below. --}}
                <div data-nav-level="root">
                    @foreach ($nav as $item)
                        @if (isset($item['children']))
                            <button
                                type="button"
                                @class([
                                    'flex w-full items-center justify-end gap-0 py-4 text-right font-display text-2xl font-semibold tracking-[-0.02em]',
                                    'text-flare' => $isActive($item),
                                ])
                                data-nav-open-group="{{ $item['label'] }}"
                            >
                                {{ $item['label'] }}
                                <x-site.icon name="chevron" :stroke-width="1.2" class="-ml-0.5 size-8" />
                            </button>
                        @else
                            <a
                                href="{{ $item['href'] }}"
                                @if ($isActive($item)) aria-current="page" @endif
                                @class([
                                    'block py-4 text-right font-display text-2xl font-semibold tracking-[-0.02em]',
                                    'text-flare' => $isActive($item),
                                ])
                            >{{ $item['label'] }}</a>
                        @endif
                    @endforeach
                </div>

                @foreach ($nav as $item)
                    @if (isset($item['children']))
                        <div hidden data-nav-level="{{ $item['label'] }}">
                            <button
                                type="button"
                                class="flex w-full items-center justify-end gap-1 py-4 text-right font-display text-2xl font-semibold tracking-[-0.02em] text-subtle"
                                data-nav-back
                            >
                                <x-site.icon name="chevron" :stroke-width="1.2" class="size-8 rotate-90" />
                                Back
                            </button>

                            @foreach ($item['children'] as $child)
                                <a
                                    href="{{ $child['href'] }}"
                                    @if ($matches($child['href'])) aria-current="page" @endif
                                    @class([
                                        'block py-4 text-right font-display text-3xl font-semibold tracking-[-0.02em]',
                                        'text-flare' => $matches($child['href']),
                                    ])
                                >{{ $child['label'] }}</a>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </nav>
        </x-site.container>
    </div>
</div>
