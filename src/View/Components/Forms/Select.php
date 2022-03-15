<?php

namespace Zofe\Rapyd\View\Components\Forms;

use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

class Select extends Component
{
    public $name;
    public $options;
    public $model;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $options, $model=null)
    {
        $this->name = $name;
        $this->options = $options;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('rapyd::components.form.select');
    }
}
