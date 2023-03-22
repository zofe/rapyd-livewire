# library development

### Testing 

To run tests you must run composer install first, then:


```bash

./vendor/phpunit/phpunit/phpunit
```


### build & publish static assets

this library has dependencies on CSS/JS frameworks (bootstrap 5, vuejs, element-ui, etc..)
this means that you may need to compile asset and publish them in your project


```bash
npm install

//from library root you can build assets
npm run prod

//from laravel root you can publish library assets
php artisan vendor:publish --provider="Zofe\Rapyd\RapydServiceProvider" --tag="public"

//or all in one from library path (in packages/zofe/rapyd-livewire)
npm run prod && ../../../artisan vendor:publish --provider="Zofe\Rapyd\RapydServiceProvider" --tag="public"

//or you can symlink assets (then just build or watch assets)   
ln -s /application/packages/zofe/rapyd-livewire/public /application/public/vendor/rapyd-livewire
```


Standard folder structure in a laravel + livewire application
```
laravel/
├─ app/
│  ├─ Http/
│  │   ├─ Livewire/
│  │   │  ├─ Component.php
│  ├─ Models/
│  │   ├─ ComponentModel.php  
├─ resources/
│  ├─ views/
│  │  ├─ component_view.blade.php
├─ routes/
│  ├─ web.php
```

Rapyd folder structure "component based"
```
laravel/
├─ app/
│  ├─ Components/
|  |  ├─ ComponentName/
│  │  │  ├─ Component.php
│  │  │  ├─ component_view.blade.php
│  │  ├─ routes.php
│  ├─ Http/
│  ├─ Models/
│  │   ├─ Model.php  
```

Rapyd folder structure "modules based"
```
laravel/
├─ app/
│  ├─ Modules/
│  │  ├─ ModuleName/
│  │  │  ├─ Components/
│  │  │  │  ├─ ComponentName/
│  │  │  │  │  ├─ Component.php
│  │  │  │  │  ├─ component_view.blade.php
│  │  │  │  ├─ routes.php
│  │  │  ├─ config.php
│  │  │  ├─ Http/
│  │  │  ├─ Models/
│  │  │  │  ├─ Model.php  
 
```

