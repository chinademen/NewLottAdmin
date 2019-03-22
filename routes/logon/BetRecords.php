<?php

/**
 * 注单详情
 */
$sUrlDir = 'bet-records';
Route::group(['prefix' => $sUrlDir], function () {

    $sResource = 'bet-records';
    $sController = 'BetRecordsController';
    Route::get( '/', [ 'as' => $sResource . '.index', 'uses' => $sController . '@' . 'index' ] );
    Route::get( '{id}/view', [ 'as' => $sResource . '.view', 'uses' => $sController . '@' . 'view' ] );

});
