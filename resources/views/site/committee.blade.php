@php
    $event = config('isphoa.event');
    $committee = config('isphoa.committee');

    [$patronage, $boards, $organizing, $workingGroups] = [
        $committee['patronage'],
        $committee['boards'],
        $committee['organizing'],
        $committee['workingGroups'],
    ];

    // From md up the accent rule is hung in the container's left padding, so
    // the heading starts on the same left edge as the lists beneath it rather
    // than being pushed in by the width of its own marker. Below md it stays
    // inline: Container drops to px-6, and 24px is not enough room to park a
    // rule in without it running off the side of the screen.
    $hang = 'md:absolute md:right-full md:top-1/2 md:mr-2.5 md:-translate-y-1/2';
@endphp

@section('title', 'Committee')
@section('description', "Patronage, advisory board, technical program committee and organizing committee of {$event['shortName']} {$event['edition']}.")

<x-layouts.site>
    <div class="surface-light flex-1 bg-mist">
        <x-site.container class="py-8 md:py-10">
            {{-- The design gives this page no visible header, but every page still
                 needs exactly one h1 for crawlers and screen readers. --}}
            <h1 class="sr-only">Committee</h1>

            {{-- Patronage --}}
            <section>
                <h2 class="relative flex items-center gap-3 font-display text-[1.2rem] font-semibold tracking-[-0.02em]">
                    <span aria-hidden="true" class="h-[6px] w-[1.25rem] shrink-0 bg-beam {{ $hang }}"></span>
                    {{ $patronage['heading'] }}
                </h2>
                @include('site.partials.people', ['names' => $patronage['entries']])
            </section>

            {{-- Advisory and technical program committees --}}
            @foreach ($boards as $board)
                <section class="mt-7">
                    <h2 class="relative flex items-center gap-3 font-display text-[1.2rem] font-semibold tracking-[-0.02em]">
                        <span aria-hidden="true" class="h-[6px] w-[1.25rem] shrink-0 bg-beam {{ $hang }}"></span>
                        {{ $board['heading'] }}
                    </h2>
                    <dl class="mt-3 grid gap-y-1.5 text-[0.925rem] leading-[1.7] sm:grid-cols-[auto_1fr] sm:gap-x-6">
                        <dt class="font-semibold">Chair</dt>
                        <dd class="text-ink">{{ $board['chair'] }}</dd>
                    </dl>
                    <h3 class="mt-4 text-[0.925rem] font-semibold leading-[1.7]">Members</h3>
                    @include('site.partials.people', ['names' => $board['members']])
                </section>
            @endforeach

            {{-- Organizing committee --}}
            <section class="mt-7">
                <h2 class="relative flex items-center gap-3 font-display text-[1.2rem] font-semibold tracking-[-0.02em]">
                    <span aria-hidden="true" class="h-[6px] w-[1.25rem] shrink-0 bg-beam {{ $hang }}"></span>
                    {{ $organizing['heading'] }}
                </h2>
                <dl class="mt-3 grid gap-y-1.5 text-[0.925rem] leading-[1.7] sm:grid-cols-[auto_1fr] sm:gap-x-6">
                    @foreach ($organizing['roles'] as $entry)
                        <dt class="font-semibold">{{ $entry['role'] }}</dt>
                        <dd class="text-ink">{{ $entry['name'] }}</dd>
                    @endforeach
                </dl>
            </section>

            {{-- One column, in the order the secretariat listed them. Pairing
                 them up saves height but costs the reader the running order,
                 and the page is a reference rather than something anyone
                 reads through. --}}
            <div class="mt-7 grid gap-y-7">
                @foreach ($workingGroups as $group)
                    <section>
                        {{-- A step down from the section headings above: the
                             bar is narrower and dimmer so the working groups
                             read as sitting under the committees, not
                             alongside them. --}}
                        <h3 class="relative flex items-center gap-3 font-display text-[1.05rem] font-semibold tracking-[-0.02em]">
                            <span aria-hidden="true" class="h-[5px] w-[0.9rem] shrink-0 bg-beam/55 {{ $hang }}"></span>
                            {{ $group['heading'] }}
                        </h3>
                        @if (! empty($group['chair']))
                            <dl class="mt-2 grid gap-y-1.5 text-[0.925rem] leading-[1.7] sm:grid-cols-[auto_1fr] sm:gap-x-6">
                                <dt class="font-semibold">Chair</dt>
                                <dd class="text-ink">{{ $group['chair'] }}</dd>
                            </dl>
                        @endif
                        @include('site.partials.people', ['names' => $group['members']])
                    </section>
                @endforeach
            </div>
        </x-site.container>
    </div>
</x-layouts.site>
