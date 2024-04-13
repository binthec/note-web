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

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

// コンテンツ管理
Route::prefix('items')->group(function(){
    Route::get('/', 'ItemController@index')        ->name('items.list');
    Route::get('/download', 'ItemController@download')->name('items.download');
});

// 演技シート
Route::prefix('engi')->group(function(){
    Route::get('/', 'EngiController@index')          ->name('engi.list');
    Route::get('/create', 'EngiController@create')   ->name('engi.create');
    Route::get('/{uuid}/edit', 'EngiController@edit')->name('engi.edit');
    Route::post('/preview', 'EngiController@preview')->name('engi.preview');
});
