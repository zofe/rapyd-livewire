@extends('rpd-demo::master')

@section('title','Demo')


@section('content')


    <h3>DataView</h3>


    <p class="small">
        You can extend Rapyd "AbstractDataView" to make custom <strong>{Entity}View</strong> to display filter and paginate custom datasets.
        <br>
        todo..
    </p>

    <hr>

    @livewire('rpd::demo-articles-view',['model'=>$article])

    <div class="row">
        <div class="col-5">
            <div v-pre class="documenter mt-2">
                <h4>component</h4>
                {!! \Zofe\Rapyd\Demo\Documenter::showCode("Http/Livewire/ArticlesView.php") !!}
            </div>
        </div>
        <div class="col-7">
            <div v-pre class="documenter mt-2">
                <h4>view</h4>
                {!! \Zofe\Rapyd\Demo\Documenter::showCode("resources/views/livewire/articles/view.blade.php", true) !!}
            </div>
        </div>
    </div>




@endsection
