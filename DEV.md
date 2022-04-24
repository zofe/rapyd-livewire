# library development

run tests
```bash

```

### build & publish static assets

```bash
//from library root
npm run prod

//from laravel root 
php artisan vendor:publish --provider="Zofe\Rapyd\RapydServiceProvider" --tag="public"
```

```bash
//or from library path (in packages/zofe/rapyd-livewire)
npm run prod && ../../../artisan vendor:publish --provider="Zofe\Rapyd\RapydServiceProvider" --tag="public"

//or symlink 
ln -s /application/packages/zofe/rapyd-livewire/public /application/public/vendor/rapyd-livewire
```


