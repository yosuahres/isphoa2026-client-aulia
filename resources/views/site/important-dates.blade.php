@php $event = config('isphoa.event'); @endphp

@section('title', 'Important Dates')
@section('description', "Key deadlines for {$event['shortName']} {$event['edition']}: full-paper submission 15 September 2026, notification of acceptance 15 October 2026, early-bird registration 1 November 2026, camera-ready 20 November 2026, seminar {$event['dates']}.")

<x-layouts.site>
    <div class="surface-light flex-1 bg-mist">
        <x-site.container class="py-16 md:py-20">
            {{-- No page header; just the heading, then the dates. --}}
            <x-site.important-dates />
        </x-site.container>
    </div>
</x-layouts.site>
