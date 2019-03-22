<?php

/**
 * 投注限额
 *
 * @author loren
 */

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\Series;
use App\Models\Lottery;
use App\Models\SeriesWay;
use App\Models\SeriesWayLimit;
use App\Models\WayGroup;
use App\Models\WayGroupWay;

class SeriesWayLimitController extends AdminBaseController {

    protected $modelName = 'App\Models\SeriesWayLimit';
    protected $customViewPath = 'lotteries.seriesWayLimit';
    protected $customViews = [
        'batch',
    ];

    protected function beforeRender() {
        parent::beforeRender();
        $aSeries = Series::getSelectSearchArrays()->toArray();
        $this->setVars('aSeries', $aSeries);
        switch ($this->action) {
            case 'batch':
                $aLotteriesTemp = Lottery::doWhere(['status'=>['in',[1,2,3,4]]])->get(['series_id','id','name']);
                $aLotteries = [];
                foreach ($aLotteriesTemp as $v){
                    $aLotteries[$v->series_id][$v->id] =  ___('_lotteries.' . $v->name);
                }
                unset($aLotteriesTemp);

                $aGroupsTemp = WayGroup::doWhere(['terminal_id'=>['=',1],'for_display'=>['=',1],'parent_id'=>['=',null]])->orderBy('sequence','asc')->get(['series_id','id','title']);
                $aGroups = [];
                foreach ($aGroupsTemp as $v){
                    $aGroups[$v->series_id][$v->id] = $v->title;
                }
                $aGroupsTemp = WayGroup::doWhere(['terminal_id'=>['=',1],'for_display'=>['=',1],'parent_id'=>['!=',null]])->orderBy('sequence','asc')->get(['parent_id','id']);
                $aGroupMaps = [];
                foreach ($aGroupsTemp as $v){
                    $aGroupMaps[$v->id] = $v->parent_id;
                }
                unset($aGroupsTemp);

                $aGroupWaysTemp = WayGroupWay::doWhere(['terminal_id'=>['=',1],'for_display'=>['=',1]])->orderBy('sequence','asc')->get(['series_id','group_id','series_way_id','title']);
                $aGroupWays = [];
                foreach ($aGroupWaysTemp as $v){
                    $aGroupWays[$v->series_id][$aGroupMaps[$v->group_id] ?? 0][$v->series_way_id] = $v->title;
                }
                unset($aGroupWaysTemp);
                $this->setVars(compact( 'aLotteries', 'aGroups', 'aGroupWays'));
                break;
            default:
                $aLotteries = Lottery::getModelRelationArrays('series_id', $aSeries,['status','in',[1,2,3,4]]);
                $aSeriesWays = SeriesWay::getModelRelationArrays('series_id', $aSeries);
                $this->setVars(compact('aLotteries', 'aSeriesWays'));
                break;
        }


    }

    public function batch() {
        if ($this->request->method() == 'POST') {
            //return $this->goBack('error', '开发中');
            $input = $this->request->input();
            if($input['merchant_id'] <= 0){
                return $this->goBack('error', ___('_serieswaylimit.merchant-error'));
            }
            if($input['series_id'] <= 0){
                return $this->goBack('error', ___('_serieswaylimit.series-error'));
            }
            if($input['lottery_id'] <= 0){
                return $this->goBack('error', ___('_serieswaylimit.lottery-error'));
            }
            if($input['group_id'] <= 0){
                return $this->goBack('error', ___('_serieswaylimit.group-error'));
            }
            if($input['series_way_id'] < 0){
                return $this->goBack('error', ___('_serieswaylimit.series_way-error'));
            }
            if($input['is_del'] != 1 && $input['prize'] <= 0){
                return $this->goBack('error', ___('_serieswaylimit.prize-error'));
            }
            $this->model->getConnection()->beginTransaction();
            if(SeriesWayLimit::batch($input)){
                $this->model->getConnection()->commit();
                return $this->goBackToIndex('success', ___('_serieswaylimit.batch-success'));
            }else{
                $this->model->getConnection()->rollback();
                return $this->goBack('error', ___('_serieswaylimit.batch-failed'));
            }
        } else {
            return $this->render();
        }
    }
}