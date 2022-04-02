<?php

namespace Zofe\Rapyd\Http\Livewire;

class ArticlesView extends AbstractDataView
{
    public $active_menu = 'articles';

    public function render()
    {
        return view('livewire.articles.view');
    }
}
