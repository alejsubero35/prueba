<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login'); //view('welcome');
});

Route::get('test', function () {
    event(new App\Events\StatusSent('Someone'));
    return "Event has been sent!";
});

Route::get('/posts/{id}', 'PostController@show');

Route::get('storage-link', function () {
    Artisan::call('storage:link');
});

Route::get('cache-link', function () {
    Artisan::call('config:clear');
});

Route::get('migrate', function () {
    Artisan::call('migrate');
    return dd("Very Good, My Friends, DIos te Bendiga!!!");
});
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//Route::post('login', 'Auth\LoginController@login');
Route::post('login', 'Admin\AuthController@login');
Route::post('logout', 'Admin\AuthController@logout')->name('logout');



// Registration Routes...

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');




Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/home/my-tokens', 'HomeController@getTokens')->name('personal-tokens');
    Route::get('/home/my-clients', 'HomeController@getClients')->name('personal-clients');
    Route::get('/home/authorized-clients', 'HomeController@getAuthorizedClients')->name('authorized-clients'); 
  
});
