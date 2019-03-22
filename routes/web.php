<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
 * 加载必须要登录才可访问的路由
 */

Route::group(['middleware' => ['auth', 'checkForceChangePwd']], function () {
    $sController = 'HomeController@';
    Route::get('/', ['as' => 'admin.home', 'uses' => $sController . 'getHome']);
    Route::get('dashboard', ['as' => 'admin.dashboard', 'uses' => $sController . 'getDashboard']);
    //Route::get('dashboard2', ['as' => 'admin.dashboard2', 'uses' => $sController . 'getDashboard2']);

    loadRoutes(Config::get('route.logon'));
});

/*
 * 加载不需要登录即可访问的路由
 */
loadRoutes(Config::get('route.nonlogon'));

function loadRoutes($sPath) {
    $aRouteFiles = glob($sPath . '*.php');
    foreach ($aRouteFiles as $sRouteFile) {
        include($sRouteFile);
    }
    unset($aRouteFiles);
}

