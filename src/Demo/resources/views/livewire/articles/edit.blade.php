<div>

    <form wire:submit.prevent="{{ $action }}">

        <div class="row">
            <div class="form-group col-md-4">
                <label for="record.title" class="col-form-label">Title</label>
                <x-rpd-input wire:model="record.title" name="record.title" :errors="$errors" />
            </div>

            <div class="form-group col-md-4">
                <label for="record.title" class="col-form-label">Author</label>
                <x-rpd-select name="record.author" wire:model="record.author_id" :options="$authors" placeholder="author..." addempty />
            </div>



{{--            <div class="form-group col-md-3">--}}
{{--                <label for="article.category_id" class="col-form-label">Categoria</label>--}}
{{--                <x-form.select-list wire:model="article.category_id" name="article.category_id" :options="$categories" :errors="$errors" select-type="label" addempty />--}}
{{--            </div>--}}

        </div>
        <div class="row mb-2">


            <div class="form-group col-md-8">
                <x-rpd-rich-text name="record.body">
                    {!! @$record->body !!}
{{--                    {{ old('record.body', dot_to_property($record, 'record.body')) }}--}}
                </x-rpd-rich-text>
            </div>

        </div>

        <div class="row">

            <div class="form-group col-md-8 text-center">
                <button type="submit" class="btn btn-primary">
                    @if($action =='update')
                       Update
                    @elseif($action =='create')
                       Create
                    @endif
                </button>
            </div>

        </div>



    </form>

</div>

{{--@push('footer_scripts')--}}
{{--    <script>--}}

{{--        function confirm_delete_article() {--}}
{{--            bootbox.confirm("@lang('message.confirm_delete')", result => {--}}
{{--                if (result) {--}}
{{--                @this.delete();--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}

{{--    </script>--}}
{{--@endpush--}}
