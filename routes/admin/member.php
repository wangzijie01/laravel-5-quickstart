<?php
/**
 * Created by PhpStorm.
 * User: cnsecer
 * Date: 2018/5/30
 * Time: 17:25
 */

Route::resource('member', 'MemberController', ['except' => [
    'create', 'store',
]]);