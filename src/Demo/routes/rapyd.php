<?php


Route::group(['middleware' => 'web'], function () {
    Route::namespace('Zofe\Rapyd\Demo\Http\Controllers')->prefix('rapyd-demo')->group(function () {
        Route::get('/',                 'DemoController@index')->name('rapyd.demo')->breadcrumbs(function ($trail) {
            $trail->push('Home', route('rapyd.demo'));
        });
        Route::get('/schema',           'DemoController@schema')->name('rapyd.schema')->breadcrumbs(function ($trail) {
            $trail->parent('rapyd.demo')->push('Schema', route('rapyd.schema'));
        });
        Route::get('/users',            'DemoController@users')->name('rapyd.demo.users');
        Route::get('/users/{user:id?}', 'DemoController@userEdit')->name('rapyd.demo.users.edit');

        Route::get('/articles',         'ArticlesController@index')->name('rapyd.demo.articles')->breadcrumbs(function ($trail) {
            $trail->parent('rapyd.demo')->push('Articles', route('rapyd.demo.articles'));
        });
        Route::get('/article/view/{article:id?}', 'ArticlesController@view')->name('rapyd.demo.articles.view')->breadcrumbs(function ($trail, $article) {
            $trail->parent('rapyd.demo.articles')->push('View Article', route('rapyd.demo.articles.view', $article));
        });
        Route::get('/article/edit/{article:id?}', 'ArticlesController@edit')->name('rapyd.demo.articles.edit')->breadcrumbs(function ($trail, $article=null) {
            if($article) {
                $trail->parent('rapyd.demo.articles.view', $article)->push('Edit Article', route('rapyd.demo.articles.edit', $article));
            } else {
                $trail->parent('rapyd.demo.articles')->push('Create Article', route('rapyd.demo.articles.edit'));
            }
        });
    });
});
