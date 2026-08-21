@php
    $brand = config('isphoa.brand');
    $event = config('isphoa.event');
    $secretariat = config('isphoa.secretariat');
@endphp

<footer class="surface-light border-t border-line bg-mist">
    <x-site.container class="pb-16 pt-20">
        <div class="grid gap-12 md:grid-cols-2 lg:grid-cols-[1.4fr_1fr_1fr]">
            <div>
                <img
                    src="{{ asset($brand['logoMain']) }}"
                    alt="{{ $event['shortName'] }} {{ $event['edition'] }}"
                    width="{{ $brand['logoMainWidth'] }}"
                    height="{{ $brand['logoMainHeight'] }}"
                    class="h-[72px] w-auto mix-blend-multiply md:h-24"
                >
                <p class="mt-5 max-w-xs text-[0.83rem] leading-[1.75] text-subtle">
                    {{ config('isphoa.footerBlurb') }}
                </p>
            </div>

            <div>
                <p class="font-display text-[1.25rem] font-semibold tracking-[-0.02em]">Get In Touch</p>
                <div class="rule mt-3 w-20"></div>

                <address class="mt-6 space-y-3.5 text-[0.85rem] not-italic leading-[1.7] text-subtle">
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
                    <ul class="mt-6 space-y-3 text-[0.85rem]">
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
    </x-site.container>
</footer>
