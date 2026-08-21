@props([
    'href',
    'variant' => 'solid',
    'icon' => null,
])

@php
    $base = 'inline-flex items-center justify-center gap-2 rounded-full border px-5 py-2.5 text-[0.85rem] font-medium transition-colors';

    // Whole class strings per variant rather than overrides appended to a base,
    // so Tailwind never has to arbitrate between two competing declarations.
    $variants = [
        'solid' => 'bg-ink text-paper border-ink hover:bg-navy hover:border-navy',
        'outline' => 'bg-paper text-ink border-line hover:border-ink',
        'ghost' => 'bg-transparent text-ink border-transparent hover:bg-shell',
    ];
@endphp

<a href="{{ $href }}" {{ $attributes->class([$base, $variants[$variant] ?? $variants['solid']]) }}>
    {{ $slot }}
    @if ($icon)
        <x-site.icon :name="$icon" class="size-[15px]" />
    @endif
</a>
