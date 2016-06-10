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

Route::group(['middleware' => 'auth'], function(){
    #Route::resource('login', 'Login\LoginController');
    Route::resource('dashboard', 'Login\DashboardController',
        ['only' => 'index']);
});
Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');


