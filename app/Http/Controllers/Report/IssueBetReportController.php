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

class IssueBetReportController extends BaseReportController {

    protected static $aShowBtn = [
        'params_key' => [ 'issue' ],
        'uri'        => '',
    ];
    protected static $aRelationBtn = [
        'name'       => 'Projects', 'uri' => 'projects.index',
        'params_key' => [ 'serial_number' => 'serial_number' ],
    ];
    protected static $aSearchCon = [
        'select_column' => [ [ 'name' => 'lottery_id', 'key' => 'lottery_id', 'data' => 'aLottery' ] ],
        'like'          => [ [ 'name' => 'issue', 'key' => 'issue' ] ],
        's_range'       => [ 'key' => 'amount', 'data_key' => 's_amount' ],
        'e_range'       => [ 'key' => 'amount', 'data_key' => 'e_amount' ],
        's_date'        => [ 'date_type' => 'boot-day' ],
        'e_date'        => [ 'date_type' => 'boot-day' ],
    ];
    protected static $aSelectColumn = [ 'lottery_id' => 'aLottery' ];

    /**
     * 列表页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function issueBetReport() {
        //TODO  DATE_FORMAT(created_at,\'%Y-%m-%d\') as `date` 没有用处
        $oRows = Transaction::with('oIssue')->selectRaw('DATE_FORMAT(created_at,\'%Y-%m-%d\') as `date`,user_id ,type_id,lottery_id ,issue,amount,serial_number,merchant_id')->whereIN('type_id', [ 7, 8, 11, 12 ])->where('issue', '>', 0);
        $oRows = $this->publicCondition($oRows);
        $oRows = $this->searchConditions($oRows);
        if(get_class($oRows) != 'LaravelArdent\Ardent\Builder') return $oRows;
        $aRows = $oRows->get();
        $aData = $this->setIssueBetData($aRows); //dd($aRows->toArray(),\DB::getQueryLog());
        $this->setColumnList($aData);
        $this->setBtnVars();
        $aLottery = Lottery::getSelectSearchArrays();
        //dd($this->request->all());
        $this->setVars(compact('aData', 'aLottery'));

        return view('custom.report.report')->with($this->viewVars);
    }

    /**
     * 详情页
     */
    public function showIssueBetReport($issue) {
        //TODO  DATE_FORMAT(created_at,\'%Y-%m-%d\') as `date` 没有用处
        $oRows = Transaction::with('oIssue')->selectRaw('DATE_FORMAT(created_at,\'%Y-%m-%d\') as `date`,user_id ,type_id,lottery_id ,issue,amount,serial_number,merchant_id')->whereIssue($issue);
        $oRows = $this->publicCondition($oRows);
        $oRows = $oRows->get();
        $aData = $this->setIssueBetData($oRows);
        $data = reset($aData); //dd($data);
        $this->setVars('aShowParams', [ 'serial_number' => $data['serial_number'] ]);

        return $this->renderShowView($data);
    }

    public function searchConditions($oRows) {
        $aSearchData = $this->params;
        $aSearchData['s_date'] = $s_date = $this->params['s_date'] ?? '';
        $aSearchData['e_date'] = $e_date = $this->params['e_date'] ?? '';
        $aSearchData['lottery_id'] = $lottery_id = $this->params['lottery_id'] ?? '';
        $aSearchData['issue'] = $issue = $this->params['issue'] ?? '';
        $aSearchData['s_amount'] = $s_range = $this->params['s_range'] ?? '';
        $aSearchData['e_amount'] = $e_range = $this->params['e_range'] ?? '';
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
            $aSearchData['s_date'] = $s_date = today()->toDateString();
            $oRows->whereDate('created_at', $s_date);
        }
        if($issue) $oRows->where('issue', 'like', '%'.$issue.'%');

        if($lottery_id) $oRows->where([ 'lottery_id' => $lottery_id ]);

        if($s_range) $oRows->where('amount', '>=', $s_range);

        if($e_range) $oRows->where('amount', '<=', $e_range);
        $this->setVars('aSearchData', $aSearchData);

        return $oRows;
    }

}