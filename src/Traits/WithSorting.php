<?php

namespace Zofe\Rapyd\Traits;

trait WithSorting
{
//    public $sortBy = '';
//    public $sortDirection = 'asc';
    public $sortField = 'id';
    public $sortAsc = false;

//    public function sortBy($field)
//    {
//        $this->sortDirection = $this->sortBy === $field
//            ? $this->reverseSort()
//            : 'asc';
//
//        $this->sortBy = $field;
//    }
//
//    public function reverseSort()
//    {
//        return $this->sortDirection === 'asc'
//            ? 'desc'
//            : 'asc';
//    }

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
}
