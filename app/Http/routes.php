<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/



Route::group(['middleware' => 'web'], function () {

    Route::get('/register', [
        'uses' => 'Auth\AuthController@getRegister',
        'as' => 'auth.register',
        'middleware' => ['guest']
    ]);

    Route::post('/register', [
        'uses' => 'Auth\AuthController@postRegister',
        'middleware' => ['guest']
    ]);

    Route::get('/logout', [
        'uses' => 'Auth\AuthController@logout',
        'as' => 'logout'
    ]);

    Route::get('/login', [
        'uses' => 'Auth\AuthController@getLogin',
        'as' => 'auth.login',
        'middleware' => ['guest']
    ]);

    Route::post('/login', [
        'uses' => 'Auth\AuthController@postLogin',
        'middleware' => ['guest']
    ]);

    Route::get('auth/facebook', [
        'uses' => 'Auth\AuthController@redirectToProvider',
        'as' => 'auth.facebook',
    ]);

    Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');

    Route::post('password/reset', 'Auth\PasswordController@reset');
    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');

    Route::get('/r', [
        'middleware' => ['auth', 'roles'],
        'uses' => 'HomeController@index',
        'roles' => ['admin']
    ]);

});

Route::get('/', function () {
    return view('welcome');
});

