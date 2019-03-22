<?php
$sPrefix = 'functionality-relations';
Route::group(['prefix' => $sPrefix], function () use ($sPrefix) {
    // $resource = 'functionality-relations';
    $sController = 'FunctionalityRelationController@';
    Route::get(               '/', ['as' => $sPrefix . '.index',     'uses' => $sController . 'index']);
    Route::any(    'create/{id?}', ['as' => $sPrefix . '.create',    'uses' => $sController . 'create']);
    Route::get(       '{id}/view', ['as' => $sPrefix . '.view',      'uses' => $sController . 'view']);
    Route::any(       '{id}/edit', ['as' => $sPrefix . '.edit',      'uses' => $sController . 'edit']);
    Route::delete( '{id}/destroy', ['as' => $sPrefix . '.destroy',   'uses' => $sController . 'destroy']);
    Route::post(      'set-order', ['as' => $sPrefix . '.set-order', 'uses' => $sController . 'setOrder']);
});
