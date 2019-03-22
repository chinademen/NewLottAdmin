<?php

/**
 * 奖期
 *
 * @author lawrence
 */

namespace App\Http\Controllers;


use App\Models\Lottery;
use App\Models\Issue;

use Carbon;
use Redirect;

class IssueController extends AdminBaseController {

    protected $modelName = 'App\Models\Issue';

    protected $customViewPath = 'lotteries.issue';
    protected $customViews = [
        'encode',
        'issueOperate',
        'generate',
        'batchDelete',
    ];

    protected function beforeRender() {
        parent::beforeRender();
        $aLotteries = Lottery::getSelectSearchArrays();
        $this->setVars('aLotteries', $aLotteries);
        switch ($this->action) {
            case 'encode':
                $sModelName = &$this->modelName;
                if ($sModelName) {
                    $this->setVars('aColumnForList', $sModelName::$columnForList);
                    $this->setVars('sModelSingle', ___('_model.' . $this->friendlyModelName));
                    $this->setVars('bSequencable', $sModelName::$sequencable);
                    $this->setVars('bCheckboxForBatch', $sModelName::$enabledBatchAction);
                    if ($sModelName::$sequencable) {
                        $sSetOrderRoute = $this->resource . '.set-order';
                        $this->setvars(compact('sSetOrderRoute'));
                    }
                    $this->setVars('aListColumnMaps', $sModelName::$listColumnMaps);
                    $this->setVars('aNoOrderByColumns', $sModelName::$noOrderByColumns);
                    if ($sModelName::$totalColumns) {
                        $this->setVars('aTotalColumns', $sModelName::$totalColumns);
                    }

                    $this->addWidget('lotteries.issue.encodeForm');
                }
                $this->setVars('aWidgets', $this->widgets);
                $sDataUpdatedTime = $this->viewVars['datas']->count() ? $this->viewVars['datas'][0]->updated_at : Carbon::now()->toDateTimeString();
                $this->setVars(compact('sDataUpdatedTime'));


                $aLotteryGroup = Lottery::getSelectSearchArrays(['id', 'series_id'],['status','in',[1,2,3,4]]);
                $aSeriesLotteries = [];
                foreach ($aLotteryGroup as $gk => $gv) {
                    empty($aLotteries[$gk]) or $aSeriesLotteries[$gv][$gk] = $aLotteries[$gk];
                }
                $this->setVars(compact('aSeriesLotteries'));
                break;
            case 'batchDelete':
                if ($this->model) {
                    !empty($this->model->columnSettings) or $this->model->makeColumnConfigures(true);
                    $this->setVars('aColumnSettings', $this->model->columnSettings);
                }
                break;
            case 'issueOperate':
                break;
        }

    }

    /**
     * 生成奖期 ok
     */
    public function generate() {
        //TODO loren error (not)生成奖期 本身功能不可用，有很多代码
        return $this->goBack('error', '生成奖期,没有逻辑代码');
    }

    /**
     * 批量计奖
     */
    public function setCalculateBatch($iLotteryId = null) {
        set_time_limit(0);
        $oIssues = Issue::getNeedCalculateIssues(100,$iLotteryId);
        if ($oIssues->count() == 0) {
            return Redirect::route('issues.encode')->with('success', ___('_issue.calculate-task-no-issue'));
        }
        $iSuccCount = $iFailCount = 0;
        $aQueues = [];
        $aFails = [];
        foreach ($oIssues as $oIssue) {
            if ($bSucc = $oIssue->setCalculateTask($sRealQueue)) {
                $iSuccCount++;
                $aQueues[] = $oIssue->lottery_id . '-' . $oIssue->issue . ':' . $sRealQueue;
            } else {
                $iFailCount++;
                $aFails[] = $oIssue->getAttributes();
            }
        }
        $aQueues = array_unique($aQueues);
        $sMsgType = 'success';
        $sLangKey = $iFailCount ? '_issue.calculate-task-batch-partial' : '_issue.calculate-task-batch-seted';
        $aInfo = $iFailCount ? ['failed' => var_export($aFails, true)] : [];
        return $this->goBack($sMsgType, ___($sLangKey, $aInfo) . ' ' . $iSuccCount . '<br />' . implode('<br />', $aQueues));
    }

