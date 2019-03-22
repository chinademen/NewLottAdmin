<?php

/**
 * users
 */
$sUrlDir = 'users';
Route::group(['prefix' => $sUrlDir], function () {

    $sResource = 'users';
    $sController = 'UserController';
    Route::get( '/', [ 'as' => $sResource . '.index', 'uses' => $sController . '@' . 'index' ] );
    Route::any( '/create/{id?}', [ 'as' => $sResource . '.create', 'uses' => $sController . '@' . 'create' ] );
    Route::any( '{id}/edit', [ 'as' => $sResource . '.edit', 'uses' => $sController . '@' . 'edit' ] );
    Route::get( '{id}/view', [ 'as' => $sResource . '.view', 'uses' => $sController . '@' . 'view' ] );
    Route::any( 'destory/{id?}', [ 'as' => $sResource . '.destroy', 'uses' => $sController . '@' . 'destroy' ] );
    Route::any( '{id}/blocked-user', [ 'as' => $sResource . '.blocked-user', 'uses' => $sController . '@' . 'blockedUser' ] );
    Route::any( '{id}/reset-password', [ 'as' => $sResource . '.reset-password', 'uses' => $sController . '@' . 'resetPassword' ] );

});
