<?php

/**
 * 系列
 *
 * @author lawrence
 */

namespace App\Http\Controllers;

use DB;
use Redirect;

use App\Models\Series;
use App\Models\Lottery;
use App\Models\SeriesWay;
use App\Models\LotteryWays;
use App\Models\IssueRules;

class SeriesController extends AdminBaseController {

    protected $modelName = 'App\Models\Series';
    protected $customViewPath = 'lotteries.series.';

    protected function beforeRender() {
        parent::beforeRender();
        switch($this->action){
            case 'create':
            case 'edit':
                $this->setVars('aGroupTypes', baseOption('base.series.group_type'));
                $this->setVars('aLottoTypes', baseOption('base.lottery.lotto_type'));
                $this->setVars('aSeries', $this->modelName::getSelectSearchArrays());
                $this->setVars('aLotteryTypes', baseOption('base.lottery.type'));
                break;
        }
    }

    public function createLotteryFromSeries($iSeriesId) {
        $oSeries = Series::find($iSeriesId);
        if (empty($oSeries)) {
            return $this->goBack('error', ___('_basic.no-data'));
        }
        if (!isset($this->params['step']) || (!$iStep = intval($this->params['step']))) {
            $iStep = 1;
        } else {
            $iStep++;
        }
        $filePreName = 'create-lottery-';
        switch ($iStep) {
            case 1:
                $aSeries    =  $this->modelName::getSelectSearchArrays();
                $this->setVars(compact('iSeriesId', 'aSeries'));
                break;
            case 2:
                if ($this->request->method() != 'POST') {
                    return $this->goBack('error', ___('_basic.invalid-visit'));
                }
                //$oSeries = Series::find($this->params['series_id']);
                if ($this->params['series_id'] != $iSeriesId || !$this->_checkNewLotteryData()) {
                    return $this->goBack('error', ___('_basic.no-data'));
                }
                $this->setVars('iSeriesId', $this->params['series_id']);
                $this->setVars('sSeries', $oSeries->name);
                $this->setVars('sName', $this->params['name']);
                $this->setVars('sIdentifier', $this->params['identifier']);
                $this->setVars('sIssueFormat', $this->params['issue_format']);
                $this->setVars('sIssueRule', $this->params['issue_rule']);
                $this->setVars('bInstant', $this->params['is_instant']);
                $this->setVars('bSelf', $this->params['is_self']);
                $this->setVars('iFrequency', $this->params['frequency']);
                $this->setVars('step', $iStep);
                break;
            case 3:
                if ($this->request->method() != 'POST') {
                    return $this->goBack('error', ___('_basic.invalid-visit'));
                }
                set_time_limit(0);
                //$oSeries = Series::find($this->params['series_id']);
                if ($this->params['series_id'] != $iSeriesId || !$this->_checkNewLotteryData()) {
                    return $this->goBack('error', ___('_basic.no-data'));
                }

                $iMaxDigital   = $oSeries->digital_count;
                $this->outputMessage('Creating Lottery...');
                if (!$oLottery      = Lottery::getByIdentifier($this->params['identifier'])) {
                    $aLotteryData = [
                        'series_id'           => $oSeries->id,
                        'name'                => $this->params['name'],
                        'identifier'          => $this->params['identifier'],
                        'issue_format'        => $this->params['issue_format'],
                        'is_instant'          => $this->params['is_instant'],
                        'is_self'             => $this->params['is_self'],
                        'high_frequency'      => $this->params['frequency'],
                        'type'                => $oSeries->type,
                        'lotto_type'          => $oSeries->lotto_type,
                        'sort_winning_number' => $oSeries->sort_winning_number ?? 0,
                        'valid_nums'          => $oSeries->valid_nums,
                        'buy_length'          => $oSeries->buy_length,
                        'wn_length'           => $oSeries->wn_length,
                        'max_bet_group'       => $oSeries->max_bet_group,
                        'open'                => 0,
                        'days'                => 127,
                    ];
                    DB::connection()->beginTransaction();
                    $oLottery     = new Lottery($aLotteryData);
                    unset($aLotteryData);
                    if (!$bSucc       = $oLottery->save()) {
                        DB::connection()->rollback();
                        //return $this->goBack('error', ___('_basic.create-fail'));
                        echo "Lottery 1:<br />";
                        pr($oLottery->validationErrors->toArray());
                        exit;
                    }

                    $aConditions = [
                        'series_id'     => ['=', $this->params['series_id']],
                        'digital_count' => ['<=', $iMaxDigital],
                    ];
                    $oSeriesWay  = new SeriesWay;
                    $oSeriesWays = $oSeriesWay->doWhere($aConditions)->get();
                    $aLotteryWayIds = $aLotteryWays   = [];
                    foreach ($oSeriesWays as $oSeriesWay) {
                        $aOffset    = explode(',', $oSeriesWay->offset);
                        $iMinOffset = min($aOffset);
                        if ($oSeriesWay->digital_count + $iMinOffset > $iMaxDigital) {
                            continue;
                        }
                        $aLotteryWayIds[] = $oSeriesWay->id;
                        $aLotteryWays[]   = [
                            'series_id'     => $oLottery->series_id,
                            'lottery_id'    => $oLottery->id,
                            'series_way_id' => $oSeriesWay->id,
                            'name'          => $oSeriesWay->name,
                            'short_name'    => $oSeriesWay->short_name,
                        ];
                    }
                    $oLottery->series_ways = implode(',', $aLotteryWayIds);
                    $oLottery->sequence    = $oLottery->id * 10;
                    if (!$oLottery->save()) {
                        DB::connection()->rollback();
                        echo "Lottery 2:<br />";
                        pr($oLottery->validationErrors->toArray());
                        exit;
                    }
                    $bSucc = true;
                    foreach ($aLotteryWays as $aLotteryWay) {
                        $oLotteryWay = new LotteryWays($aLotteryWay);
                        if (!$bSucc       = $oLotteryWay->save()) {
                            DB::connection()->rollback();
                            echo "LotteryWays:<br />";
                            pr($oLotteryWay->validationErrors->toArray());
                            exit;
                        }
                    }
                    $aLotteries         = explode(',', $oSeries->lotteries);
                    $aLotteries[]       = $oLottery->id;
                    //                $aLotteries = array_unique($aLotteries);
                    $oSeries->lotteries = implode(',', array_unique($aLotteries));
                    unset($aLotteries, $aLotteryWayIds, $oSeriesWay, $aConditions);
                    if (!$oSeries->save()) {
                        DB::connection()->rollback();
                        echo "Series:<br />";
                        pr($oSeries->validationErrors->toArray());
                        var_dump($oSeries->sort_winning_number);
                        exit;
                    }
                    unset($oSeries);
                    $this->outputMessage("Lottery Created. Id is $oLottery->id");

                    // 创建奖期规则
                    if ($sIssueRule  = $this->params['issue_rule']){
                        $this->outputMessage('Creating Issue Rule(s) ...'.$this->params['issue_rule']);
                        $aIssueRules = json_decode($sIssueRule, 1);
                        foreach ($aIssueRules as $aRule) {
                            $data       = [
                                'lottery_id'       => $oLottery->id,
                                'begin_time'       => isset($aRule['begin_time']) ? $aRule['begin_time'] : '00:00:00',
                                'end_time'         => $aRule['end_time'],
                                'cycle'            => $aRule['cycle'],
                                'number_delay_time' => isset($aRule['number_delay_time']) ? $aRule['number_delay_time'] : 0,
                                'first_time'       => $aRule['first_time'],
                                'stop_adjust_time' => $aRule['stop_adjust_time'],
                                'encode_time'      => isset($aRule['encode_time']) ? $aRule['encode_time'] : 0,
                                'enabled'          => 1,
                            ];
                            $oIssueRule = new IssueRules($data);
                            if (!$bSucc      = $oIssueRule->save()) {
                                echo "IssueRules:<br />";
                                pr($oIssueRule->validationErrors->toArray());
                                break;
                            }
                        }
                    }
                    if (!$bSucc) {
                        DB::connection()->rollback();
                        exit;
                    }
                    $this->outputMessage("Issue Rule(s) Created");
                    unset($data, $oLotteryWay, $aLotteryWays, $aIssueRules, $aRule, $sIssueRule);
                }
                DB::connection()->commit();
                return Redirect::route('series.index')->with('success', ___('_series.lottery-created'));
        }
        $this->view = $this->customViewPath . '.' . $filePreName. $iStep;
        return $this->render();
    }

    private function _checkNewLotteryData() {
        if (!isset($this->params['name']) || empty($this->params['name'])) {
            return false;
        }
        if (!isset($this->params['identifier']) || empty($this->params['identifier'])) {
            return false;
        }
        if (!$this->params['is_instant'] && (!isset($this->params['issue_format']) || empty($this->params['issue_format']))) {
            return false;
        }
        return true;
    }

    private function outputMessage($sMsg){
        echo "$sMsg<br />\n";
        ob_flush();
        flush();
    }

}