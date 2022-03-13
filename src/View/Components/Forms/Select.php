<?php

namespace Zofe\Rapyd\View\Components\Forms;

use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

class Select extends Component
{
    public $name;
    public $errors;
    public $options;
    public $model;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $options, $errors=null, $model=null)
    {
        $this->name = $name;
        $this->errors = ($errors) ? $errors : new ViewErrorBag();
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
