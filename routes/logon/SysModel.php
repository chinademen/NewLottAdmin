<?php

/**
 * SysModel管理
 */
$sPrefix = 'sys-models';
Route::group(['prefix' => $sPrefix], function () use ($sPrefix) {
    // $resource = 'sys-models';
    $sController = 'SysModelController@';
    Route::get(              '/', ['as' => $sPrefix . '.index',         'uses' => $sController . 'index']);
    Route::get(  'update-models', ['as' => $sPrefix . '.update-models', 'uses' => $sController . 'updateModels']);
    Route::any(         'create', ['as' => $sPrefix . '.create',        'uses' => $sController . 'create']);
    Route::get(      '{id}/view', ['as' => $sPrefix . '.view' ,         'uses' => $sController . 'view'   ]);
    Route::any(      '{id}/edit', ['as' => $sPrefix . '.edit',          'uses' => $sController . 'edit']);
    Route::delete('{id}/destory', ['as' => $sPrefix . '.destroy',       'uses' => $sController . 'destroy']);
});
