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


    # after search form is posted, requested is parsed by index method and filter params are extracted
    Route::match(['get', 'post'],'/users', [
        'as' => 'users.index',
        'uses' => 'User\UserController@index'
    ]);

});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [
        'as' => 'home',
        'uses' => 'Dashboard\DashboardController@dashboard'
    ]);

});


// forgot password
Route::get('password/email', [
    'as' => 'password.email',
    "uses" => 'Auth\ForgotPasswordController@getEmail'
]);


Route::post('password/email', [
    'as' => 'password.email',
    "uses" => 'Auth\ForgotPasswordController@postEmail'
]);

Route::get('password/reset/{token}', [
    'as' => 'password.reset',
    "uses" => 'Auth\ForgotPasswordController@getReset'
]);

Route::post('password/reset', [
    'as' => 'password.postReset',
    "uses" => 'Auth\ForgotPasswordController@postReset'
]);

Auth::routes();