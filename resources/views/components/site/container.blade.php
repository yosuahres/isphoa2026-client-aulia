@props([
    // The inner pages set their content further left than the home page does,
    // on a wider measure. The gutter is the same either way.
    'wide' => false,
])

<div {{ $attributes->class([
    'mx-auto w-full px-6 md:px-10',
    'max-w-[1200px]' => ! $wide,
    'max-w-[1440px]' => $wide,
]) }}>
    {{ $slot }}
</div>
