<?php

namespace Zofe\Rapyd;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Touhidurabir\StubGenerator\StubGeneratorServiceProvider;
use Zofe\Rapyd\Breadcrumbs\BreadcrumbsServiceProvider;
use Zofe\Rapyd\Commands\DataTableCommand;
use Zofe\Rapyd\Commands\RapydCommand;
use Zofe\Rapyd\Commands\RapydMakeCommand;
use Zofe\Rapyd\Http\Livewire\RapydApp;
use Zofe\Rapyd\Modules\ModuleServiceProvider;

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
                __DIR__.'/../public' => public_path('vendor/rapyd_livewire'),
            ], 'public');

            $this->commands([
                RapydCommand::class,
                RapydMakeCommand::class,
                DataTableCommand::class,

            ]);
        }

        $this->loadViewsFrom(resource_path('views/vendor/rapyd-livewire'), 'rpd');
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
            $scripts = "";

            $scripts .= '{!! \Livewire\Livewire::scripts('.$expression.') !!}'."\n";
            $scripts .= "<?php echo \$__env->yieldPushContent('rapyd_scripts'); ?>\n";
            $scripts .= '{!! \Livewire\Livewire::mount(\'rpd-app\')->html(); !!}'."\n";
            $scripts .= '<script src="{{ asset(\'vendor/rapyd-livewire/rapyd.js\') }}"></script>'."\n";
            if (in_array('alpine', config('rapyd_livewire.include_scripts'))) {
                $scripts .= '<script src="{{ asset(\'vendor/rapyd-livewire/alpine.js\') }}" defer></script>' . "\n";
            }
            if (in_array('bootstrap', config('rapyd_livewire.include_scripts'))) {
                $scripts .= '<script src="{{ asset(\'vendor/rapyd-livewire/bootstrap.js\') }}" defer></script>'."\n";
            }

            return $scripts;
        });
        Blade::directive('rapydLivewireStyles', function ($expression) {
            $styles = '<link rel="stylesheet" href="{{ asset(\'vendor/rapyd-livewire/rapyd.css\') }}">'."\n";
            if (in_array('bootstrap', config('rapyd_livewire.include_styles.bootstrap'))) {
                $styles .= '<link rel="stylesheet" href="{{ asset(\'vendor/rapyd-livewire/bootstrap.css\') }}">' . "\n";
            }
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
        $this->app->register(ModuleServiceProvider::class);
        $this->app->register(StubGeneratorServiceProvider::class);
    }
}
