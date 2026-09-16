{{-- A numbered list of people. The number is aria-hidden because the <ol>
     already tells a screen reader the position, and reading "one, one,
     Prof..." is worse than reading the name. tabular-nums and the
     right-aligned column keep the names on one left edge once the count
     passes nine, which it does: the technical program committee runs to 31. --}}
<ol class="mt-3 grid gap-y-1.5">
    @foreach ($names as $i => $name)
        <li class="grid grid-cols-[1.5rem_1fr] gap-x-2 text-[1.15rem] leading-[1.75] text-ink">
            <span aria-hidden="true" class="text-right tabular-nums text-faint">{{ $i + 1 }}.</span>
            <span>{{ $name }}</span>
        </li>
    @endforeach
</ol>
