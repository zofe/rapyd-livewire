<?php

namespace Zofe\Rapyd\Http\Livewire;

class RapydApp extends BaseComponent
{
    protected $listeners = ['sidebar-toggle' => 'sidebarToggle'];

    public function sidebarToggle()
    {
        session()->put('sidebar-show', ! session()->get('sidebar-show'));
    }

    public function render()
    {
        return view('rpd::app');
    }
}
