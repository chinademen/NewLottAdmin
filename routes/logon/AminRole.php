<?php
/**
 * 管理员角色管理
 */
$sPrefix = 'admin-roles';
Route::group(['prefix' => $sPrefix], function () use ($sPrefix) {
    // $resource = 'roles';
    $sController = 'AdminRoleController@';
    Route::get(                 '/', ['as' => $sPrefix . '.index',       'uses' => $sController . 'index']);
    Route::any(      'create/{id?}', ['as' => $sPrefix . '.create',      'uses' => $sController . 'create']);
    Route::get(         '{id}/view', ['as' => $sPrefix . '.view',        'uses' => $sController . 'view']);
    Route::any(         '{id}/edit', ['as' => $sPrefix . '.edit',        'uses' => $sController . 'edit']);
    Route::delete(   '{id}/destroy', ['as' => $sPrefix . '.destroy',     'uses' => $sController . 'destroy']);
    Route::any(   'bind-user/{id?}', ['as' => $sPrefix . '.bind-user',   'uses' => $sController . 'bindUser']);
    Route::get(  '{id}/view-rights', ['as' => $sPrefix . '.view-rights', 'uses' => $sController . 'viewRights']);
    Route::any(   '{id}/set-rights', ['as' => $sPrefix . '.set-rights',  'uses' => $sController . 'setRights']);
    Route::post(        'set-order', ['as' => $sPrefix . '.set-order',   'uses' => $sController . 'setOrder']);
});

