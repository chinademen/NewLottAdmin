<?php
    /**
 * Search管理
 */
$sPrefix = 'search-configs';
Route::group(['prefix' => $sPrefix], function () use ($sPrefix) {
    // $resource = 'search-configs';
    $sController = 'SearchConfigController@';
    Route::get(               '/', ['as' => $sPrefix . '.index',   'uses' => $sController . 'index']);
    Route::get(           '/list', ['as' => $sPrefix . '.list' , 'uses' => $sController . 'listSearchConfig']);
    Route::any(    'create/{id?}', ['as' => $sPrefix . '.create',  'uses' => $sController . 'create']);
    Route::get(       '{id}/view', ['as' => $sPrefix . '.view',    'uses' => $sController . 'view']);
    Route::any(       '{id}/edit', ['as' => $sPrefix . '.edit',    'uses' => $sController . 'edit']);
    Route::delete( '{id}/destroy', ['as' => $sPrefix . '.destroy', 'uses' => $sController . 'destroy']);
});
