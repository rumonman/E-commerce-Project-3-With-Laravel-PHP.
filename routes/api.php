<?php

use Illuminate\Http\Request;

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

//Cart Controller
Route::get('/user/carts', 'API\CartController@index')->name('user.carts');
Route::post('/user/carts/store', 'API\CartController@store')->name('user.carts.store');
Route::post('/user/carts/update/{id}', 'API\CartController@update')->name('user.carts.update');
Route::post('/user/carts/delete/{id}', 'API\CartController@delete')->name('user.carts.delete');

