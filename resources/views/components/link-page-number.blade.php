@props(['active'])

@php
// nếu $active không tồn tại hoặc NULL, biểu thức ($active ?? false) nhận giá trị false
$classes = ($active ?? false)
            ? 'inline-flex mr-3 items-center justify-center w-8 h-8 text-xs text-white bg-indigo-500 rounded'
            : 'inline-flex mr-3 items-center justify-center w-8 h-8 text-xs text-gray-500 border border-gray-300 bg-white hover:bg-indigo-50 rounded';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
