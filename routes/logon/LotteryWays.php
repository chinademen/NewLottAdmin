<?php

/**
 * 彩种投注方式
 */
$sUrlDir = 'lottery-ways';
Route::group(['prefix' => $sUrlDir], function () {

    $sResource = 'lottery-ways';
    $sController = 'LotteryWaysController';
    Route::get( '/', [ 'as' => $sResource . '.index', 'uses' => $sController . '@' . 'index' ] );
    Route::any( '/create/{id?}', [ 'as' => $sResource . '.create', 'uses' => $sController . '@' . 'create' ] );
    Route::any( '{id}/edit', [ 'as' => $sResource . '.edit', 'uses' => $sController . '@' . 'edit' ] );
    Route::get( '{id}/view', [ 'as' => $sResource . '.view', 'uses' => $sController . '@' . 'view' ] );
    Route::any( 'destory/{id?}', [ 'as' => $sResource . '.destroy', 'uses' => $sController . '@' . 'destroy' ] );
    Route::get( '{id}/add-black/{terminal}', [ 'as' => $sResource . '.add-black', 'uses' => $sController . '@' . 'addBlackList' ] );
    Route::get( '{id}/remove-black/{terminal}', [ 'as' => $sResource . '.remove-black', 'uses' => $sController . '@' . 'removeBlackList' ] );

    Route::get( '/update/{lottery_id?}', [ 'as' => $sResource . '.update', 'uses' => $sController . '@' . 'updateLotteryWays' ] );
    Route::get( '/empty-black/{lottery_id?}', [ 'as' => $sResource . '.empty-black', 'uses' => $sController . '@' . 'emptyBlackList' ] );
});
