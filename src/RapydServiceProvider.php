<?php

namespace Zofe\Rapyd;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Zofe\Rapyd\Breadcrumbs\BreadcrumbsServiceProvider;
use Zofe\Rapyd\Commands\RapydCommand;
use Zofe\Rapyd\Http\Livewire\RapydApp;

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

            $this->commands([
                RapydCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'rpd');

        Blade::directive('rapydScripts', function () {
            $scripts = '<script src="{{ asset(\'vendor/rapyd-livewire/rapyd.js\') }}" defer></script>'."\n";
            $scripts .= "<?php echo \$__env->yieldPushContent('rapyd_scripts'); ?>\n";
            $scripts .= '{!! \Livewire\Livewire::mount(\'rpd-app\')->html(); !!}'."\n";
            return $scripts;
        });
        Blade::directive('rapydStyles', function () {
            $styles = '<link rel="stylesheet" href="{{ asset(\'vendor/rapyd-livewire/rapyd.css\') }}">'."\n";
            $styles .= "<?php echo \$__env->yieldPushContent('rapyd_styles'); ?>\n";

            return $styles;
        });

        Blade::directive('rapydLivewireScripts', function ($expression) {
            $scripts = '{!! \Livewire\Livewire::scripts('.$expression.') !!}'."\n";
            $scripts .= "<?php echo \$__env->yieldPushContent('rapyd_scripts'); ?>\n";
            $scripts .= '{!! \Livewire\Livewire::mount(\'rpd-app\')->html(); !!}'."\n";
            $scripts .= '<script src="{{ asset(\'vendor/rapyd-livewire/rapyd.js\') }}" defer></script>'."\n";
            $scripts .= '<script src="{{ asset(\'vendor/rapyd-livewire/bootstrap.js\') }}" defer></script>'."\n";
            $scripts .= '<script src="{{ asset(\'vendor/rapyd-livewire/alpine.js\') }}" defer></script>'."\n";

            return $scripts;
        });
        Blade::directive('rapydLivewireStyles', function ($expression) {
            $styles = '<link rel="stylesheet" href="{{ asset(\'vendor/rapyd-livewire/rapyd.css\') }}">'."\n";
            $styles .= '<link rel="stylesheet" href="{{ asset(\'vendor/rapyd-livewire/bootstrap.css\') }}">'."\n";
            $styles .= '{!! \Livewire\Livewire::styles('.$expression.') !!}';
            $styles .= "<?php echo \$__env->yieldPushContent('rapyd_styles'); ?>\n";

            return $styles;
        });

        Livewire::component('rpd-app', RapydApp::class);

    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/rapyd-livewire.php', 'rapyd-livewire');
        $this->app->register(BreadcrumbsServiceProvider::class);
    }
}
