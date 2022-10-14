<?php

namespace Zofe\Rapyd\Tests\Http\Livewire;

use Livewire\Component;

use Zofe\Rapyd\Tests\Models\Article;
use Zofe\Rapyd\Tests\Models\Author;
use Zofe\Rapyd\Traits\WithDataTable;

class ArticlesTable extends Component
{
    use WithDataTable;
    public $search;
    public $author_id;

    public function getDataSet()
    {
        $items = Article::ssearch($this->search);

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
        $authors = Author::all()->pluck('firstname', 'id')->toArray();

        return view('livewire.articles.table', compact('items', 'authors'))->extends('master');
    }
}
