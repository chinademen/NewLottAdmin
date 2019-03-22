<?php

/**
 * Way Group Ways
 * @author lawrence
 */

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\SeriesWay;
use App\Models\Terminal;
use App\Models\WayGroup;

class WayGroupWayController extends AdminBaseController{

    protected $modelName = 'App\Models\WayGroupWay';

    protected function beforeRender(){
        parent::beforeRender();
        $aTerminals = Terminal::getSelectSearchArrays();
        $aSeries = Series::getSelectSearchArrays();
        $aGroups = WayGroup::getModelRelationArrays(['id','title','series_id'],$aSeries);
        $aSeriesWays = SeriesWay::getModelRelationArrays('series_id',$aSeries);
        $aIstrue = baseOption('base.isTrue');
        $this->setVars(compact('aTerminals', 'aSeries','aGroups','aSeriesWays','aIstrue'));
    }

}