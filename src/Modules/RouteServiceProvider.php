<?php

namespace Zofe\Rapyd\Modules;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    private $config = 'modules';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $lang_prefix = '';
        $locale = request()->segment(1);

        if (in_array($locale, config('app.locales', ['en']))) {
            $lang_prefix = ($locale !== config('app.fallback_locale')) ? $locale : '';

            if ($lang_prefix) {
                session(['lang_prefix' => $lang_prefix]);
            }
            app()->setlocale($locale);
        }


        $this->routes(function () use ($lang_prefix) {
            if (File::exists(app_path().'/Components/routes.php')) {
                Route::prefix($lang_prefix)->middleware(['web'])->group(app_path().'/Components/routes.php');
            }

            $moduleBasePath = app_path(). '/Modules/';
            $dirs = File::directories($moduleBasePath);

            foreach ($dirs as $moduleP) {
                $module = Str::lower(basename($moduleP));
                $modulePath = $moduleP. DIRECTORY_SEPARATOR; //$moduleBasePath .Str::studly($module). DIRECTORY_SEPARATOR;

                $moduleRoutes = $modulePath . 'routes.php';
                $routePrefix = $lang_prefix.'/'. Str::lower($module);

                if (File::exists($modulePath.'Components/routes.php')) {
                    Route::prefix($routePrefix)->middleware(config($module. '.route_middleware', ['web']))->group($modulePath.'Components/routes.php');
                }

                if (File::exists($moduleRoutes)) {
                    Route::prefix($routePrefix)
                            ->middleware(config($module. '.route_middleware', ['web']))
                            //commented to consent Livewire full-page component routing
                            //->namespace('App\\Modules\\' .Str::studly($module). '\\Controllers')
                            ->group($moduleRoutes);
                }
            }
        });
    }
}