    /**
     * 批量删除 OK
     */
    public function batchDelete($lottery_id = null) {
        if ($this->request->method() == 'POST' || $this->request->ajax()) {
            $data = $this->request->input();
            //必须选择奖期
            if (empty($data['lottery_id'])) {
                return $this->goBack('error', ___('_issue.missing-lottery'));
            }
            //开始时间或者开始奖期 最少有一个
            if (empty($data['begin_time']) && empty($data['begin_issue'])) {
                return $this->goBack('error', ___('_issue.invalid-date'));
            }
            //初始化更新条件
            $aConditions = [];
            //开始时间
            if ($data['begin_time']) {
                $iBeginTime = strtotime($data['begin_time']);
                //判断开始时间是否在 一小时后 之前
                if ($iBeginTime < time() + 3600) {
                    return $this->goBack('error', ___('_issue.time-early'));
                }
                $aConditions['end_time'] = ['>=', $iBeginTime];

                //截止时间
                if (!empty($data['end_time'])) {
                    $iEndTime = strtotime($data['end_time']);
                    //开始时间不能大于截止时间
                    if ($iBeginTime > $iEndTime) {
                        return $this->goBack('error', ___('_issue.invalid-time'));
                    }
                    $aConditions['end_time'] = ['between', [$iBeginTime, $iEndTime]];
                }
            }
            //开始奖期
            if ($data['begin_issue']) {
                //获取开始奖期的截止时间，如果没有获取到，说明奖期不正确
                if (!$iEndTimeOfBeginIssue = Issue::doWhere(['lottery_id' => ['=', $data['lottery_id']], 'issue' => ['=', $data['begin_issue']]])->value('end_time')) {
                    return $this->goback('error', ___('_issue.missing-begin-issue'));
                }
                //判断开始奖期的截止时间是否在 一小时后 之前
                if ($iEndTimeOfBeginIssue < time() + 3600) {
                    return $this->goback('error', ___('_issue.issue-early'));
                }
                $aConditions['issue'] = ['>=', $data['begin_issue']];

                //截止奖期
                if ($data['end_issue']) {
                    //获取截止奖期的截止时间，如果没有获取到，说明奖期不正确
                    if (!$iEndTimeOfEndIssue = Issue::doWhere(['lottery_id' => ['=', $data['lottery_id']], 'issue' => ['=', $data['end_issue']]])->value('end_time')) {
                        return $this->goback('error', ___('_issue.missing-end-issue'));
                    }
                    //开始奖期的截止时间不能大于截止奖期的截止时间
                    if ($iEndTimeOfBeginIssue > $iEndTimeOfEndIssue) {
                        return $this->goBack('error', ___('_issue.invalid-issue'));
                    }
                    $aConditions['issue'] = ['between', [$data['begin_issue'], $data['end_issue']]];
                }
            }
            $aConditions['lottery_id'] = ['=', $data['lottery_id']];
            //根据条件删除奖期
            if (Issue::doWhere($aConditions)->delete()) {
                return $this->goBackToIndex('success', ___('_issue.delete-success'));
            } else {
                return $this->goBack('error', ___('_issue.delete-failed'));
            }
        } else {
            $this->setVars('lottery_id', $lottery_id);
            return $this->render();
        }
    }

    /**
     * 未开奖撤单
     */
    public function setCancel($id = null) {
        $oIssue = Issue::find($id);
        if (empty($oIssue)) {
            return Redirect::route('issues.encode', ['lottery_id' => $oIssue->lottery_id])->with('error', ___('_basic.no-data'));
        }
        if (!in_array($oIssue->status, [Issue::ISSUE_CODE_STATUS_WAIT_CODE, Issue::ISSUE_CODE_STATUS_CANCELED])) {
            return Redirect::route('issues.encode', ['lottery_id' => $oIssue->lottery_id])->with('error', ___('_issue.status-error'));
        }

        $this->model->getConnection()->beginTransaction();
        if ($bSucc = $oIssue->setCancelTask()) {
            $this->model->getConnection()->commit();
            $sLangKey = '_issue.cancel-task-seted';
            $sMsgType = 'success';
        } else {
            $this->model->getConnection()->rollback();
            $sLangKey = '_issue.cancel-task-set-failed';
            $sMsgType = 'error';
        }
        return $this->goBack($sMsgType, ___($sLangKey));
    }

