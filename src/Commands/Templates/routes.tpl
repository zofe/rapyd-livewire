<?php

/*
|--------------------------------------------------------------------------
| [[module]] Module Routes
|--------------------------------------------------------------------------
|
| Here you can add routes that belongs to [[module]] module
| Only make sure not to add any routes that does not belong here in
| [[module]] Module ...
|
*/
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('[[module_lower]]');
Route::get('get', 'HomeController@get')->name('[[module_lower]]_get');
Route::get('edit/{id?}', 'HomeController@edit')->name('[[module_lower]]_edit');
Route::post('edit/{id?}', 'HomeController@submit')->name('[[module_lower]]_edit');
Route::get('delete/{id}', 'HomeController@delete')->name('[[module_lower]]_delete');
