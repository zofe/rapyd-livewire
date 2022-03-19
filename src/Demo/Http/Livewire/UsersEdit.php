<?php

namespace Zofe\Rapyd\Demo\Http\Livewire;

use Zofe\Rapyd\Http\Livewire\AbstractDataEdit;

class UsersEdit extends AbstractDataEdit
{
    public $active_menu = 'users';

    
    public function render()
    {
        return view('rpd-demo::livewire.users.edit');
    }
}
