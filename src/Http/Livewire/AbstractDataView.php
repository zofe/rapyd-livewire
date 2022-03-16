<?php

namespace Zofe\Rapyd\Http\Livewire;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use Livewire\WithPagination;

abstract class AbstractDataView extends BaseComponent
{
    public $heading = 'View';
    public $listRoute;
    public $editRoute;

    public $model;
    public $action;

    protected $rules = [];

    public function mount(Model $model)
    {
        $this->model = $model;


//        if(Route::has($this->listRoute)){
//            $this->listRoute = route($this->listRoute);
//        }
//        if(Route::has($this->editRoute)){
//            $this->editRoute = route($this->editRoute);
//        }
    }

}
