@extends('rpd::edit')

@section('edit')
    <div class="row">

        <div class="form-group col-md-4">
            <x-rpd::input model="model.title" label="Title" />
        </div>

        <div class="form-group col-md-4">
            <x-rpd::select model="model.author_id" :options="$authors" label="Author" addempty />
        </div>

        <div class="form-group col-md-4 pt-2">
            <x-rpd::checkbox model="model.public" label="Public" checkLabel="true" />
        </div>

    </div>
    <div class="row mb-2">
        <div class="form-group col-md-8">
            <x-rpd::rich-text model="model.body" label="Body" />
        </div>
    </div>
@endsection




