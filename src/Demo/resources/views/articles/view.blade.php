@extends('rapyd-demo::master')

@section('title','Demo')


@section('content')


    <h3>DataView</h3>


    <p class="small">
        You can extend Rapyd "AbstractDataView" to make custom <strong>{Entity}View</strong> to display filter and paginate custom datasets.
        <br>
        todo..
    </p>

    <hr>

    @livewire('rapyd::demo-articles-view',['model'=>$article])

    <div v-pre class="documenter mt-2">
        {!! \Zofe\Rapyd\Demo\Documenter::showCode("Http/Livewire/ArticlesView.php") !!}
    </div>
    <div v-pre class="documenter mt-2">
        {!! \Zofe\Rapyd\Demo\Documenter::showCode("resources/views/livewire/articles/view.blade.php", true) !!}
    </div>

@endsection
