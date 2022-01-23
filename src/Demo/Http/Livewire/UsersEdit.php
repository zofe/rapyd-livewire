<?php

namespace Zofe\Rapyd\Demo\Http\Livewire;

use Livewire\WithPagination;
use Zofe\Rapyd\Demo\Models\DemoUser;
use Zofe\Rapyd\Http\Livewire\AbstractDataEdit;
use Zofe\Rapyd\Http\Livewire\AbstractDataTable;
class UsersEdit extends AbstractDataEdit
{

    public $active_menu = 'users';

    
    public function render()
    {

        return view('rapyd-demo::livewire.users.edit');
    }
}
