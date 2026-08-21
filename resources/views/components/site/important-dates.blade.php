<section {{ $attributes }}>
    {{-- Sole heading on /important-dates, so it carries the page's h1. --}}
    <h1 class="font-display text-[clamp(1.35rem,2.6vw,1.85rem)] font-semibold tracking-[-0.025em]">
        Important Dates
    </h1>

    <div class="mt-8 grid gap-6 md:grid-cols-2 md:gap-8">
        @foreach (config('isphoa.keyDateGroups') as $group)
            <div class="rounded-2xl bg-mist px-5 py-6 md:px-7 md:py-8">
                <p class="eyebrow">{{ $group['heading'] }}</p>
                <table class="mt-5 w-full border-collapse text-[0.95rem]">
                    <tbody>
                        @foreach ($group['dates'] as $date)
                            <tr>
                                <th scope="row" class="w-full border border-line px-4 py-3 text-left font-medium leading-[1.45]">
                                    {{ $date['label'] }}
                                </th>
                                <td class="whitespace-nowrap border border-line px-4 py-3 text-right tabular-nums text-subtle">
                                    {{ $date['display'] }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
</section>
