<?php

namespace Zofe\Rapyd\View\Components\Forms;

use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

class Text extends Component
{
    public $name;
    
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function render()
    {
        return view('rapyd::components.form.text');
    }
}
