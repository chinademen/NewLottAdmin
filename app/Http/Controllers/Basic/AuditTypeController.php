<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminBaseController;

use DB;
use Auth;
use App\Models\Menu;
use config;

class AuditTypeController extends AdminBaseController {

    protected $modelName = 'App\Models\AuditType';
    protected $resource  = 'audit-types';

}