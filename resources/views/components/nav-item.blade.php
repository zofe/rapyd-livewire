@props([
'icon' => null,
'label' => null,
'route' => null,
'url' => null,
'href' => null,
'click' => null,
'params' => [],
'active' => false,
])
<li class="nav-item">

    <x-rpd::nav-link
        :icon="$icon"
        :label="$label"
        :route="$route"
        :url="$url"
        :href="$href"
        :click="$click"
        :params="$params"
        :active="$active"
        :attributes="$attributes"/>
</li>
