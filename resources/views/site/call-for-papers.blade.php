@php
    $event = config('isphoa.event');
    $tracks = config('isphoa.tracks');
@endphp

@section('title', 'Call for Papers')
@section('description', "Topics of interest for {$event['shortName']} {$event['edition']}: " . implode(', ', array_column($tracks, 'title')) . '.')

<x-layouts.site>
    <div class="surface-light flex-1 bg-mist">
        <x-site.container class="py-8 md:py-10">
            <section>
                <x-site.label>Topics of Interest</x-site.label>
                <x-site.body>
                    {{ $event['shortName'] }} {{ $event['edition'] }} welcomes original and unpublished
                    research on light-based technology. Submissions are invited in, but
                    not limited to, the following topics.
                </x-site.body>

                <ul class="mt-3 grid gap-y-1.5">
                    @foreach ($tracks as $track)
                        <x-site.bullet>
                            <span class="font-semibold">{{ $track['title'] }}</span>@if (! empty($track['desc'])) {{ $track['desc'] }}@endif
                        </x-site.bullet>
                    @endforeach
                </ul>
            </section>
        </x-site.container>
    </div>
</x-layouts.site>
