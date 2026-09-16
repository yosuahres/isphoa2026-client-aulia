@php
    $event = config('isphoa.event');
    $method = config('isphoa.submissionInfo.method');
    $proceedingsTemplates = config('isphoa.templateDownloads')[0];

    $linkClass = 'font-medium text-beam underline decoration-beam/30 underline-offset-4 transition-colors hover:decoration-beam';
@endphp

@section('title', 'Paper Submission')
@section('description', "Submit your paper to {$event['shortName']} {$event['edition']} through the EasyChair conference management system: templates, account set-up and submission steps.")

<x-layouts.site>
    <div class="field-navy relative flex-1 overflow-clip">
        {{-- This page's plate, dimmed. Each inner page draws a different optical
             figure, so no two of them read as the same picture; this one is
             short enough that one copy standing on its foot covers it. --}}
        <x-site.dot-field plate="strands" :soft="true" :repeat="1" />

        <x-site.container wide class="relative z-10 pb-12 pt-12 md:pb-16 md:pt-16">
            <x-site.page-header class="mb-10 md:mb-14">Paper Submission</x-site.page-header>

            {{-- Paper Submission, through EasyChair --}}
            <section>
                <x-site.body class="!mt-0">{{ $method['intro'] }}</x-site.body>

                <ol class="mt-4 grid list-decimal gap-y-4 pl-6 text-[1.15rem] leading-[1.75] text-ink marker:font-semibold marker:text-subtle">
                    <li>
                        Please make sure that your manuscript is written following the template given:
                        <br>
                        {{ $proceedingsTemplates['label'] }} (@foreach ($proceedingsTemplates['files'] as $i => $file)@if ($i > 0), @endif<a
                            href="{{ asset($file['href']) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="{{ $linkClass }}"
                        >{{ $file['format'] }}<span class="sr-only"> (opens in a new tab)</span></a>@endforeach).
                    </li>
                    <li>Before submitting your manuscript, please make sure you already have an EasyChair account.</li>
                    <li>
                        If you do not have an account yet, please click the following link:
                        <a href="{{ $method['accountUrl'] }}" target="_blank" rel="noopener noreferrer" class="{{ $linkClass }}">Create an EasyChair account<span class="sr-only"> (opens in a new tab)</span></a>,
                        and follow the workflow to create your account.
                    </li>
                    <li>
                        Having your EasyChair account, click the following link:
                        @if ($method['submitUrl'])
                            <a href="{{ $method['submitUrl'] }}" target="_blank" rel="noopener noreferrer" class="{{ $linkClass }}">Log in to EasyChair for {{ $event['shortName'] }} {{ $event['edition'] }}<span class="sr-only"> (opens in a new tab)</span></a>,
                        @else
                            <span class="font-medium">Log in to EasyChair for {{ $event['shortName'] }} {{ $event['edition'] }}</span>,
                        @endif
                        fill in the login data (email and password) you made when creating your account, and click Log in.
                    </li>
                    <li>After entering the {{ $event['shortName'] }} {{ $event['edition'] }} submission page, fill in all required data (Title, Abstract, and Keywords) for your paper's contribution. Then choose your manuscript file and press Submit.</li>
                </ol>
            </section>
        </x-site.container>
    </div>
</x-layouts.site>
