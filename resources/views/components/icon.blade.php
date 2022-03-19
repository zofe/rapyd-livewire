@props([
'name' => null,
'style' => 'solid',
'size' => null,
'color' => null,
'spin' => false,
'pulse' => false,
])

@php
    $attributes = $attributes->class([
        'fa' . Str::limit($style, 1, null) . ' fa-fw fa-' . $name,
        'fa-' . $size => $size,
        'text-' . $color => $color,
        'fa-spin' => $spin,
        'fa-pulse' => $pulse,
    ])->merge([
        //
    ]);
@endphp

@if($name)
    <i {{ $attributes }}></i>
@endif
