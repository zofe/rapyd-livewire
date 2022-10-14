<?php

namespace Zofe\Rapyd\Tests\Http\Livewire;

use Livewire\Component;

use Zofe\Rapyd\Tests\Models\Article;

class ArticlesView extends Component
{
    public $article;

    public function mount(Article $article)
    {
        $this->article = $article;
    }

    public function render()
    {
        return view('livewire.articles.view');
    }
}
