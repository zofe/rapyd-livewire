<?php

namespace Zofe\Rapyd;

use Illuminate\Support\ServiceProvider;
use Zofe\Rapyd\Commands\RapydCommand;

class RapydServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/rapyd-livewire.php' => config_path('rapyd-livewire.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../resources/views' => base_path('resources/views/vendor/rapyd-livewire'),
            ], 'views');
            
            $this->publishes([
                __DIR__.'/Demo/routes/rapyd.php' => base_path('routes/rapyd.php'),
            ], 'routes');

            $this->commands([
                RapydCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'rapyd');
        $this->loadViewsFrom(__DIR__ . '/Demo/resources/views', 'rapyd-demo');

        if (file_exists(base_path('routes/rapyd.php')))
        {
            $this->loadRoutesFrom(base_path('routes/rapyd.php'));
        } else {
            $this->loadRoutesFrom(__DIR__.'/Demo/routes/rapyd.php');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/rapyd-livewire.php', 'rapyd-livewire');
    }
    
}
