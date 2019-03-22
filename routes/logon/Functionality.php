<?php

/**
 * 功能管理
 */
$sPrefix = 'functionalities';
Route::group(['prefix' => $sPrefix], function () use ($sPrefix) {
    $sController = 'FunctionalityController@';
    Route::get('/', ['as' => $sPrefix . '.index', 'uses' => $sController . 'index']);
    Route::any('create/{id?}', ['as' => $sPrefix . '.create', 'uses' => $sController . 'create']);
    Route::get('{id}/view', ['as' => $sPrefix . '.view', 'uses' => $sController . 'view']);
    Route::any('{id}/edit', ['as' => $sPrefix . '.edit', 'uses' => $sController . 'edit']);
    Route::delete('{id}/destory', ['as' => $sPrefix . '.destroy', 'uses' => $sController . 'destroy']);
    Route::post('set-order', ['as' => $sPrefix . '.set-order', 'uses' => $sController . 'setOrder']);
    Route::get('update-relations', ['as' => $sPrefix . '.update-relations', 'uses' => $sController . 'updateRelations']);
    Route::get('auto-sub-functinalities/{id?}', ['as' => $sPrefix . '.auto-sub-functinalities', 'uses' => $sController . 'createSubFunctionalities']);
    Route::get('export-functionality', array('as' => $sPrefix . '.export-functionality', 'uses' => $sController . 'exportFunctionality'));
});
