<?php

namespace Zofe\Rapyd\Demo\Http\Livewire;

use Zofe\Rapyd\Demo\Models\DemoArticle;
use Zofe\Rapyd\Demo\Models\DemoUser;
use Zofe\Rapyd\Http\Livewire\AbstractDataTable;

class ArticlesTable extends AbstractDataTable
{
    public $active_menu = 'articles';
    public $search;
    public $author_id;

    public function getDataSet()
    {
        $items = DemoArticle::ssearch($this->search);
        if ($this->author_id) {
            $items = $items->where('author_id', '=', $this->author_id);
        }

        return $items = $items
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage)
            ;
    }

    public function render()
    {
        $items = $this->getDataSet();
        $authors = DemoUser::all()->pluck('firstname', 'id')->toArray();

        return view('rpd-demo::livewire.articles.table', compact('items', 'authors'));
    }
}
