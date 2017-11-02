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
    return view('welcome');
});

Route::get('/home','HomeController@index')->name('home');

Auth::routes();


Route::namespace('Admin')
    ->middleware(['auth'])
    ->as('admin.')
    ->prefix('admin')
    ->group(function () {
    Route::get('/','DashboardController@index')->name('dashboard');
});
