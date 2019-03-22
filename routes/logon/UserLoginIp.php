<?php

/**
 * User Login Ip
 */
$sUrlDir = 'user-login-ips';
Route::group(['prefix' => $sUrlDir], function () {

    $sResource = 'user-login-ips';
    $sController = 'UserLoginIpController';
    Route::get( '/', [ 'as' => $sResource . '.index', 'uses' => $sController . '@' . 'index' ] );
    Route::get( '{id}/view', [ 'as' => $sResource . '.view', 'uses' => $sController . '@' . 'view' ] );

});
