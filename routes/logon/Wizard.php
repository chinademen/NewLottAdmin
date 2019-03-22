<?php

$sPrefix = 'wizard';
Route::group(['prefix' => $sPrefix], function () use ($sPrefix) {
    $sController = 'WizardController@';

    Route::any('new-model', ['as' => $sPrefix . '.index', 'uses' => $sController . 'newModel']);
});
