<?php

namespace Zofe\Rapyd\Demo\Http\Livewire;

use Zofe\Rapyd\Demo\Models\DemoUser;
use Zofe\Rapyd\Http\Livewire\AbstractDataTable;

class UsersTable extends AbstractDataTable
{
    public $active_menu = 'users';
    
    public function getDataSet()
    {
        return DemoUser::ssearch($this->search)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage)
            ;
    }

    public function render()
    {
        $items = $this->getDataSet();

        return view('rpd-demo::livewire.users.table', compact('items'));
    }
}
