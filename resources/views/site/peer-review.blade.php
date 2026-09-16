@php
    $event = config('isphoa.event');
    $review = config('isphoa.peerReview');
@endphp

@section('title', 'Peer Review Process')
@section('description', "How papers submitted to {$event['shortName']} {$event['edition']} are reviewed: AI and plagiarism screening, double-blind review by two reviewers, scoring criteria and acceptance outcomes.")

<x-layouts.site>
    <div class="field-navy relative flex-1 overflow-clip">
        {{-- This page's plate, dimmed. Every figure is taken by another inner
             page; the laser photograph otherwise only stands behind the home
             topics, so it is the one least likely to be seen twice in a row. --}}
        <x-site.dot-field plate="laser" :soft="true" :repeat="2" />

        <x-site.container wide class="relative z-10 pb-12 pt-12 md:pb-16 md:pt-16">
            <x-site.page-header class="mb-10 md:mb-14">Peer Review Process</x-site.page-header>

            <section>
                <x-site.label>{{ $review['heading'] }}</x-site.label>

                <ol class="mt-4 grid list-decimal gap-y-4 pl-6 text-[1.15rem] leading-[1.75] text-ink marker:font-semibold marker:text-subtle">
                    @foreach ($review['steps'] as $step)
                        <li class="pl-1">
                            {{ $step['text'] }}

                            @if (! empty($step['items']))
                                <ul class="mt-2 grid gap-y-1.5">
                                    @foreach ($step['items'] as $item)
                                        <li class="grid grid-cols-[1.75rem_1fr]">
                                            <span class="font-semibold text-subtle">{{ $item['mark'] }}.</span>
                                            <span>{{ $item['text'] }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ol>
            </section>
        </x-site.container>
    </div>
</x-layouts.site>
