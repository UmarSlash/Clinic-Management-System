@props(['active'])

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center px-1 pt-1 border-b-2 border-teal-400 text-md font-medium leading-5 text-white focus:outline-none focus:text-teal-200 focus:border-teal-700 transition duration-150 ease-in-out'
    : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-md font-medium leading-5 text-teal-300 hover:text-teal-100 hover:border-teal-300 focus:outline-none focus:text-teal-100 focus:border-teal-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
