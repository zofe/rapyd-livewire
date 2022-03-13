<?php

namespace Zofe\Rapyd\Http\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\WithPagination;

abstract class AbstractDataEdit extends BaseComponent
{
    public $listRoute;
    public $viewRoute;

    public $record;
    //public $model;
    public $action;

    protected $rules = [];

    public function mount(Model $model = null)
    {
        if ($model) {
            $this->record = $model;
            $this->action = 'update';
        } else {
            $this->record = new $model();
            $this->action = 'create';
        }
    }

    public function create()
    {
        $this->validate();
        $this->record->save();
    }

    public function update()
    {
        $this->validate();
        $this->record->save();
    }

}
