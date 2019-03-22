<?php

/**
 * 投注限额
 */
$sUrlDir = 'series-way-limits';
Route::group(['prefix' => $sUrlDir], function () {

    $sResource = 'series-way-limits';
    $sController = 'SeriesWayLimitController';
    Route::get( '/', [ 'as' => $sResource . '.index', 'uses' => $sController . '@' . 'index' ] );
    Route::any( '/create/{id?}', [ 'as' => $sResource . '.create', 'uses' => $sController . '@' . 'create' ] );
    Route::any( '{id}/edit', [ 'as' => $sResource . '.edit', 'uses' => $sController . '@' . 'edit' ] );
    Route::get( '{id}/view', [ 'as' => $sResource . '.view', 'uses' => $sController . '@' . 'view' ] );
    Route::any( 'destory/{id?}', [ 'as' => $sResource . '.destroy', 'uses' => $sController . '@' . 'destroy' ] );
    Route::any( '/batch', [ 'as' => $sResource . '.batch', 'uses' => $sController . '@' . 'batch' ] );
});
