<?php
/**
 * 审核管理
 */
$sPrefix = 'audit-lists';
Route::group(['prefix' => $sPrefix], function ()  use ($sPrefix) {
    $controller = 'AuditListController@';
    Route::get( '/', array('as' => $sPrefix . '.index', 'uses' => $controller . 'index'  ));
    Route::get( '{id}/audit', array('as' => $sPrefix . '.audit', 'uses' => $controller . 'audit'));
    Route::get('{id}/reject', array('as' => $sPrefix . '.reject', 'uses' => $controller . 'reject'));
    Route::get('{id}/cancel', array('as' => $sPrefix . '.cancel', 'uses' => $controller . 'cancel'));
});