@php $event = config('isphoa.event'); @endphp

@section('title', 'Important Dates')
@section('description', "Key deadlines for {$event['shortName']} {$event['edition']}: full-paper submission 15 September 2026, notification of acceptance 15 October 2026, early-bird registration 1 November 2026, camera-ready 20 November 2026, seminar {$event['dates']}.")

<x-layouts.site>
    <div class="field-navy relative flex-1 overflow-clip">
        {{-- This page's plate, dimmed, standing on the foot of the panel. Each
             inner page draws a different optical figure, so no two of them read
             as the same picture. --}}
        <x-site.dot-field plate="lattice" :soft="true" />

        <x-site.container wide class="relative z-10 py-16 md:py-20">
            <x-site.page-header class="mb-10 md:mb-14">Important Dates</x-site.page-header>

            <x-site.important-dates />
        </x-site.container>
    </div>
</x-layouts.site>
