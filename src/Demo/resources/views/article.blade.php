@extends('rapyd-demo::master')

@section('title','Demo')


@section('content')


    <h3>DataEdit</h3>


    @livewire('rapyd::demo-articles-edit',['model'=>$article])


@endsection