    /**
     * 计奖
     */
    public function setCalculate($id = null) {
        $oIssue = Issue::find($id);
        if (empty($oIssue)) {
            return $this->goBack('error', ___('_basic.no-data'));
        }
        if ($oIssue->status != Issue::ISSUE_CODE_STATUS_FINISHED) {
            return $this->goBack('error', ___('_issue.status-error'));
        }
        if ($bSucc = $oIssue->setCalculateTask()) {
            $sLangKey = '_issue.calculate-task-seted';
            $sMsgType = 'success';
        } else {
            $sLangKey = '_issue.calculate-task-set-failed';
            $sMsgType = 'error';
        }
        return $this->goBack($sMsgType, ___($sLangKey));
//        return Redirect::route('issues.encode', ['lottery_id' => $oIssue->lottery_id])->with($sMsgType, ___($sLangKey));
    }


    /**
     * 开奖
     */
    public function encode($iLotteryId = null) {
        if ($this->request->method() == 'POST') {
            //return $this->goBack('error', '开奖，无代码逻辑');
            $sWnNumber = trim($this->request->input('wn_number'));
            $iLotteryId = trim($this->request->input('lottery_id'));
            $sIssue = trim($this->request->input('issue'));

            //判断参数
            if (empty($iLotteryId) || empty($sIssue)) {
                return $this->goBack('error', ___('_basic.missing', $this->langVars));
            }
            //根据奖期号和彩种获取奖期
            $oIssue = Issue::getIssue($iLotteryId, $sIssue);
            if (!$oIssue) {
                return $this->goBack('error', ___('_basic.missing', $this->langVars));
            }
            $oLottery = Lottery::find($iLotteryId);
            //4 号码已审核
            if ($oIssue->status < 4) {
                $sCode = $oLottery->formatWinningNumber($sWnNumber);
                if ($oLottery->checkWinningNumber($sCode)) {
                    $bSucc = $oIssue->setWinningNumber($sCode);
                    if ($bSucc === true) {
                        $bSucc = $oIssue->addCalculateTask();
                        //return $this->goBack('error', '开奖，无代码逻辑');
                        if ($bSucc === true) {
                            return $this->goBack('success', ___('_issue.encoded', $this->langVars));
                        }else{
                            return $this->goBack('error', ___('_issue.encoded', $this->langVars) . ',' . ___('_issue.calculate-task-set-failed'));
                        }
                    } else {
                        $key = $bSucc == -1 ? '_issue.encode-fail-time' : '_issue.encode-fail';
                    }
                } else {
                    $key = '_issue.encode-fail-wrong-number';
                }
            } else {
                $key = '_issue.encode-fail-encoded';
            }
            $this->langVars['lottery'] = $oLottery->name;
            $this->langVars['issue'] = $sIssue;
            $this->langVars['wn_number'] = $sWnNumber;
            return $this->goBack('error', ___($key, $this->langVars));
        } else {
            isset($iLotteryId) or $iLotteryId = 1;
            $oLatestIssue = $this->modelName::getFirstNonNumberIssue($iLotteryId);
            $this->setVars('oLatestIssue', $oLatestIssue);
            $this->setVars('iLotteryId', $iLotteryId);
            $this->params['lottery_id'] = $iLotteryId;
            if ($oLatestIssue) {
                $oLatestIssue->formatted_status = baseOption('base.issues.status')[$oLatestIssue->status];
            }
            $this->request->offsetSet('lottery_id', $iLotteryId);
            $this->request->offsetSet('sort_down','issue');
            $this->params['pagesize']  = 100;

            return parent::index();
        }
    }


    protected function customSearchConditions($oQuery,$aParams){
        if($this->action == 'encode'){
            $iBeginTime = strtotime('-7 days');
            $iEndTime   = time();
            $sBeginTime = date('Y-m-d H:i:s', $iBeginTime);
            $sEndTime   = date('Y-m-d H:i:s', $iEndTime);
            $oQuery   = $oQuery->whereBetween('end_time2', [$sBeginTime, $sEndTime]);
            $oQuery   = $oQuery->whereBetween('end_time', [$iBeginTime, $iEndTime]);
        }
        return $oQuery;
    }

