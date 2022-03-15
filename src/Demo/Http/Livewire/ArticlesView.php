<?php

namespace Zofe\Rapyd\Demo\Http\Livewire;

use App\Models\User;
use Livewire\WithPagination;
use Zofe\Rapyd\Demo\Models\DemoArticle;
use Zofe\Rapyd\Demo\Models\DemoUser;
use Zofe\Rapyd\Http\Livewire\AbstractDataView;

class ArticlesView extends AbstractDataView
{
    public $active_menu = 'articles';
    public $listRoute = 'rapyd.demo.articles';
    public $editRoute = 'rapyd.demo.articles.edit';

    public function render()
    {
        return view('rapyd-demo::livewire.articles.view');
    }
}
