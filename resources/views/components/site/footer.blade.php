@php
    $brand = config('isphoa.brand');
    $event = config('isphoa.event');
    $secretariat = config('isphoa.secretariat');
@endphp

<footer class="surface-light border-t border-line bg-paper">
    {{-- The wide measure starts the brand mark further left and, more to the
         point, buys the address column enough width that its four lines set on
         four lines instead of eight — which is what drove the footer's height. --}}
    <x-site.container wide class="pb-6 pt-10">
        <div class="grid gap-x-10 gap-y-8 md:grid-cols-2 lg:grid-cols-[0.9fr_1.6fr_0.9fr]">
            <div>
                <img
                    src="{{ asset($brand['logoMain']) }}"
                    alt="{{ $event['shortName'] }} {{ $event['edition'] }}"
                    width="{{ $brand['logoMainWidth'] }}"
                    height="{{ $brand['logoMainHeight'] }}"
                    class="h-14 w-auto md:h-[72px]"
                >
                <p class="mt-4 max-w-xs text-[0.83rem] leading-[1.65] text-subtle">
                    {{ config('isphoa.footerBlurb') }}
                </p>
            </div>

            <div>
                <p class="font-display text-[1.25rem] font-semibold tracking-[-0.02em]">Get In Touch</p>
                <div class="rule mt-3 w-20"></div>

                <address class="mt-4 space-y-2.5 text-[0.85rem] not-italic leading-[1.55] text-subtle">
                    <div class="flex items-start gap-2.5">
                        <x-site.icon name="pin" class="mt-1 size-3.5 shrink-0 text-faint" />
                        <span>
                            @foreach ($secretariat['lines'] as $line)
                                <span class="block">{{ $line }}</span>
                            @endforeach
                        </span>
                    </div>

                    <div class="flex items-start gap-2.5">
                        <x-site.icon name="signal" class="mt-1 size-3.5 shrink-0 text-faint" />
                        <span>
                            Telp/Fax:
                            <a href="{{ $secretariat['phoneHref'] }}" class="transition-colors hover:text-ink">
                                {{ $secretariat['phoneLabel'] }}
                            </a>
                        </span>
                    </div>

                    <div class="flex items-start gap-2.5">
                        <x-site.icon name="mail" class="mt-1 size-3.5 shrink-0 text-faint" />
                        <a
                            href="mailto:{{ $secretariat['email'] }}"
                            class="underline decoration-line underline-offset-4 transition-colors hover:text-ink"
                        >{{ $secretariat['email'] }}</a>
                    </div>
                </address>
            </div>

            @foreach (config('isphoa.footerColumns') as $column)
                <nav aria-label="{{ $column['heading'] }}">
                    <p class="font-display text-[1.25rem] font-semibold tracking-[-0.02em]">{{ $column['heading'] }}</p>
                    <div class="rule mt-3 w-20"></div>
                    <ul class="mt-4 space-y-2 text-[0.85rem]">
                        @foreach ($column['links'] as $link)
                            <li>
                                @if (! empty($link['href']))
                                    <a href="{{ $link['href'] }}" class="text-subtle transition-colors hover:text-ink">
                                        {{ $link['label'] }}
                                    </a>
                                @else
                                    <x-site.stub-link>{{ $link['label'] }}</x-site.stub-link>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </nav>
            @endforeach
        </div>

        {{-- The copyright sets as the footer's last row rather than its own
             band, so the page ends on one block instead of two. --}}
        <p class="mt-8 border-t border-line pt-5 text-center text-[0.78rem] text-subtle">
            {{ config('isphoa.copyright') }}
        </p>
    </x-site.container>
</footer>
