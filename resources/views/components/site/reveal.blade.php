@props([
    'as' => 'div',
    'delay' => 0,
])

{{-- Fades up when scrolled into view. The hidden state is CSS (.reveal), so it
     applies before any JS runs and cannot flash; app.js adds .is-visible.

     The stagger travels as a data attribute rather than an inline style
     attribute so style-src does not need 'unsafe-inline'. Setting the custom
     property from JS is CSSOM, which CSP does not govern. --}}
<{{ $as }}
    data-reveal
    @if ($delay) data-reveal-delay="{{ $delay }}" @endif
    {{ $attributes->class(['reveal']) }}
>{{ $slot }}</{{ $as }}>
