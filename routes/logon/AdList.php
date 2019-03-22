<?php

/**
 * 广告管理
 */
$sUrlDir = 'ad-lists';
Route::group(['prefix' => $sUrlDir], function () {

    $sResource = 'ad-lists';
    $sController = 'AdListController';
    Route::get( '/', [ 'as' => $sResource . '.index', 'uses' => $sController . '@' . 'index' ] );
    Route::any( '/create/{id?}', [ 'as' => $sResource . '.create', 'uses' => $sController . '@' . 'create' ] );
    Route::any( '{id}/edit', [ 'as' => $sResource . '.edit', 'uses' => $sController . '@' . 'edit' ] );
    Route::get( '{id}/view', [ 'as' => $sResource . '.view', 'uses' => $sController . '@' . 'view' ] );
    Route::any( 'destory/{id?}', [ 'as' => $sResource . '.destroy', 'uses' => $sController . '@' . 'destroy' ] );
    Route::any( 'publish/{id}', [ 'as' => $sResource . '.publish', 'uses' => $sController . '@' . 'publish' ] );
    Route::any( 'cancel/{id}', [ 'as' => $sResource . '.cancel', 'uses' => $sController . '@' . 'cancel' ] );

});
