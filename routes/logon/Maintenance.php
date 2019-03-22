<?php

/**
 * 系统维护
 */
$sUrlDir = 'maintenances';
Route::group(['prefix' => $sUrlDir], function () {

    $sResource = 'maintenances';
    $sController = 'MaintenanceController';
    Route::get( 'make-issues-cache', [ 'as' => $sResource . '.make-issues-cache', 'uses' => $sController . '@' . 'makeIssueListForBet' ] );
});

