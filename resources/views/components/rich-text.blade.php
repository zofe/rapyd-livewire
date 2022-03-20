@props([
'label' => null,
'icon' => null,
'prepend' => null,
'append' => null,
'rows' => 3,
'size' => null,
'help' => null,
'model' => null,
'debounce' => false,
'lazy' => false,
])

{{--todo move dependencies to rapyd css/js at build/publish time--}}
@once
@push('header_styles')
    <link rel="stylesheet" href="https://cdn.quilljs.com/1.3.6/quill.snow.css">
@endpush
@endonce
@once
@push('footer_scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@endpush
@endonce

@php
    if ($debounce) $bind = 'debounce.' . (ctype_digit($debounce) ? $debounce : 150) . 'ms';
    else if ($lazy) $bind = 'lazy';
    else $bind = 'defer';
    $wireModel = $attributes->whereStartsWith('wire:model')->first();
    $key = $attributes->get('name', $model ?? $wireModel);
    $id = $attributes->get('id', $model ?? $wireModel);
    $prefix = null;
    $attributes = $attributes->class([])->merge([
        'id' => $id,
        'rows' => $rows,
        'wire:model.' . $bind => $model ? $prefix . $model : null,
    ]);
@endphp


<div class="mt-2 bg-white" wire:ignore>

    <x-rpd::label :for="$id" :label="$label"/>

    <div
        x-data
        x-ref="quillEditor"
        x-init="
         quill = new Quill($refs.quillEditor, {theme: 'snow'});
         quill.on('text-change', function () {
           $dispatch('quill-input', quill.root.innerHTML);
        });
       "
        x-on:quill-input.debounce.defer="@this.set('{{ $key }}', $event.detail)"
    >
        {!! dot_to_property($this, $key) !!}
    </div>
</div>


