<x-site.section id="tracks" class="!bg-mist">
    <x-site.container>
        <x-site.reveal>
            <h2 class="text-center font-display text-[clamp(1.75rem,4vw,2.6rem)] font-semibold leading-[1.1] tracking-[-0.03em]">
                Seminar Topics
            </h2>
            <div class="rule mx-auto mt-4 w-40"></div>
        </x-site.reveal>

        <ul class="mx-auto mt-14 grid justify-center gap-x-10 gap-y-0 xl:auto-cols-max xl:grid-flow-col xl:grid-rows-4">
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
    </x-site.container>
</x-site.section>
