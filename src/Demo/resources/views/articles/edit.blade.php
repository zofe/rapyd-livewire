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

    <div class="row">
        <div class="col-5">
            <div v-pre class="documenter mt-2">
                <h4>component</h4>
                {!! \Zofe\Rapyd\Demo\Documenter::showCode("Http/Livewire/ArticlesEdit.php") !!}
            </div>
        </div>
        <div class="col-7">
            <div v-pre class="documenter mt-2">
                <h4>view</h4>
                {!! \Zofe\Rapyd\Demo\Documenter::showCode("resources/views/livewire/articles/edit.blade.php", true) !!}
            </div>
        </div>
    </div>




@endsection
