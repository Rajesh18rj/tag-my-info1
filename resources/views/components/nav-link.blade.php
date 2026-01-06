@props(['active'])

@php
    $classes = 'inline-flex items-center px-1 pt-1
                text-md font-semibold leading-5
                text-gray-50
                focus:outline-none
                transition-colors duration-300';
@endphp

<a
    {{ $attributes->merge(['class' => $classes]) }}
    @if($active) aria-current="page" @endif
>
    {{ $slot }}
</a>
