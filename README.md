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

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Zofe\Rapyd\RapydServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$rapyd = new Zofe\Rapyd();
echo $rapyd->echoPhrase('Hello, Zofe!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Felice Ostuni](https://github.com/zofe)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
