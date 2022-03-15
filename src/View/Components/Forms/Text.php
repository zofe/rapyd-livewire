<?php

namespace Zofe\Rapyd\View\Components\Forms;

use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

class Text extends Component
{
    public $name;
    public $model;

    public function __construct($name, $model = null)
    {
        $this->name = $name;
        $this->model = $model;
    }

    public function render()
    {
        return view('rapyd::components.form.text');
    }
}
