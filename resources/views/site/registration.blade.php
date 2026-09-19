@php
    $event = config('isphoa.event');
    $fees = config('isphoa.fees');
    $procedure = config('isphoa.registrationProcedure');
    $payment = config('isphoa.paymentMethod');
    $terms = config('isphoa.registrationTerms');

    $linkClass = 'font-medium text-beam underline decoration-beam/30 underline-offset-4 transition-colors hover:decoration-beam';

    // The early-bird window, from the Registration group on the dates page.
    $earlyBird = collect(config('isphoa.keyDateGroups'))
        ->flatMap(fn ($group) => $group['dates'])
        ->firstWhere('label', 'Early-bird Registration');
@endphp

@section('title', 'Registration')
@section('description', "How to register for {$event['shortName']} {$event['edition']}, {$event['dates']}, {$event['venue']}: the registration procedure, early-bird presenter rates and participant / listener rates, online and offline.")

<x-layouts.site :scroll-to-hash="true">
    <div class="field-navy relative flex-1 overflow-clip">
        <x-site.dot-field plate="lattice" :soft="true" />

        <x-site.container wide class="relative z-10 pb-12 pt-12 md:pb-16 md:pt-16">
            <x-site.page-header class="mb-10 md:mb-14">Registration</x-site.page-header>

            <section id="procedure" class="scroll-mt-20 xl:scroll-mt-36">
                <x-site.label>Registration Procedure</x-site.label>

                <ol class="mt-4 grid list-decimal gap-y-4 pl-6 text-[1.15rem] leading-[1.75] text-ink marker:font-semibold marker:text-subtle">
                    <li class="pl-1">Please complete the payment fee according to the method you choose.</li>
                    <li class="pl-1">
                        Please complete the conference registration using the following link:
                        <a href="{{ $procedure['formUrl'] }}" target="_blank" rel="noopener noreferrer" class="{{ $linkClass }} break-all">{{ $procedure['formUrl'] }}<span class="sr-only"> (opens in a new tab)</span></a>
                    </li>
                    <li class="pl-1">Before submitting the form, please ensure that all required information is included and all supporting documents (payment proof/slip) are attached. This will enable us to process your registration promptly and ensure a smooth conference experience for you.</li>
                </ol>
            </section>

            <section id="fees" class="mt-14 border-t border-line pt-14 scroll-mt-20 md:mt-16 md:pt-16 xl:scroll-mt-36">
                <x-site.label>Registration Fee</x-site.label>

                <div class="mt-8 grid gap-8">
                    @foreach ($fees as $fee)
                        <x-site.card id="{{ $fee['id'] }}" class="scroll-mt-20 xl:scroll-mt-36">
                            <x-slot:heading>
                                <h3 class="font-display text-[1.35rem] font-semibold tracking-[-0.02em] md:text-[1.5rem]">{{ $fee['heading'] }}</h3>
                                @if ($fee['earlyBird'])
                                    <span class="inline-flex items-center gap-1.5 bg-flare px-3 py-1 text-[0.75rem] font-semibold uppercase tracking-[0.08em] text-white">
                                        Early Bird
                                    </span>
                                    @if ($earlyBird)
                                        <span class="text-[0.95rem] font-medium text-subtle">{{ $earlyBird['display'] }}</span>
                                    @endif
                                @endif
                            </x-slot:heading>

                            <div class="overflow-x-auto">
                                <table class="w-full min-w-[32rem] border-collapse text-[1rem] md:text-[1.075rem]">
                                    <caption class="sr-only">
                                        {{ $fee['heading'] }} registration fees{{ $fee['earlyBird'] ? ' (early bird)' : '' }}
                                    </caption>
                                    <thead>
                                        <tr class="bg-navy text-white">
                                            <th scope="col" class="px-5 py-3.5 text-left text-[0.8rem] font-semibold uppercase tracking-[0.08em] md:px-7">Category</th>
                                            <th scope="col" class="w-[11rem] whitespace-nowrap px-5 py-3.5 text-right text-[0.8rem] font-semibold uppercase tracking-[0.08em]">Online</th>
                                            <th scope="col" class="w-[11rem] whitespace-nowrap px-5 py-3.5 text-right text-[0.8rem] font-semibold uppercase tracking-[0.08em] md:px-7">Offline</th>
                                        </tr>
                                    </thead>
                                    @foreach ($fee['groups'] as $group)
                                        <tbody>
                                            @if ($group['label'])
                                                <tr>
                                                    <th colspan="3" scope="colgroup" class="border-b border-line bg-mist px-5 pb-2 pt-4 text-left text-[0.75rem] font-semibold uppercase tracking-[0.12em] text-navy md:px-7">
                                                        {{ $group['label'] }}
                                                    </th>
                                                </tr>
                                            @endif
                                            @foreach ($group['rows'] as $row)
                                                <tr class="border-b border-line transition-colors last:border-b-0 hover:bg-mist/60">
                                                    <th scope="row" class="w-full px-5 py-4 text-left font-medium leading-[1.4] md:px-7">
                                                        @if ($group['label'])<span class="sr-only">{{ $group['label'] }} — </span>@endif{{ $row['category'] }}
                                                    </th>
                                                    <td class="whitespace-nowrap px-5 py-4 text-right font-semibold tabular-nums">{{ $row['online'] }}</td>
                                                    <td class="whitespace-nowrap px-5 py-4 text-right font-semibold tabular-nums md:px-7">{{ $row['offline'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </x-site.card>
                    @endforeach
                </div>
            </section>

            <section id="payment" class="mt-14 border-t border-line pt-14 scroll-mt-20 md:mt-16 md:pt-16 xl:scroll-mt-36">
                <x-site.label>Payment Method</x-site.label>

                {{-- Set apart as a quote, and set large: this is what
                     people come to the page to read off and copy. --}}
                <blockquote class="mt-6">
                    <span aria-hidden="true" class="block font-display text-[2.75rem] font-semibold italic leading-[0.6] text-ink">&ldquo;</span>

                    <h3 class="mt-4 text-[1.6rem] font-semibold leading-[1.6] text-ink md:text-[1.75rem]">{{ $payment['heading'] }}:</h3>

                    <dl class="mt-3 text-[1.6rem] leading-[1.6] text-ink md:text-[1.75rem]">
                        @foreach ($payment['rows'] as $row)
                            <div class="flex flex-wrap gap-x-1.5">
                                <dt>{{ $row['label'] }}:</dt>
                                <dd class="font-semibold tabular-nums">{{ $row['value'] }}</dd>
                            </div>
                        @endforeach
                    </dl>

                    <span aria-hidden="true" class="mt-5 block font-display text-[2.75rem] font-semibold italic leading-[0.6] text-ink">&rdquo;</span>
                </blockquote>
            </section>

            <section id="terms" class="mt-14 border-t border-line pt-14 scroll-mt-20 md:mt-16 md:pt-16 xl:scroll-mt-36">
                <x-site.label>Terms and Conditions</x-site.label>

                <ol class="mt-4 grid list-decimal gap-y-1.5 pl-6 text-[1.15rem] leading-[1.75] text-ink marker:font-semibold marker:text-subtle">
                    @foreach ($terms as $term)
                        <li class="pl-1">{{ $term }}</li>
                    @endforeach
                </ol>
            </section>
        </x-site.container>
    </div>
</x-layouts.site>
