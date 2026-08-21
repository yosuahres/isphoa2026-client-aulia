@php $event = config('isphoa.event'); @endphp

@section('title', 'Speakers')
@section('description', "Plenary, keynote and invited speakers at {$event['shortName']} {$event['edition']}, including researchers from ITB, ITS, the University of Southampton, NYU Abu Dhabi, CSIR-NCL and Chulalongkorn University.")

<x-layouts.site :scroll-to-hash="true">
    <div class="surface-light bg-mist">
        <x-site.container class="py-16 md:py-20">
            {{-- The design gives this page no visible header, but every page still
                 needs exactly one h1 for crawlers and screen readers. --}}
            <h1 class="sr-only">Speakers</h1>

            @foreach (config('isphoa.speakerGroups') as $groupIndex => $group)
                <section @class(['mt-24 md:mt-28' => $groupIndex > 0])>
                    <h2 class="font-display text-[clamp(1.6rem,4vw,2.5rem)] font-semibold uppercase tracking-[-0.02em] text-navy">
                        {{ $group['heading'] }}
                    </h2>

                    @foreach ($group['people'] as $i => $speaker)
                        <article
                            @if (! empty($speaker['slug'])) id="{{ $speaker['slug'] }}" @endif
                            @class([
                                'scroll-mt-20 xl:scroll-mt-36',
                                'mt-12' => $i === 0,
                                'mt-14 border-t border-line pt-14 md:mt-16 md:pt-16' => $i > 0,
                            ])
                        >
                            <div class="flex flex-col items-center">
                                <div class="relative size-[200px] overflow-hidden rounded-full bg-shell md:size-[240px]">
                                    <img
                                        src="{{ asset($speaker['photo']) }}"
                                        alt="{{ $speaker['name'] ?? '' }}"
                                        loading="lazy"
                                        class="absolute inset-0 size-full object-cover object-top"
                                    >
                                </div>

                                <h3 class="mt-6 text-center font-display text-[clamp(1.2rem,2.5vw,1.55rem)] font-semibold tracking-[-0.02em]">
                                    {{ $speaker['name'] ?? 'To be announced' }}
                                </h3>

                                @if (! empty($speaker['institution']))
                                    <p class="mt-2 text-center text-[0.9rem] text-subtle">{{ $speaker['institution'] }}</p>
                                @endif
                            </div>

                            <div class="mx-auto mt-10 max-w-5xl">
                                @forelse ($speaker['bio'] as $p => $paragraph)
                                    <p @class(['hyphens-auto text-justify text-[1.02rem] leading-[1.8]', 'mt-1.5' => $p > 0])>
                                        {{ $paragraph }}
                                    </p>
                                @empty
                                    <p class="hyphens-auto text-justify text-[1.02rem] leading-[1.8] text-subtle">
                                        @if (! empty($speaker['name']))
                                            A full biography for {{ $speaker['name'] }} is not published yet.
                                        @else
                                            This speaker has not been announced yet.
                                        @endif
                                    </p>
                                @endforelse

                                @if (! empty($speaker['topic']))
                                    <p class="mt-8 text-[0.68rem] font-semibold uppercase tracking-[0.12em] text-faint">Talk</p>
                                    <p class="mt-2 font-display text-[1.15rem] font-semibold leading-[1.35] tracking-[-0.02em]">
                                        {{ $speaker['topic'] }}
                                    </p>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </section>
            @endforeach
        </x-site.container>
    </div>
</x-layouts.site>
