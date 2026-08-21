@props([
    'as' => 'div',
    'delay' => 0,
])

{{-- Fades up when scrolled into view. The hidden state is CSS (.reveal), so it
     applies before any JS runs; resources/js/app.js adds .is-visible. --}}
<{{ $as }}
    data-reveal
    @if ($delay) style="--reveal-delay: {{ $delay }}ms" @endif
    {{ $attributes->class(['reveal']) }}
>{{ $slot }}</{{ $as }}>
