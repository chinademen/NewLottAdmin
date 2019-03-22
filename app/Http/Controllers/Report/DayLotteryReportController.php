<?php

/**
 * 日投注报表
 * @author lawrence
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Report\BaseReportController;

use App\Models\Lottery;
use App\Models\Transaction;
use Carbon\Carbon;

class DayLotteryReportController extends BaseReportController {

    protected static $aSelectColumn = [ 'lottery_id' => 'aLottery' ];
    protected static $aShowBtn = [
        'params_key' => [ 'date', 'lottery_id' ],// uri/key1/key2
        'uri'        => '',
    ];
    protected static $aRelationBtn = [
        'name'       => 'Issue Bet Report', 'uri' => 'IssueBetReport.issueBetReport',
        'params_key' => [ 'lottery_id' => 'lottery_id' ], // uri/key=$data[value]
    ];
    protected static $aSearchCon = [
        'select_column' => [ [ 'name' => 'lottery_id', 'key' => 'lottery_id', 'data' => 'aLottery' ] ],
        's_date'        => [ 'date_type' => 'boot-day' ],
        'e_date'        => [ 'date_type' => 'boot-day' ],
    ];

    /**
     * 列表页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dayLotteryReport() {
        $oRows = Transaction::selectRaw('DATE_FORMAT(created_at,\'%Y-%m-%d\') as `date`,user_id,count(0) as nums,sum(amount) as amount ,type_id,lottery_id,merchant_id')->whereIN('type_id', [ 7, 8, 11, 12 ])->groupBy([ 'type_id', 'date', 'user_id', 'lottery_id' ]);
        $aSearchData = $this->params;
        $oRows = $this->publicCondition($oRows);
        $oRows = $this->searchConditions($oRows, $aSearchData);
        if(get_class($oRows) != 'LaravelArdent\Ardent\Builder') return $oRows;
        $aRows = $oRows->get()->toArray();// dd(\DB::getQueryLog());

        $aData = $this->setDMLotteryReportDatas($aRows);
        $this->setColumnList($aData);
        $this->setBtnVars();
        $aLottery = Lottery::getSelectSearchArrays();
        $this->setVars(compact('aColumnForList', 'aTotals', 'aData', 'aSearchData', 'aLottery'));

        return view('custom.report.report')->with($this->viewVars);
    }

    /**
     * 详情页
     */
    public function showDayLotteryReport($month, $lottery_id) {
        $oRows = Transaction::selectRaw('DATE_FORMAT(created_at,\'%Y-%m-%d\') as `date`,user_id,count(0) as bets,sum(amount) as amount ,type_id,lottery_id,merchant_id')->groupBy([ 'type_id', 'user_id', 'lottery_id' ])->whereDate('created_at', $month)->where('lottery_id', $lottery_id);
        $oRows = $this->publicCondition($oRows);
        $oRows = $oRows->get();
        $aData = $this->setDMLotteryReportDatas($oRows);
        $data = reset($aData);
        $this->setVars('aShowParams', [ 'lottery_id' => $data['lottery_id'] ]);

        return $this->renderShowView($data);
    }

    public function searchConditions($oRows, &$aSearchData) {

        $s_date = $this->params['s_date'] ?? '';
        $e_date = $this->params['e_date'] ?? '';
        $lottery_id = $this->params['lottery_id'] ?? '';
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
        if($lottery_id){
            $oRows->where('lottery_id', $lottery_id);
        }

        return $oRows;
    }

}