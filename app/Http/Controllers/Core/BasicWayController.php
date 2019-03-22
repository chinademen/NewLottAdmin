<?php

/**
 * 基础投注方式
 * @author lawrence
 */

namespace App\Http\Controllers;

use App\Models\Series;

class BasicWayController extends AdminBaseController{

    protected $modelName = 'App\Models\BasicWay';

    protected function beforeRender(){
        parent::beforeRender();
        $aLotteryTypes = baseOption('base.lottery.type');
        $this->setVars(compact('aLotteryTypes'));
    }

}