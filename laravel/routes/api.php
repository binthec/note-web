<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('items')->group(function(){
    Route::get('/', 'Api\ItemController@index');
    Route::post('/', 'Api\ItemController@store');
    Route::get('/getFirstCategories', 'Api\ItemController@getFirstCategories');
    Route::get('/getSecondCategories/{first_cate_id}', 'Api\ItemController@getSecondCategories');
    Route::get('/getThirdCategories/{second_cate_id}', 'Api\ItemController@getThirdCategories');
    Route::get('/getItems/{cate_name}/{cate_id}', 'Api\ItemController@getItems');
    Route::get('/{uuid}', 'Api\ItemController@show'); // 単一のレコードを取得する場合
    Route::put('/{uuid}', 'Api\ItemController@update');
});

Route::prefix('engi')->group(function(){
    Route::get('/', 'Api\EngiController@index');
    Route::post('/', 'Api\EngiController@store');
    Route::get('/{uuid}', 'Api\EngiController@show'); // 単一のレコードを取得する場合
    Route::put('/{uuid}', 'Api\EngiController@update');
    Route::delete('/{uuid}', 'Api\EngiController@destroy');
});
