<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| 路由根据模块独立出单独的文件
| 这样多人协同开发时同时编辑路由，代码不会冲突
|
*/

/**
 * 前台.
 */
Route::get('/', 'HomeController@index')->name('home');

/*
 * 登录注册
 */
Auth::routes();

/*
 * 微信
 */
Route::namespace('Wechat')
    ->as('wechat.')
    ->prefix('wechat')
    ->group(function () {
        include_route_files(__DIR__.'/wechat/');
    });

/*
 * 后台
 */
Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['role:administrator'])
    ->as('admin.')
    ->group(function () {
        include_route_files(__DIR__.'/admin/');
    });
