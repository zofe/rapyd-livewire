<?php

namespace Zofe\Rapyd\Traits;

trait WithPagination
{
    use \Livewire\WithPagination;

    public $perPage = 10;
    protected $paginationTheme = 'bootstrap';
}
