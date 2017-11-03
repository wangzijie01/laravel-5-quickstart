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

/**
 * 前台
 */
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home','HomeController@index')->name('home');
Route::get('/test','TestController@index')->name('test');


/**
 * Auth
 */
Auth::routes();


/**
 * 后台
 */
Route::namespace('Admin')
  //  ->middleware(['role:administrator'])
    ->as('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/','DashboardController@index')->name('dashboard');
        Route::resource('/user','UserController');
});
