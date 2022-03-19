@extends('rpd-demo::master')

@section('title','Demo')


@section('content')


    <h3>DataEdit</h3>

    <p class="small">
        You can extend Rapyd "AbstractDataEdit" to make custom <strong>{Entity}Table</strong> to edit and create Entities.
        <br>
    </p>

    <hr>

    @livewire('rpd::demo-articles-edit',['model'=>$article])

    <div v-pre class="documenter mt-2">
        {!! \Zofe\Rapyd\Demo\Documenter::showCode("Http/Livewire/ArticlesEdit.php") !!}
    </div>
    <div v-pre class="documenter mt-2">
        {!! \Zofe\Rapyd\Demo\Documenter::showCode("resources/views/livewire/articles/edit.blade.php", true) !!}
    </div>


@endsection
