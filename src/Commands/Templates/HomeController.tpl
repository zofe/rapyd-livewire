<?php

namespace App\Modules\[[module]]\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('[[module_lower]]::index');
    }

    public function get(Request $request)
    {
        return view('[[module_lower]]::index');
    }

    public function delete(int $id)
    {
        return view('[[module_lower]]::index');
    }

    public function edit(int $id=null)
    {
        return view('[[module_lower]]::index');
    }

    public function submit(Request $request, $id=null)
    {
        return view('[[module_lower]]::index');
    }
}
