@props([
    'icon' => null,
    'label' => null,
    'route' => null,
    'url' => null,
    'href' => null,
    'click' => null,
    'params' => [],
])

@php
    if ($route) $href = route($route, $params);
    else if ($url) $href = url($url);

    $attributes = $attributes->class([
        'nav-link',
        'active' => $href == Request::url(),
    ])->merge([
        'href' => $href,
        'wire:click.prevent' => $click,
    ]);
@endphp

<a {{ $attributes }}>
    <x-rpd::icon :name="$icon"/>

    {{ $label ?? $slot }}
</a>
