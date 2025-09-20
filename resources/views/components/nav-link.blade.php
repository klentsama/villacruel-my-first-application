@props(['active' => false, 'href' => '#'])

@php
$classes = 'text-gray-600 hover:text-blue-500 px-3 py-2 rounded-md font-medium text-lg transition duration-300 ease-in-out';
if ($active) {
$classes = 'bg-blue-500 text-white px-3 py-2 rounded-md font-medium text-lg transition duration-300 ease-in-out';
}
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
{{ $slot }}
</a>