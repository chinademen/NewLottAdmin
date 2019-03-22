<?php

/**
 * Account
 */
$sUrlDir = 'accounts';
Route::group(['prefix' => $sUrlDir], function () {

    $sResource = 'accounts';
    $sController = 'AccountController';
    Route::get( '/', [ 'as' => $sResource . '.index', 'uses' => $sController . '@' . 'index' ] );
    Route::any( '/create/{id?}', [ 'as' => $sResource . '.create', 'uses' => $sController . '@' . 'create' ] );
    Route::any( '{id}/edit', [ 'as' => $sResource . '.edit', 'uses' => $sController . '@' . 'edit' ] );
    Route::get( '{id}/view', [ 'as' => $sResource . '.view', 'uses' => $sController . '@' . 'view' ] );
    Route::any( 'destory/{id?}', [ 'as' => $sResource . '.destroy', 'uses' => $sController . '@' . 'destroy' ] );
    Route::get( '/download', [ 'as' => $sResource . '.download', 'uses' => $sController . '@' . 'download' ] );
});
