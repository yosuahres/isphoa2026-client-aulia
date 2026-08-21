@php $about = config('isphoa.about'); @endphp

<x-site.section id="about" class="!py-14 md:!py-20">
    <x-site.container>
        <x-site.reveal as="h2" class="text-balance text-center font-display text-[clamp(1.9rem,4.2vw,2.9rem)] font-semibold leading-[1.15] tracking-[-0.03em]">
            {{ $about['heading'] }}
        </x-site.reveal>

        <x-site.reveal :delay="120" class="mt-8 space-y-5 text-[1.02rem] leading-[1.85] text-subtle [hyphens:auto] md:text-justify">
            {{-- Each paragraph is a list of runs: a plain string, or a map with
                 an `em` key marking an emphasised span. --}}
            @foreach ($about['paragraphs'] as $parts)
                <p>
                    @foreach ($parts as $part)
                        @if (is_array($part))
                            <strong class="font-semibold text-ink">{{ $part['em'] }}</strong>
                        @else
                            {{ $part }}
                        @endif
                    @endforeach
                </p>
            @endforeach
        </x-site.reveal>
    </x-site.container>
</x-site.section>
