<?php

namespace Zofe\Rapyd\View\Components\Modals;

use Illuminate\View\Component;

class ModalView extends Component
{
    public $name;
    public $title;
    public $width;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $title, $width = "lg")
    {
        $this->name = $name;
        $this->title = $title;
        $this->width = $width;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.modal-view');
    }
}
