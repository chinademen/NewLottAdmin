<?php

/**
 * 警报/实时通知
 */
$sUrlDir = 'alarms';
Route::group(['prefix' => $sUrlDir], function () {

    $sResource = 'alarms';
    $sController = 'AlarmController';
    Route::get( '/', [ 'as' => $sResource . '.index', 'uses' => $sController . '@' . 'index' ] );
    Route::any( '{id}/edit', [ 'as' => $sResource . '.edit', 'uses' => $sController . '@' . 'edit' ] );
    Route::get( '{id}/view', [ 'as' => $sResource . '.view', 'uses' => $sController . '@' . 'view' ] );
    Route::get( 'get-alarm-data', [ 'as' => $sResource . '.get-alarm-data', 'uses' => $sController . '@' . 'getAlarmData' ] );
    Route::get( 'update-alarm-audio', [ 'as' => $sResource . '.update-alarm-audio', 'uses' => $sController . '@' . 'updateAlarmAudio' ] );

});
