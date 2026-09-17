@php
    $event = config('isphoa.event');
    $method = config('isphoa.submissionInfo.method');
    $proceedingsTemplates = config('isphoa.templateDownloads')[0];
    $review = config('isphoa.peerReview');
    $publishing = config('isphoa.publishing');

    $linkClass = 'font-medium text-beam underline decoration-beam/30 underline-offset-4 transition-colors hover:decoration-beam';

    // Everything an author needs is on this one page. /peer-review and
    // /publication redirect to these anchors, so the ids have to keep matching.
    $section = 'scroll-mt-20 xl:scroll-mt-36';
    $divider = 'mt-14 border-t border-line pt-14 md:mt-16 md:pt-16';
    $subheading = 'mt-3 text-[1.15rem] font-semibold leading-[1.75] text-subtle';
@endphp

@section('title', 'Submission')
@section('description', "Submitting a paper to {$event['shortName']} {$event['edition']}: templates and EasyChair submission steps, the double-blind peer review process, and publication in the Proceedings of SPIE.")

<x-layouts.site :scroll-to-hash="true">
    <div class="field-navy relative flex-1 overflow-clip">
        {{-- This page's plate, dimmed. Submission, review and publication
             together run long, so the figure takes the full 3 copies. --}}
        <x-site.dot-field plate="strands" :soft="true" :repeat="3" />

        <x-site.container wide class="relative z-10 pb-12 pt-12 md:pb-16 md:pt-16">
            <x-site.page-header class="mb-10 md:mb-14">Submission</x-site.page-header>

            {{-- Paper Submission, through EasyChair --}}
            <section id="paper-submission" class="{{ $section }}">
                <x-site.label>Paper Submission</x-site.label>
                <x-site.body class="!mt-3">{{ $method['intro'] }}</x-site.body>

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
                        <img
                            src="{{ asset('photos/easychair-login.png') }}"
                            alt="The EasyChair login form, with Email and Password fields and a Log in button."
                            width="499"
                            height="210"
                            loading="lazy"
                            class="mt-4 block h-auto w-full max-w-[499px] border border-line"
                        >
                    </li>
                    <li>After entering the {{ $event['shortName'] }} {{ $event['edition'] }} submission page, fill in all required data (Title, Abstract, and Keywords) for your paper's contribution. Then choose your manuscript file and press Submit.
                        <img
                            src="{{ asset('photos/easychair-submission.png') }}"
                            alt="The EasyChair new submission form, with author information, title and abstract, keywords, a paper upload field and a Submit button."
                            width="702"
                            height="439"
                            loading="lazy"
                            class="mt-4 block h-auto w-full max-w-[702px]"
                        >
                    </li>
                </ol>
            </section>

            {{-- Peer Review Process --}}
            <section id="peer-review" class="{{ $divider }} {{ $section }}">
                <x-site.label>Peer Review Process</x-site.label>
                <h3 class="{{ $subheading }}">{{ $review['heading'] }}</h3>

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

            {{-- SPIE Publication --}}
            <section id="publication" class="{{ $divider }} {{ $section }}">
                <x-site.label>SPIE Publication</x-site.label>
                <h3 class="{{ $subheading }}">{{ $publishing['heading'] }}</h3>

                <ol class="mt-4 grid list-decimal gap-y-4 pl-6 text-[1.15rem] leading-[1.75] text-ink marker:font-semibold marker:text-subtle">
                    @foreach ($publishing['steps'] as $step)
                        <li class="pl-1">{{ $step }}</li>
                    @endforeach
                </ol>
            </section>
        </x-site.container>
    </div>
</x-layouts.site>
