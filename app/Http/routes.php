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

Route::get('/', [
    'as' => 'slash',
    'uses' => 'Auth\AuthController@getLogin'
]);

// Authentication routes...

// Authentication routes...
Route::get('auth/login', [
    'as' => 'auth.getLogin',
    'uses' =>  'Auth\AuthController@getLogin'
]);

Route::post('auth/login', [
    'as' => 'auth.postLogin',
    "uses" => 'Auth\AuthController@postLogin'
]);

Route::get('auth/logout', [
    'as' => 'auth.logout',
    "uses" => 'Auth\AuthController@getLogout'
]);

// forgot password

Route::get('password/email', [
    'as' => 'password.email',
    "uses" => 'Auth\PasswordController@getEmail'
]);


Route::post('password/email', [
    'as' => 'password.email',
    "uses" => 'Auth\PasswordController@postEmail'
]);

Route::get('password/reset/{token}', [
    'as' => 'password.reset',
    "uses" => 'Auth\PasswordController@getReset'
]);

Route::post('password/reset', [
    'as' => 'password.postReset',
    "uses" => 'Auth\PasswordController@postReset'
]);