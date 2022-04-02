
<x-rpd::table
    title="Article List"
    :items="$items"
>


    <x-slot name="filters">
        <div class="col">
            <x-rpd::input debounce="350" model="search"  placeholder="search..." />
        </div>
        <div class="col">
            <x-rpd::select lazy model="author_id" :options="$authors" placeholder="author..." addempty />
        </div>
    </x-slot>

    <x-slot name="buttons">
{{--            <a href="{{ route('test.articles') }}" class="btn btn-outline-dark">reset</a>--}}
{{--            <a href="{{ route('test.articles.edit') }}" class="btn btn-outline-primary">add</a>--}}
    </x-slot>


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
                    <a href="{{ route('test.articles.view',$article->id) }}">{{ $article->id }}</a>
                </td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->author->firstname }}</td>
                <td>{{ Str::limit($article->body,50) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>



</x-rpd::table>
