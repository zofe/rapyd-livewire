@props([
'name' => null,
'style' => 'solid',
'size' => null,
'color' => null,
'spin' => false,
'pulse' => false,
'dismiss' => null,
'toggle' => null,
'target' => null,
])

@php
    $attributes = $attributes->class([
        'fa' . Str::limit($style, 1, null) . ' fa-fw fa-' . $name,
        'fa-' . $size => $size,
        'text-' . $color => $color,
        'fa-spin' => $spin,
        'fa-pulse' => $pulse,
    ])->merge([
        'data-bs-dismiss' => $dismiss,
        'data-bs-target' => $target ? '#'.$target.'Modal':null,
        'data-bs-toggle' => $target ? 'modal' : $toggle,
    ]);
@endphp

@if($name)
    <i {{ $attributes }}></i>
@endif
