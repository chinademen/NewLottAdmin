<?php
/**
 * Created by PhpStorm.
 * User: lawrence
 * Date: 6/22/18
 * Time: 4:11 PM
 */

namespace App\Models;

use App\Models\WayGroup;
use App\Models\WayGroupWay;

class WayGroupObservers{

    public function deleted(WayGroup $model){
        $aWhere = [ 'group_id' => $model->id ];
        WayGroupWay::where($aWhere)->delete();
    }
}