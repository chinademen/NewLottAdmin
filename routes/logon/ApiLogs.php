<?php

/**
 * 商户API日志
 */
$sUrlDir = 'api-logs';
Route::group(['prefix' => $sUrlDir], function () {

    $sResource = 'api-logs';
    $sController = 'ApiLogsController';
    Route::get( '/', [ 'as' => $sResource . '.index', 'uses' => $sController . '@' . 'index' ] );
    Route::get( '{id}/view', [ 'as' => $sResource . '.view', 'uses' => $sController . '@' . 'view' ] );

});
