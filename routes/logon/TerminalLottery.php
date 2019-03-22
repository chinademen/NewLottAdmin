<?php

/**
 * Terminal Lotteries
 */
$sUrlDir = 'terminal-lotteries';
Route::group(['prefix' => $sUrlDir], function () {

    $sResource = 'terminal-lotteries';
    $sController = 'TerminalLotteryController';
    Route::get( '/', [ 'as' => $sResource . '.index', 'uses' => $sController . '@' . 'index' ] );
    Route::any( '/create/{id?}', [ 'as' => $sResource . '.create', 'uses' => $sController . '@' . 'create' ] );
    Route::any( 'destory/{id?}', [ 'as' => $sResource . '.destroy', 'uses' => $sController . '@' . 'destroy' ] );

});
