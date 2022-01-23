<?php

namespace Zofe\Rapyd\Http\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\WithPagination;

abstract class AbstractDataEdit extends BaseComponent
{

    public $listRoute;
    public $viewRoute;

    public $record;
    public $model;

    public function mount(Model $model = null)
    {
        if ($model) {
            $this->record = $model;
        } else {
            $this->record = new $model();
        }
    }

    public function render()
    {
        //return '';
        dd('livewire.'.$this->record->table.'.edit');
        return view('livewire.'.$this->record->table.'.edit');
    }
}
