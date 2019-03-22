<?php
/**
 * Created by PhpStorm.
 * User: lawrence
 * Date: 6/22/18
 * Time: 4:11 PM
 */

namespace App\Models;



use App\Models\Lottery;
use App\Models\SearchItem;


class LotteriesObservers{

    public function deleted(Lottery $model){
        $aWhere = ['lottery_id'=>$model->id];
        LotteryWays::where($aWhere)->delete();
    }
}