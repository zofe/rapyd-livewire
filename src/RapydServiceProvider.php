<?php

namespace Zofe\Rapyd;

use Illuminate\Container\Container;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
//use Touhidurabir\StubGenerator\StubGeneratorServiceProvider;
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
        Paginator::useBootstrap();
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
               // RapydMakeCommand::class,
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

        Blade::directive('ifcomponent', function ($expression) {
            return "<?php if((bool) array_key_exists($expression, app(\Livewire\LivewireComponentsFinder::class)->getManifest())): ?>\n";
        });

        Blade::directive('endifcomponent', function ($expression) {
            return "<?php endif; ?>\n";
        });

        Livewire::component('rpd-app', RapydApp::class);


        if (! Collection::hasMacro('paginate')) {

            Collection::macro('paginate', function ($perPage, $total = null, $page = null, $pageName = 'page') {

                $currentPage = LengthAwarePaginator::resolveCurrentPage($pageName);
                $total = $total ?: $this->count();
                $items = $this->forPage($currentPage, $perPage);
                $options = [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ];

                return Container::getInstance()->makeWith(LengthAwarePaginator::class,
                    compact(
                        'items', 'total', 'perPage', 'currentPage', 'options'
                    ))->withQueryString();

            });
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/rapyd-livewire.php', 'rapyd-livewire');
        $this->mergeConfigFrom(__DIR__ . '/../config/livewire.php', 'livewire');

        $this->app->register(BreadcrumbsServiceProvider::class);
        $this->app->register(ModuleServiceProvider::class);
        //$this->app->register(StubGeneratorServiceProvider::class);
    }
}
