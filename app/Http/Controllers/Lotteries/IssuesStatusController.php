<?php

/**
 * 奖期状态
 *
 * @author loren
 */

namespace App\Http\Controllers;


class IssuesStatusController extends AdminBaseController {

    protected $modelName = 'App\Models\IssuesStatus';

    protected function beforeRender() {
        parent::beforeRender();
    }

}