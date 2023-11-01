<a href="{{ $href }}"
    @if($external)rel="noopener" target="_blank"@endif
    {{ $attributes->merge(['class' => 'underline decoration-2 hover:decoration-emerald-400 hover:text-emerald-400']) }}>{{ $slot }}</a>
