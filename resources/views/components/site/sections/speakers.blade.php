{{-- The dark speaker wall. `surface=dark` keeps the site-ground tokens in
     play so the text stays light against the slate backdrop. --}}
<x-site.section id="speakers" surface="dark" class="relative overflow-hidden !bg-slate-900">
    <div aria-hidden="true" class="pointer-events-none absolute inset-0 z-0 overflow-hidden">
        <img src="{{ asset('photos/photonics-bg.jpg') }}" alt="" loading="lazy" class="absolute inset-0 size-full object-cover opacity-40">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/85 via-slate-900/70 to-slate-900"></div>
    </div>

    <x-site.container class="relative z-10">
        @foreach (config('isphoa.speakerGroups') as $groupIndex => $group)
            <div @class(['mt-20 md:mt-24' => $groupIndex > 0])>
                <x-site.reveal>
                    <h2 class="text-center font-display text-[clamp(1.75rem,3.4vw,2.5rem)] font-bold tracking-[-0.03em]">
                        {{ $group['heading'] }}
                    </h2>
                    <div class="rule mx-auto mt-3.5 w-28"></div>
                </x-site.reveal>

                @php $single = count($group['people']) === 1; @endphp

                <ul @class([
                    'mt-16 grid gap-x-3 gap-y-16 sm:flex sm:flex-wrap sm:justify-center sm:gap-x-4 sm:gap-y-32',
                    'grid-cols-1 justify-items-center' => $single,
                    'grid-cols-2' => ! $single,
                ])>
                    @foreach ($group['people'] as $speaker)
                        <li @class(['sm:w-[360px]', 'w-1/2' => $single, 'w-full' => ! $single])>
                            <div class="relative mx-auto w-full sm:w-[190px]">
                                <div class="relative aspect-[3/4] w-full overflow-hidden">
                                    <img
                                        src="{{ asset($speaker['photo']) }}"
                                        alt="{{ $speaker['name'] ?? '' }}"
                                        loading="lazy"
                                        class="absolute inset-0 size-full object-cover"
                                    >
                                </div>
                            </div>

                            <p class="relative z-10 mx-auto -mt-4 w-full bg-white px-2 py-2 text-center text-xs font-semibold leading-snug text-deep sm:w-fit sm:min-w-[90%] sm:max-w-full sm:whitespace-nowrap sm:px-3.5 sm:py-2.5 sm:text-[0.84rem]">
                                @if (! empty($speaker['name']) && ! empty($speaker['slug']))
                                    <a href="{{ route('site.speakers') }}#{{ $speaker['slug'] }}" class="underline underline-offset-[3px]">
                                        {{ $speaker['name'] }}
                                    </a>
                                @else
                                    <span class="text-deep/60">To be announced</span>
                                @endif
                            </p>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </x-site.container>
</x-site.section>
