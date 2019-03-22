<?php

/**
 * 域名管理
 */
$sPrefix = 'domains';
Route::group(['prefix' => $sPrefix], function () use ($sPrefix) {
    $controller = 'DomainController@';
    Route::get( '/', array('as' => $sPrefix . '.index', 'uses' => $controller . 'index'));
    Route::any( 'create', array('as' => $sPrefix . '.create', 'uses' => $controller . 'create'));
    Route::get('{id}/view', array('as' => $sPrefix . '.view' , 'uses' => $controller . 'view'   ));
    Route::any('{id}/edit', array('as' => $sPrefix . '.edit', 'uses' => $controller . 'edit')); // ->before('not.self');
    Route::any( 'destory/{id?}', array('as' => $sPrefix . '.destroy', 'uses' => $controller . 'destroy')); // ->before('not.self');
});
