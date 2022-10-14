<?php

namespace Zofe\Rapyd\Tests\Http\Livewire;

use Livewire\Component;
use Zofe\Rapyd\Tests\Models\Article;
use Zofe\Rapyd\Tests\Models\Author;

class ArticlesEdit extends Component
{
    public $article;

    protected $rules = [
        'article.title' => 'required',
        'article.author_id' => 'required',
        'article.body' => 'nullable',
        'article.public' => 'nullable|boolean',
    ];

    public function mount(Article $article = null)
    {
        $this->article = $article;
    }

    public function save()
    {
        $this->validate();
        $this->article->save();

        return redirect()->to(route('test.articles.view', $this->article->getKey()));
    }

    public function render()
    {
        $authors = Author::all()->pluck('firstname', 'id')->toArray();

        return view('livewire.articles.edit', compact('authors'));
    }
}
