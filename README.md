# rapyd-livewire

[![Latest Version on Packagist](https://img.shields.io/packagist/v/zofe/rapyd-livewire.svg?style=flat-square)](https://packagist.org/packages/zofe/rapyd-livewire)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/zofe/rapyd-livewire/run-tests?label=tests)](https://github.com/zofe/rapyd-livewire/actions?query=workflow%3ATests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/zofe/rapyd-livewire.svg?style=flat-square)](https://packagist.org/packages/zofe/rapyd-livewire)


Porting of https://github.com/zofe/rapyd-laravel as livewire component library


## Installation

You can install the package via composer:

```bash
composer require zofe/rapyd-livewire
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Zofe\Rapyd\RapydServiceProvider" --tag="migrations"
php artisan migrate
```

You can publish assets using:
```bash
php artisan vendor:publish --provider="Zofe\Rapyd\RapydServiceProvider" --tag="public"
```


## Usage

Visit /rapyd-demo

![rapyd livewire](https://raw.github.com/zofe/rapyd-livewire/master/public/rapyd-livewire.png)

rapyd-livewire.png

## Credits

- [Felice Ostuni](https://github.com/zofe)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
