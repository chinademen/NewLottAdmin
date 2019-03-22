<?php

/**
 * 奖期告警记录
 */
$sUrlDir = 'issue-warnings';
Route::group(['prefix' => $sUrlDir], function () {

    $sResource = 'issue-warnings';
    $sController = 'IssueWarningsController';
    Route::get( '/', [ 'as' => $sResource . '.index', 'uses' => $sController . '@' . 'index' ] );
    Route::any( '/create/{id?}', [ 'as' => $sResource . '.create', 'uses' => $sController . '@' . 'create' ] );
    Route::any( '{id}/edit', [ 'as' => $sResource . '.edit', 'uses' => $sController . '@' . 'edit' ] );
    Route::get( '{id}/view', [ 'as' => $sResource . '.view', 'uses' => $sController . '@' . 'view' ] );
    Route::any( 'destory/{id?}', [ 'as' => $sResource . '.destroy', 'uses' => $sController . '@' . 'destroy' ] );

    Route::get( '{id}/cancelcode', [ 'as' => $sResource . '.cancelcode', 'uses' => $sController . '@' . 'cancelCode' ] );
    Route::get( '{id}/revisecode', [ 'as' => $sResource . '.revisecode', 'uses' => $sController . '@' . 'reviseCode' ] );
    Route::get( '{id}/advancecode', [ 'as' => $sResource . '.advancecode', 'uses' => $sController . '@' . 'advanceCode' ] );
});