<?php

namespace Zofe\Rapyd\Breadcrumbs;

use Closure;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Opis\Closure\SerializableClosure;

/**
 * included as source, tabuna/breadcrumbs no way to make it work as composer injected dep.
 */


class BreadcrumbsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap your package's services.
     */
    public function boot()
    {
        Blade::component('rpd::breadcrumbs', BreadcrumbsComponent::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Manager::class);

        \Illuminate\Support\Facades\Route::middlewareGroup('crumbs', [
            BreadcrumbsMiddleware::class,
        ]);

        if (Route::hasMacro('crumbs')) {
            return;
        }

        Route::macro('crumbs', function (Closure $closure) {

            /** @var Route $this */
            $this->action[BreadcrumbsMiddleware::class] = serialize(new SerializableClosure($closure));
            $this->middleware('crumbs');

            return $this;
        });
    }
}
