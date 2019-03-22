<?php

/**
 * 系列
 */
$sUrlDir = 'series';
Route::group(['prefix' => $sUrlDir], function () {

    $sResource = 'series';
    $sController = 'SeriesController';
    Route::get( '/', [ 'as' => $sResource . '.index', 'uses' => $sController . '@' . 'index' ] );
    Route::any( '/create/{id?}', [ 'as' => $sResource . '.create', 'uses' => $sController . '@' . 'create' ] );
    Route::any( '{id}/edit', [ 'as' => $sResource . '.edit', 'uses' => $sController . '@' . 'edit' ] );
    Route::get( '{id}/view', [ 'as' => $sResource . '.view', 'uses' => $sController . '@' . 'view' ] );
    Route::any( 'destory/{id?}', [ 'as' => $sResource . '.destroy', 'uses' => $sController . '@' . 'destroy' ] );
    Route::any( 'create-lottery/{id?}', [ 'as' => $sResource . '.create-lottery', 'uses' => $sController . '@' . 'createLotteryFromSeries' ] );
});
