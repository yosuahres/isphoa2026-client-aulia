<section {{ $attributes }}>
    {{-- The page's own <x-site.page-header> carries the title, so this is just
         the two date tables. --}}
    <div class="grid gap-6 md:grid-cols-2 md:gap-8">
        @foreach (config('isphoa.keyDateGroups') as $group)
            <div class="rounded-2xl bg-mist px-5 py-6 md:px-7 md:py-8">
                <p class="eyebrow">{{ $group['heading'] }}</p>
                <table class="mt-5 w-full border-collapse text-[1.15rem]">
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
