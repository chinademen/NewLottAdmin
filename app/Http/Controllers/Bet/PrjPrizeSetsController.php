<?php

/**
 * 注单的中奖设置
 *
 * @author loren
 */

namespace App\Http\Controllers;


class PrjPrizeSetsController extends AdminBaseController {

    protected $modelName = 'App\Models\PrjPrizeSets';

    protected function beforeRender() {
        parent::beforeRender();
    }

}