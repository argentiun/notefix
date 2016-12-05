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
Route::get('categories/{category_id}/{id}/', 'ProductsController@show');
Route::post('products/{id}/images', 'ProductsController@images');

Auth::routes();


Route::get('/reparacion', function () {
    return view('fixit');
});



Route::get('categories/{id}', 'CategoriesController@show');


Route::post('profile/avatar', 'PageController@avatar');
Route::get('profile', 'PageController@profile');
Route::get('faq', 'PageController@faq');
Route::match(["post", "patch"], '/register/{id}', 'PageController@update');
