@php
    $event = config('isphoa.event');
    $committee = config('isphoa.committee');

    [$patronage, $boards, $organizing, $workingGroups] = [
        $committee['patronage'],
        $committee['boards'],
        $committee['organizing'],
        $committee['workingGroups'],
    ];

    // Anchors for each body. The old /committee/<slug> pages redirect here and
    // land on these, so they have to keep matching those slugs.
    $boardIds = ['advisory-board', 'technical-program'];

    // The committee headings sit on a square-cornered label, all one width so
    // their edges line up down the page, rather than beside an
    // accent bar. The working groups take a dimmer one so they still read as
    // sitting under the organizing committee, not alongside it.
    $h2 = 'block w-full max-w-[42rem] bg-beam px-3.5 py-1 font-display text-[1.75rem] font-semibold tracking-[-0.02em] text-white';
    $section = 'scroll-mt-20 xl:scroll-mt-36';
@endphp

@section('title', 'Committee')
@section('description', "Patronage, advisory board, technical program committee and organizing committee of {$event['shortName']} {$event['edition']}.")

<x-layouts.site :scroll-to-hash="true">
    <div class="field-navy relative flex-1 overflow-clip">
        {{-- This page's plate, dimmed. All four bodies and the working groups
             run long, so the figure takes the full 3 copies. --}}
        <x-site.dot-field plate="rings" :soft="true" :repeat="3" />

        <x-site.container wide class="relative z-10 pb-12 pt-12 md:pb-16 md:pt-16">
            <x-site.page-header class="mb-10 md:mb-14">Committee</x-site.page-header>

            {{-- Patronage --}}
            <section id="patronage" class="{{ $section }}">
                <h2 class="{{ $h2 }}">
                    {{ $patronage['heading'] }}
                </h2>
                @include('site.partials.people', ['names' => $patronage['entries']])
            </section>

            {{-- Advisory and technical program committees --}}
            @foreach ($boards as $i => $board)
                <section id="{{ $boardIds[$i] }}" class="mt-12 {{ $section }}">
                    <h2 class="{{ $h2 }}">
                            {{ $board['heading'] }}
                    </h2>
                    <dl class="mt-3 grid gap-y-1.5 text-[1.15rem] leading-[1.75] sm:grid-cols-[auto_1fr] sm:gap-x-6">
                        <dt class="font-semibold">Chair</dt>
                        <dd class="text-ink">{{ $board['chair'] }}</dd>
                    </dl>
                    <h3 class="mt-4 text-[1.15rem] font-semibold leading-[1.75]">Members</h3>
                    @include('site.partials.people', ['names' => $board['members']])
                </section>
            @endforeach

            {{-- Organizing committee --}}
            <section id="organizing" class="mt-12 {{ $section }}">
                <h2 class="{{ $h2 }}">
                    {{ $organizing['heading'] }}
                </h2>
                <dl class="mt-3 grid gap-y-1.5 text-[1.15rem] leading-[1.75] sm:grid-cols-[auto_1fr] sm:gap-x-6">
                    @foreach ($organizing['roles'] as $entry)
                        <dt class="font-semibold">{{ $entry['role'] }}</dt>
                        <dd class="text-ink">{{ $entry['name'] }}</dd>
                    @endforeach
                </dl>

                {{-- One column, in the order the secretariat listed them. Pairing
                     them up saves height but costs the reader the running order,
                     and the page is a reference rather than something anyone
                     reads through. --}}
                <div class="mt-9 grid gap-y-7">
                    @foreach ($workingGroups as $group)
                        <section>
                            <h3 class="block w-full max-w-[42rem] bg-beam/20 px-3.5 py-0.5 font-display text-[1.45rem] font-semibold tracking-[-0.02em] text-ink">
                                {{ $group['heading'] }}
                            </h3>
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
            </section>
        </x-site.container>
    </div>
</x-layouts.site>
