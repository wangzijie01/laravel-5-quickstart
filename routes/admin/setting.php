<?php
/**
 * Created by PhpStorm.
 * User: cnsecer
 * Date: 2018/5/30
 * Time: 17:32
 */


Route::resource('setting', 'SettingController', ['only' => [
    'index', 'update',
]]);