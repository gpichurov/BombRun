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


    Route::get('/login/facebook', 'Auth\AuthController@redirectToProvider');
    Route::get('/login/facebookcallback', 'Auth\AuthController@handleProviderCallback');

    Route::get('/settings', 'UsersController@index');
    Route::post('/settings/name', 'UsersController@updateName');
    Route::post('/settings/password', 'UsersController@updatePassword');
    Route::post('/settings/avatar', 'UsersController@updateAvatar');
    Route::get('profile/{id}', 'UsersController@show');

    Route::resource('/shop', 'ItemController');
    Route::post('/shop/buy/{id}', 'ItemController@buy');

    Route::resource('/statistics', 'StatisticsController');

    Route::get('/game', 'GameController@index');
    Route::post('/game', 'GameController@receive');
});

Route::group(['middleware' => ['web']], function () {
    Route::auth();
    Route::get('/admin', 'AdminController@index');
    Route::resource('/shop/admin', 'ItemController');
    Route::post('/shop/admin/buy/{id}', 'ItemController@buy');

});



Route::get('images/small/{filename}', function ($filename)
{
    return Image::make(storage_path() . '/app/itemImages/small/' . $filename)->response();
});

Route::get('images/big/{filename}', function ($filename)
{
    return Image::make(storage_path() . '/app/itemImages/big/' . $filename)->response();
});

Route::get('avatar/small/{filename}', function ($filename)
{
    return Image::make(storage_path() . '/app/avatarImages/small/' . $filename)->response();
});

Route::get('profile/avatar/big/{filename}', function ($filename)
{
    return Image::make(storage_path() . '/app/avatarImages/big/' . $filename)->response();
});