# rapyd-livewire

[![Latest Version on Packagist](https://img.shields.io/packagist/v/zofe/rapyd-livewire.svg?style=flat-square)](https://packagist.org/packages/zofe/rapyd-livewire)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/zofe/rapyd-livewire/Tests?label=Tests)](https://github.com/zofe/rapyd-livewire/actions?query=workflow%3ATests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/zofe/rapyd-livewire.svg?style=flat-square)](https://packagist.org/packages/zofe/rapyd-livewire)


## What is it?

is a laravel library of widgets (livewire abstract components) that you can extend to create administration interfaces in a concise, uncluttered, and testable manner.

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

### Widgets

Abstract classes to be extended as livewire compoments.
Main goal is to standardize a large laravel admin application in a set of 2/3 Widgets for each Model you need to manage.

### AbstractDataTable
extend AbstractDataTable if you need a "listing page" with these features:
- "input filters" to search in a custom dataset 
- "buttons" (for example "add" record or "reset" filters)
- "pagination links"
- "sort links"   

demo: https://rapyd.dev/rapyd-demo/articles


### AbstractDataView
extend AbstractDataView if you need a "detail page" with these features:  

- "buttons" (for example back to "list" or "edit" current record)

demo: https://rapyd.dev/rapyd-demo/article/view/1


### AbstractDataEdit
extend AbstractDataEdit if you need a "form" binded to a model to edit it with these features:  

- "buttons" and "actions" (undo, save)
- form "rules"
- smart "fields"

demo: https://rapyd.dev/rapyd-demo/article/edit/1

---
### Fields 

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



