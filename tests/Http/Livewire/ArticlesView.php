<?php

namespace Zofe\Rapyd\Tests\Http\Livewire;

use Zofe\Rapyd\Http\Livewire\AbstractDataView;
use Zofe\Rapyd\Tests\Models\Article;

class ArticlesView extends AbstractDataView
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