    /**
     * 开奖异常处理，取消开奖，修改开奖号码，提前开奖
     */
    public function issueOperate($lottery_id = null, $issue = null) {
        if ($this->request->method() == 'POST') {
            $iType = trim($this->request->input('operate_type'));
            $lottery_id = trim($this->request->input('lottery_id'));
            $issue = trim($this->request->input('issue'));
            if (!in_array($iType, [Issue::ISSUE_OPERATE_TYPE_REVISE, Issue::ISSUE_OPERATE_TYPE_CANCEL, Issue::ISSUE_OPERATE_TYPE_ADVANCED])) {
                return $this->goBack('error', ___('_issue.wrong-operate-type'));
            }
            switch ($iType) {
                case Issue::ISSUE_OPERATE_TYPE_REVISE:
                    $result = $this->reviseCode($lottery_id, $issue);
                    break;
                case Issue::ISSUE_OPERATE_TYPE_CANCEL:
                    $result = $this->cancelCode($lottery_id, $issue);
                    break;
                case Issue::ISSUE_OPERATE_TYPE_ADVANCED:
                    $result = $this->advanceCode($lottery_id, $issue);
                    break;
            }
            return $result;
        } else {
            $aLotteries = Lottery::getAllLotteries(Lottery::STATUS_AVAILABLE_FOR_NORMAL_USER);
            $aOperateType = baseOption('base.issues.operate_type');
            $this->setVars(compact('aLotteries', 'aOperateType'));
            return $this->render();
        }
    }

    /**
     * 修改开奖号码后,触发取消派奖,重新计奖的流程
     */
    public function reviseCode($lottery_id, $issue) {
        $oIssue = Issue::getIssue($lottery_id, $issue);
        if (!is_object($oIssue)) {
            return $this->goBack('error', ___('_issue.missing-data'));
        }
        $oLottery = Lottery::find($lottery_id);
        if (!is_object($oLottery)) {
            return $this->goBack('error', ___('_lottery.missing-data'));
        }
        $sNewCode = trim($this->request->input('new_code'));
        if (!$oLottery->checkWinningNumber($sNewCode)) {
            return $this->goBack('error', ___('_issue.wrong-code'));
        }
        $this->model->getConnection()->beginTransaction();
        $bSucc = $oIssue->setCancelPriceTask(null, $sNewCode);
        if ($bSucc) {
            $this->model->getConnection()->commit();
            return $this->goBackToIndex('success', ___('_issue.revise-success'));
        } else {
            $this->model->getConnection()->rollback();
            return $this->goBackToIndex('error', ___('_issue.revise-fail'));
        }
    }

    /**
     * 官方未开奖的处理流程
     */
    public function cancelCode($lottery_id, $issue) {
        $oIssue = Issue::getIssue($lottery_id, $issue);
        if (!is_object($oIssue)) {
            return $this->goBack('error', ___('_issue.missing-data'));
        }
        if (!in_array($oIssue->status, [Issue::ISSUE_CODE_STATUS_WAIT_CODE, Issue::ISSUE_CODE_STATUS_CANCELED])) {
            return $this->goBack('error', ___('_issue.status-error'));
        }
        $this->model->getConnection()->beginTransaction();
        if ($bSucc = $oIssue->setCancelTask()) {
            $this->model->getConnection()->commit();
            $sLangKey = '_issue.cancel-task-seted';
            $sMsgType = 'success';
        } else {
            $this->model->getConnection()->rollback();
            $sLangKey = '_issue.cancel-task-set-failed';
            $sMsgType = 'error';
        }
        return $this->goBack($sMsgType, ___($sLangKey));
    }

    /**
     * 提前开奖的处理流程
     */
    public function advanceCode($lottery_id, $issue) {
        $oIssue = Issue::getIssue($lottery_id, $issue);
        if (!is_object($oIssue)) {
            return $this->goBack('error', ___('_issue.missing-data'));
        }
        $sEarliestDrawTime = trim($this->request->input('earliest_draw_time'));
        if (strtotime($sEarliestDrawTime) > $oIssue->offical_time || strtotime($sEarliestDrawTime) < $oIssue->begin_time) {
            return $this->goBack('error', ___('_issue.wrong-time'));
        }
        $this->model->getConnection()->beginTransaction();
        $bSucc = $oIssue->setCancelTask($sEarliestDrawTime);
        if ($bSucc) {
            $this->model->getConnection()->commit();
            return $this->goBackToIndex('success', '_issue.advance-success');
        } else {
            $this->model->getConnection()->rollback();
            return $this->goBackToIndex('error', '_issue.advance-fail');
        }
    }
}