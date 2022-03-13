<?php

namespace Zofe\Rapyd\View\Components\Forms;

use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

class RichText extends Component
{
    public $name;
    public $errors;
    public $model;

    public function __construct($name, $errors = null, $model = null)
    {
        $this->name = $name;
        $this->errors = ($errors) ? $errors : new ViewErrorBag();
        $this->model = $model;

       // dd($this->model);
    }

    public function render()
    {
        return function (array $data) {
            // $data['componentName'];
            // $data['attributes'];
            // $data['slot'];
            //dd($data['attributes']);
            return 'rapyd::components.form.rich-text' ;
        };

        //return view('rapyd::components.form.rich-text');
    }
}
