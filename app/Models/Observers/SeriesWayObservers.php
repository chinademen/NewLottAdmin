<?php
/**
 * Created by PhpStorm.
 * User: lawrence
 * Date: 6/22/18
 * Time: 4:11 PM
 */

namespace App\Models;


class SeriesWayObservers{

    public function deleted(SeriesWay $model){
        $aWhere = [ 'series_way_id' => $model->id ];
        WayGroupWay::where($aWhere)->delete();
    }
}