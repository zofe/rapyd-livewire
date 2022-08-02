<?php

namespace Zofe\Rapyd\Http\Livewire;

use Livewire\WithPagination;

abstract class AbstractDataTable extends BaseComponent
{
    use WithPagination;

    public $perPage = 10;
    public $sortField = 'id';
    public $sortAsc = false;
    public $search = '';


    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search', 'sortAsc', 'sortField'];

    public function getDataSet()
    {
        return collect([]);
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }


    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return '';
    }
}
