<?php

/**
 * 奖期
 */
$sUrlDir = 'issues';
Route::group(['prefix' => $sUrlDir], function () {

    $sResource = 'issues';
    $sController = 'IssueController';
    Route::get( '/', [ 'as' => $sResource . '.index', 'uses' => $sController . '@' . 'index' ] );

    //页面顶部操作
    Route::any( 'generate', [ 'as' => $sResource . '.generate', 'uses' => $sController . '@' . 'generate' ] );
    Route::any( 'batch-delete', [ 'as' => $sResource . '.batch-delete', 'uses' => $sController . '@' . 'batchDelete' ] );
    Route::any( 'batch-calculate/{lottery_id?}', [ 'as' => $sResource . '.batch-calculate', 'uses' => $sController . '@' . 'setCalculateBatch' ] );

    //列表操作
    Route::get( '{id}/view', [ 'as' => $sResource . '.view', 'uses' => $sController . '@' . 'view' ] );
    Route::any( 'set-calculate/{id?}', [ 'as' => $sResource . '.set-calculate', 'uses' => $sController . '@' . 'setCalculate' ] );
    Route::any( 'set-cancel/{id?}', [ 'as' => $sResource . '.set-cancel', 'uses' => $sController . '@' . 'setCancel' ] );

    //左侧菜单
    Route::any( 'encode/{lottery_id?}', [ 'as' => $sResource . '.encode', 'uses' => $sController . '@' . 'encode' ] );
    Route::any( 'issue-operate', [ 'as' => $sResource . '.issue-operate', 'uses' => $sController . '@' . 'issueOperate' ] );
});