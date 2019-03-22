<?php

/**
 * 日投注报表
 * @author lawrence
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Report\BaseReportController;

use App\Models\Lottery;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;

class UserMonthReportController extends BaseReportController {

    protected static $aSelectColumn = [];
    protected static $aHideColumn = [ 'issue', 'user_id' ];
    protected static $aShowBtn = [
        'params_key' => [ 'date', 'user_id' ],// uri/key1/key2
        'uri'        => '',
    ];
    protected static $aRelationBtn = [
    ];
    protected static $aSearchCon = [
        'like'   => [
            [ 'name' => 'username', 'key' => 'username' ],
            [ 'name' => 'prize_group', 'key' => 'prize_group' ],
        ],
        's_date' => [ 'date_type' => 'boot-month' ],
    ];

    /**
     * 列表页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userMonthReport() {
        $oRows = Transaction::selectRaw('DATE_FORMAT(created_at,\'%Y-%m\') as `date`,user_id,sum(amount) as amount ,type_id,issue,issue,merchant_id')->whereIN('type_id', [ 7, 8, 11, 12 ])->groupBy([ 'type_id', 'date', 'user_id' ]);
        $aSearchData = $this->params;
        $oRows = $this->publicCondition($oRows);
        $oRows = $this->searchConditions($oRows, $aSearchData);
        $aRows = $oRows->get()->toArray();// dd(\DB::getQueryLog());
        $aData = $this->setUserDMReportData($aRows);
        $this->setColumnList($aData);

        $this->setBtnVars();

        $this->setVars(compact('aData', 'aSearchData'));

        return view('custom.report.report')->with($this->viewVars);
    }

    /**
     * 详情页
     */
    public function showUserMonthReport($date, $user_id) {
        $oRows = Transaction::selectRaw('DATE_FORMAT(created_at,\'%Y-%m\') as `date`,user_id,sum(amount) as amount ,type_id,issue,merchant_id')->groupBy([ 'type_id', 'date', 'user_id' ])->whereRaw("DATE_FORMAT(created_at,'%Y-%m')='{$date}'")->where('user_id', $user_id);
        $oRows = $this->publicCondition($oRows);
        $oRows = $oRows->get()->toArray();
        $aData = $this->setUserDMReportData($oRows);
        $data = reset($aData);
        $this->setVars('aShowParams', [ 'issue' => $data['issue'] ]);

        return $this->renderShowView($data);
    }

    public function searchConditions($oModel, &$aSearchData) {

        $s_date = $this->params['s_date'] ?? '';
        $username = $this->params['username'] ?? '';
        $prize_group = $this->params['prize_group'] ?? '';
        if($s_date){
            $sThisYearMont = substr($s_date, 0, 7);
            $oModel->whereRaw("DATE_FORMAT(created_at,'%Y-%m')='{$sThisYearMont}'");
        }else{ // 默认查询今天
            $aSearchData['s_date'] = $s_date = substr(today()->toDateString(), 0, 7);
            $oModel->whereRaw("DATE_FORMAT(created_at,'%Y-%m')='{$s_date}'");
        }
        if($username && $prize_group){
            $oModel->with('user')->whereHas('user', function($q) use ($username, $prize_group) {
                $q->where('username', $username)->where('prize_group', $prize_group);
            });
        }else if($username || $prize_group){
            $k = $username ? 'username' : 'prize_group';
            $v = $username ?? $prize_group;
            $oModel->with('user')->whereHas('user', function($q) use ($k, $v) {
                $q->where($k, $v);
            });
        }

        return $oModel;
    }

}