<?php

namespace Zofe\Rapyd\Demo\Http\Livewire;

use Zofe\Rapyd\Demo\Models\DemoUser;
use Zofe\Rapyd\Http\Livewire\AbstractDataEdit;

class ArticlesEdit extends AbstractDataEdit
{
    public $active_menu = 'articles';
    public $heading = 'Article Edit';
    public $listRoute = 'rapyd.demo.articles';
    public $viewRoute = 'rapyd.demo.articles.view';

    protected $rules = [
        'model.title' => 'required',
        'model.author_id' => 'required',
        'model.body' => 'nullable',
        'model.public' => 'nullable|boolean',
    ];

    public function render()
    {
        $authors = DemoUser::all()->pluck('firstname', 'id')->toArray();

        return view('rapyd-demo::livewire.articles.edit', compact('authors'));
    }
}
