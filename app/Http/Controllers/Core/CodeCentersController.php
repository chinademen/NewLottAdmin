<?php

/**
 * 开奖中心配置
 *
 * @author loren
 */

namespace App\Http\Controllers;


class CodeCentersController extends AdminBaseController {

    protected $modelName = 'App\Models\CodeCenters';

    protected function beforeRender() {
        parent::beforeRender();
    }

}