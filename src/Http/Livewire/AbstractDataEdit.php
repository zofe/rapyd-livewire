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
        $this->model = $model;
        if ($model->exists) {
            $this->action = 'update';
        } else {
            $this->action = 'create';
        }
    }

    public function create()
    {
        $this->validate();
        $this->model->save();

        if($this->viewRoute){
            return redirect()->to(route($this->viewRoute, $this->model->getKey()));
        }
    }

    public function update()
    {
        $this->validate();
        $this->model->save();

        if($this->viewRoute){
            return redirect()->to(route($this->viewRoute, $this->model->getKey()));
        }

    }

}
