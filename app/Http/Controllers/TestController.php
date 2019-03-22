<?php
/**
 * Created by PhpStorm.
 * User: damon
 * Date: 1/24/16
 * Time: 6:06 PM
 */
namespace App\Http\Controllers;

use App\Services\ServiceFactory;
use App\Services\ActRule;

use DB;
use Auth;
use App\Models\Menu;
use Config;

class TestController extends Controller{

    public function index() {
        echo ___('_model.' . $resourceName);
        exit;
//        echo md5('123123');exit;
//        $ruleClass = new ActRule();
//        for($i=1;$i<10;$i++){
//            $ret = $ruleClass->rule('admin','test','all',1,5);
//            print_r($ret);
//        }
//        exit;
//
//        \Redis::set('test','12312412352');
//        echo \Redis::get('test');
//        \Redis::del('test');
//        echo \Redis::get('test');
//        echo 6;
//        exit;


        $service = ServiceFactory::getService('test');
        echo $service->test();
        echo 'in test controller';
        exit;
    }
}