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

