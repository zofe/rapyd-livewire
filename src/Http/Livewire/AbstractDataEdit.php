<?php

namespace Zofe\Rapyd\Http\Livewire;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use Livewire\WithPagination;

abstract class AbstractDataEdit extends BaseComponent
{
    public $listRoute;
    public $viewRoute;

    public $model;
    public $action;

    protected $rules = [];

    public function mount(Model $model = null)
    {
        if ($model) {
            $this->model = $model;
            $this->action = 'update';
        } else {
            $this->model = new $model();
            $this->action = 'create';
        }

        if(Route::has($this->listRoute)){
            $this->listRoute = route($this->listRoute);
        }
        if(Route::has($this->viewRoute)){
            $this->viewRoute = route($this->viewRoute);
        }
    }

    public function create()
    {
        $this->validate();
        $this->model->save();

        if($this->viewRoute){
            return $this->redirect($this->viewRoute);
        }
    }

    public function update()
    {
        $this->validate();
        $this->model->save();

        if($this->viewRoute){
            return $this->redirect($this->viewRoute);
        }

    }

}
