@props([
'label' => null,
'help' => null,
'model' => null,
'col'  => null,
])
@once
@push('rapyd_scripts')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_places.apikey') }}&libraries=places,visualization&v=weekly&language={{ app()->getLocale()?:'en' }}"

    ></script>
@endpush
@endonce
@php
    $wireModel = $attributes->whereStartsWith('wire:model')->first();
    $key = $attributes->get('name', $model ?? $wireModel);
    $id = $attributes->get('id', $model ?? $wireModel);
    $prefix = null;
    /*$attributes = $attributes->class([
        'format' => "dd/MM/yyyy",
        'value-format' => "yyyy-MM-dd",
    ])->merge([
        'id' => $id,
        'model' => $model ? $prefix . $model : null,
    ]);*/
@endphp

<div class="{{$col}}" wire:ignore>
    <x-rpd::label :for="$id" :label="$label"/>

    <div class="input-group">

        <rpd-address
            {{ $attributes }}
        ></rpd-address>

    </div>

    <x-rpd::help :label="$help"/>
</div>
