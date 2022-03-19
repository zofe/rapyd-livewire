<?php

namespace Zofe\Rapyd\Demo\Http\Controllers;

use App\Http\Controllers\Controller;
use Zofe\Rapyd\Demo\Models\DemoArticle;

class ArticlesController extends Controller
{
    public function index()
    {
        return view('rpd-demo::articles.table');
    }
    
    public function view(DemoArticle $article)
    {
        return view('rpd-demo::articles.view', compact('article'));
    }
    
    public function edit(DemoArticle $article = null)
    {
        $article = $article ? $article : new DemoArticle();

        return view('rpd-demo::articles.edit', compact('article'));
    }
}
