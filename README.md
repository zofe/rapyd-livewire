# rapyd-livewire

[![Latest Version on Packagist](https://img.shields.io/packagist/v/zofe/rapyd-livewire.svg?style=flat-square)](https://packagist.org/packages/zofe/rapyd-livewire)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/zofe/rapyd-livewire/Tests?label=Tests)](https://github.com/zofe/rapyd-livewire/actions?query=workflow%3ATests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/zofe/rapyd-livewire.svg?style=flat-square)](https://packagist.org/packages/zofe/rapyd-livewire)


## What is it?

is a laravel library of widgets (blade & livewire components) that you can extend to create administration interfaces in a concise, uncluttered, and testable manner.

It also bundles Bootstrap, Vue, Alpine and Quill to be used as fast boilerplate for your laravel admin panels.

min laravel version: ^8.27


Demo: [rapyd.dev](https://rapyd.dev/rapyd-demo)  


## Installation

You can install the package via composer:

```bash
composer require zofe/rapyd-livewire
```



You can publish assets using:
```bash
php artisan vendor:publish --provider="Zofe\Rapyd\RapydServiceProvider" --tag="public"
```


## Usage

the demo is auto-documented [rapyd.dev](https://rapyd.dev/rapyd-demo)  
but this is a bit of documentation:


after you have installed the library you can create your livewire components
extending rapyd abstract component classes.  
Main goal is to standardize a large laravel admin application in a set of 2/3 Widgets for each Model you need to manage.

---
### DataTable
DataTable extend AbstractDataTable if you need a "listing page" with these features:
- "input filters" to search in a custom dataset 
- "buttons" (for example "add" record or "reset" filters)
- "pagination links"
- "sort links"   

example 
```php
<?php
namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Author;
use Zofe\Rapyd\Http\Livewire\AbstractDataTable;

class ArticlesTable extends AbstractDataTable
{
    public $search;
    public $author_id;

    public function getDataSet()
    {
        $items = Article::ssearch($this->search);
        if ($this->author_id) {
            $items = $items->where('author_id', '=', $this->author_id);
        }

        return $items = $items
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage)
            ;
    }

    public function render()
    {
        $items = $this->getDataSet();
        $authors = Author::all()->pluck('firstname', 'id')->toArray();
        return view('livewire.articles.table', compact('items', 'authors'));
    }
}

```

the view`/resources/views/livewire/articles/table.blade.php`

```html
<x-rpd::table
    title="Article List"
    :items="$items"
>
    
    <x-slot name="filters">
        <div class="col">
            <x-rpd::input debounce="350" model="search"  placeholder="search..." />
        </div>
        <div class="col">
            <x-rpd::select lazy model="author_id" :options="$authors" placeholder="author..." addempty />
        </div>
    </x-slot>

    <x-slot name="buttons">
            <a href="{{ route('articles') }}" class="btn btn-outline-dark">reset</a>
            <a href="{{ route('articles.edit') }}" class="btn btn-outline-primary">add</a>
    </x-slot>
    
    <table class="table">
        <thead>
        <tr>
            <th>
                <x-rpd::sort model="id" label="id" />
            </th>
            <th>title</th>
            <th>author</th>
            <th>body</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($items as $article)
            <tr>
                <td>
                    <a href="{{ route('articles.view',$article->id) }}">{{ $article->id }}</a>
                </td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->author->firstname }}</td>
                <td>{{ Str::limit($article->body,50) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    
</x-rpd::table>

```

demo: https://rapyd.dev/rapyd-demo/articles

---
### DataView
DataView extend AbstractDataView for a "detail page" with:  

- "buttons" slot (for example back to "list" or "edit" current record)

```php
<?php
namespace App\Http\Livewire;

use App\Models\Article;
use Zofe\Rapyd\Http\Livewire\AbstractDataView;

class ArticlesView extends AbstractDataView
{
    public $article;

    public function mount(Article $article)
    {
        $this->article = $article;
    }

    public function render()
    {
        return view('livewire.articles.view');
    }
}
```

the view `/resources/views/livewire/articles/view.blade.php`

```html
    <x-rpd::view title="Article Detail">

        <x-slot name="buttons">
            <a href="{{ route('articles') }}" class="btn btn-outline-primary">list</a>
            <a href="{{ route('articles.edit',$model->getKey()) }}" class="btn btn-outline-primary">edit</a>
        </x-slot>

        <div>Title: {{ $article->title }}</div>
        <div>Author: {{ $article->author->firstname }} {{ $model->author->lastname }}</div>
          
    </x-rpd::view>
```

props
- `title`: the heading title for this crud

content/slots
- should be a detail of $model
- `buttons`: buttons panel

demo: https://rapyd.dev/rapyd-demo/article/view/1

---
### DataEdit
DataEdit component extend AbstractDataEdit for a "form" binded to a model with:  

- "buttons" and "actions" (undo, save)
- form "rules"
- form "fields"

example 
```php
<?php
namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Author;
use Zofe\Rapyd\Http\Livewire\AbstractDataEdit;

class ArticlesEdit extends AbstractDataEdit
{
    public $article;
   
    protected $rules = [
        'article.title'   => 'required',
        'article.author_id'=> 'required',
        'article.body'    => 'nullable',
        'article.public'  => 'nullable|boolean',
    ];

    public function mount(Article $article = null)
    {
        $this->article = $article;
        $this->action = ($article->exists) ? 'update' : 'create';
    }

    public function create()
    {
        $this->validate();
        $this->article->save();
        return redirect()->to(route('articles.view', $this->article->getKey()));
    }

    public function update()
    {
        $this->validate();
        $this->article->save();
        return redirect()->to(route('articles.view', $this->article->getKey()));
    }

    public function render()
    {
        $authors = Author::all()->pluck('firstname', 'id')->toArray();

        return view('livewire.articles.edit', compact('authors'));
    }
}

```
the view `/resources/views/livewire/articles/edit.blade.php`

```html
    <x-rpd::edit title="Article Edit">

       <x-rpd::input model="article.title" label="Title" />
       <x-rpd::rich-text model="article.body" label="Body" />

    </x-rpd::edit>
```

props
- `title`: the heading title for this crud

content/slots
- form fields

demo: https://rapyd.dev/rapyd-demo/article/edit/1

---


### Fields Tags

inside some widget views you can drastically semplify the syntax using 
predefined blade component that interacts with livewire

```html
<x-rpd::input debounce="350" model="search" placeholder="search..." />
```

```html
<x-rpd::select lazy model="author_id" :options="$authors" />
```

```html
<x-rpd::textarea model="body" label="Body" rows="5" :help="__('the article summary')"/>
```

```html
<!-- quill wysiwyg editor -->
<x-rpd::rich-text model="body" label="Body" />
```


props

- `label`: label to display above the input
- `placeholder`: placeholder to use for the empty first option
- `model`: Livewire model property key
- `options`: array of options e.g. (used in selects)
- `debounce`: Livewire time in ms to bind data on keyup
- `lazy`: Livewire bind data only on change
- `prepend`: addon to display before input, can be used via named slot
- `append`: addon to display after input, can be used via named slot
- `help`: helper label to display under the input
- `icon`: Font Awesome icon to show before input e.g. `cog`, `envelope`
- `size`: Bootstrap input size e.g. `sm`, `lg`
- `rows`: rows nums


special tags

```html
<!-- sort ascending/descending link actions (in a datatable view context)-->
<x-rpd::sort model="id" label="id" />

<!--bootstrap nav-link menu with self-determined active link -->
<ul class="nav nav-tabs">
    <x-rpd::nav-link label="Home" route="home" />
    <x-rpd::nav-link label="Articles" route="articles" />
    <x-rpd::nav-link label="Article Detail" route="articles.view" :params="1"/>
    <x-rpd::nav-link label="Article edit" route="articles.edit" />
</ul>

```



### minimal layout to display rapyd widgets
there are some css/js dependencies (livewire, bootstrap, alpinejs)
and some component needs to inject scripts/css so there are some nedded blade directives
and some suggested cdn inclusions.

so your master layout in laravel should be similar to:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="//fonts.googleapis.com/css?family=Bitter" rel="stylesheet" type="text/css" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.1/css/bootstrap.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
    @rapydStyles
</head>
<body>
<div id="app">
<!-- your main content blade section -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.1/js/bootstrap.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@livewireScripts
@rapydScripts

</body>
</html>
```
if you don't care about the versions of bootstrap, alpinejs you can reduce to just 2 blade directives: 

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="//fonts.googleapis.com/css?family=Bitter" rel="stylesheet" type="text/css" />
    @rapydLivewireStyles
</head>
<body>
<div id="app">
 <!-- your main content blade section -->
</div>
@rapydLivewireScripts
</body>
</html>
```





## To-do

- component generators (with custom stub for each abstract widget)
- breadcrumb integration or development
- buttons panel (blade component) to standardize widgets layout
- modular saperation or "plugin" architecture (to support a rapyd-admin boilerplate application)

## Credits

- [Felice Ostuni](https://github.com/zofe)
- [All Contributors](../../contributors)


Inspirations:

- [rapyd-laravel](https://github.com/zofe/rapyd-laravel) my old laravel library (140k downloads)
- [livewire](https://laravel-livewire.com/)  widely used "full-stack framework" to compose laravel application by widgets
- [laravel-bootstrap-components](https://github.com/bastinald/laravel-bootstrap-components) smart library which reduced the complexity of this one



## License & Contacts

Rapyd is licensed under the [MIT license](http://opensource.org/licenses/MIT)

Please join me and review my work on [Linkedin](https://www.linkedin.com/in/feliceostuni/)

thanks



