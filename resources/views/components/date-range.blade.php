@props([
'label' => null,
'help' => null,
'col'  => null,
'range-separator' => '-',
'start-placeholder' => 'from',
'end-placeholder' =>'to',
'type' => 'daterange',
'format' => "dd/MM/yyyy",
'value-format' => "yyyy-MM-dd",
])

@php

    /*model_from="port_date_from"
    model_to="port_date_to"
    type="datetimerange"
    range-separator="-"
    start-placeholder="dal"
    end-placeholder="al"
    format="dd/MM/yyyy HH:mm:ss"
    value-format="yyyy-MM-dd HH:mm:ss"*/

           $wireModel = $attributes->whereStartsWith('model_from')->first();

           $key = $attributes->get('name', $wireModel);
           $id = $attributes->get('id', $wireModel);

           $attributes = $attributes->class([
           ])->merge([
                'range-separator' => ${'range-separator'},
                'start-placeholder' => ${'start-placeholder'},
                'end-placeholder' => ${'end-placeholder'},
                'type' =>  $type,
                'format' => $format,
                'value-format' =>  ${'value-format'},

           ]);
@endphp

<div wire:ignore class="{{$col}}">

    <x-rpd::label :for="$id" :label="$label"/>

    <div class="input-group">

        <rpd-date-range
            {{ $attributes }}
        ></rpd-date-range>

    </div>

    <x-rpd::help :label="$help"/>
</div>
