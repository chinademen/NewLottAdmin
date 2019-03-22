<?php
/**
 * Server 版本的API接口路由
 */

Route::group([], function () {
    Route::match(array('GET', 'POST'), '/service', ['as'   => 'api.service', 'uses' => function() {
        App\Server\ApiService::doService();
    }]);
});
