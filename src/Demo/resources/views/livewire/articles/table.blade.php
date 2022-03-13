@extends('rapyd::table')


@section('filters')
    <div class="col">
        <x-rpd-input name="search" wire:model="search" placeholder="search..." />
    </div>
    <div class="col">
        <x-rpd-select name="author" wire:model="author_id" :options="$authors" placeholder="author..." addempty />
    </div>
@endsection

@section('buttons')
    <div class="btn-group-vertical">
        <a href="{{ route('rapyd.demo.articles') }}" class="btn btn-outline-dark">Reset</a>
    </div>
@endsection

@section('table')
    <table class="table">
        <thead>
        <tr>
            <th>
                <a wire:click.prevent="sortBy('id')" role="button" href="#">
                   id <i class="{{ $this->getSortIcon('id') }}"></i>
                </a>
            </th>
            <th>title</th>
            <th>author</th>
            <th>body</th>
        </tr>
        </thead>
        <tbody>
        @php /** @var $article \Zofe\Rapyd\Demo\Models\DemoArticle */ @endphp
        @foreach ($items as $article)
            <tr>
                <td>
                    <a href="{{ route('rapyd.demo.articles.edit',$article->id) }}">{{ $article->id }}</a>
                </td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->author->firstname }}</td>
                <td>{{  Str::limit($article->body,50) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>



@endsection
