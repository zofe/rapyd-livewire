
<div wire:ignore.self class="modal fade " id="{{ $name }}Modal" tabindex="1" role="dialog" aria-labelledby="{{ $name }}ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-{{ $width }}" role="document">
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

            <div class="modal-footer">
                @yield('extra_buttons')
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

