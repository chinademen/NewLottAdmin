<?php

Route::group(['prefix' => 'test'], function () {
    $sController = 'TestController@';
    Route::get('/', ['as' => 'test.index', 'uses' => $sController . 'index']);
});
