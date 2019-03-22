<?php

/**
 * 基础玩法
 * @author lawrence
 */

namespace App\Http\Controllers;

use App\Models\BasicMethod;
use App\Models\Lottery;
use App\Models\MethodType;
use App\Models\Series;

class BasicMethodController extends AdminBaseController {

    protected $modelName = 'App\Models\BasicMethod';

    protected function beforeRender() {
        parent::beforeRender();
        $aLotteryTypes = baseOption('base.lottery.type');
        $aSeries = Series::getSelectSearchArrays();
        $aDigitalCounts = BasicMethod::getSelectSearchArrays([ 'digital_count', 'digital_count' ]);
        $aMethodTypes = MethodType::get([ 'id', 'name', 'lottery_type' ])->mapWithKeys(function($item) use ($aLotteryTypes) {
            return [ $item['id'] => $aLotteryTypes[ $item['lottery_type'] ].'-'.$item['name'] ];
        })->toArray();
        $aIsTrue = baseOption('base.isTrue');
        $this->setVars(compact('aLotteryTypes', 'aSeries', 'aDigitalCounts', 'aMethodTypes', 'aIsTrue'));
    }

}