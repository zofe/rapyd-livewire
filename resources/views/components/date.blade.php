@props([
'label' => null,
'help' => null,
'model' => null,
])

@php
    $wireModel = $attributes->whereStartsWith('wire:model')->first();
    $key = $attributes->get('name', $model ?? $wireModel);
    $id = $attributes->get('id', $model ?? $wireModel);
    $prefix = null;
    $attributes = $attributes->class([
        'format' => "dd/MM/yyyy",
        'value-format' => "yyyy-MM-dd",
    ])->merge([
        'id' => $id,
        'model' => $model ? $prefix . $model : null,
    ]);
@endphp

<div wire:ignore>
    <x-rpd::label :for="$id" :label="$label"/>

    <div class="input-group">

        <rpd-date
            {{ $attributes }}
        ></rpd-date>

    </div>

    <x-rpd::help :label="$help"/>
</div>
