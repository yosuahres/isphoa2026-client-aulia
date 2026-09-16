<x-site.section id="tracks" surface="dark" class="field-navy !border-white/10 relative overflow-hidden">
    {{-- The topic list sits as a narrow block in the middle of a wide panel, so
         this one fills the whole field rather than standing on its foot: the
         guide star and its star trails carry the emptiness either side of the
         list. --}}
    <x-site.dot-field plate="laser" :fill="true" />

    <x-site.container class="relative z-10">
        <x-site.reveal>
            <h2 class="text-center max-md:text-left font-display text-[clamp(1.75rem,4vw,2.6rem)] font-semibold leading-[1.1] tracking-[-0.03em]">
                Seminar Topics
            </h2>
            <div class="rule mx-auto mt-4 w-40 max-md:mx-0"></div>
        </x-site.reveal>

        {{-- The list sizes to its content and centres as a block, so the lead-in
             shares its wrapper to pick up the same left edge as the topics. --}}
        <div class="mx-auto mt-10 w-fit max-md:mx-0">
            <x-site.reveal as="p" class="max-w-full text-pretty text-[1.15rem] leading-[1.7] text-ink">
                Innovations in light-based technologies across the following areas.
            </x-site.reveal>

            <ul class="mt-8 grid gap-x-10 gap-y-0 xl:auto-cols-max xl:grid-flow-col xl:grid-rows-4">
                @foreach (config('isphoa.tracks') as $i => $track)
                    <x-site.reveal as="li" :delay="60 * $i" class="flex items-start gap-3.5">
                        <span aria-hidden="true" class="pt-[0.62em] text-navy">
                            <span class="block size-[7px] rounded-full bg-current"></span>
                        </span>

                        <h3 class="text-[1.15rem] font-semibold leading-[1.45] xl:whitespace-nowrap xl:text-[1.35rem]">
                            {{ $track['title'] }}
                        </h3>
                    </x-site.reveal>
                @endforeach
            </ul>
        </div>
    </x-site.container>
</x-site.section>
