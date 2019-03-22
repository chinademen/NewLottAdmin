<?php

/**
 * 管理员操作日志
 */

namespace App\Http\Controllers;


use DB;
use Auth;
use App\Models\Menu;
use config;

class AdminLogController extends AdminBaseController {

    protected $modelName = 'App\Models\AdminLog';

}