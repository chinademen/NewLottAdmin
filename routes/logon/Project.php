<?php

/**
 * projects
 */
$sUrlDir = 'projects';
Route::group(['prefix' => $sUrlDir], function () {

    $sResource = 'projects';
    $sController = 'ProjectController';
    Route::get( '/', [ 'as' => $sResource . '.index', 'uses' => $sController . '@' . 'index' ] );
    Route::get( '{id}/view', [ 'as' => $sResource . '.view', 'uses' => $sController . '@' . 'view' ] );
    Route::get( '/download', [ 'as' => $sResource . '.download', 'uses' => $sController . '@' . 'download' ] );
    Route::get( '{id}/drop', [ 'as' => $sResource . '.drop', 'uses' => $sController . '@' . 'drop' ] );

//    Route::get('{id}/resend-prize',['as' => $resource . '.resend-prize','uses' => $controller . 'setPrizeTask']);
//    Route::get('{id}/resend-commission',['as' => $resource . '.resend-commission','uses' => $controller . 'setCommissionTask']);
});
