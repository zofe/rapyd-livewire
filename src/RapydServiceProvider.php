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

            $migrationFileName = 'create_rapyd_demo_tables.php';
            if (! $this->migrationFileExists($migrationFileName)) {
                $this->publishes([
                    __DIR__ . "/../database/migrations/{$migrationFileName}.stub" => database_path('migrations/' . date('Y_m_d_His', time()) . '_' . $migrationFileName),
                ], 'migrations');
            }

            $this->publishes([
                __DIR__.'/../routes/rapyd.php' => base_path('routes/rapyd.php'),
            ], 'routes');

            $this->commands([
                RapydCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'rapyd');


        if (file_exists(base_path().'/routes/rapyd.php'))
        {
            $this->loadRoutesFrom(base_path('routes/rapyd.php'));
        } else {
            $this->loadRoutesFrom(__DIR__.'/../routes/rapyd.php');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/rapyd-livewire.php', 'rapyd-livewire');
    }

    public static function migrationFileExists(string $migrationFileName): bool
    {
        $len = strlen($migrationFileName);
        foreach (glob(database_path("migrations/*.php")) as $filename) {
            if ((substr($filename, -$len) === $migrationFileName)) {
                return true;
            }
        }

        return false;
    }
}
