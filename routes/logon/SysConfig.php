<?php

#系统设置管理
$sPrefix = 'sys-configs';
Route::group(['prefix' => $sPrefix], function () use ($sPrefix) {
    // $resource = 'sys-configs';
    $sController = 'SysConfigController@';
    Route::get(              '/', ['as' => $sPrefix . '.index',     'uses' => $sController . 'index']);
    Route::get(       'settings', ['as' => $sPrefix . '.settings',  'uses' => $sController . 'settings']);
    Route::any(   'create/{id?}', ['as' => $sPrefix . '.create',    'uses' => $sController . 'create']);
    Route::get(      '{id}/view', ['as' => $sPrefix . '.view',      'uses' => $sController . 'view']);
    Route::any(      '{id}/edit', ['as' => $sPrefix . '.edit',      'uses' => $sController . 'edit']);
    Route::delete('{id}/destory', ['as' => $sPrefix . '.destroy',   'uses' => $sController . 'destroy']);
    Route::post(     'set-order', ['as' => $sPrefix . '.set-order', 'uses' => $sController . 'setOrder']);
    Route::any('set-value/{id?}', ['as' => $sPrefix . '.set-value', 'uses' => $sController . 'setValue']);
});
