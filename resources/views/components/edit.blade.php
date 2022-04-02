

@props([
'title' => null,
'buttons' => null,
//'model'=> $__data['_instance']->model,
'action'=> $__data['_instance']->action
])
@php
@endphp
<div class="rpd-edit">
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
        <form wire:submit.prevent="{{ $action }}">

            {{ $slot }}

            <div class="row">
                <div class="form-group col-md-8 text-center">
                    <button type="submit" class="btn btn-primary">{{ $action }}</button>
                </div>
            </div>
        </form>
    </div>

</div>

