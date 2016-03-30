<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


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

Route::group(['middleware' => ['web']], function () {

    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');

});

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('auth/logout', 'Auth\AuthController@getLogout');

    Route::get('/', function () {
        return view('dashboard.dashboard');
    });

    Route::get('profil', 'Profil\ProfilController@index');

    Route::resource('script', 'Script\ScriptController');
});



