@extends('rpd::table')

@section('filters')
    <div class="col">
        <x-rpd::input debounce="350" model="search"  placeholder="search..." />
    </div>
    <div class="col">
        <x-rpd::select lazy model="author_id" :options="$authors" placeholder="author..." addempty />
    </div>
@endsection

@section('buttons')
    <div class="btn-group">
        <a href="{{ route('rapyd.demo.articles') }}" class="btn btn-outline-dark">reset</a>
        <a href="{{ route('rapyd.demo.articles.edit') }}" class="btn btn-outline-primary">add</a>
    </div>
@endsection

@section('table')
    <table class="table">
        <thead>
        <tr>
            <th>
                <x-rpd::sort model="id" label="id" />
            </th>
            <th>title</th>
            <th>author</th>
            <th>body</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($items as $article)
            <tr>
                <td>
                    <a href="{{ route('rapyd.demo.articles.view',$article->id) }}">{{ $article->id }}</a>
                </td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->author->firstname }}</td>
                <td>{{ Str::limit($article->body,50) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
