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
    public $editRoute;
    public $viewRoute;
    public $items = [];

    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search', 'sortAsc', 'sortField','onlyMine'];

    public function getDataSet()
    {
        return collect($this->items);
    }

    public function mount()
    {

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

    public function view($id)
    {
        return redirect(route($this->viewRoute, [$id]));
    }

    public function edit($id)
    {
        return redirect(route($this->editRoute, ['id' => $id]));
    }

    public function getSortIcon($field)
    {
        if ($this->sortField !== $field) {
            return "fas fa-sort text-muted";
        } elseif ($this->sortAsc) {
            return "fas fa-sort-up";
        } else {
            return "fas fa-sort-down";
        }
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
