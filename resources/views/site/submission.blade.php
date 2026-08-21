@php
    $event = config('isphoa.event');
    $info = config('isphoa.submissionInfo');

    [$publication, $plagiarism, $instructions, $templates, $method] = [
        $info['publication'],
        $info['plagiarism'],
        $info['instructions'],
        $info['templates'],
        $info['method'],
    ];

    // A submission method pointing at a route this app does not serve would be
    // a link to a 404, so drop those and renumber what is left. The dashboard
    // has not been ported yet; once /dashboard/submissions/new exists, that
    // option reappears on its own with no edit here.
    $served = function (string $href) {
        if (! str_starts_with($href, '/')) {
            return true;
        }

        try {
            app('router')->getRoutes()->match(Illuminate\Http\Request::create($href));

            return true;
        } catch (Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            return false;
        }
    };

    $methodOptions = [];
    foreach ($method['options'] as $option) {
        if ($served($option['href'])) {
            $option['n'] = (string) (count($methodOptions) + 1);
            $methodOptions[] = $option;
        }
    }

    $linkClass = 'font-medium text-beam underline decoration-beam/30 underline-offset-4 transition-colors hover:decoration-beam';
@endphp

@section('title', 'Submission')
@section('description', "Submit a 2 to 6 page full paper to {$event['shortName']} {$event['edition']} by 15 September 2026. Double-blind review, with accepted and presented papers published in the Proceedings of SPIE and indexed in Scopus.")

<x-layouts.site>
    <div class="surface-light flex-1 bg-mist">
        <x-site.container class="py-8 md:py-10">
            {{-- The design gives this page no visible header, but every page still
                 needs exactly one h1 for crawlers and screen readers. --}}
            <h1 class="sr-only">Submission</h1>

            {{-- Paper Publication --}}
            <section>
                <x-site.label>{{ $publication['heading'] }}</x-site.label>
                <x-site.body>{{ $publication['lead'] }}</x-site.body>

                <div class="mt-4 flex flex-col gap-3 rounded-2xl border border-line bg-shell p-4 sm:flex-row sm:items-center sm:gap-5 sm:px-5">
                    <img src="{{ asset('brand/spie.png') }}" alt="SPIE" width="474" height="94" class="h-8 w-auto shrink-0 mix-blend-multiply">
                    <div>
                        <p class="text-[0.925rem] font-medium leading-[1.6]">{{ $publication['proceedings'] }}</p>
                        <p class="mt-1 text-[0.85rem] leading-[1.65] text-ink">{{ $publication['indexing'] }}</p>
                    </div>
                </div>

                <ul class="mt-3 grid gap-y-1.5">
                    @foreach ($publication['points'] as $point)
                        <x-site.bullet>{{ $point }}</x-site.bullet>
                    @endforeach
                </ul>
            </section>

            {{-- Policy on Plagiarism --}}
            <section class="mt-7">
                <x-site.label>{{ $plagiarism['heading'] }}</x-site.label>
                <x-site.body>{{ $plagiarism['body'] }}</x-site.body>
            </section>

            {{-- Instruction to Authors --}}
            <section class="mt-7">
                <x-site.label>{{ $instructions['heading'] }}</x-site.label>
                <x-site.body>{{ $instructions['body'] }}</x-site.body>
            </section>

            {{-- Paper Template --}}
            <section class="mt-7">
                <x-site.label>{{ $templates['heading'] }}</x-site.label>
                <x-site.body>{{ $templates['lead'] }}</x-site.body>

                <ul class="mt-3 flex flex-wrap gap-x-8 gap-y-3">
                    @foreach (config('isphoa.templateDownloads') as $doc)
                        <li class="flex items-center gap-2 text-[0.925rem] leading-[1.7]">
                            <span aria-hidden="true" class="text-faint">
                                <x-site.icon name="download" class="size-[17px]" />
                            </span>
                            <span>
                                {{ $doc['label'] }} (@foreach ($doc['files'] as $i => $file)@if ($i > 0), @endif<a
                                    href="{{ asset($file['href']) }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="{{ $linkClass }}"
                                >{{ $file['format'] }}<span class="sr-only"> (opens in a new tab)</span></a>@endforeach)
                            </span>
                        </li>
                    @endforeach
                </ul>
            </section>

            {{-- Submission Methods --}}
            <section class="mt-7">
                <x-site.label>{{ $method['heading'] }}</x-site.label>
                <x-site.body>{{ $method['intro'] }}</x-site.body>

                <ol class="mt-3 grid gap-y-1.5">
                    @foreach ($methodOptions as $option)
                        <li class="text-[0.925rem] leading-[1.7] text-ink">
                            {{ $option['n'] }}.
                            <a href="{{ $option['href'] }}" class="{{ $linkClass }}">{{ $option['label'] }}</a>
                            ({{ $option['formats'] }})@if (! empty($option['note'])) ({{ $option['note'] }}).@endif
                        </li>
                    @endforeach
                </ol>

                <p class="mt-3 text-[0.925rem] leading-[1.7] text-ink">
                    {{ $method['paperId'] }} {{ $method['enquiries'] }}
                    <a href="mailto:{{ $event['email'] }}" class="{{ $linkClass }}">{{ $event['email'] }}</a>.
                </p>
            </section>
        </x-site.container>
    </div>
</x-layouts.site>
