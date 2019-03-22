<?php

/**
 * 商户关闭彩种
 */
$sUrlDir = 'merchant-lottery-closes';
Route::group(['prefix' => $sUrlDir], function () {

    $sResource = 'merchant-lottery-closes';
    $sController = 'MerchantLotteryCloseController';
    Route::get( '/', [ 'as' => $sResource . '.index', 'uses' => $sController . '@' . 'index' ] );
    Route::any( '/create/{id?}', [ 'as' => $sResource . '.create', 'uses' => $sController . '@' . 'create' ] );
    Route::any( '{id}/edit', [ 'as' => $sResource . '.edit', 'uses' => $sController . '@' . 'edit' ] );
    Route::get( '{id}/view', [ 'as' => $sResource . '.view', 'uses' => $sController . '@' . 'view' ] );
    Route::any( 'destory/{id?}', [ 'as' => $sResource . '.destroy', 'uses' => $sController . '@' . 'destroy' ] );
    Route::any( 'closeLottery', [ 'as' => $sResource . '.closeLottery', 'uses' => $sController . '@' . 'closeLottery' ] );
    Route::any( 'closeWayGroup', [ 'as' => $sResource . '.closeWayGroup', 'uses' => $sController . '@' . 'closeWayGroup' ] );
    Route::any( 'closeSeriesMethod', [ 'as' => $sResource . '.closeSeriesMethod', 'uses' => $sController . '@' . 'closeSeriesMethod' ] );
    Route::any( 'closeSeriesWay', [ 'as' => $sResource . '.closeSeriesWay', 'uses' => $sController . '@' . 'closeSeriesWay' ] );

});
