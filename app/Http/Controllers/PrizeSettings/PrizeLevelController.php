<?php

/**
 * Prize Levels
 * @author lawrence
 */

namespace App\Http\Controllers;

use App\Models\Series;

class PrizeLevelController extends AdminBaseController {

    protected $modelName = 'App\Models\PrizeLevel';

    protected function beforeRender() {
        parent::beforeRender();
        $aLotteryTypes = baseOption('base.lottery.type');
        $aSeries = Series::getSelectSearchArrays();
        $this->setVars(compact('aSeries', 'aLotteryTypes'));
    }

}