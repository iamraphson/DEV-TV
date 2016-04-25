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

    Route::get('/', [
        'uses' => 'HomeController@index',
    ]);

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


    //Admin routes
    Route::group(['prefix' => 'admin', 'roles' => ['admin'], 'middleware' => ['auth', 'roles']], function () {

        Route::get('/', [
            'uses' => 'AdminController@index',
            'as' => 'admin.home'
        ]);

        Route::get('/videos/categories', [
            'uses' => 'CategoryController@index',
            'as' => 'category.home'
        ]);

        Route::post('/videos/categories/store', [
            'uses' => 'CategoryController@store'
        ]);

        Route::get('/videos/categories/order', [
            'uses' => 'CategoryController@order'
        ]);

        Route::get('/videos/categories/edit/{category_id}', [
            'uses' => 'CategoryController@edit'
        ]);

        Route::put('/videos/categories/update', [
            'uses' => 'CategoryController@update'
        ]);

        Route::get('/videos/categories/delete/{category_id}', [
            'uses' => 'CategoryController@destroy'
        ]);

        Route::get('/videos/create', [
            'uses' => 'VideoController@create',
            'as' => 'video.create'
        ]);


    });
});


