<?php

/**
 * 菜单管理
 */
$sPrefix = 'menus';
Route::group(['prefix' => $sPrefix], function () use ($sPrefix) {
    $sController = 'MenuController@';
    Route::get(              '/', ['as' => $sPrefix . '.index',     'uses' => $sController . 'index']);
    Route::any(   'create/{id?}', ['as' => $sPrefix . '.create',    'uses' => $sController . 'create']);
    Route::get(      '{id}/view', ['as' => $sPrefix . '.view',      'uses' => $sController . 'view']);
    Route::any(      '{id}/edit', ['as' => $sPrefix . '.edit',      'uses' => $sController . 'edit']);
    Route::delete('{id}/destory', ['as' => $sPrefix . '.destroy',   'uses' => $sController . 'destroy']);
    Route::post(     'set-order', ['as' => $sPrefix . '.set-order', 'uses' => $sController . 'setOrder']);
});
