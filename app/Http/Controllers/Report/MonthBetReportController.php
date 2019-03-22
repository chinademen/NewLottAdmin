<?php

/**
 * 日投注报表
 * @author lawrence
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Report\BaseReportController;

use App\Models\Transaction;

use Carbon\Carbon;
use Redirect;

class MonthBetReportController extends BaseReportController {

    protected static $aHideColumn = [ 'user_id' ];
    protected static $aShowBtn = [
        'params_key' => [ 'date' ],
        'uri'        => '',
    ];
    protected static $aRelationBtn = [
        'name'       => 'Month Lottery Report', 'uri' => 'MonthLotteryReport.monthLotteryReport',
        'params_key' => [ 'month' => 'date' ],
    ];
    protected static $aSearchCon = [
        's_date' => [ 'date_type' => 'boot-month' ],
    ];
    /**
     * echart图标配置
     * @var array
     */
    protected static $aChart = [
        'chart' => true, 'magicType' => 'bar',
    ];

    /**
     * 列表页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function monthBetReport() {
        $oRows = Transaction::selectRaw('DATE_FORMAT(created_at,\'%Y-%m\') as `date`,user_id,count(0) as bets,sum(amount) as amount ,type_id,merchant_id')->whereIN('type_id', [ 7, 8, 11, 12 ])->groupBy([ 'type_id', 'date', 'user_id' ]);
        $aSearchData = $this->params;
        $oRows = $this->publicCondition($oRows);
        $oRows = $this->searchConditions($oRows, $aSearchData);
        $aRows = $oRows->get(); //dd(\DB::getQueryLog());
        $aData = $this->setBetReportData($aRows);
        $this->setColumnList($aData);
        $this->setBtnVars();
        self::$aChart['data'] = $this->getChartData($aData);
        if(count($aData) < 5){
            self::$aChart['magicType'] = 'bar';
        }else{
            self::$aChart['magicType'] = 'line';
        }
        $aCharts = self::$aChart;//dd($aCharts);
        $this->setVars(compact('aData', 'aSearchData', 'aCharts'));

        return view('custom.report.report')->with($this->viewVars);
    }

    /**
     * 详情页
     */
    public function showMonthBetReport($month) {
        $oRows = Transaction::selectRaw('DATE_FORMAT(created_at,\'%Y-%m\') as `date`,user_id,count(0) as bets,sum(amount) as amount ,type_id,merchant_id')->groupBy([ 'type_id', 'user_id' ])->whereRaw("DATE_FORMAT(created_at,'%Y-%m') ='$month'");
        $oRows = $this->publicCondition($oRows);
        $oRows = $oRows->get();
        $aData = $this->setBetReportData($oRows);
        $data = reset($aData);
        foreach($data as $column => $v){
            if(in_array($column, static::$aHideColumn)){
                unset($data[ $column ]);
            }
        }
        $this->setVars('aShowParams', [ $data['date'] ]);

        return $this->renderShowView($data);

    }

    public function searchConditions($oRows, &$aSearchData) {

        $aSearchData['s_date'] = $s_date = $this->params['s_date'] ?? '';
        //搜索条件
        if($s_date){
            $oRows->whereRaw("DATE_FORMAT(created_at,'%Y-%m')='{$s_date}'");
        }else{
            $aSearchData['s_date'] = $sThisYearMont = substr(today()->toDateString(), 0, 7);
            $oRows->whereRaw("DATE_FORMAT(created_at,'%Y-%m')='{$sThisYearMont}'");
        }

        return $oRows;
    }

}