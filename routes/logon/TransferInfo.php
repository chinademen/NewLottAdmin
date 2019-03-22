<?php

/**
 * Transfer Info
 */
$sUrlDir = 'transfer-infos';
Route::group(['prefix' => $sUrlDir], function () {

    $sResource = 'transfer-infos';
    $sController = 'TransferInfoController';
    Route::get( '/', [ 'as' => $sResource . '.index', 'uses' => $sController . '@' . 'index' ] );
    Route::get( '{id}/view', [ 'as' => $sResource . '.view', 'uses' => $sController . '@' . 'view' ] );

});
