<?php

/**
 * SysModelColumn管理
 */
$sPrefix = 'sys-model-columns';
Route::group(['prefix' => $sPrefix], function () use ($sPrefix) {
    // $resource = 'sys-model-columns';
    $sController = 'SysModelColumnController@';
    Route::get(              '/', ['as' => $sPrefix . '.index',   'uses' => $sController . 'index']);
    Route::any(         'create', ['as' => $sPrefix . '.create',  'uses' => $sController . 'create']);
    Route::get(      '{id}/view', ['as' => $sPrefix . '.view',    'uses' => $sController . 'view']);
    Route::any(      '{id}/edit', ['as' => $sPrefix . '.edit',    'uses' => $sController . 'edit']);
    Route::delete('{id}/destory', ['as' => $sPrefix . '.destroy', 'uses' => $sController . 'destroy']);
});
