<?php
$sPrefix = 'audit-types';
Route::group(['prefix' => $sPrefix], function () use ($sPrefix) {
    $controller = 'AuditTypeController@';
    Route::get(           '/', ['as' => $sPrefix . '.index',   'uses' => $controller . 'index']);
    Route::any('create/{id?}', ['as' => $sPrefix . '.create',  'uses' => $controller . 'create']);
    Route::get(   '{id}/view', ['as' => $sPrefix . '.view',    'uses' => $controller . 'view']);
    Route::any(   '{id}/edit', ['as' => $sPrefix . '.edit',    'uses' => $controller . 'edit']);
    Route::delete(     '{id}', ['as' => $sPrefix . '.destroy', 'uses' => $controller . 'destroy']);
});