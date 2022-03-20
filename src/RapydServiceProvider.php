<?php

namespace Zofe\Rapyd;

use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Zofe\Rapyd\Commands\RapydCommand;
use Zofe\Rapyd\Demo\Http\Livewire\ArticlesEdit;
use Zofe\Rapyd\Demo\Http\Livewire\ArticlesTable;
use Zofe\Rapyd\Demo\Http\Livewire\ArticlesView;
use Zofe\Rapyd\Demo\Http\Livewire\UsersTable;

class RapydServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/rapyd-livewire.php' => config_path('rapyd-livewire.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/rapyd-livewire'),
            ], 'views');

            $this->publishes([
                __DIR__.'/../public' => public_path('vendor/rapyd-livewire'),
            ], 'public');

            $this->publishes([
                __DIR__.'/Demo/routes/rapyd.php' => base_path('routes/rapyd.php'),
            ], 'routes');

            $this->commands([
                RapydCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'rpd');
        $this->loadViewsFrom(__DIR__ . '/Demo/resources/views', 'rpd-demo');

        if (file_exists(base_path('routes/rapyd.php'))) {
            $this->loadRoutesFrom(base_path('routes/rapyd.php'));
        } else {
            $this->loadRoutesFrom(__DIR__.'/Demo/routes/rapyd.php');
        }


        Livewire::component('rpd::demo-articles-table', ArticlesTable::class);
        Livewire::component('rpd::demo-articles-edit', ArticlesEdit::class);
        Livewire::component('rpd::demo-articles-view', ArticlesView::class);
        Livewire::component('rpd::demo-users-table', UsersTable::class);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/rapyd-livewire.php', 'rapyd-livewire');
    }
}
