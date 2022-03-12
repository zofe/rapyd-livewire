<?php

namespace Zofe\Rapyd\View\Components\Forms;

use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

class Text extends Component
{
    public $name;
    public $errors;
    public $model;

    public function __construct($name, $errors = null, $model = null)
    {
        $this->name = $name;
        $this->errors = ($errors) ? $errors : new ViewErrorBag();
        $this->model = $model;
    }

    public function render()
    {
        return view('rapyd::components.text');
    }
}
