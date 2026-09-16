@php $about = config('isphoa.about'); @endphp

{{-- On the same flat navy as the rest of the page below the hero, so
     `surface=dark` keeps the site-ground tokens and the copy sets light. --}}
<x-site.section id="about" surface="dark" class="field-navy !border-white/10 !py-14 md:!py-20">
    <x-site.container>
        <x-site.reveal as="h2" class="text-balance text-center max-md:text-left font-display text-[clamp(1.9rem,4.2vw,2.9rem)] font-semibold leading-[1.15] tracking-[-0.03em]">
            {{ $about['heading'] }}
        </x-site.reveal>

        <x-site.reveal :delay="120" class="mt-8 space-y-5 text-[1.15rem] leading-[1.85] text-ink [hyphens:auto] md:text-justify">
            {{-- Each paragraph is a list of runs: a plain string, or a map
                 with an `em` key. The copy reads as one voice here, so an `em`
                 run sets in the same weight as the rest. --}}
            @foreach ($about['paragraphs'] as $parts)
                {{-- Runs are emitted flush against each other: they carry
                     their own spacing, and template whitespace here would show
                     up as a gap before the punctuation that follows a run. --}}
                <p>@foreach ($parts as $part){{ is_array($part) ? $part['em'] : $part }}@endforeach</p>
            @endforeach
        </x-site.reveal>
    </x-site.container>
</x-site.section>
