<?php

/**
 * 操作确认窗口配置
 */
$sPrefix = 'popups';
Route::group(['prefix' => $sPrefix], function () use ($sPrefix) {
    $sController = 'PopupController@';
    Route::get('/', ['as' => $sPrefix . '.index', 'uses' => $sController . 'index']);
    Route::any('create/{id?}', ['as' => $sPrefix . '.create', 'uses' => $sController . 'create']);
    Route::any('{id}/edit', ['as' => $sPrefix . '.edit', 'uses' => $sController . 'edit']);
    Route::get('{id}/view', ['as' => $sPrefix . '.view', 'uses' => $sController . 'view']);
    Route::delete('{id}/destory', ['as' => $sPrefix . '.destroy', 'uses' => $sController . 'destroy']);

});
