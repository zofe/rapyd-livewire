<?php

namespace Zofe\Rapyd\Demo\Http\Livewire;

use Zofe\Rapyd\Http\Livewire\AbstractDataView;

class ArticlesView extends AbstractDataView
{
    public $active_menu = 'articles';
    public $heading = 'Article Detail';
    public $listRoute = 'rapyd.demo.articles';
    public $editRoute = 'rapyd.demo.articles.edit';

    public function render()
    {
        return view('rapyd-demo::livewire.articles.view');
    }
}
