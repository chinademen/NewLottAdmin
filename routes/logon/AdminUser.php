<?php
/**
 * 管理员管理
 */
$sPrefix = 'admin-users';
Route::group(['prefix' => $sPrefix], function () use ($sPrefix) {
    // $resource = 'users';
    $sController = 'AdminUserController@';
    Route::get('/', ['as' => $sPrefix . '.index', 'uses' => $sController . 'index']);
    Route::any('create/{id?}', ['as' => $sPrefix . '.create', 'uses' => $sController . 'create']);
    Route::any('{id}/view', ['as' => $sPrefix . '.view', 'uses' => $sController . 'view']);
    Route::any('{id}/edit', ['as' => $sPrefix . '.edit', 'uses' => $sController . 'edit']);
    Route::delete('{id?}/destory', ['as' => $sPrefix . '.destroy', 'uses' => $sController . 'destroy']);
    Route::any('change-password', ['as' => $sPrefix . '.change-password', 'uses' => $sController . 'changePassword']);
    Route::any('{id}/reset-password', ['as' => $sPrefix . '.reset-password', 'uses' => $sController . 'resetPassword']);
    Route::any('profile', ['as' => $sPrefix . '.profile', 'uses' => $sController . 'profile']);
});
