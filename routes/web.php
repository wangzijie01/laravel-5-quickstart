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
 * 前台.
 */
Route::get('/', 'HomeController@index')->name('home');

/*
 * Auth
 */
Auth::routes();

/*
 * 微信
 */
Route::namespace('Wechat')
    ->as('wechat.')
    ->prefix('wechat')
    ->group(function () {
        Route::any('/', 'WechatController@serve')->name('serve');
    });

/*
 * 后台
 */
Route::namespace('Admin')
    ->middleware(['role:administrator'])
    ->as('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::any('upload', 'UploadController@index')->name('upload');
        Route::resource('user', 'UserController');
        Route::resource('member', 'MemberController', ['except' => [
            'create', 'store',
        ]]);
        Route::resource('article', 'ArticleController', ['except' => [
            'show'
        ]]);
    });
