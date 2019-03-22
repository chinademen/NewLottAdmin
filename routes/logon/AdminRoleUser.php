<?php
/**
 * 管理员, 角色关联关系管理
 */
$sPrefix = 'admin-role-users';
Route::group(['prefix' => $sPrefix], function () use ($sPrefix) {
    $sController = 'AdminRoleUserController@';
    Route::get('/', ['as' => $sPrefix . '.index', 'uses' => $sController . 'index']);
    Route::any('create/{role_id?}', ['as' => $sPrefix . '.create', 'uses' => $sController . 'create']);
    Route::get('{id}/view', ['as' => $sPrefix . '.view', 'uses' => $sController . 'view']);
    Route::delete('{id}/destroy', ['as' => $sPrefix . '.destroy', 'uses' => $sController . 'destroy']);
});