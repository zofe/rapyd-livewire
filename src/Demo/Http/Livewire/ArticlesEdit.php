<?php

namespace Zofe\Rapyd\Demo\Http\Livewire;

use App\Models\User;
use Livewire\WithPagination;
use Zofe\Rapyd\Http\Livewire\AbstractDataEdit;

class ArticlesEdit extends AbstractDataEdit
{
    public $active_menu = 'articles';
    public $model = User::class;

    public function render()
    {
        dd('livewire.'.$this->record->table.'.edit');
    }
}
