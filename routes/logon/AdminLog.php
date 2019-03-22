<?php

/**
 * 管理员操作日志KfClientController
 */
$sUrlDir = 'admin-logs';
Route::group(['prefix' => $sUrlDir], function () {

    $sResource = 'admin-logs';
    $sController = 'AdminLogController';
    Route::get( '/', [ 'as' => $sResource . '.index', 'uses' => $sController . '@' . 'index' ] );
    Route::get( '{id}/view', [ 'as' => $sResource . '.view', 'uses' => $sController . '@' . 'view' ] );

});
