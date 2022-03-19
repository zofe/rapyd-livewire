@props([
'label' => null,
'model' => null,
])

@php
    $wireModel = $attributes->whereStartsWith('wire:model')->first();
    $key = $attributes->get('name', $model ?? $wireModel);
    if($this->sortField !== $key) $icon = "fas fa-sort text-muted";
    else if ($this->sortAsc) $icon = "fas fa-sort-up";
    else $icon = "fas fa-sort-down";

@endphp


<a wire:click.prevent="sortBy('{{$key}}')" role="button" href="#">
    {{ $label }} <x-rpd::icon :name="$icon"/>
</a>
