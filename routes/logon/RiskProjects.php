<?php

/**
 * 风险注单
 */
$sUrlDir = 'risk-projects';
Route::group(['prefix' => $sUrlDir], function () {

    $sResource = 'risk-projects';
    $sController = 'RiskProjectsController';
    Route::get( '/', [ 'as' => $sResource . '.index', 'uses' => $sController . '@' . 'index' ] );
    Route::get( '{id}/view', [ 'as' => $sResource . '.view', 'uses' => $sController . '@' . 'view' ] );
    Route::get( '{id}/audit', [ 'as' => $sResource . '.audit', 'uses' => $sController . '@' . 'audit' ] );
    Route::post( '{id}/refuse', [ 'as' => $sResource . '.refuse', 'uses' => $sController . '@' . 'setRisk' ] );
});
