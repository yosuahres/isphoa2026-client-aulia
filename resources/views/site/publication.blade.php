@php
    $event = config('isphoa.event');
    $publishing = config('isphoa.publishing');
@endphp

@section('title', 'SPIE Publication')
@section('description', "How accepted and presented papers from {$event['shortName']} {$event['edition']} are published in the Proceedings of SPIE, and how camera-ready manuscripts are submitted.")

<x-layouts.site>
    <div class="field-navy relative flex-1 overflow-clip">
        {{-- This page's plate, dimmed. Every figure is taken by another inner
             page; the prism photograph otherwise only stands behind the home
             speaker wall. --}}
        <x-site.dot-field plate="prism" :soft="true" />

        <x-site.container wide class="relative z-10 pb-12 pt-12 md:pb-16 md:pt-16">
            <x-site.page-header class="mb-10 md:mb-14">SPIE Publication</x-site.page-header>

            <section>
                <x-site.label>{{ $publishing['heading'] }}</x-site.label>

                <ol class="mt-4 grid list-decimal gap-y-4 pl-6 text-[1.15rem] leading-[1.75] text-ink marker:font-semibold marker:text-subtle">
                    @foreach ($publishing['steps'] as $step)
                        <li class="pl-1">{{ $step }}</li>
                    @endforeach
                </ol>
            </section>
        </x-site.container>
    </div>
</x-layouts.site>
