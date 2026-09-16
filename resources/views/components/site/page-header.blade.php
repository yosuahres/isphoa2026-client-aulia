{{-- The page's h1, at the size /venue set. Every inner page carries one so the
     reader lands on a title rather than straight into the copy, and so crawlers
     and screen readers have the one heading they expect.

     Spacing is the caller's: the pages that follow the title with a standfirst
     hang that off the h1 themselves, and the ones that go straight to the
     content pass the gap they want. --}}
<x-site.reveal
    as="h1"
    {{ $attributes->class('max-w-3xl font-display text-[clamp(2.25rem,5.5vw,3.75rem)] font-semibold leading-[1.05] tracking-[-0.035em]') }}
>{{ $slot }}</x-site.reveal>
