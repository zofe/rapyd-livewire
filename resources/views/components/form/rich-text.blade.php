@push('header_styles')
    <link rel="stylesheet" href="https://cdn.quilljs.com/1.3.6/quill.snow.css">
@endpush

@push('footer_scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@endpush



<div class="mt-2 bg-white" wire:ignore>
    @if($attributes->get('label'))<label for="{{ $name }}" class="col-form-label">{{$attributes->get('label')}}</label>@endif
    <div
        x-data
        x-ref="quillEditor"
        x-init="
         quill = new Quill($refs.quillEditor, {theme: 'snow'});
         quill.on('text-change', function () {
           $dispatch('quill-input', quill.root.innerHTML);
        });

       "
        x-on:quill-input.debounce.2000ms="@this.set('{{ $name }}', $event.detail)"
    >

        {{ $slot }}

    </div>
</div>


