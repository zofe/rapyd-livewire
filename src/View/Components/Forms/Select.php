<?php

namespace Zofe\Rapyd\View\Components\Forms;

use Illuminate\View\Component;

class Select extends Component
{
    public $name;
    public $options = [];

    public function __construct($name, $options)
    {
        $this->name = $name;
        $this->options = $options;
    }

    public function render()
    {
        return view('rapyd::components.form.select');
    }
}
