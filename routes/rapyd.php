<?php


Route::group(['middleware' => 'web'], function () {


    Route::namespace('Zofe\Rapyd\Http\Controllers')->prefix('rapyd-demo')->group(function() {
        Route::get('/',             'DemoController@index')->name('rapyd.demo');
//        Route::get('/models',       'DemoController@getModels');
//        Route::get('/schema',       'DemoController@getSchema');
//        Route::get('/menus-schema', 'DemoController@getMenusSchema');
//        Route::get('/set',          'DemoController@getSet');
//        Route::get('/grid',         'DemoController@getGrid');
//        Route::get('/filter',       'DemoController@getFilter');
//        Route::get('/customfilter', 'DemoController@getCustomfilter');
//        Route::any('/form',         'DemoController@anyForm');
//        Route::any('/advancedform', 'DemoController@anyAdvancedform');
//        Route::any('/styledform',   'DemoController@anyStyledform');
//        Route::any('/edit',         'DemoController@anyEdit');
//        Route::any('/datatree',     'DemoController@anyDatatree');
//        Route::any('/menuedit',     'DemoController@anyMenuedit');
//        Route::get('/nudegrid',     'DemoController@getNudegrid');
//        Route::any('/nudeedit',     'DemoController@anyNudeedit');
//        Route::any('/embed',        'DemoController@getEmbed');
//        Route::get('/author-list',  'DemoController@getAuthorlist');
//        Route::get('/category-list','DemoController@getCategorylist');
    });

});
