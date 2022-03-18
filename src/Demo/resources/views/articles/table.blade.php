@extends('rapyd-demo::master')

@section('title','Demo')


@section('content')


    <h3>DataTable</h3>


    <p class="small">
        You can extend Rapyd "AbstractDataTable" to make custom <strong>{Entity}Table</strong> to display filter and paginate custom datasets.
        <br>
        You can use Eloquent Models or any other source of data.<br>
        AbstractTable has only the logic of pagination, sorting and a default "datatable" view you can extend via blade template.
    </p>

    <hr>

    @livewire('rapyd::demo-articles-table')

    <div v-pre class="documenter mt-2">
        {!! \Zofe\Rapyd\Demo\Documenter::showCode("Http/Livewire/ArticlesTable.php") !!}
    </div>
    <div v-pre class="documenter mt-2">
        {!! \Zofe\Rapyd\Demo\Documenter::showCode("resources/views/livewire/articles/table.blade.php", true) !!}
    </div>

@endsection
