<?php
/**
 * 登录
 */
Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    $sController = 'AuthController@';
    Route::get('logout', ['as' => 'logout', 'uses' => $sController . 'getLogout']);
    Route::match(['get', 'post'], 'login', ['as' => 'login', 'uses' => $sController . 'login']);

});

