<?php

/**
 * 文件上传记录
 */
$sUrlDir = 'file-processes';
Route::group(['prefix' => $sUrlDir], function () {

    $sResource = 'file-processes';
    $sController = 'FileProcessController';
    Route::get('/', ['as' => $sResource . '.index', 'uses' => $sController . '@' . 'index']);
    Route::any('/create/{id?}', ['as' => $sResource . '.create', 'uses' => $sController . '@' . 'create']);
    Route::any('{id}/edit', ['as' => $sResource . '.edit', 'uses' => $sController . '@' . 'edit']);
    Route::get('{id}/view', ['as' => $sResource . '.view', 'uses' => $sController . '@' . 'view']);
    Route::any('destory/{id?}', ['as' => $sResource . '.destroy', 'uses' => $sController . '@' . 'destroy']);
    Route::any('upload/{sub_dir?}', ['as' => $sResource . '.upload', 'uses' => $sController . '@' . 'upload']);
    Route::any('ueditor-dispatch-server', ['as' => $sResource . '.dispatch-server', 'uses' => $sController . '@' . 'ueditorDispatchServer']);

});
