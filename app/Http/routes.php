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
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});


// album
Route::resource('albums', 'AlbumsController');


// Authentication routes...
Route::get('user/login', 'Auth\AuthController@getLogin');
Route::post('user/login', 'Auth\AuthController@postLogin');
Route::get('user/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('user/inscription', 'Auth\AuthController@getRegister');
Route::post('user/inscription', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');