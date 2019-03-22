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
use App\Models\User;
use Carbon\Carbon;

class MerchantsMonthReportController extends BaseReportController {

    protected static $aSelectColumn = [ 'way_id' => 'aSeriesWay' ];
    protected static $aHideColumn = [ 'merchant_id', 'user_ids' ];
    protected static $aShowBtn = [
        'params_key' => [ 'date', 'merchant_id', 'way_id' ],// uri/key1/key2
        'uri'        => '',
    ];
    protected static $aRelationBtn = [
        /*'name' => 'Issue Bet Report', 'uri' => 'IssueBetReport.issueBetReport',
        'params_key' => [ 'issue'=>'issue' ], // uri/key=$data[value]*/
    ];
    protected static $aSearchCon = [
        'like'   => [
            [ 'name' => 'way_id', 'key' => 'way_id', 'tip' => '请输入投注方式id' ],
        ],
        's_date' => [ 'date_type' => 'boot-month' ],
        /* 'e_date'        => [ 'date_type' => 'boot-day' ],*/
    ];

    /**
     * 列表页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function merchantsMonthReport() {
        $oRows = Transaction::selectRaw('DATE_FORMAT(created_at,\'%Y-%m\') as `date`,user_id,sum(amount) as amount ,type_id,merchant_id,way_id')->with('merchant')->whereIN('type_id', [ 7, 8, 11, 12 ])->where('merchant_id', '>', 0)->groupBy([ 'type_id', 'date', 'way_id', 'merchant_id' ]);
        $aSearchData = $this->params;
        $oRows = $this->publicCondition($oRows);
        $oRows = $this->searchConditions($oRows, $aSearchData);
        $aRows = $oRows->get()->toArray();// dd(\DB::getQueryLog());
        $aData = $this->setMerchantsReportData($aRows);
        $this->setColumnList($aData);

        $this->setBtnVars();

        $aLottery = Lottery::getSelectSearchArrays();
        $aSeries = Series::getSelectSearchArrays();
        $aSeriesWay = SeriesWay::getModelRelationArrays('series_id', $aSeries)->map(function($item, $key) {
            return 'id:'.$key.' - '.$item;
        });
        $this->setVars(compact('aData', 'aSearchData', 'aLottery', 'aSeriesWay'));

        return view('custom.report.report')->with($this->viewVars);
    }

    /**
     * 详情页
     */
    public function showMerchantsMonthReport($date, $merchant_id, $way_id) {
        $oRows = Transaction::selectRaw('DATE_FORMAT(created_at,\'%Y-%m\') as `date`,user_id,sum(amount) as amount ,type_id,merchant_id,way_id')->with('merchant')->groupBy([ 'type_id', 'date', 'way_id', 'merchant_id' ])->whereRaw("DATE_FORMAT(created_at,'%Y-%m')='{$date}'")->where('merchant_id', $merchant_id)->where('way_id', $way_id);
        $oRows = $this->publicCondition($oRows);
        $oRows = $oRows->get();
        $aData = $this->setMerchantsReportData($oRows);
        $data = reset($aData);

        /* $this->setVars('aShowParams',['issue'=>$data['issue']]);*/

        return $this->renderShowView($data);
    }

    public function searchConditions($oModel, &$aSearchData) {
        $s_date = $this->params['s_date'] ?? '';
        $merchant = $this->params['merchant'] ?? '';
        $way_id = $this->params['way_id'] ?? '';
        if($s_date){
            $sThisYearMont = substr(Carbon::parse($s_date)->toDateString(), 0, 7);
            $oModel->whereRaw("DATE_FORMAT(created_at,'%Y-%m')='{$sThisYearMont}'");
        }else{ // 默认查询今天
            $aSearchData['s_date'] = $s_date = substr(today()->toDateString(), 0, 7);
            $oModel->whereRaw("DATE_FORMAT(created_at,'%Y-%m')='{$s_date}'");
        }
        if($merchant){
            $oModel->with('merchant')->whereHas('merchant', function($q) use ($merchant) {
                $q->where('name', $merchant);
            });
        }
        if($way_id) $oModel->where('way_id', $way_id);

        return $oModel;
    }

}