<?php

/**
 * 投注方式与玩法关系
 * @author lawrence
 */

namespace App\Http\Controllers;

use App\Models\BasicWay;
use App\Models\Series;
use App\Models\SeriesMethod;

class SeriesWayMethodController extends AdminBaseController {

    protected $modelName = 'App\Models\SeriesWayMethod';
    protected $customViewPath = 'custom.seriesWayMethod';
    protected $customViews = [
        'create', 'edit',
    ];

    protected function beforeRender() {
        parent::beforeRender();
        $aSeries = Series::getSelectSearchArrays();
        $aLotteryTypes = baseOption('base.lottery.type');
        $aIsTrue = baseOption('base.isTrue');
        switch($this->action){
            case 'create':
                $iSeries_id = $this->viewVars['series_id'] ?? null;
                $aWheres = $iSeries_id ? [ 'series_id' => $iSeries_id ] : [];
                $aSeriesMethods = SeriesMethod::getModelRelationArrays('series_id' ,$aSeries,$aWheres);
                $aWheres = ( $iSeries_id && $oSeries = Series::find($iSeries_id) ) ? [ 'lottery_type' => $oSeries->type ] : [];
                $aBasicWays = BasicWay::getModelRelationArrays( 'lottery_type' ,$aLotteryTypes,$aWheres);
                break;
            case 'edit':
                $oSeries = $this->model->series;
                $aConditions = [ 'series_id' => $this->model->series_id ];
                $aSeriesMethods = SeriesMethod::where($aConditions)->get([ 'id', 'name' ])
                    ->mapWithKeys(function($item) use ($oSeries) {
                        return [ $item['id'] => $oSeries->name.'-'.$item['name'] ];
                    });

                $aBasicWays = BasicWay::where([ 'lottery_type' => $oSeries->type ])
                    ->get([ 'id', 'lottery_type', 'name' ])
                    ->mapWithKeys(function($item) use ($oSeries) {
                        return [ $item['id'] => $oSeries['name'].'-'.$item['name'] ];
                    })->toArray();
                //dd($oSeries,$aConditions,$aSeriesMethods,SeriesMethod::where($aConditions)->get([ 'id', 'name' ])->toArray());
                break;
            default:
                $aBasicWays = BasicWay::getModelRelationArrays('lottery_type',$aLotteryTypes);
                break;
        }
        $this->setVars(compact('aSeries', 'aBasicWays', 'aIsTrue', 'aSeriesMethods'));
    }

}