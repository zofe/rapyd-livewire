@props([
'label' => null,
])

@php
    //$label = $attributes->get('label', null);
    $label = __($label);
    $attributes = $attributes->class([
        'form-label',
    ])->merge([
        //
    ]);
@endphp

@if($label || !$slot->isEmpty())
    <label {{ $attributes }}>
        {{ $label ?? $slot }}
    </label>
@endif
