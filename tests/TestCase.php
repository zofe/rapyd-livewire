<?php

namespace Zofe\Rapyd\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Facade;
use Livewire\Livewire;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Zofe\Rapyd\RapydServiceProvider;
use Zofe\Rapyd\Tests\Http\Livewire\ArticlesEdit;
use Zofe\Rapyd\Tests\Http\Livewire\ArticlesTable;
use Zofe\Rapyd\Tests\Http\Livewire\ArticlesView;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        $this->afterApplicationCreated(function () {
            $this->makeACleanSlate();
        });

        $this->beforeApplicationDestroyed(function () {
            $this->makeACleanSlate();
        });
        Facade::setFacadeApplication(app());
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Zofe\\Rapyd\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );

        Livewire::component('test-articles-table', \Zofe\Rapyd\Tests\Http\Livewire\ArticlesTable::class);
        Livewire::component('test-articles-edit', \Zofe\Rapyd\Tests\Http\Livewire\ArticlesEdit::class);
        Livewire::component('test-articles-view', \Zofe\Rapyd\Tests\Http\Livewire\ArticlesView::class);
    }

    protected function defineDatabaseMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }

    protected function defineRoutes($router)
    {
        $router->group(['prefix' => 'test-demo'], function () use ($router) {
            $router->get('/', function() {
                return view('master');
            })->name('test');

            $router->get('/articles', ['as' => 'test.articles', 'uses' => ArticlesTable::class]);
            $router->get('/articles/view/{article:id}',['as' => 'test.articles.view', 'uses' => ArticlesView::class]);
            $router->get('/articles/edit/{article:id?}',['as' => 'test.articles.edit', 'uses' => ArticlesEdit::class]);


//            $router->get('/article/view/{article:id?}', [ArticlesController::class, 'view'])->name('articles.view')->breadcrumbs(function ($trail, $article) {
//                $trail->parent('articles')->push('View Article', route('articles.view', $article));
//            });
//            $router->get('/article/edit/{article:id?}', [ArticlesController::class, 'edit'])->name('articles.edit')->breadcrumbs(function ($trail, $article = null) {
//                if ($article) {
//                    $trail->parent('articles.view', $article)->push('Edit Article', route('articles.edit', $article));
//                } else {
//                    $trail->parent('articles')->push('Create Article', route('articles.edit'));
//                }
//            });
        });


//        Route::prefix('test-demo')->group(function () {
////            Route::get('/',                 [DemoController::class, 'index'])->name('demo')->breadcrumbs(function ($trail) {
////                $trail->push('Home', route('test'));
////            });
////            Route::get('/schema',           [DemoController::class, 'schema'])->name('demo.schema')->breadcrumbs(function ($trail) {
////                $trail->parent('test')->push('Schema', route('test.schema'));
////            });
////            // Route::get('/users',            [DemoController::class, 'users'])->name('demo.users');
////            // Route::get('/users/{user:id?}', [DemoController::class, 'userEdit'])->name('demo.users.edit');
//
//            Route::get('/articles',         [ArticlesController::class, 'index'])->name('articles')->breadcrumbs(function ($trail) {
//                $trail->parent('demo')->push('Articles', route('test.articles'));
//            });
//            Route::get('/article/view/{article:id?}', [ArticlesController::class, 'view'])->name('articles.view')->breadcrumbs(function ($trail, $article) {
//                $trail->parent('articles')->push('View Article', route('articles.view', $article));
//            });
//            Route::get('/article/edit/{article:id?}', [ArticlesController::class, 'edit'])->name('articles.edit')->breadcrumbs(function ($trail, $article = null) {
//                if ($article) {
//                    $trail->parent('articles.view', $article)->push('Edit Article', route('articles.edit', $article));
//                } else {
//                    $trail->parent('articles')->push('Create Article', route('articles.edit'));
//                }
//            });
//        });

    }

    public function makeACleanSlate()
    {
        Artisan::call('view:clear');
    }

    protected function getPackageProviders($app)
    {
        return [
            RapydServiceProvider::class,
            LivewireServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('view.paths', [
            __DIR__.'/../resources/views',
            __DIR__.'/resources/views',

            resource_path('views'),
        ]);
        $app['config']->set('app.key', 'base64:Hupx3yAySikrM2/edkZQNQHslgDWYfiBfCuSThJ5SK8=');
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        $app['config']->set('session.driver', 'file');
       // $app['config']->set('livewire.class_namespace','Zofe\\Rapyd\\Tests\\Http\\Livewire');

        /*
        include_once __DIR__.'/../database/migrations/create_rapyd_livewire_table.php.stub';
        (new \CreatePackageTable())->up();
        */
    }
}
