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
@php
   $identifier= \Illuminate\Support\Str::studly($label)
@endphp
<li class="nav-item">

    <a href="#"
       data-bs-toggle="collapse"
       data-bs-target="#collapse{{$identifier}}"
       aria-expanded="false"
       aria-controls="collapse{{$identifier}}"
       class="nav-link collapsed">

        <x-rpd::icon :name="$icon"/>
        <span class="text-capitalize">{{ $label }}</span>
    </a>
    <div id="collapse{{$identifier}}" data-parent="#accordionSidebar" class="collapse" style="">
        <div class="bg-white py-2 collapse-inner rounded">
            {{ $slot }}
        </div>
    </div>

</li>
