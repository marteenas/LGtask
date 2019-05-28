<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

    Route::resource('services', 'ServicesController');
    Route::get('/services', 'ServicesController@index')->name('services');
    Route::get('/services/{service_id}/systems', 'SystemsController@filter')->name('service.systems');
    Route::get('/services/{service_id}/systems/edit', 'ServicesController@editSystem')->name('service.edit.systems');
    Route::post('/services/{service_id}/systems/add', 'ServicesController@addSystem')->name('service.add.systems');
    Route::get('/services/{service_id}/systems/{system_id}/unset', 'ServicesController@unsetSystem')->name('service.unset.systems');

    Route::resource('systems', 'SystemsController');
    Route::get('/systems', 'SystemsController@index')->name('systems');
});
