<?php
/**
 * Created by PhpStorm.
 * User: lawrence
 * Date: 7/30/18
 * Time: 9:43 AM
 */

namespace App\Http\Controllers\Report;

use App\Http\Controllers\AdminBaseController;
use App\Models\Lottery;
use App\Models\Merchant;
use App\Models\Series;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BaseReportController extends AdminBaseController {
    protected $modelName = 'App\Models\Transaction';
    protected $customViewPath = 'custom.report';
    protected $customViews = [ 'report' ];
    protected static $merchantId = null;
    // 列表隐藏字段
    protected static $aHideColumn = [];

    protected static $aSelectColumn = [];
    // 计算总计字段
    protected static $aSumColumn = [ 'BetNumber', 'BetUserNumber', 'BetMoney', 'BonusMoney', 'BetMoneyAvg', 'BetUserAvg', 'ProfitMoney' ];

    // 列表查看按钮 配置
    protected static $aShowBtn = [
        'params_key' => [ 'date', 'lottery_id' ],// uri/key1/key2
        'uri'        => '',
    ];
    // 列表关系按钮 配置
    protected static $aRelationBtn = [
        'name'       => 'One Bet Report', 'uri' => 'OneBetReport.oneBetReport',
        'params_key' => [ 'lottery_id' => 'lottery_id' ], // uri/key=$data[value]
    ];
    // 列表搜索项配置
    protected static $aSearchCon = [
        'id_lottery',
        's_date' => [ 'date_type' => 'boot-day' ],
        'e_date' => [ 'date_type' => 'boot-day' ],
    ];
    protected static $aPublicSearchCon = [
        'select_column' => [
            [ 'name' => 'merchant_id', 'key' => 'merchant_id', 'data' => 'aMerchant' ],
        ],
    ];
    // 默认不使用图表
    protected static $aChart = [
        'chart' => false,
    ];

    public function __construct(Request $request) {
        parent::__construct($request);
        $this->checkAdminUser();
        $this->setVars('buttons', []);
        $this->setVars('sDataUpdatedTime', Carbon::now());
    }

    // 验证是否商户用户登录
    protected function checkAdminUser() {
        if(session('merchant_id')){
            self::$merchantId = session('merchant_id');
        }
    }

    // 公用条件
    protected function publicCondition($oBuilder) {
        if(self::$merchantId){
            $oBuilder->where('merchant_id', self::$merchantId);
        }
        if(!empty($this->params['merchant_id'])){
            $merchant_id = $this->params['merchant_id'];
            $oBuilder->where('merchant_id', $merchant_id);
            $this->setVars('search_merchant_id', $merchant_id);
            $this->setVars('aPublicSearchData', [ 'merchant_id' => $merchant_id ]);
        }
        $oBuilder->where('is_tester', 0);

        return $oBuilder;
    }

    // 设置按钮相关变量&& 设置公用列表页变量
    public function setBtnVars() {
        static::$aShowBtn['uri'] = ucfirst($this->action).'.show'.ucfirst($this->action);
        $aShowBtn = static::$aShowBtn;
        $aRelationBtn = static::$aRelationBtn; //dd($aRelationBtn);
        if(!empty(static::$aSearchCon['select_column'])){
            static::$aSearchCon['select_column'] = array_merge(static::$aPublicSearchCon['select_column'], static::$aSearchCon['select_column']);
        }
        $aSearchCon = array_merge(static::$aPublicSearchCon, static::$aSearchCon);// dd($aSearchCon);
        $sTitle = \MyString::humenlize($this->action);
        $aSelectColumn = static::$aSelectColumn;

        if(self::$merchantId){
            $aMerchant = Merchant::getSelectSearchArrays([ 'id', 'name' ], [ 'id' => self::$merchantId ]);
        }else{
            $aMerchant = Merchant::getSelectSearchArrays(); //dd($aSearchCon);
        }
        $aSumTotal = array_map(function() { return 0; }, array_flip(static::$aSumColumn));
        $this->setVars('merchant_id', self::$merchantId);
        $this->setVars(compact('aSumTotal', 'aShowBtn', 'aRelationBtn', 'aSearchCon', 'sTitle', 'aSelectColumn', 'aMerchant'));
    }

    // 设置列表显示字段
    public function setColumnList($aData) {
        //TODO 没有数据时 aColumnForList 为空数组
        $a_keys = $aData ? array_keys(reset($aData)) : [];
        $aColumnForList = $a_keys ? array_values(array_diff($a_keys, static::$aHideColumn)) : [];
        $aTotals = count($aData);
        $this->setVars('aColumnForList', $aColumnForList);
        $this->setVars('aTotals', $aTotals);

    }

    // 查看视图
    public function renderShowView($data) {
        $sTitle = \MyString::humenlize($this->action);
        $aRelationBtn = static::$aRelationBtn;
        foreach($data as $column => $v){
            if(in_array($column, static::$aHideColumn)){
                unset($data[ $column ]);
            }
        }
        $this->setVars(compact('data', 'sTitle', 'aRelationBtn'));

        return view('custom.report.view')->with($this->viewVars);
    }

    // 日/月投注报表图形统计数据
    public function getChartData($data) {
        if(empty($data)) return [ 'countDate' => '' ];
        $date = array_keys($data);
        $arr = [];
        foreach($data as $r){
            foreach($r as $k => $d){
                $arr[ $k ][] = $d;
            }
        }
        $countDate = reset($date).'至'.end($date);

        return [ 'countDate' => $countDate, 'date' => $date, 'BetNumber' => $arr['BetNumber'], 'BetMoney' => $arr['BetMoney'], 'BonusMoney' => $arr['BonusMoney'], 'BetUserNumber' => $arr['BetUserNumber'] ];
    }

    /**
     * 日/月投注报表数据
     *
     * @param $aRows Transaction根据groupBy(['type_id','date','user_id'])查询的数据
     *
     * @return array 返回视图需要的数据
     */
    protected function setBetReportData($aRows) {
        $aDatas = [];
        foreach($aRows as $r){
            //if(!$r['date']) continue;
            $aDatas[ $r['date'] ]['merchant_id'] = $r['merchant_id'];
            $aDatas[ $r['date'] ]['date'] = $r['date'];
            $aDatas[ $r['date'] ]['BetNumber'] = $aDatas[ $r['date'] ]['BetNumber'] ?? 0;
            $aDatas[ $r['date'] ]['BetUserNumber'] = $aDatas[ $r['date'] ]['BetUserNumber'] ?? 0;
            $aDatas[ $r['date'] ]['BetMoney'] = $aDatas[ $r['date'] ]['BetMoney'] ?? 0;
            $aDatas[ $r['date'] ]['BonusMoney'] = $aDatas[ $r['date'] ]['BonusMoney'] ?? 0;
            switch($r['type_id']){
                case '7':// 投注
                    $aDatas[ $r['date'] ]['BetNumber'] += $r['bets'];
                    $aDatas[ $r['date'] ]['user_id'][] = $r['user_id'];
                    $aDatas[ $r['date'] ]['BetMoney'] += floatval($r['amount']);
                    break;
                case '8':// 撤销投注
                    $aDatas[ $r['date'] ]['BetMoney'] -= floatval($r['amount']);
                    break;
                case '11': // 派奖
                    $aDatas[ $r['date'] ]['BonusMoney'] += floatval($r['amount']);
                    break;
                case '12':
                    $aDatas[ $r['date'] ]['BonusMoney'] -= floatval($r['amount']);
                    break;
            }
            // 活跃用户
            $aDatas[ $r['date'] ]['BetUserNumber'] = count(array_unique($aDatas[ $r['date'] ]['user_id'] ?? []));

            // 总投注额
            $iTotalBet = $aDatas[ $r['date'] ]['BetMoney'];
            // 总派奖
            $iTotalBonus = $aDatas[ $r['date'] ]['BonusMoney'];
            // 负盈利
            $iProfitMoney = $iTotalBonus - $iTotalBet;
            $aDatas[ $r['date'] ]['ProfitMoney'] = $iProfitMoney;

            // 盈利率=(总派奖-总投注额)/总投注额
            if($iProfitMoney > 0 && $iTotalBet > 0){
                $aDatas[ $r['date'] ]['profit'] = ( $iProfitMoney / $iTotalBet * 100 ).'%';
            }else if($iProfitMoney < 0 && $iTotalBet > 0){
                $aDatas[ $r['date'] ]['profit'] = '-'.( abs($iProfitMoney) / $iTotalBet * 100 ).'%';
            }else{
                $aDatas[ $r['date'] ]['profit'] = '0%';
            }

            // 平均注单=投注总额/注单数
            $aDatas[ $r['date'] ]['BetMoneyAvg'] = ( $iTotalBet > 0 && $aDatas[ $r['date'] ]['BetNumber'] ) ? $iTotalBet / $aDatas[ $r['date'] ]['BetNumber'] : 0;

            // 人均注单=投注总额/投注人数
            $aDatas[ $r['date'] ]['BetUserAvg'] = ( $iTotalBet > 0 && $aDatas[ $r['date'] ]['BetUserNumber'] ) ? $iTotalBet / $aDatas[ $r['date'] ]['BetUserNumber'] : 0;
        }

        //dd($aDatas,$aRows);
        return $aDatas;
    }

    /**
     * 日/月彩种报表
     */
    public function setDMLotteryReportDatas($aRows) {

        $aDatas = [];
        $dateTotalBetNum = [];
        foreach($aRows as $r){
            if(!$r['date']) continue;
            $aDatas[ $r['lottery_id'] ][ $r['date'] ]['merchant_id'] = $r['merchant_id'];
            $aDatas[ $r['lottery_id'] ][ $r['date'] ]['date'] = $r['date'];
            $aDatas[ $r['lottery_id'] ][ $r['date'] ]['lottery_id'] = $r['lottery_id'];
            switch($r['type_id']){
                case '7':// 投注
                    $aDatas[ $r['lottery_id'] ][ $r['date'] ]['BetNumber'][] = intval($r['nums']);
                    /*$aDatas[$r['lottery_id']][$r['date']]['user_id'][]=$r['user_id'];*/
                    $aDatas[ $r['lottery_id'] ][ $r['date'] ]['BetMoney'][] = floatval($r['amount']);
                    $dateTotalBetNum[ $r['date'] ][] = intval($r['nums']);
                    break;
                case '8':// 撤销投注
                    $aDatas[ $r['lottery_id'] ][ $r['date'] ]['BetMoney'][] = ( -floatval($r['amount']) );
                    break;
                case '11': // 派奖
                    $aDatas[ $r['lottery_id'] ][ $r['date'] ]['BonusMoney'][] = ( floatval($r['amount']) );
                    break;
                case '12':
                    $aDatas[ $r['lottery_id'] ][ $r['date'] ]['BonusMoney'][] = ( -floatval($r['amount']) );
                    break;
            }
        }

        $dd = array_reduce($aDatas, function($result, $value) {
            return array_merge($result, array_values($value));
        }, array());

        // 统计数据
        foreach($dd as &$d){
            $d['BetNumber'] = array_sum($d['BetNumber'] ?? [ 0 ]);
            $d['BetMoney'] = array_sum($d['BetMoney'] ?? [ 0 ]);
            $d['BonusMoney'] = array_sum($d['BonusMoney'] ?? [ 0 ]);
            $d['ProfitMoney'] = $ProfitMoney = $d['BonusMoney'] - $d['BetMoney'];
            // 盈利率=(总派奖 - 总投注额)/总投注额
            if(( $ProfitMoney ) > 0 && $d['BetMoney'] > 0){
                $d['profit'] = ( ( $ProfitMoney ) / $d['BetMoney'] * 100 ).'%';
            }else if(( $ProfitMoney ) < 0 && $d['BetMoney'] > 0){
                $d['profit'] = '-'.( abs($ProfitMoney) / $d['BetMoney'] * 100 ).'%';
            }else{
                $d['profit'] = '0%';
            }
            if($d['BetNumber'] == 0 || empty($dateTotalBetNum[ $d['date'] ])){
                $d['BetRatio'] = '0%';
            }else{
                $d['BetRatio'] = ( $d['BetNumber'] / array_sum($dateTotalBetNum[ $d['date'] ]) * 100 ).'%';
            }
        }

        return $dd ?? [];
    }

    /**
     * 单期投注报表
     *
     * @param $aRows
     *
     * @return array
     */
    protected function setIssueBetData($aRows) {
        $aDatas = [];
        foreach($aRows as $r){
            $aDatas[ $r['issue'] ]['merchant_id'] = $r['merchant_id'];
            $aDatas[ $r['issue'] ]['issue'] = $r['issue'];
            $aDatas[ $r['issue'] ]['lottery_id'] = $r['lottery_id'];
            $aDatas[ $r['issue'] ]['end_time'] = date('Y-m-d', $r['oIssue']['end_time']);
            $aDatas[ $r['issue'] ]['BetMoney'] = $aDatas[ $r['issue'] ]['BetMoney'] ?? 0;
            $aDatas[ $r['issue'] ]['BonusMoney'] = $aDatas[ $r['issue'] ]['BonusMoney'] ?? 0;
            $aDatas[ $r['issue'] ]['BetNumber'] = $aDatas[ $r['issue'] ]['BetNumber'] ?? 0;
            $aDatas[ $r['issue'] ]['serial_number'] = $r['serial_number'];
            switch($r['type_id']){
                case '7':// 投注
                    $aDatas[ $r['issue'] ]['BetNumber'] += 1;
                    $aDatas[ $r['issue'] ]['BetMoney'] += floatval($r['amount']);
                    break;
                case '8':// 撤销投注
                    $aDatas[ $r['issue'] ]['BetMoney'] -= floatval($r['amount']);
                    break;
                case '11': // 派奖
                    $aDatas[ $r['issue'] ]['BonusMoney'] += floatval($r['amount']);
                    break;
                case '12':
                    $aDatas[ $r['issue'] ]['BonusMoney'] -= floatval($r['amount']);
                    break;
            }
            $iBetMoney = $aDatas[ $r['issue'] ]['BetMoney'];
            $iBonusMoney = $aDatas[ $r['issue'] ]['BonusMoney'];
            $iDiffMoney = $aDatas[ $r['issue'] ]['ProfitMoney'] = $iBonusMoney - $iBetMoney;
            //$aDatas[ $r['issue'] ]['DiffMoney'] = $iDiffMoney = $iBetMoney - $iBonusMoney;//(总投注额-总派奖)

            // 盈利率=(总投注额-总派奖)/总投注额
            if($iDiffMoney > 0 && $iBetMoney > 0){
                $aDatas[ $r['issue'] ]['profit'] = ( $iDiffMoney / $iBetMoney * 100 ).'%';
            }else if($iDiffMoney < 0 && $iBetMoney > 0){
                $aDatas[ $r['issue'] ]['profit'] = '-'.( abs($iDiffMoney) / $iBetMoney * 100 ).'%';
            }else{
                $aDatas[ $r['issue'] ]['profit'] = '0%';
            }
        }

        return $aDatas;
    }

    /**
     * 用户日/月报表
     */
    public function setUserDMReportData($aRows) {
        $aDatas = [];
        foreach($aRows as $r){
            if(!$r['date']) continue;
            $aDatas[ $r['user_id'] ][ $r['date'] ]['merchant_id'] = $r['merchant_id'];
            $aDatas[ $r['user_id'] ][ $r['date'] ]['date'] = $r['date'];
            $aDatas[ $r['user_id'] ][ $r['date'] ]['user_id'] = $r['user_id'];
            $aDatas[ $r['user_id'] ][ $r['date'] ]['username'] = $r['user']['username'];
            $aDatas[ $r['user_id'] ][ $r['date'] ]['prize_group'] = $r['user']['prize_group'];
            $aDatas[ $r['user_id'] ][ $r['date'] ]['issue'] = $r['issue'];

            $aDatas[ $r['user_id'] ][ $r['date'] ]['BetMoney'] = $aDatas[ $r['user_id'] ][ $r['date'] ]['BetMoney'] ?? 0;
            $aDatas[ $r['user_id'] ][ $r['date'] ]['BonusMoney'] = $aDatas[ $r['user_id'] ][ $r['date'] ]['BonusMoney'] ?? 0;
            $aDatas[ $r['user_id'] ][ $r['date'] ]['BetNumber'] = $aDatas[ $r['user_id'] ][ $r['date'] ]['BetNumber'] ?? 0; //注单

            switch($r['type_id']){
                case '7':// 投注
                    $aDatas[ $r['user_id'] ][ $r['date'] ]['BetNumber'] += 1;
                    $aDatas[ $r['user_id'] ][ $r['date'] ]['BetMoney'] += floatval($r['amount']);
                    break;
                case '8':// 撤销投注
                    $aDatas[ $r['user_id'] ][ $r['date'] ]['BetMoney'] -= floatval($r['amount']);
                    break;
                case '11': // 派奖
                    $aDatas[ $r['user_id'] ][ $r['date'] ]['BonusMoney'] += floatval($r['amount']);
                    break;
                case '12':
                    $aDatas[ $r['user_id'] ][ $r['date'] ]['BonusMoney'] -= floatval($r['amount']);
                    break;
            }
            $iBetMoney = $aDatas[ $r['user_id'] ][ $r['date'] ]['BetMoney'];
            $iBonusMoney = $aDatas[ $r['user_id'] ][ $r['date'] ]['BonusMoney'];
            $iDiffMoney = $aDatas[ $r['user_id'] ][ $r['date'] ]['ProfitMoney'] = $iBonusMoney - $iBetMoney;//(总投注额-总派奖)
            // 盈利率=(总投注额-总派奖)/总投注额
            if($iDiffMoney > 0 && $iBetMoney > 0){
                $aDatas[ $r['user_id'] ][ $r['date'] ]['profit'] = ( $iDiffMoney / $iBetMoney * 100 ).'%';
            }else if($iDiffMoney < 0 && $iBetMoney > 0){
                $aDatas[ $r['user_id'] ][ $r['date'] ]['profit'] = '-'.( abs($iDiffMoney) / $iBetMoney * 100 ).'%';
            }else{
                $aDatas[ $r['user_id'] ][ $r['date'] ]['profit'] = '0%';
            }

        }

        $dd = array_reduce($aDatas, function($result, $value) {
            return array_merge($result, array_values($value));
        }, array());

        return $dd ?? [];
    }

    /**
     * 用户日彩种报表
     */
    public function setUserDayLotteryReportData($aRows) {
        $aDatas = [];
        foreach($aRows as $r){
            if(!$r['date']) continue;
            $aDatas[ $r['user_id'] ][ $r['date'] ][ $r['lottery_id'] ]['merchant_id'] = $r['merchant_id'];
            $aDatas[ $r['user_id'] ][ $r['date'] ][ $r['lottery_id'] ]['date'] = $r['date'];
            $aDatas[ $r['user_id'] ][ $r['date'] ][ $r['lottery_id'] ]['lottery_id'] = $r['lottery_id'];
            $aDatas[ $r['user_id'] ][ $r['date'] ][ $r['lottery_id'] ]['user_id'] = $r['user_id'];
            $aDatas[ $r['user_id'] ][ $r['date'] ][ $r['lottery_id'] ]['username'] = $r['user']['username'];
            $aDatas[ $r['user_id'] ][ $r['date'] ][ $r['lottery_id'] ]['prize_group'] = $r['user']['prize_group'];
            //$aDatas[$r['user_id']][$r['date']][$r['lottery_id']]['issue']=$r['issue'];

            $aDatas[ $r['user_id'] ][ $r['date'] ][ $r['lottery_id'] ]['BetMoney'] = $aDatas[ $r['user_id'] ][ $r['date'] ][ $r['lottery_id'] ]['BetMoney'] ?? 0;
            $aDatas[ $r['user_id'] ][ $r['date'] ][ $r['lottery_id'] ]['BonusMoney'] = $aDatas[ $r['user_id'] ][ $r['date'] ][ $r['lottery_id'] ]['BonusMoney'] ?? 0;
            $aDatas[ $r['user_id'] ][ $r['date'] ][ $r['lottery_id'] ]['BetNumber'] = $aDatas[ $r['user_id'] ][ $r['date'] ][ $r['lottery_id'] ]['BetNumber'] ?? 0; //注单

            switch($r['type_id']){
                case '7':// 投注
                    $aDatas[ $r['user_id'] ][ $r['date'] ][ $r['lottery_id'] ]['BetNumber'] += 1;
                    $aDatas[ $r['user_id'] ][ $r['date'] ][ $r['lottery_id'] ]['BetMoney'] += floatval($r['amount']);
                    break;
                case '8':// 撤销投注
                    $aDatas[ $r['user_id'] ][ $r['date'] ][ $r['lottery_id'] ]['BetMoney'] -= floatval($r['amount']);
                    break;
                case '11': // 派奖
                    $aDatas[ $r['user_id'] ][ $r['date'] ][ $r['lottery_id'] ]['BonusMoney'] += floatval($r['amount']);
                    break;
                case '12':
                    $aDatas[ $r['user_id'] ][ $r['date'] ][ $r['lottery_id'] ]['BonusMoney'] -= floatval($r['amount']);
                    break;
            }
            $iBetMoney = $aDatas[ $r['user_id'] ][ $r['date'] ][ $r['lottery_id'] ]['BetMoney'];
            $iBonusMoney = $aDatas[ $r['user_id'] ][ $r['date'] ][ $r['lottery_id'] ]['BonusMoney'];
            $iDiffMoney = $aDatas[ $r['user_id'] ][ $r['date'] ][ $r['lottery_id'] ]['ProfitMoney'] = $iBonusMoney - $iBetMoney;//(总投注额-总派奖)

            // 盈利率=(总投注额-总派奖)/总投注额
            if($iDiffMoney > 0 && $iBetMoney > 0){
                $aDatas[ $r['user_id'] ][ $r['date'] ][ $r['lottery_id'] ]['profit'] = ( $iDiffMoney / $iBetMoney * 100 ).'%';
            }else if($iDiffMoney < 0 && $iBetMoney > 0){
                $aDatas[ $r['user_id'] ][ $r['date'] ][ $r['lottery_id'] ]['profit'] = '-'.( abs($iDiffMoney) / $iBetMoney * 100 ).'%';
            }else{
                $aDatas[ $r['user_id'] ][ $r['date'] ][ $r['lottery_id'] ]['profit'] = '0%';
            }
        }

        $dd = array_reduce($aDatas, function($result, $value) {
            return array_merge($result, array_values($value));
        }, array());
        $dd = array_reduce($dd, function($result, $value) {
            return array_merge($result, array_values($value));
        }, array());

        return $dd ?? [];
    }

    /**
     * 投注方式报表
     */
    public function setSeriesWayReportData($aRows) {
        $aDatas = [];
        foreach($aRows as $r){
            if(!$r['date'] || !$r['way_id']) continue;
            $aDatas[ $r['date'] ][ $r['way_id'] ]['merchant_id'] = $r['merchant_id'];
            $aDatas[ $r['date'] ][ $r['way_id'] ]['date'] = $r['date'];
            $aDatas[ $r['date'] ][ $r['way_id'] ]['way_id'] = $r['way_id'];
            $aDatas[ $r['date'] ][ $r['way_id'] ]['BetMoney'] = $aDatas[ $r['date'] ][ $r['way_id'] ]['BetMoney'] ?? 0;
            $aDatas[ $r['date'] ][ $r['way_id'] ]['BonusMoney'] = $aDatas[ $r['date'] ][ $r['way_id'] ]['BonusMoney'] ?? 0;
            $aDatas[ $r['date'] ][ $r['way_id'] ]['BetNumber'] = $aDatas[ $r['date'] ][ $r['way_id'] ]['BetNumber'] ?? 0; //注单

            switch($r['type_id']){
                case '7':// 投注
                    $aDatas[ $r['date'] ][ $r['way_id'] ]['BetNumber'] += $r['nums'];
                    $aDatas[ $r['date'] ][ $r['way_id'] ]['BetMoney'] += floatval($r['amount']);
                    break;
                case '8':// 撤销投注
                    $aDatas[ $r['date'] ][ $r['way_id'] ]['BetMoney'] -= floatval($r['amount']);
                    break;
                case '11': // 派奖
                    $aDatas[ $r['date'] ][ $r['way_id'] ]['BonusMoney'] += floatval($r['amount']);
                    break;
                case '12':
                    $aDatas[ $r['date'] ][ $r['way_id'] ]['BonusMoney'] -= floatval($r['amount']);
                    break;
            }
            $iBetMoney = $aDatas[ $r['date'] ][ $r['way_id'] ]['BetMoney'];
            $iBonusMoney = $aDatas[ $r['date'] ][ $r['way_id'] ]['BonusMoney'];
            $iDiffMoney = $aDatas[ $r['date'] ][ $r['way_id'] ]['ProfitMoney'] = $iBonusMoney - $iBetMoney;//(总投注额-总派奖)
            // 盈利率=(总投注额-总派奖)/总投注额
            if($iDiffMoney > 0 && $iBetMoney > 0){
                $aDatas[ $r['date'] ][ $r['way_id'] ]['profit'] = ( $iDiffMoney / $iBetMoney * 100 ).'%';
            }else if($iDiffMoney < 0 && $iBetMoney > 0){
                $aDatas[ $r['date'] ][ $r['way_id'] ]['profit'] = '-'.( abs($iDiffMoney) / $iBetMoney * 100 ).'%';
            }else{
                $aDatas[ $r['date'] ][ $r['way_id'] ]['profit'] = '0%';
            }
        }

        $dd = array_reduce($aDatas, function($result, $value) {
            return array_merge($result, array_values($value));
        }, array());

        return $dd ?? [];
    }

    /**
     * 用户投注方式报表
     */
    public function setUserWayReportData($aRows) {
        $aDatas = [];
        foreach($aRows as $r){
            if(!$r['date'] || !$r['way_id']) continue;
            $aDatas[ $r['date'] ][ $r['user_id'] ][ $r['way_id'] ]['merchant_id'] = $r['merchant_id'];
            $aDatas[ $r['date'] ][ $r['user_id'] ][ $r['way_id'] ]['date'] = $r['date'];
            $aDatas[ $r['date'] ][ $r['user_id'] ][ $r['way_id'] ]['user_id'] = $r['user_id'];
            $aDatas[ $r['date'] ][ $r['user_id'] ][ $r['way_id'] ]['username'] = $r['user']['username'] ?? '';
            $aDatas[ $r['date'] ][ $r['user_id'] ][ $r['way_id'] ]['way_id'] = $r['way_id'];
            $aDatas[ $r['date'] ][ $r['user_id'] ][ $r['way_id'] ]['BetMoney'] = $aDatas[ $r['date'] ][ $r['user_id'] ][ $r['way_id'] ]['BetMoney'] ?? 0;
            $aDatas[ $r['date'] ][ $r['user_id'] ][ $r['way_id'] ]['BonusMoney'] = $aDatas[ $r['date'] ][ $r['user_id'] ][ $r['way_id'] ]['BonusMoney'] ?? 0;
            $aDatas[ $r['date'] ][ $r['user_id'] ][ $r['way_id'] ]['BetNumber'] = $aDatas[ $r['date'] ][ $r['user_id'] ][ $r['way_id'] ]['BetNumber'] ?? 0; //注单

            switch($r['type_id']){
                case '7':// 投注
                    $aDatas[ $r['date'] ][ $r['user_id'] ][ $r['way_id'] ]['BetNumber'] += $r['nums'];
                    $aDatas[ $r['date'] ][ $r['user_id'] ][ $r['way_id'] ]['BetMoney'] += floatval($r['amount']);
                    break;
                case '8':// 撤销投注
                    $aDatas[ $r['date'] ][ $r['user_id'] ][ $r['way_id'] ]['BetMoney'] -= floatval($r['amount']);
                    break;
                case '11': // 派奖
                    $aDatas[ $r['date'] ][ $r['user_id'] ][ $r['way_id'] ]['BonusMoney'] += floatval($r['amount']);
                    break;
                case '12':
                    $aDatas[ $r['date'] ][ $r['user_id'] ][ $r['way_id'] ]['BonusMoney'] -= floatval($r['amount']);
                    break;
            }
            $iBetMoney = $aDatas[ $r['date'] ][ $r['user_id'] ][ $r['way_id'] ]['BetMoney'];
            $iBonusMoney = $aDatas[ $r['date'] ][ $r['user_id'] ][ $r['way_id'] ]['BonusMoney'];
            $iDiffMoney = $aDatas[ $r['date'] ][ $r['user_id'] ][ $r['way_id'] ]['ProfitMoney'] = $iBonusMoney - $iBetMoney;//(总派奖-总投注额)

            // 盈利率=(总投注额-总派奖)/总投注额
            if($iDiffMoney > 0 && $iBetMoney > 0){
                $aDatas[ $r['date'] ][ $r['user_id'] ][ $r['way_id'] ]['profit'] = ( $iDiffMoney / $iBetMoney * 100 ).'%';
            }else if($iDiffMoney < 0 && $iBetMoney > 0){
                $aDatas[ $r['date'] ][ $r['user_id'] ][ $r['way_id'] ]['profit'] = '-'.( abs($iDiffMoney) / $iBetMoney * 100 ).'%';
            }else{
                $aDatas[ $r['date'] ][ $r['user_id'] ][ $r['way_id'] ]['profit'] = '0%';
            }

        }

        $dd = array_reduce($aDatas, function($result, $value) {
            return array_merge($result, array_values($value));
        }, array());
        $dd = array_reduce($dd, function($result, $value) {
            return array_merge($result, array_values($value));
        }, array());

        //dd($dd);

        return $dd ?? [];
    }

    /**
     * 商户日/月报表
     */
    public function setMerchantsReportData($aRows) {
        $aDatas = [];
        foreach($aRows as $r){
            if(!$r['date']) continue;
            $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['merchant_id'] = $r['merchant_id'];
            $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['merchant'] = $r['merchant']['name'] ?? '';
            $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['date'] = $r['date'];
            $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['way_id'] = $r['way_id'];
            $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['BetUserNumber'] = $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['BetUserNumber'] ?? 0;
            //$aDatas[$r['user_id']][$r['date']][$r['lottery_id']]['issue']=$r['issue'];

            $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['BetMoney'] = $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['BetMoney'] ?? 0;
            $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['BonusMoney'] = $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['BonusMoney'] ?? 0;
            $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['BetNumber'] = $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['BetNumber'] ?? 0; //注单

            switch($r['type_id']){
                case '7':// 投注
                    $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['BetNumber'] += 1;
                    $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['BetMoney'] += floatval($r['amount']);
                    $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['user_ids'][] = $r['user_id'];

                    break;
                case '8':// 撤销投注
                    $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['BetMoney'] -= floatval($r['amount']);
                    break;
                case '11': // 派奖
                    $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['BonusMoney'] += floatval($r['amount']);
                    break;
                case '12':
                    $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['BonusMoney'] -= floatval($r['amount']);
                    break;
            }
            $iBetMoney = $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['BetMoney'];
            $iBonusMoney = $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['BonusMoney'];
            // 注单数
            $iBetNumber = $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['BetNumber'];

            // 投注用户数
            $iBetUserNumber = $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['BetUserNumber'] = count(array_unique($aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['user_ids'] ?? []));

            $ProfitMoney = $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['ProfitMoney'] = $iBonusMoney - $iBetMoney;//(总投注额-总派奖)
            // 盈利率
            if($ProfitMoney > 0 && $iBetMoney > 0){
                $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['Profit'] = ( $ProfitMoney / $iBetMoney * 100 ).'%';
            }elseif($ProfitMoney < 0 && $iBetMoney > 0){
                $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['Profit'] = '-'.( abs($ProfitMoney) / $iBetMoney * 100 ).'%';
            }else{
                $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['Profit'] = '0%';
            }

            // 平均注单数=总投注额/注单数
            $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['BetMoneyAvg'] =
                ( $iBetMoney > 0 && $iBetNumber > 0 ) ? ( $iBetMoney / $iBetNumber ) : 0;
            // 人均注单=总投注额/注单数
            $aDatas[ $r['merchant_id'] ][ $r['date'] ][ $r['way_id'] ]['BetUserAvg'] = ( $iBetMoney > 0 && $iBetUserNumber > 0 ) ? ( $iBetMoney / $iBetUserNumber ) : 0;

        }

        $dd = array_reduce($aDatas, function($result, $value) {
            return array_merge($result, array_values($value));
        }, array());
        $dd = array_reduce($dd, function($result, $value) {
            return array_merge($result, array_values($value));
        }, array());

        return $dd ?? [];
    }
}