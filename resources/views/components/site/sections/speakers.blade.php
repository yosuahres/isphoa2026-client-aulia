{{-- The dark speaker wall, on the same flat navy as the hero. `surface=dark`
     keeps the site-ground tokens in play so the text stays light against it. --}}
<x-site.section id="speakers" surface="dark" class="field-navy !border-white/10 relative overflow-hidden">
    {{-- The prism in the bottom-left corner of the wall, its spectrum climbing
         right and fading out before it reaches the cards. --}}
    <x-site.dot-field plate="prism" />

    <x-site.container class="relative z-10">
        @foreach (config('isphoa.speakerGroups') as $groupIndex => $group)
            <div @class(['mt-20 md:mt-24' => $groupIndex > 0])>
                <x-site.reveal>
                    <h2 class="text-center max-md:text-left font-display text-[clamp(1.75rem,3.4vw,2.5rem)] font-bold tracking-[-0.03em]">
                        {{ $group['heading'] }}
                    </h2>
                    <div class="rule mx-auto mt-3.5 w-28 max-md:mx-0"></div>
                </x-site.reveal>

                @php $single = count($group['people']) === 1; @endphp

                <ul @class([
                    'mt-16 grid gap-x-3 gap-y-16 sm:flex sm:flex-wrap sm:justify-center sm:gap-x-4 sm:gap-y-32',
                    'grid-cols-1 justify-items-center' => $single,
                    'grid-cols-2' => ! $single,
                ])>
                    @foreach ($group['people'] as $speaker)
                        {{-- The whole card lifts on hover, so the one under the
                             pointer stands off the wall: the card rises, the
                             photograph pushes in behind its own frame, and a
                             shadow opens under it. --}}
                        <li @class([
                            'group transition-transform duration-300 ease-out hover:-translate-y-2 sm:w-[360px]',
                            'w-1/2' => $single,
                            'w-full' => ! $single,
                        ])>
                            @php $link = ! empty($speaker['name']) && ! empty($speaker['slug'])
                                ? route('site.speakers') . '#' . $speaker['slug']
                                : null; @endphp

                            {{-- The photo points at the same profile as the name
                                 below it, so it carries the pointer cursor too. --}}
                            <div class="relative mx-auto w-full sm:w-[190px]">
                                <{{ $link ? 'a' : 'div' }}
                                    @if ($link) href="{{ $link }}" tabindex="-1" aria-hidden="true" @endif
                                    class="relative block aspect-[3/4] w-full overflow-hidden shadow-none transition-shadow duration-300 ease-out group-hover:shadow-[0_22px_45px_-12px_rgb(0_8_16/0.75)] {{ $link ? 'cursor-pointer' : '' }}"
                                >
                                    <img
                                        src="{{ asset($speaker['photo']) }}"
                                        alt="{{ $speaker['name'] ?? '' }}"
                                        loading="lazy"
                                        class="absolute inset-0 size-full object-cover transition-transform duration-500 ease-out group-hover:scale-[1.06]"
                                    >
                                </{{ $link ? 'a' : 'div' }}>
                            </div>

                            {{-- No nowrap: at this size the longest names run
                                 past the 360px column, so they wrap instead of
                                 spilling over their neighbours. --}}
                            <p class="relative z-10 mx-auto -mt-4 w-full bg-white px-2 py-2 text-center text-sm font-semibold leading-snug text-deep sm:w-fit sm:min-w-[90%] sm:max-w-full sm:px-3.5 sm:py-2.5 sm:text-[0.95rem]">
                                @if ($link)
                                    <a href="{{ $link }}" class="underline underline-offset-[3px]">
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
