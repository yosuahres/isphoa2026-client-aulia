<x-layouts.site>
    @push('head')
        <x-site.event-json-ld />
    @endpush

    {{-- The homepage only: the news strip sits under the sticky bar, above the
         hero, and scrolls away with the page. --}}
    <x-site.announcement-bar />

    <x-site.sections.hero />
    <x-site.sections.about />
    <x-site.sections.tracks />
    <x-site.sections.speakers />
</x-layouts.site>
