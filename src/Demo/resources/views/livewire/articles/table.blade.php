@extends('rapyd::table')

@section('filters')
    @parent
{{--    <div class="col">--}}
{{--        <input wire:model.debounce.250ms="search" class="form-control" type="text" placeholder="search...">--}}
{{--    </div>--}}
@endsection

@section('buttons')
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
            <th>
                <a wire:click.prevent="sortBy('title')" role="button" href="#">
                    title  <i class="{{ $this->getSortIcon('title') }}"></i>
                </a>
            </th>
            <th>
                body
            </th>
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
                <td>{{  Str::limit($article->body,50) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>



@endsection
