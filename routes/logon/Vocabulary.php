<?php


/**
 * 词汇管理
 */
$sPrefix = 'vocabularies';
Route::group(['prefix' => $sPrefix], function () use ($sPrefix) {
    // $resource = 'vocabularies';
    $sController = 'VocabularyController@';
    Route::get(              '/', ['as' => $sPrefix . '.index',   'uses' => $sController . 'index']);
    Route::get(   'import/{id?}', ['as' => $sPrefix . '.import',  'uses' => $sController . 'import']);
    Route::any(   'create/{id?}', ['as' => $sPrefix . '.create',  'uses' => $sController . 'create']);
    Route::get(      '{id}/view', ['as' => $sPrefix . '.view',    'uses' => $sController . 'view']);
    Route::any(      '{id}/edit', ['as' => $sPrefix . '.edit',    'uses' => $sController . 'edit']);
    Route::delete('{id}/destory', ['as' => $sPrefix . '.destroy', 'uses' => $sController . 'destroy']);
});
