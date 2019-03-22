<?php

/**
 * 奖期告警记录
 *
 * @author loren
 */

namespace App\Http\Controllers;

use App\Models\IssueWarnings;
use App\Models\Issue;
use App\Models\CodeCenters;
use App\Models\Lottery;
use DB;

class IssueWarningsController extends AdminBaseController {

    protected $modelName = 'App\Models\IssueWarnings';

    protected function beforeRender() {
        parent::beforeRender();
        $this->setVars('aLotteryIds',Lottery::getSelectSearchArrays());
        $this->setVars('aStatusArr',baseOption('base.issue_warnings.status'));
    }

    /**
     * 修改开奖号码后,触发取消派奖,重新计奖的流程
     */
    public function reviseCode($id) {
        $oIssueWarnning = IssueWarnings::find($id);
        if (!is_object($oIssueWarnning)) {
            return $this->goBack('error', '_issuewarning.missing-data');
        }
        $oIssue = Issue::getIssue($oIssueWarnning->lottery_id, $oIssueWarnning->issue);
        if (!is_object($oIssue)) {
            return $this->goBack('error', '_issue.missing-data');
        }
        $oCodeCenter = CodeCenters::find($oIssueWarnning->codecenter_id);
        if (!is_object($oCodeCenter)) {
            return $this->goBack('error', '_codecenter.missing-data');
        }
        DB::connection()->beginTransaction();
        $bSucc = $oIssue->setCancelPriceTask($oCodeCenter->customer_key, $oIssueWarnning->number);

        !$bSucc or $bSucc = IssueWarnings::setStatusToResolved($id);
        if ($bSucc) {
            DB::connection()->commit();
            return $this->goBackToIndex('success', '_issuewarning.revise-success');
        } else {
            DB::connection()->rollback();
            return $this->goBackToIndex('error', '_issuewarning.revise-fail');
        }
    }

    /**
     * 官方未开奖的处理流程
     */
    public function cancelCode($id) {
        $oIssueWarnning = IssueWarnings::find($id);
        if (!is_object($oIssueWarnning)) {
            return $this->goBack('error', '_issuewarning.missing-data');
        }
        $oIssue = Issue::getIssue($oIssueWarnning->lottery_id, $oIssueWarnning->issue);
        if (!is_object($oIssue)) {
            return $this->goBack('error', '_issue.missing-data');
        }
        //修改奖期的开奖状态
        DB::connection()->beginTransaction();
        $bSucc = $oIssue->setCancelTask();
        !$bSucc or $bSucc = IssueWarnings::setStatusToResolved($id);
        if ($bSucc) {
            DB::connection()->commit();
            return $this->goBackToIndex('success', '_issuewarning.cancel-success');
        } else {
            DB::connection()->rollback();
            return $this->goBack('error', '_issuewarning.cancel-fail');
        }
    }

    /**
     * 提前开奖的处理流程
     */
    public function advanceCode($id) {
        $oIssueWarnning = IssueWarnings::find($id);
        if (!is_object($oIssueWarnning)) {
            return $this->goBack('error', '_issuewarning.missing-data');
        }
        $oIssue = Issue::getIssue($oIssueWarnning->lottery_id, $oIssueWarnning->issue);
        if (!is_object($oIssue)) {
            return $this->goBack('error', '_issue.missing-data');
        }

        DB::connection()->beginTransaction();
        $bSucc = $oIssue->setCancelTask($oIssueWarnning->earliest_draw_time);
        !$bSucc or $bSucc = IssueWarnings::setStatusToResolved($id);
        if ($bSucc) {
            DB::connection()->commit();
            return $this->goBackToIndex('success', '_issuewarning.advance-success');
        } else {
            DB::connection()->rollback();
            return $this->goBackToIndex('error', '_issuewarning.advance-fail');
        }
    }
}