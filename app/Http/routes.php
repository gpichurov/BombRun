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

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    });

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::get('/settings', 'UsersController@index');
    Route::post('/settings/name', 'UsersController@updateName');
    Route::post('/settings/password', 'UsersController@updatePassword');
});

Route::group(['middleware' => 'web'], function () {

    Route::get('/login/facebook', 'Auth\AuthController@redirectToProvider');
    Route::get('/login/facebookcallback', 'Auth\AuthController@handleProviderCallback');

});
