<?php

namespace Zofe\Rapyd\Http\Controllers;

use App\Http\Controllers\Controller;

class DemoController extends Controller
{
    public function index()
    {
        return view('rapyd::demo.demo');
    }
}
