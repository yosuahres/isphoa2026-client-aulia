@php
    $event = config('isphoa.event');
    $secretariat = config('isphoa.secretariat');

    $linkClass = 'font-medium text-beam underline decoration-beam/30 underline-offset-4 transition-colors hover:decoration-beam';
    $term = 'flex items-center gap-2.5 text-[1rem] font-semibold uppercase tracking-[0.08em] text-subtle';
    $detail = 'mt-2 text-[1.15rem] leading-[1.75] text-ink';
@endphp

@section('title', 'Contact')
@section('description', "Contact the {$event['shortName']} {$event['edition']} secretariat at UIN Mahmud Yunus Batusangkar, West Sumatera: address, telephone and email.")

<x-layouts.site>
    <div class="field-navy relative flex-1 overflow-clip">
        {{-- This page's plate, dimmed. The laser photograph lost its inner page
             when peer review moved onto /submission, so it stands here. --}}
        <x-site.dot-field plate="laser" :soft="true" />

        <x-site.container wide class="relative z-10 pb-12 pt-12 md:pb-16 md:pt-16">
            <x-site.page-header class="mb-10 md:mb-14">Contact</x-site.page-header>

            <x-site.label>{{ $event['shortName'] }} {{ $event['edition'] }} Secretariat</x-site.label>

            <address class="mt-8 grid gap-y-8 not-italic md:grid-cols-[1.4fr_1fr] md:gap-x-12">
                <div>
                    <p class="{{ $term }}">
                        <x-site.icon name="pin" class="size-4 shrink-0" />
                        Address
                    </p>
                    <p class="{{ $detail }}">
                        @foreach ($secretariat['lines'] as $line)
                            <span class="block">{{ $line }}</span>
                        @endforeach
                        <span class="block">Batusangkar, West Sumatera, Indonesia</span>
                    </p>
                </div>

                <div class="grid content-start gap-y-8">
                    <div>
                        <p class="{{ $term }}">
                            <x-site.icon name="signal" class="size-4 shrink-0" />
                            Telp/Fax
                        </p>
                        <p class="{{ $detail }}">
                            <a href="{{ $secretariat['phoneHref'] }}" class="{{ $linkClass }}">{{ $secretariat['phoneLabel'] }}</a>
                        </p>
                    </div>

                    <div>
                        <p class="{{ $term }}">
                            <x-site.icon name="mail" class="size-4 shrink-0" />
                            Email
                        </p>
                        <p class="{{ $detail }}">
                            <a href="mailto:{{ $secretariat['email'] }}" class="{{ $linkClass }} break-all">{{ $secretariat['email'] }}</a>
                        </p>
                    </div>
                </div>
            </address>
        </x-site.container>
    </div>
</x-layouts.site>
