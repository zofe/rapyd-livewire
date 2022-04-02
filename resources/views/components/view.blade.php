@props([
'title' => null,
'buttons' => null,
//'model'=> $__data['_instance']->model,
])
@php
@endphp
<div class="rpd-view">
    <form autocomplete="off">
        <div class="d-flex mb-4">
            <div class="flex-grow-1">
                <div class="row g-2">
                    @if($title)
                        <h4>{{$title}}</h4>
                    @endif
                </div>
            </div>

            <div class="d-flex justify-content-end px-2">
                <div class="mr-2">
                    <div class="btn-group">
                        {{ $buttons }}
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div>
        {{ $slot }}
    </div>

</div>
