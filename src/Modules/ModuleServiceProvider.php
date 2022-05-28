<?php

namespace Zofe\Rapyd\Modules;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Livewire;
use ReflectionClass;
use Symfony\Component\Finder\SplFileInfo;
use Zofe\Rapyd\Commands\ModuleCommand;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ModuleCommand::class
            ]);
        }

        $this->enableComponents();
        $this->enableModules();
    }


    private function enableComponents(): void
    {
        $componentsBasePath = $componentsPath = app_path(). '/Components';

        $this->loadViewsFrom($componentsPath, 'components');
        $this->registerComponentDirectory($componentsBasePath, "App\\Components\\", "component::");
    }

    /**
     *
     * Enable module functionality
     */
    private function enableModules(): void
    {
        $moduleBasePath = $modulePath = app_path(). '/Modules/';

        if(File::exists($moduleBasePath)) {
            $dirs = File::directories($moduleBasePath);

            foreach ($dirs as $moduleP) {
                $module = Str::lower(basename($moduleP));
                $modulePath = $moduleP . DIRECTORY_SEPARATOR;

                $moduleName = Str::snake($module);
                $moduleConfigPath = $modulePath . 'config.php';

                $lang_prefix = $this->detectLocaleByPrefix();
                if (File::exists($modulePath.'routes.php')) {
                    Route::prefix($lang_prefix)->middleware(['web'])->group($modulePath.'routes.php');
                }

                if (File::exists($moduleConfigPath)) {
                    $this->mergeConfigFrom($moduleConfigPath, $moduleName);

                    $this->loadViewsFrom($modulePath . 'Views', $moduleName);
                    $this->loadViewsFrom($modulePath . 'Components', $moduleName);//'components');
                    $this->loadMigrationsFrom($modulePath . 'Migrations');
                    $this->loadTranslationsFrom($modulePath . 'Translations', $moduleName);

                    $routePrefix = $lang_prefix . '/' . Str::lower($module);

                    if (File::exists($modulePath . 'Components/routes.php')) {

                        Route::prefix($routePrefix)->middleware(config($module . '.route_middleware', ['web']))
                            ->group($modulePath . 'Components/routes.php');

                    }

                    if ($this->app->runningInConsole()) {
                        $moduleCommands = [];
                        $commandDirPath = $modulePath . 'Commands';
                        if (File::isDirectory($commandDirPath)) {
                            foreach (File::files($modulePath . 'Commands') as $file) {
                                $pathInfo = pathinfo($file);
                                $moduleCommands[] = namespace_module("App\\Commands\\{$pathInfo['filename']}", Str::studly($module));
                            }
                            $this->commands($moduleCommands);
                        }
                    }

                    // register service provider
                    $moduleProviders = config($module . '.providers', []);
                    foreach ($moduleProviders as $provider) {
                        $this->app->register($provider);
                    }

                    //register livewire components
                    $directory = (string)Str::of($modulePath . 'Components')
                        ->replace(['\\'], '/');

                    $namespace = namespace_module('App\\Components\\', Str::studly($module));

                    $this->registerComponentDirectory($directory, $namespace, Str::lower($module) . '::');
                }
            }
        }
    }

    protected function registerComponentDirectory($directory, $namespace, $aliasPrefix = '')
    {
        $filesystem = new Filesystem();

        if (! $filesystem->isDirectory($directory)) {
            return false;
        }

        $directories = [];
        if (basename($directory) == 'Components') {
            foreach ($filesystem->directories($directory) as $dir) {
                $component_namespace = $namespace.basename($dir);
                $directories[$component_namespace] = $dir;
            }
        } else {
            $directories[$namespace] = $directory;
        }

        foreach ($directories as $namespace => $directory) {
            collect($filesystem->allFiles($directory))
                ->map(function (SplFileInfo $file) use ($namespace) {
                    return (string) Str::of($namespace)
                        ->append('\\', $file->getRelativePathname())
                        ->replace(['/', '.php'], ['\\', '']);
                })
                ->filter(function ($class) {
                    return is_subclass_of($class, Component::class) && ! (new ReflectionClass($class))->isAbstract();
                })
                ->each(function ($class) use ($namespace, $aliasPrefix) {
                    $alias = $aliasPrefix.Str::kebab(Str::replace('\\', '', Str::after($class, 'Components\\')));
                    Livewire::component($alias, $class);
                });
        }
    }


    public function detectLocaleByPrefix()
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
        return $lang_prefix;
    }
}
