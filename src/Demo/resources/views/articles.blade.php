@extends('rapyd-demo::master')

@section('title','Demo')


@section('body')


    <h1>Articles</h1>

    @livewire('rapyd::demo-articles-table')

@stop


@section('content')

    @include('rapyd-demo::menu')

    @yield('body')

@stop
