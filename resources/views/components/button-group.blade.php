@props([
'buttons' => null,
'position' => 'end',
])
@php

    $width = ($position == 'center') ? 'w-100' : 'ms-auto';

    $attributes = $attributes->class([
        'col-auto d-flex flex-column px-2 '.$width,
        'align-items-'. $position,
    ])->merge([

    ]);
@endphp
<div {{ $attributes }}>
    <div class="btn-group">
        {{ $buttons }}
    </div>
</div>
