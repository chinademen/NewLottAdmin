<?php

/**
 * User Prize Set
 */
$sUrlDir = 'user-prize-sets';
Route::group(['prefix' => $sUrlDir], function () {

    $sResource = 'user-prize-sets';
    $sController = 'UserPrizeSetController';
    Route::get( '/', [ 'as' => $sResource . '.index', 'uses' => $sController . '@' . 'index' ] );
    Route::any( '{id}/edit', [ 'as' => $sResource . '.edit', 'uses' => $sController . '@' . 'edit' ] );
    Route::get( '{id}/view', [ 'as' => $sResource . '.view', 'uses' => $sController . '@' . 'view' ] );
    Route::any( 'destory/{id?}', [ 'as' => $sResource . '.destroy', 'uses' => $sController . '@' . 'destroy' ] );

});
