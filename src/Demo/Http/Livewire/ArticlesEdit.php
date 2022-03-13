<?php

namespace Zofe\Rapyd\Demo\Http\Livewire;

use App\Models\User;
use Livewire\WithPagination;
use Zofe\Rapyd\Demo\Models\DemoArticle;
use Zofe\Rapyd\Demo\Models\DemoUser;
use Zofe\Rapyd\Http\Livewire\AbstractDataEdit;

class ArticlesEdit extends AbstractDataEdit
{
    public $active_menu = 'articles';

    protected $rules = [
        'record.title' => 'required',
        'record.author_id' => 'required',
        'record.body' => 'nullable',
    ];

   // public $model = DemoArticle::class;

//    public function mount(DemoArticle $article = null)
//    {
//        $this->article = $article;
//    }


    public function render()
    {
        $authors = DemoUser::all()->pluck('firstname','id')->toArray();

        return view('rapyd-demo::livewire.articles.edit',compact('authors'));
    }
}
