<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->group(function () {
    // Route::post('/posts/{post}/comment', 'Admin/CommentController@store');
});

Route::group([ 'prefix' => 'auth'], function () {

    Route::post('login', 'Api\Auth\AuthController@login');
    Route::post('register', 'Api\Auth\AuthController@register');
    
  
    //Route::group(['middleware' => ['auth:api']], function() {
        Route::post('logout', 'Api\Auth\AuthController@logout');
        Route::get('user', 'Api\Auth\AuthController@user');
        Route::get('get-user/{id}', 'Api\Auth\AuthController@getUser');

        Route::apiResource('tiendas', 'Api\Tienda\TiendaController', ['except' => ['create','edit' ]]);
        Route::get('get-tiendas', 'Api\Tienda\TiendaController@getTiendas');


        Route::post('oauth/token','\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');
        Route::get('/refresh-token','Api\Auth\AuthController@refreshToken');
   // });
}); 

