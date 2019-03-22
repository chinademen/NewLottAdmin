<?php
/**
 * Created by PhpStorm.
 * User: lawrence
 * Date: 6/22/18
 * Time: 4:11 PM
 */

namespace App\Models;

use App\Models\BasicMethod;
use App\Models\PrizeDetail;
use App\Models\PrizeLevel;
use App\Models\SeriesMethod;

class BasicMethodObservers{

    public function deleted(BasicMethod $basicMethod){
        $aWhere = ['basic_method_id'=>$basicMethod->id];
        SeriesMethod::where($aWhere)->delete();
        PrizeDetail::where(['method_id'=>$basicMethod->id])->delete();
        PrizeLevel::where(['basic_method_id'=>$basicMethod->id])->delete();
    }
}