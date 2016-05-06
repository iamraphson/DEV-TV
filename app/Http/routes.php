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

        Route::get('/posts/categories', [
            'uses' => 'PostCategoryController@index',
            'as' => 'post.category.home'
        ]);

        Route::post('/posts/categories/store', [
            'uses' => 'PostCategoryController@store'
        ]);

        Route::get('/posts/categories/order', [
            'uses' => 'PostCategoryController@order'
        ]);

        Route::get('/posts/categories/edit/{category_id}', [
            'uses' => 'PostCategoryController@edit'
        ]);

        Route::put('/posts/categories/update', [
            'uses' => 'PostCategoryController@update'
        ]);

        Route::get('/posts/categories/delete/{category_id}', [
            'uses' => 'PostCategoryController@destroy'
        ]);

        Route::get('/posts/create', [
            'uses' => 'PostController@create',
            'as' => 'post.create'
        ]);

        Route::post('posts/store', [
            'uses' => 'PostController@store',
            'as' => 'post.store'
        ]);

        Route::get('/posts', [
            'uses' => 'PostController@index',
            'as' => 'post.index'
        ]);

        Route::get('/posts/delete/{id}', [
            'uses' => 'PostController@destroy',
            'as' => 'post.delete'
        ]);

        Route::get('/posts/{id}/edit', [
            'uses' => 'PostController@edit',
            'as' => 'post.edit'
        ]);

        Route::put('/posts/{id}/update', [
            'uses' => 'PostController@update',
            'as' => 'post.update'
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

        Route::get('/videos', [
            'uses' => 'VideoController@index',
            'as' => 'video.index'
        ]);

        Route::get('/videos/create', [
            'uses' => 'VideoController@create',
            'as' => 'video.create'
        ]);

        Route::post('videos/upload', [
            'uses' => 'VideoController@uploadFiles'
        ]);

        Route::post('videos/store', [
            'uses' => 'VideoController@store',
            'as' => 'video.store'
        ]);

        Route::get('/videos/delete/{id}', [
            'uses' => 'VideoController@destroy',
            'as' => 'video.delete'
        ]);

        Route::get('/videos/edit/{id}', [
            'uses' => 'VideoController@edit',
            'as' => 'video.edit'
        ]);

        Route::put('/videos/{id}/update', [
            'uses' => 'VideoController@update',
            'as' => 'video.update'
        ]);

    });
});
