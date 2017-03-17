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

/*Route::get('/', function () {
    return view('home');
});*/

Route::get('/', 'ProductController@index');
Route::get('cartwidget', 'CartController@show');
Route::get('cart', 'CartController@index');
Route::post('store', 'CartController@store');
Route::post('remove/{code}', 'CartController@destroy');
Route::post('update/{code}', 'CartController@update');
