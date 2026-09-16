@props([
    'tint' => false,
    'surface' => 'light',
])

<section {{ $attributes->class([
    'scroll-mt-20 border-t border-line py-20 md:py-28 xl:scroll-mt-20',
    'surface-light' => $surface === 'light',
    'bg-mist' => $tint,
]) }}>
    {{ $slot }}
</section>
