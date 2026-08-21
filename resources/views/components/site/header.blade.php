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

    $navLink = 'relative flex h-full items-center gap-1.5 whitespace-nowrap text-[0.95rem] font-semibold text-subtle transition-colors hover:text-ink';
@endphp

{{-- Driven by resources/js/app.js rather than Alpine. Alpine evaluates its
     attribute expressions with new Function(), which would force
     'unsafe-eval' into the script-src of every page; this menu is small
     enough that plain JS is the cheaper trade. All state lives in data-*
     attributes so the markup still describes it. --}}
<div data-site-nav>
    <header class="surface-light sticky top-0 z-50 border-b border-line bg-paper" data-nav-header>
        <x-site.container class="relative flex h-16 items-center xl:h-[4.5rem] xl:items-end" data-nav-bar>
            {{-- While the mobile menu is open the logo takes the centre of the
                 bar, leaving the close button alone on the right. --}}
            <a href="{{ route('site.home') }}" class="flex shrink-0 flex-col items-start" data-nav-logo>
                <img
                    src="{{ asset($brand['logoMain']) }}"
                    alt="{{ $event['shortName'] }} {{ $event['edition'] }}"
                    width="{{ $brand['logoMainWidth'] }}"
                    height="{{ $brand['logoMainHeight'] }}"
                    class="h-10 w-auto xl:h-14"
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
        </x-site.container>

        <x-site.container class="hidden h-8 xl:block">
            <nav class="flex h-full items-center justify-start gap-9" aria-label="Primary">
                @foreach ($nav as $item)
                    @php $active = $isActive($item); @endphp

                    @if (isset($item['children']))
                        <div class="group relative flex h-full items-center">
                            <button
                                type="button"
                                aria-haspopup="true"
                                @class([$navLink, 'cursor-default group-hover:text-ink', 'text-ink' => $active])
                            >
                                {{ $item['label'] }}
                                <x-site.icon name="caret" class="size-3.5 transition-transform group-hover:translate-y-0.5" />
                                @if ($active)
                                    <span aria-hidden="true" class="absolute -inset-x-1 -bottom-px h-[3px] bg-ink"></span>
                                @endif
                            </button>

                            <div class="invisible absolute -left-7 top-full z-50 opacity-0 transition-opacity duration-150 group-focus-within:visible group-focus-within:opacity-100 group-hover:visible group-hover:opacity-100">
                                <ul class="min-w-[300px] border border-line border-t-[3px] border-t-ink bg-paper py-3 shadow-xl">
                                    @foreach ($item['children'] as $child)
                                        <li>
                                            <a
                                                href="{{ $child['href'] }}"
                                                @if ($matches($child['href'])) aria-current="page" @endif
                                                @class([
                                                    'block cursor-pointer whitespace-nowrap px-7 py-3.5 text-left text-[0.95rem] transition-colors hover:text-ink',
                                                    'text-ink' => $matches($child['href']),
                                                    'text-subtle' => ! $matches($child['href']),
                                                ])
                                            >{{ $child['label'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @else
                        <a
                            href="{{ $item['href'] }}"
                            @if ($active) aria-current="page" @endif
                            @class([$navLink, 'text-ink' => $active])
                        >
                            {{ $item['label'] }}
                            @if ($active)
                                <span aria-hidden="true" class="absolute -inset-x-1 -bottom-px h-[3px] bg-ink"></span>
                            @endif
                        </a>
                    @endif
                @endforeach
            </nav>
        </x-site.container>
    </header>

    <div
        id="mobile-menu"
        hidden
        class="surface-light fixed inset-x-0 bottom-0 top-28 z-40 overflow-y-auto bg-paper xl:hidden"
        data-nav-panel
    >
        <x-site.container class="pb-10 pt-8">
            <nav aria-label="Mobile" class="text-black">
                {{-- Top level. Tapping a group swaps this list for that group's
                     own panel below. --}}
                <div data-nav-level="root">
                    @foreach ($nav as $item)
                        @if (isset($item['children']))
                            <button
                                type="button"
                                class="flex w-full items-center justify-end gap-0 py-4 text-right font-display text-2xl font-semibold tracking-[-0.02em]"
                                data-nav-open-group="{{ $item['label'] }}"
                            >
                                {{ $item['label'] }}
                                <x-site.icon name="chevron" :stroke-width="1.2" class="-ml-0.5 size-8" />
                            </button>
                        @else
                            <a
                                href="{{ $item['href'] }}"
                                @if ($isActive($item)) aria-current="page" @endif
                                class="block py-4 text-right font-display text-2xl font-semibold tracking-[-0.02em]"
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
                                    class="block py-4 text-right font-display text-3xl font-semibold tracking-[-0.02em]"
                                >{{ $child['label'] }}</a>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </nav>
        </x-site.container>
    </div>
</div>
