<?php
/**
 * Account管理
 */
$sPrefix = 'dictionaries';
Route::group(['prefix' => $sPrefix], function () use ($sPrefix) {
    // $resource = 'dictionaries';
    $sController = 'DictionaryController@';
    Route::get(                              '/', ['as' => $sPrefix . '.index',              'uses' => $sController . 'index']);
    Route::match(['get', 'post'], 'create/{id?}', ['as' => $sPrefix . '.create',             'uses' => $sController . 'create']);
    Route::get(                      '{id}/view', ['as' => $sPrefix . '.view',               'uses' => $sController . 'view']);
    Route::match( ['get', 'put'],    '{id}/edit', ['as' => $sPrefix . '.edit',               'uses' => $sController . 'edit']);
    Route::delete(                '{id}/destroy', ['as' => $sPrefix . '.destroy',            'uses' => $sController . 'destroy']);
    Route::get(                 'generate/{id?}', ['as' => $sPrefix . '.generate',           'uses' => $sController . 'generate']);
    Route::get(                   'generate-all', ['as' => $sPrefix . '.generate-all',       'uses' => $sController . 'generateAll']);
    Route::get(             'create-from-models', ['as' => $sPrefix . '.create-from-models', 'uses' => $sController . 'createFromModels']);
    Route::get(                   'import-files', ['as' => $sPrefix . '.import-from-files',  'uses' => $sController . 'importFromFiles']);
});
