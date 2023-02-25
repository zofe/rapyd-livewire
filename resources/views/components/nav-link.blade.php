@props([
    'icon' => null,
    'label' => null,
    'route' => null,
    'url' => null,
    'href' => null,
    'click' => null,
    'params' => [],
    'active' => false,
    'type'  => 'nav-link'
])

@php
    if(is_string($active) && strlen($active)>2 && !in_array(strtolower($active),['true','false']) ) {
        $active = url_contains($active);
    }
    if ($route) {
        $href = route($route, $params);
        $active = $active ?: request()->routeIs($route);
    } else if ($url){
        $href = url($url);
        $active = $active  ?: $href == url()->current();
    }


    $attributes = $attributes->class([
        $type,
        'active' => $active,
    ])->merge([
        'href' => $href,
        'wire:click.prevent' => $click,
    ]);
@endphp

<a {{ $attributes }}>
    <x-rpd::icon :name="$icon"/>

    {{ $label ?? $slot }}
</a>
