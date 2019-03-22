<?php

/**
 * 提現申請表
 */
$sUrlDir = 'withdraws';
Route::group(['prefix' => $sUrlDir], function () {

    $sResource = 'withdraws';
    $sController = 'WithdrawController';
    Route::get('/', ['as' => $sResource . '.index', 'uses' => $sController . '@' . 'index']);
    Route::any('/create/{id?}', ['as' => $sResource . '.create', 'uses' => $sController . '@' . 'create']);
    Route::any('{id}/edit', ['as' => $sResource . '.edit', 'uses' => $sController . '@' . 'edit']);
    Route::get('{id}/view', ['as' => $sResource . '.view', 'uses' => $sController . '@' . 'view']);
    Route::any('destory/{id?}', ['as' => $sResource . '.destroy', 'uses' => $sController . '@' . 'destroy']);
    Route::any('verify/{id?}', ['as' => $sResource . '.verify', 'uses' => $sController . '@' . 'verify']);
    Route::any('finish/{id?}', ['as' => $sResource . '.finish', 'uses' => $sController . '@' . 'finish']);
    Route::any('refuse/{id?}', ['as' => $sResource . '.refuse', 'uses' => $sController . '@' . 'refuse']);

});
