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
    'uses' => 'Auth\LoginController@showLoginForm'
]);


Route::post('auth/logout', [
    'as' => 'auth.logout',
    "uses" => 'Auth\LoginController@logout'
]);




Route::group(['prefix' => 'admin', 'middleware' => 'acl:admin_users, auth'], function () {
    # Users
    Route::pattern('users', '\d+');
    Route::resource('users', 'User\UserController');

});

Route::group(['middleware' => 'auth'], function () {


    Route::get('/home', [
        'as' => 'home',
        'uses' => 'Dashboard\DashboardController@dashboard'
    ]);

});

Auth::routes();