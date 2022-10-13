@props([
'title' => null,
'buttons' => null,
'border' => null,
'bg' => null,
])

@php
    $attributes = $attributes->class([
        'card',
        'pizza',
        'mb-4',
        'border border-' . $border => $border,
        'bg-' . $bg => $bg,
    ])->merge([
        //
    ]);
@endphp

<div {{ $attributes->only('class') }}>
    <div class="card-body">
        <x-rpd::card-header :title="$title" :buttons="$buttons" />
       {{ $slot }}
    </div>
</div>


