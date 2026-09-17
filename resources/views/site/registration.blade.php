@php
    $event = config('isphoa.event');
    $fees = config('isphoa.fees');

    // The early-bird window, from the Registration group on the dates page.
    $earlyBird = collect(config('isphoa.keyDateGroups'))
        ->flatMap(fn ($group) => $group['dates'])
        ->firstWhere('label', 'Early-bird Registration');
@endphp

@section('title', 'Registration')
@section('description', "Registration fees for {$event['shortName']} {$event['edition']}, {$event['dates']}, {$event['venue']}: early-bird presenter rates and participant / listener rates, online and offline.")

<x-layouts.site :scroll-to-hash="true">
    <div class="field-navy relative flex-1 overflow-clip">
        <x-site.dot-field plate="lattice" :soft="true" />

        <x-site.container wide class="relative z-10 pb-12 pt-12 md:pb-16 md:pt-16">
            <x-site.page-header class="mb-10 md:mb-14">Registration</x-site.page-header>

            <section id="fees" class="scroll-mt-20 xl:scroll-mt-36">
                <x-site.label>Registration Fee</x-site.label>

                <div class="mt-8 grid gap-8">
                    @foreach ($fees as $fee)
                        <x-site.card id="{{ $fee['id'] }}" class="scroll-mt-20 xl:scroll-mt-36">
                            <x-slot:heading>
                                <h3 class="font-display text-[1.35rem] font-semibold tracking-[-0.02em] md:text-[1.5rem]">{{ $fee['heading'] }}</h3>
                                @if ($fee['earlyBird'])
                                    <span class="inline-flex items-center gap-1.5 bg-flare px-3 py-1 text-[0.75rem] font-semibold uppercase tracking-[0.08em] text-white">
                                        Early Bird
                                    </span>
                                    @if ($earlyBird)
                                        <span class="text-[0.95rem] font-medium text-subtle">{{ $earlyBird['display'] }}</span>
                                    @endif
                                @endif
                            </x-slot:heading>

                            <div class="overflow-x-auto">
                                <table class="w-full min-w-[32rem] border-collapse text-[1rem] md:text-[1.075rem]">
                                    <caption class="sr-only">
                                        {{ $fee['heading'] }} registration fees{{ $fee['earlyBird'] ? ' (early bird)' : '' }}
                                    </caption>
                                    <thead>
                                        <tr class="bg-navy text-white">
                                            <th scope="col" class="px-5 py-3.5 text-left text-[0.8rem] font-semibold uppercase tracking-[0.08em] md:px-7">Category</th>
                                            <th scope="col" class="w-[11rem] whitespace-nowrap px-5 py-3.5 text-right text-[0.8rem] font-semibold uppercase tracking-[0.08em]">Online</th>
                                            <th scope="col" class="w-[11rem] whitespace-nowrap px-5 py-3.5 text-right text-[0.8rem] font-semibold uppercase tracking-[0.08em] md:px-7">Offline</th>
                                        </tr>
                                    </thead>
                                    @foreach ($fee['groups'] as $group)
                                        <tbody>
                                            @if ($group['label'])
                                                <tr>
                                                    <th colspan="3" scope="colgroup" class="border-b border-line bg-mist px-5 pb-2 pt-4 text-left text-[0.75rem] font-semibold uppercase tracking-[0.12em] text-navy md:px-7">
                                                        {{ $group['label'] }}
                                                    </th>
                                                </tr>
                                            @endif
                                            @foreach ($group['rows'] as $row)
                                                <tr class="border-b border-line transition-colors last:border-b-0 hover:bg-mist/60">
                                                    <th scope="row" class="w-full px-5 py-4 text-left font-medium leading-[1.4] md:px-7">
                                                        @if ($group['label'])<span class="sr-only">{{ $group['label'] }} — </span>@endif{{ $row['category'] }}
                                                    </th>
                                                    <td class="whitespace-nowrap px-5 py-4 text-right font-semibold tabular-nums">{{ $row['online'] }}</td>
                                                    <td class="whitespace-nowrap px-5 py-4 text-right font-semibold tabular-nums md:px-7">{{ $row['offline'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </x-site.card>
                    @endforeach
                </div>

                <p class="mx-auto mt-8 flex w-fit items-center gap-2 border border-flare/40 bg-flare/10 px-5 py-2 text-[0.85rem] font-semibold uppercase tracking-[0.08em] text-flare">
                    <svg aria-hidden="true" viewBox="0 0 20 20" fill="currentColor" class="size-4"><path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-8-5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 10 5Zm0 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd"/></svg>
                    Payment made is non-refundable
                </p>
            </section>
        </x-site.container>
    </div>
</x-layouts.site>
