@extends('rapyd-demo::master')

@section('title','Demo')


@section('body')


    <h1>Demo Index</h1>

    @if(Session::has('message'))
    <div class="alert alert-success">
        {!! Session::get('message') !!}
    </div>
    @endif

    <p>
        Welcome to Rapyd Demo.<br />

        @if(!Session::has('message'))
            @if (!$db_filled)
                it seems that no demo data is present, please:<br />
                <br />
                <a href="{{ route('rapyd.schema') }}" class="btn btn-primary">Populate Database</a>
            @else
                you can reset database  demo data by:<br />
                <br />
                <a href="{{ route('rapyd.schema') }}" class="btn btn-primary">Re-Populate Database</a>
            @endif
        @endif
        <br />
        <br />
        Click on tabs to see how rapyd widgets can save your time.<br />
        The first tab <strong>Models</strong> is included just to show  models and relations used in this demo,
        there isn't custom code, rapyd can work with your standard or extended Eloquent models.
        <strong>DataSet</strong>, <strong>DataGrid</strong>, <strong>DataFilter</strong>,
        <strong>DataForm</strong>, and <strong>DataEdit</strong> are the "widgets" that rapyd provide.

    </p>


@stop


@section('content')

    @include('rapyd-demo::menu')

    @yield('body')

@stop
