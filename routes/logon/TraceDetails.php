<?php

/**
 * 追号详情
 */
$sUrlDir = 'trace-details';
Route::group(['prefix' => $sUrlDir], function () {

    $sResource = 'trace-details';
    $sController = 'TraceDetailsController';
    Route::get( '/', [ 'as' => $sResource . '.index', 'uses' => $sController . '@' . 'index' ] );
    Route::get( '{id}/view', [ 'as' => $sResource . '.view', 'uses' => $sController . '@' . 'view' ] );

});
