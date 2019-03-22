<?php

/**
 * Way Group Ways
 */
$sUrlDir = 'way-group-ways';
Route::group(['prefix' => $sUrlDir], function () {

    $sResource = 'way-group-ways';
    $sController = 'WayGroupWayController';
    Route::get( '/', [ 'as' => $sResource . '.index', 'uses' => $sController . '@' . 'index' ] );
    Route::any( '/create/{id?}', [ 'as' => $sResource . '.create', 'uses' => $sController . '@' . 'create' ] );
    Route::any( '{id}/edit', [ 'as' => $sResource . '.edit', 'uses' => $sController . '@' . 'edit' ] );
    Route::get( '{id}/view', [ 'as' => $sResource . '.view', 'uses' => $sController . '@' . 'view' ] );
    Route::any( 'destory/{id?}', [ 'as' => $sResource . '.destroy', 'uses' => $sController . '@' . 'destroy' ] );
    Route::any('set-order', ['as' => $sResource . '.set-order', 'uses' => $sController . '@' . 'setOrder']);
});
