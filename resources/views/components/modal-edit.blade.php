<form wire:submit.prevent="{{$action}}" autocomplete="off">
    <div wire:ignore.self class="modal fade" id="{{ $name }}Modal" tabindex="1" role="dialog" aria-labelledby="{{ $name }}ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $name }}ModalLabel">{{ $title }}</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ $slot }}
                </div>
                @if($hasfooter)
                    <div class="modal-footer">
                        @yield('extra_buttons')
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Undo</button>
                        @if($hasconfirm)<input type="submit" class="btn btn-primary" role="button" value="Confirm">@endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</form>
