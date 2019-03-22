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

class DayBetReportController extends BaseReportController {

    protected static $aHideColumn = [ 'user_id' ];
    protected static $aShowBtn = [
        'params_key' => [ 'date' ],
        'uri'        => '',
    ];
    protected static $aRelationBtn = [
        'name'       => 'Day Lottery Report', 'uri' => 'DayLotteryReport.dayLotteryReport',
        'params_key' => [ 's_date' => 'date' ],
    ];
    protected static $aSearchCon = [
        's_date' => [ 'date_type' => 'boot-day' ],
        'e_date' => [ 'date_type' => 'boot-day' ],
    ];

    /**
     * echart图标配置
     * @var array
     */
    protected static $aChart = [
        'chart' => true, 'magicType' => 'line', 'data' => [],
    ];

    /**
     * 列表页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dayBetReport() {
        $aSearchData = $this->params;
        $oRows = Transaction::selectRaw('DATE_FORMAT(created_at,\'%Y-%m-%d\') as `date`,user_id,count(0) as bets,sum(amount) as amount ,type_id,merchant_id')->whereIN('type_id', [ 7, 8, 11, 12 ])->groupBy([ 'type_id', 'date', 'user_id' ]);
        $oRows = $this->publicCondition($oRows);
        $oRows = $this->searchConditions($oRows, $aSearchData);
        if(get_class($oRows) != 'LaravelArdent\Ardent\Builder') return $oRows;
        $aRows = $oRows->get();
        $aData = $this->setBetReportData($aRows); //dd($aData,\DB::getQueryLog());
        $this->setColumnList($aData);
        $this->setBtnVars();
        // dd($aData);
        self::$aChart['data'] = $this->getChartData($aData);// dd($aChartData);
        if(count($aData) < 5){
            static::$aChart['magicType'] = 'bar';
        }else{
            self::$aChart['magicType'] = 'line';
        }
        $aCharts = self::$aChart;
        $this->setVars(compact('aColumnForList', 'aTotals', 'resource', 'aData', 'aSearchData', 'aCharts'));

        return view('custom.report.report')->with($this->viewVars);
    }

    /**
     * 详情页
     */
    public function showDayBetReport($date) {
        $oRows = Transaction::selectRaw('DATE_FORMAT(created_at,\'%Y-%m-%d\') as `date`,user_id,count(0) as bets,sum(amount) as amount ,type_id,merchant_id')->groupBy([ 'type_id', 'user_id' ])->whereDate('created_at', $date);
        $oRows = $this->publicCondition($oRows);
        $oRows = $oRows->get();

        //dd($oRows,\DB::getQueryLog());
        $aData = $this->setBetReportData($oRows);
        $data = reset($aData);

        $this->setVars('aShowParams', [ 'date' => $data['date'] ]);

        return $this->renderShowView($data);

    }

    // 搜索条件
    public function searchConditions($oRows, &$aSearchData) {

        $aSearchData['s_date'] = $s_date = $this->params['s_date'] ?? '';
        $aSearchData['e_date'] = $e_date = $this->params['e_date'] ?? '';
        //搜索条件
        if($s_date && $e_date){
            if(Carbon::parse($s_date)->diffInDays($e_date) > 30){
                return $this->goBack('error', ___('_report.the date must be less than 30 days'));
            }
            $oRows->whereRaw("DATE_FORMAT(created_at,'%Y-%m-%d')>='{$s_date}'");
            $oRows->whereRaw("DATE_FORMAT(created_at,'%Y-%m-%d')<='{$e_date}'");
        }else if($s_date || $e_date){
            $p_date = $s_date ?? $e_date;// 只出传入一个参数 ,查询当天
            $oRows->whereRaw("DATE_FORMAT(created_at,'%Y-%m-%d')='{$p_date}'");
        }else{
            $aSearchData['s_date'] = today()->toDateString();
            $oRows->whereDate('created_at', today()->toDateString());
        }

        return $oRows;
    }

}