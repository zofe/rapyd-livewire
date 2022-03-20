<?php

namespace Zofe\Rapyd;

use Illuminate\Support\Facades\Blade;
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


        Blade::directive('rapydScripts', function () {
            $scripts  = '<script src="{{ asset(\'vendor/rapyd-livewire/rapyd.js\') }}" defer></script>'."\n";
            $scripts .= "<?php echo \$__env->yieldPushContent('rapyd_scripts'); ?>\n";
            return $scripts;
        });
        Blade::directive('rapydStyles', function () {
            $styles  = '<link rel="stylesheet" href="{{ asset(\'vendor/rapyd-livewire/rapyd.css\') }}">'."\n";
            $styles .= "<?php echo \$__env->yieldPushContent('rapyd_styles'); ?>\n";
            return $styles;
        });

        Blade::directive('rapydLivewireScripts', function ($expression) {
            $scripts  = '<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.1/js/bootstrap.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>' . "\n";
            $scripts .= '<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>' . "\n";
            $scripts .= '<script src="{{ asset(\'vendor/rapyd-livewire/rapyd.js\') }}" defer></script>'."\n";
            $scripts .= '{!! \Livewire\Livewire::scripts('.$expression.') !!}'."\n";
            $scripts .= "<?php echo \$__env->yieldPushContent('rapyd_scripts'); ?>\n";
            return $scripts;
        });
        Blade::directive('rapydLivewireStyles', function ($expression) {
            $styles  = '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.1/css/bootstrap.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />'."\n";
            $styles .= '<link rel="stylesheet" href="{{ asset(\'vendor/rapyd-livewire/rapyd.css\') }}">'."\n";
            $styles .= '{!! \Livewire\Livewire::styles('.$expression.') !!}';
            $styles .= "<?php echo \$__env->yieldPushContent('rapyd_styles'); ?>\n";
            return $styles;
        });

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
