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

        return request()->is(ltrim($href, '/')) || request()->is(ltrim($href, '/') . '/*');
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

{{-- `group` holds the label of the mobile nav group being drilled into. --}}
<div
    x-data="{ open: false, group: null }"
    x-effect="document.body.style.overflow = open ? 'hidden' : ''; if (! open) group = null"
>
    <header
        class="surface-light sticky top-0 z-50 border-b bg-paper"
        :class="open ? 'border-transparent xl:border-line' : 'border-line'"
    >
        <x-site.container class="relative flex items-center xl:h-[4.5rem] xl:items-end" ::class="open ? 'h-28' : 'h-16'">
            {{-- While the mobile menu is open the logo takes the centre of the
                 bar, leaving the close button alone on the right. --}}
            <a
                href="{{ route('site.home') }}"
                class="flex shrink-0 flex-col items-start"
                :class="open ? 'absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 xl:static xl:translate-x-0 xl:translate-y-0' : ''"
            >
                <img
                    src="{{ asset($brand['logoMain']) }}"
                    alt="{{ $event['shortName'] }} {{ $event['edition'] }}"
                    width="{{ $brand['logoMainWidth'] }}"
                    height="{{ $brand['logoMainHeight'] }}"
                    class="h-10 w-auto xl:h-14"
                    :class="open ? 'hidden xl:block' : ''"
                >
                <img
                    src="{{ asset($brand['logo']) }}"
                    alt=""
                    width="{{ $brand['logoWidth'] }}"
                    height="{{ $brand['logoHeight'] }}"
                    class="h-24 w-auto xl:hidden"
                    x-cloak
                    x-show="open"
                >
            </a>

            <button
                type="button"
                @click="open = ! open"
                :aria-expanded="open"
                aria-controls="mobile-menu"
                :aria-label="open ? 'Close menu' : 'Open menu'"
                class="-mr-3 ml-auto shrink-0 self-center rounded-full p-3 xl:hidden"
                :class="open ? 'text-black' : ''"
            >
                <x-site.icon name="menu" :stroke-width="2.4" class="size-6" x-show="! open" />
                <x-site.icon name="close" :stroke-width="2.4" class="size-6" x-cloak x-show="open" />
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
        x-cloak
        x-show="open"
        class="surface-light fixed inset-x-0 bottom-0 top-28 z-40 overflow-y-auto bg-paper xl:hidden"
    >
        <x-site.container class="pb-10 pt-8">
            <nav aria-label="Mobile" class="text-black">
                @foreach ($nav as $item)
                    @if (isset($item['children']))
                        {{-- A group has no destination of its own; tapping it
                             swaps this list for its children. --}}
                        <button
                            type="button"
                            x-show="group === null"
                            @click="group = @js($item['label'])"
                            class="flex w-full items-center justify-end gap-0 py-4 text-right font-display text-2xl font-semibold tracking-[-0.02em]"
                        >
                            {{ $item['label'] }}
                            <x-site.icon name="chevron" :stroke-width="1.2" class="-ml-0.5 size-8" />
                        </button>
                    @else
                        <a
                            href="{{ $item['href'] }}"
                            x-show="group === null"
                            @if ($isActive($item)) aria-current="page" @endif
                            class="block py-4 text-right font-display text-2xl font-semibold tracking-[-0.02em]"
                        >{{ $item['label'] }}</a>
                    @endif
                @endforeach

                @foreach ($nav as $item)
                    @if (isset($item['children']))
                        <template x-if="group === @js($item['label'])">
                            <div>
                                <button
                                    type="button"
                                    @click="group = null"
                                    class="flex w-full items-center justify-end gap-1 py-4 text-right font-display text-2xl font-semibold tracking-[-0.02em] text-subtle"
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
                        </template>
                    @endif
                @endforeach
            </nav>
        </x-site.container>
    </div>
</div>
