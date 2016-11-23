<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', 'ProductsController');
Route::post('products/{id}/images', 'ProductsController@images');

Auth::routes();

Route::get('faq', 'PageController@faq');
