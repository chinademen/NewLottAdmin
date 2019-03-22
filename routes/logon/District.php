<?php

/**
 * 行政区划管理
 */
$sPrefix = 'districts';
Route::group(['prefix' => $sPrefix], function () use ($sPrefix) {
    $controller = 'DistrictController@';
    Route::get( '/', array('as' => $sPrefix . '.index', 'uses' => $controller . 'index'));
    Route::any( 'create', array('as' => $sPrefix . '.create', 'uses' => $controller . 'create'));
    Route::get('{id}/view', array('as' => $sPrefix . '.view' , 'uses' => $controller . 'view'   ));
    Route::any('{id}/edit', array('as' => $sPrefix . '.edit', 'uses' => $controller . 'edit'));
    Route::any( 'destory/{id?}', array('as' => $sPrefix . '.destroy', 'uses' => $controller . 'destroy'));
    Route::any('generate', array('as' => $sPrefix . '.generate', 'uses' => $controller . 'generateWidget'));
    Route::post('set-order', array('as' => $sPrefix . '.set-order', 'uses' => $controller . 'setOrder'));
});
