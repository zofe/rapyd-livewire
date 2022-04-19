@props([
'title' => null,
'icon' => null,
])
@php
    $attributes = $attributes->class([
    'rpd-sidebar collapse collapse-horizontal min-vh-100',
    session()->get('sidebar-show')? 'show' : '',
    ])->merge([]);
    $context_sidebar = true;
@endphp
    <div {{$attributes}} id="sidebar" >


        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            @if($title)
                <span class="fs-5">{{$title}}</span>
            @endif
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">

            {{ $slot }}

{{--            <li>--}}
{{--                <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">--}}
{{--                    <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Bootstrap</span></a>--}}
{{--                <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">--}}
{{--                    <li class="w-100">--}}
{{--                        <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 1</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 2</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

        </ul>
    </div>
    <div v-pre class="rpd-sidebar-toggler">
        <button x-data
                @click.prevent="Livewire.emit('sidebar-toggle')"
                class="navbar-toggler"
                data-bs-toggle="collapse"
                data-bs-target="#sidebar"
                aria-controls="sidebar"
                aria-expanded="false"
                aria-label="Toggle navigation"
                type="button"
        >
            <span class="bi bi-grip-vertical text-muted"></span>
        </button>
        <style>
            .rpd-sidebar {
                width: 200px;
            }
            .rpd-sidebar-toggler {
                margin-right: -1rem;
                z-index: 1;
            }

            .rpd-sidebar-toggler .navbar-toggler{
                padding-left: 0;
                transition: none;
            }
            .navbar-toggler:focus{
                box-shadow: none;
            }
        </style>
    </div>


