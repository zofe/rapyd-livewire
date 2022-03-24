@extends('rpd-demo::master')

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

    @livewire('rpd::demo-articles-table')

    <div class="row">
        <div class="col-5">
            <div v-pre class="documenter mt-2">
                <h4>component</h4>
                {!! \Zofe\Rapyd\Demo\Documenter::showCode("Http/Livewire/ArticlesTable.php") !!}
            </div>
        </div>
        <div class="col-7">
            <div v-pre class="documenter mt-2">
                <h4>view</h4>
                {!! \Zofe\Rapyd\Demo\Documenter::showCode("resources/views/livewire/articles/table.blade.php", true) !!}
            </div>
        </div>
    </div>



@endsection
