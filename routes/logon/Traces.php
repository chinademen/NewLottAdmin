<?php

/**
 * 追单
 */
$sUrlDir = 'traces';
Route::group(['prefix' => $sUrlDir], function () {

    $sResource = 'traces';
    $sController = 'TracesController';
    Route::get( '/', [ 'as' => $sResource . '.index', 'uses' => $sController . '@' . 'index' ] );
    Route::get( '{id}/view', [ 'as' => $sResource . '.view', 'uses' => $sController . '@' . 'view' ] );
    Route::get( '{id}/stop', [ 'as' => $sResource . '.stop', 'uses' => $sController . '@' . 'stop' ] );
    Route::get( '{id}/generate', [ 'as' => $sResource . '.generate', 'uses' => $sController . '@' . 'generate' ] );
});
