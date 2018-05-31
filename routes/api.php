<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//
//Route::middleware('auth:api', 'throttle:rate_limit,1')
//    ->namespace('Api')
//    ->group(function () {
//        Route::get('/user', 'UserController@index');
//    });

Route::namespace('Api')
    ->middleware(['jwt.auth'])
    ->group(function () {
        Route::get('/user', 'UserController@index');
    });

Route::namespace('Api')
    ->group(function () {
        Route::get('/login', 'LoginController@index');
    });
