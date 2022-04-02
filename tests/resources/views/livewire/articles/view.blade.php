
    <x-rpd::view title="Article Detail">


        <x-slot name="buttons">
            <a href="{{ route('test.articles') }}" class="btn btn-outline-primary">list</a>
            <a href="{{ route('test.articles.edit',$article->id) }}" class="btn btn-outline-primary">edit</a>
        </x-slot>

        <dl class="row">
            <dt class="col-3">Title</dt>
            <dd class="col-9">{{ $article->title }}</dd>
            <dt class="col-3">Author</dt>
            <dd class="col-9">{{ $article->author->firstname }} {{ $article->author->lastname }}</dd>
        </dl>

    </x-rpd::view>

