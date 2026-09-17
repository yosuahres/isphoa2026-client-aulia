<section {{ $attributes }}>
    {{-- The page's own <x-site.page-header> carries the title, so this is just
         the two date timelines. --}}
    <div class="grid items-start gap-6 md:grid-cols-2 md:gap-8">
        @foreach (config('isphoa.keyDateGroups') as $group)
            <x-site.card>
                <x-slot:heading>
                    <h2 class="font-display text-[1.35rem] font-semibold tracking-[-0.02em] md:text-[1.5rem]">{{ $group['heading'] }}</h2>
                </x-slot:heading>

                <ol class="relative px-5 py-6 md:px-7 md:py-7">
                    @foreach ($group['dates'] as $date)
                        <li class="relative grid grid-cols-[1.25rem_1fr] gap-x-4 pb-6 last:pb-0">
                            {{-- The rail: a line down to the next stop, not past the last one. --}}
                            @unless ($loop->last)
                                <span aria-hidden="true" class="absolute bottom-0 left-[0.625rem] top-5 w-px -translate-x-1/2 bg-line"></span>
                            @endunless
                            <span aria-hidden="true" class="relative mt-1 flex size-5 items-center justify-center bg-navy/15">
                                <span class="size-2.5 bg-navy"></span>
                            </span>

                            <div>
                                <p class="flex flex-wrap items-center gap-2">
                                    <time datetime="{{ $date['iso'] }}" class="font-semibold tabular-nums text-navy">{{ $date['display'] }}</time>
                                    @if (! empty($date['extended']))
                                        <span class="bg-flare/10 px-2 py-0.5 text-[0.7rem] font-semibold uppercase tracking-[0.08em] text-flare">Extended</span>
                                    @endif
                                </p>
                                <p class="mt-1 text-[1.075rem] font-medium leading-[1.4]">{{ $date['label'] }}</p>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </x-site.card>
        @endforeach
    </div>
</section>
