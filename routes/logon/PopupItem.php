<?php

/**
 * 弹出窗口输入项配置
 */
$sPrefix = 'popup-items';
Route::group(['prefix' => $sPrefix], function () use ($sPrefix) {
    $sController = 'PopupItemController@';
    Route::get('/', ['as' => $sPrefix . '.index', 'uses' => $sController . 'index']);
    Route::any('create/{id?}', ['as' => $sPrefix . '.create', 'uses' => $sController . 'create']);
    Route::any('{id}/edit', ['as' => $sPrefix . '.edit', 'uses' => $sController . 'edit']);
    Route::get('{id}/view', ['as' => $sPrefix . '.view', 'uses' => $sController . 'view']);
    Route::delete('{id}/destory', ['as' => $sPrefix . '.destroy', 'uses' => $sController . 'destroy']);

});
