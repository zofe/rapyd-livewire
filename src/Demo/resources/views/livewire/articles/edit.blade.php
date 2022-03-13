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

            <div class="form-group col-md-4">
                <div class="custom-control custom-checkbox small">
                    <x-rpd-checkbox name="record.public" wire:model="record.public" /> Public
                    <label for="record.public" class="custom-control-label">Public</label>
                </div>
            </div>

        </div>
        <div class="row mb-2">
            <div class="form-group col-md-8">
                <x-rpd-rich-text name="record.body">
                    {!! @$record->body !!}
                </x-rpd-rich-text>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-8 text-center">
                <button type="submit" class="btn btn-primary">{{ $action }}</button>
            </div>
        </div>

    </form>

</div>


