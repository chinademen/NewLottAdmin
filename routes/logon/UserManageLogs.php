<?php

/**
 * 用户管理日志
 */
$sUrlDir = 'user-manage-logs';
Route::group(['prefix' => $sUrlDir], function () {

    $sResource = 'user-manage-logs';
    $sController = 'UserManageLogsController';
    Route::get( '/', [ 'as' => $sResource . '.index', 'uses' => $sController . '@' . 'index' ] );
    Route::get( '{id}/view', [ 'as' => $sResource . '.view', 'uses' => $sController . '@' . 'view' ] );

});
