<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('about', function()
    {
        return View::make('about');
    });

Route::get('pashminaproject', function()
    {
        return View::make('pashminaproject');
    });

Route::get('/home', 'HomeController@index');
Route::get('/checkout', 'HomeController@checkout');
Route::resource('products', 'ProductController');
Route::post('/orders', 'HomeController@orders');
