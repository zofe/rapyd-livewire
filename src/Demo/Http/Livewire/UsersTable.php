<?php

namespace Zofe\Rapyd\Demo\Http\Livewire;

use Livewire\WithPagination;
use Zofe\Rapyd\Demo\Models\DemoUser;
use Zofe\Rapyd\Http\Livewire\AbstractDataTable;

class UsersTable extends AbstractDataTable
{

    public function getDataSet()
    {
        return DemoUser::query()
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage)
            ;
    }

    public function render()
    {
        $items = $this->getDataSet();

        return view('rapyd-demo::livewire.users.table', compact('items'));
    }
}
