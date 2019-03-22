<?php

/**
 * Transactions
 */
$sUrlDir = 'transactions';
Route::group(['prefix' => $sUrlDir], function () {

    $sResource = 'transactions';
    $sController = 'TransactionController';
    Route::get( '/', [ 'as' => $sResource . '.index', 'uses' => $sController . '@' . 'index' ] );
    Route::get( '{id}/view', [ 'as' => $sResource . '.view', 'uses' => $sController . '@' . 'view' ] );
    Route::get( '/download', [ 'as' => $sResource . '.download', 'uses' => $sController . '@' . 'download' ] );
});
