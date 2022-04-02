<?php

namespace Zofe\Rapyd\Http\Livewire;


use Zofe\Rapyd\Tests\Models\Author;


class ArticlesEdit extends AbstractDataEdit
{
    public $active_menu = 'articles';

    protected $rules = [
        'model.title'   => 'required',
        'model.author_id'=> 'required',
        'model.body'    => 'nullable',
        'model.public'  => 'nullable|boolean',
    ];

    public function create()
    {
        $this->validate();
        $this->model->save();
        return redirect()->to(route('test.articles.view', $this->model->getKey()));
    }

    public function update()
    {
        $this->validate();
        $this->model->save();
        return redirect()->to(route('test.articles.view', $this->model->getKey()));
    }

    public function render()
    {
        $authors = Author::all()->pluck('firstname', 'id')->toArray();

        return view('livewire.articles.edit', compact('authors'));
    }
}
