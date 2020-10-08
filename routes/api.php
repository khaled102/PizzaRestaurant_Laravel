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


Route::group(['prefix' => 'guest'], function () {
    Route::get('/create/{name}/{mobile}','API\Guest\GuestController@create');
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', 'API\Auth\LoginController@login');
    Route::post('/register', 'API\Auth\RegisterController@register');
});

Route::group(['prefix' => 'item'], function () {
    Route::get('/menu','API\Item\ItemController@show');
});

Route::group(['prefix' => 'cart'], function () {
    Route::post('/create','API\Cart\CartController@create');
    Route::post('/store','API\Cart\CartController@store');
});

Route::group(['prefix' => 'order'], function () {
    Route::post('/create','API\Order\OrderController@create');
});
