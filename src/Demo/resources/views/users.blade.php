@extends('rapyd-demo::master')

@section('title','Demo')


@section('body')


    <h1>Users</h1>

    @livewire('rapyd::demo-users-table')

@stop


@section('content')

    @include('rapyd-demo::menu')

    @yield('body')

@stop
