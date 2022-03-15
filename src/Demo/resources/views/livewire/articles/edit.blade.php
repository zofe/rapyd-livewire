@extends('rapyd::edit')

@section('edit')
    <div class="row">

        <div class="form-group col-md-4">
            <x-rpd-input wire:model="model.title" name="model.title" label="Title" />
        </div>

        <div class="form-group col-md-4">
            <x-rpd-select wire:model="model.author_id" name="model.author_id" :options="$authors" label="Author" addempty />
        </div>

        <div class="form-group col-md-4 pt-2">
            <x-rpd-checkbox wire:model="model.public" name="model.public" label="Public" />
        </div>

    </div>
    <div class="row mb-2">
        <div class="form-group col-md-8">
            <x-rpd-rich-text name="model.body">
                {!! @$model->body !!}
            </x-rpd-rich-text>
        </div>
    </div>
@endsection




