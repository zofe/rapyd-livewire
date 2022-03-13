@extends('rapyd-demo::master')

@section('title','Demo')


@section('content')


    <h3>Welcome to Rapyd Demo</h3>

    @if(Session::has('message'))
    <div class="alert alert-success">
        {!! Session::get('message') !!}
    </div>
    @endif

    <p class="small">
        Rapyd is a preset of laravel application components.<br>
        Each example in this demo show a way to use/extend a Rapyd component. <br>
        The aim is to make custom CRUDS in few lines of code.<br>
    </p>

    <hr>

    <p>

        @if(!Session::has('message'))
            @if (!$db_filled)
                it seems that no demo data is present, please:<br />
                <br />
                <a href="{{ route('rapyd.schema') }}" class="btn btn-primary">Populate Database</a>
            @else
                You can reset database  demo data by:<br />
                <br />
                <a href="{{ route('rapyd.schema') }}" class="btn btn-primary">Re-Populate Database</a>
            @endif
        @endif
        <br />
        <br />


    </p>


@endsection

