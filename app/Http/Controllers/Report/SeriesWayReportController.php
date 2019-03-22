<?php

/**
 * 日投注报表
 * @author lawrence
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Report\BaseReportController;

use App\Models\Lottery;
use App\Models\Series;
use App\Models\SeriesWay;
use App\Models\Transaction;
use Carbon\Carbon;

class SeriesWayReportController extends BaseReportController {

    protected static $aSelectColumn = [ 'way_id' => 'aSeriesWay' ];
    protected static $aShowBtn = [
        'params_key' => [ 'date', 'way_id' ],// uri/key1/key2
        'uri'        => '',
    ];
    protected static $aRelationBtn = [
        /*'name' => 'Issue Bet Report', 'uri' => 'IssueBetReport.issueBetReport',
        'params_key' => [ 'lottery_id'=>'lottery_id' ], // uri/key=$data[value]*/
    ];
    protected static $aSearchCon = [
        /*'select_column'=>['name'=>'SeriesWay','key'=>'way_id','data'=>'aSeriesWay'],*/
        'like'   => [ [ 'name' => 'way_id', 'key' => 'way_id', 'tip' => '请输入投注方式id' ] ],
        's_date' => [ 'date_type' => 'boot-day' ],
        'e_date' => [ 'date_type' => 'boot-day' ],
    ];

    /**
     * 列表页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function seriesWayReport() {
        $oRows = Transaction::selectRaw('DATE_FORMAT(created_at,\'%Y-%m-%d\') as `date`,user_id,count(0) as nums,sum(amount) as amount ,type_id,way_id,merchant_id')->where('way_id', '>', 0)->groupBy([ 'type_id', 'date', 'way_id' ]);
        $aSearchData = $this->params;
        $oRows = $this->publicCondition($oRows);
        $oRows = $this->searchConditions($oRows, $aSearchData);
        if(get_class($oRows) != 'LaravelArdent\Ardent\Builder') return $oRows;
        $aRows = $oRows->get()->toArray();// dd(\DB::getQueryLog());

        $aData = $this->setSeriesWayReportData($aRows);
        $this->setColumnList($aData);
        $this->setBtnVars();
        $aSeries = Series::getSelectSearchArrays();
        $aSeriesWay = SeriesWay::getModelRelationArrays('series_id', $aSeries)->map(function($item, $key) {
            return 'id:'.$key.' - '.$item;
        });
        $this->setVars(compact('aColumnForList', 'aTotals', 'aData', 'aSearchData', 'aSeriesWay'));

        return view('custom.report.report')->with($this->viewVars);
    }

    /**
     * 详情页
     */
    public function showSeriesWayReport($date, $way_id) {
        $oRows = Transaction::selectRaw('DATE_FORMAT(created_at,\'%Y-%m-%d\') as `date`,user_id,count(0) as nums,sum(amount) as amount ,type_id,way_id,merchant_id')->whereIN('type_id', [ 7, 8, 11, 12 ])->groupBy([ 'type_id', 'user_id', 'way_id' ])->whereDate('created_at', $date)->where('way_id', $way_id);
        $oRows = $this->publicCondition($oRows);
        $oRows = $oRows->get();
        $aData = $this->setSeriesWayReportData($oRows);
        $data = reset($aData);

        //$this->setVars('aShowParams',['lottery_id'=>$data['lottery_id']]);
        return $this->renderShowView($data);
    }

    public function searchConditions($oRows, &$aSearchData) {

        $s_date = $this->params['s_date'] ?? '';
        $e_date = $this->params['e_date'] ?? '';
        $way_id = $this->params['way_id'] ?? '';
        if($s_date && $e_date){
            if(Carbon::parse($s_date)->diffInDays($e_date) > 30){
                return $this->goBack('error', ___('_report.the date must be less than 30 days'));
            }
            $oRows->whereRaw("DATE_FORMAT(created_at,'%Y-%m-%d')>='{$s_date}'");
            $oRows->whereRaw("DATE_FORMAT(created_at,'%Y-%m-%d')<='{$e_date}'");
        }else if($s_date || $e_date){
            $p_date = $s_date ?? $e_date;// 只出传入一个参数 ,查询当天
            $oRows->whereRaw("DATE_FORMAT(created_at,'%Y-%m-%d')='{$p_date}'");
        }else{ // 默认查询今天
            $aSearchData['s_date'] = $s_date = today()->toDateString();
            $oRows->whereDate('created_at', $s_date);
        }
        if($way_id){
            $oRows->where('way_id', $way_id);
        }

        return $oRows;
    }

}