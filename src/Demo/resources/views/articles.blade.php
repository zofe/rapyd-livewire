@extends('rapyd-demo::master')

@section('title','Demo')


@section('content')


    <h3>Articles</h3>

    @livewire('rapyd::demo-articles-table')


    <div v-pre class="documenter mt-2">
        {!! \Zofe\Rapyd\Demo\Documenter::showMethod("Zofe\\Rapyd\\Demo\\Http\\Livewire\\ArticlesTable", ["getDataSet", "render"]) !!}
    </div>
    <div v-pre class="documenter mt-2">
        {!! \Zofe\Rapyd\Demo\Documenter::showCode("resources/views/livewire/articles/table.blade.php", true) !!}
    </div>

@endsection
