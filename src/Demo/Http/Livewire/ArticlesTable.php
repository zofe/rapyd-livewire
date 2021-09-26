<?php

namespace Zofe\Rapyd\Demo\Http\Livewire;

use Livewire\WithPagination;
use Zofe\Rapyd\Demo\Models\DemoArticle;
use Zofe\Rapyd\Http\Livewire\AbstractDataTable;

class ArticlesTable extends AbstractDataTable
{
    public $active_menu = 'articles';
    
    public function getDataSet()
    {
        return DemoArticle::query()
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage)
            ;
    }

    public function render()
    {
        $items = $this->getDataSet();
        return view('rapyd-demo::livewire.articles.table', compact('items'));
    }
}
