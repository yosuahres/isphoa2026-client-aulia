@php
    $event = config('isphoa.event');
@endphp

@section('title', 'Registration')
@section('description', "Registration for {$event['shortName']} {$event['edition']}, {$event['dates']}, {$event['venue']}.")

{{-- Not in the sitemap yet: a page that only says details are coming is not
     worth indexing. Add it to Seo::indexableRoutes() once the content is in. --}}
<x-layouts.site>
    <div class="field-navy relative flex-1 overflow-clip">
        <x-site.dot-field plate="lattice" :soft="true" />

        <x-site.container wide class="relative z-10 pb-12 pt-12 md:pb-16 md:pt-16">
            <x-site.page-header class="mb-10 md:mb-14">Registration</x-site.page-header>

            <x-site.body class="!mt-0">
                Registration details for {{ $event['shortName'] }} {{ $event['edition'] }} will be announced here soon.
            </x-site.body>
        </x-site.container>
    </div>
</x-layouts.site>
