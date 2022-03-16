@extends('rapyd::view')

@section('view')
        <dl class="row">
            <dt class="col-3">Title</dt>
            <dd class="col-9">{{ $model->title }}</dd>
            <dt class="col-3">Author</dt>
            <dd class="col-9">{{ $model->author->firstname }} {{ $model->author->lastname }}</dd>
        </dl>
@endsection

