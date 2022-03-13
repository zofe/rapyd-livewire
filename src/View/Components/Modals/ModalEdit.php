<?php

namespace Zofe\Rapyd\View\Components\Modals;

use Illuminate\View\Component;

class ModalEdit extends Component
{
    public $name;
    public $title;
    public $action;
    public $hasfooter;
    public $hasconfirm;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $title, $action, $hasfooter = true, $hasconfirm = true)
    {
        $this->name = $name;
        $this->title = $title;
        $this->action = $action;
        $this->hasfooter = $hasfooter;
        $this->hasconfirm = $hasconfirm;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.modal-edit');
    }
}
