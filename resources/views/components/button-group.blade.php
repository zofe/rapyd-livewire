@props([
'buttons' => null,
'position' => 'end',
])
@php
    $attributes = $attributes->class([
        'col d-flex px-2',
        'justify-content-'. $position,
    ])->merge([

    ]);
@endphp
<div {{ $attributes }}>
    <div class="btn-group">
        {{ $buttons }}
    </div>
</div>
