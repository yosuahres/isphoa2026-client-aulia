@php
    $event = config('isphoa.event');
    $committee = config('isphoa.committee');

    // Which body this page shows; the routes pass it. The two boards share one
    // shape in the config and are told apart by their place in it.
    $section ??= 'patronage';

    $board = match ($section) {
        'advisory-board' => $committee['boards'][0],
        'technical-program' => $committee['boards'][1],
        default => null,
    };

    $heading = match ($section) {
        'organizing' => $committee['organizing']['heading'],
        'patronage' => $committee['patronage']['heading'],
        default => $board['heading'],
    };

    // From md up the accent rule is hung in the container's left padding, so
    // the heading starts on the same left edge as the lists beneath it rather
    // than being pushed in by the width of its own marker. Below md it stays
    // inline: Container drops to px-6, and 24px is not enough room to park a
    // rule in without it running off the side of the screen.
    $hang = 'md:absolute md:right-full md:top-1/2 md:mr-2.5 md:-translate-y-1/2';
@endphp

@section('title', $heading)
@section('description', "{$heading} of {$event['shortName']} {$event['edition']}, the {$event['fullName']}.")

<x-layouts.site>
    <div class="field-navy relative flex-1 overflow-clip">
        {{-- This page's plate, dimmed. Each inner page draws a different optical
             figure, so no two of them read as the same picture. The organizing
             committee carries the working groups too and runs long enough to
             take 2 copies; the other bodies fit under one. --}}
        <x-site.dot-field plate="rings" :soft="true" :repeat="$section === 'organizing' ? 2 : 1" />

        <x-site.container wide class="relative z-10 pb-12 pt-12 md:pb-16 md:pt-16">
            <x-site.page-header class="mb-10 md:mb-14">{{ $heading }}</x-site.page-header>

            @if ($section === 'patronage')
                @include('site.partials.people', ['names' => $committee['patronage']['entries']])
            @elseif ($board)
                <dl class="grid gap-y-1.5 text-[1.15rem] leading-[1.75] sm:grid-cols-[auto_1fr] sm:gap-x-6">
                    <dt class="font-semibold">Chair</dt>
                    <dd class="text-ink">{{ $board['chair'] }}</dd>
                </dl>
                <h2 class="mt-4 text-[1.15rem] font-semibold leading-[1.75]">Members</h2>
                @include('site.partials.people', ['names' => $board['members']])
            @else
                <dl class="grid gap-y-1.5 text-[1.15rem] leading-[1.75] sm:grid-cols-[auto_1fr] sm:gap-x-6">
                    @foreach ($committee['organizing']['roles'] as $entry)
                        <dt class="font-semibold">{{ $entry['role'] }}</dt>
                        <dd class="text-ink">{{ $entry['name'] }}</dd>
                    @endforeach
                </dl>

                {{-- One column, in the order the secretariat listed them. Pairing
                     them up saves height but costs the reader the running order,
                     and the page is a reference rather than something anyone
                     reads through. --}}
                <div class="mt-9 grid gap-y-7">
                    @foreach ($committee['workingGroups'] as $group)
                        <section>
                            <h2 class="relative flex items-center gap-3 font-display text-[1.45rem] font-semibold tracking-[-0.02em]">
                                <span aria-hidden="true" class="h-[5px] w-[0.9rem] shrink-0 bg-beam/55 {{ $hang }}"></span>
                                {{ $group['heading'] }}
                            </h2>
                            @if (! empty($group['chair']))
                                <dl class="mt-2 grid gap-y-1.5 text-[1.15rem] leading-[1.75] sm:grid-cols-[auto_1fr] sm:gap-x-6">
                                    <dt class="font-semibold">Chair</dt>
                                    <dd class="text-ink">{{ $group['chair'] }}</dd>
                                </dl>
                            @endif
                            @include('site.partials.people', ['names' => $group['members']])
                        </section>
                    @endforeach
                </div>
            @endif
        </x-site.container>
    </div>
</x-layouts.site>
