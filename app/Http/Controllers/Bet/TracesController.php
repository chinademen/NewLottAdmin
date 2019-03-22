<?php

/**
 * 追单
 *
 * @author loren
 */

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Lottery;
use App\Models\LotteryWays;
use App\Models\Issue;
use App\Models\Traces;
use App\Models\User;
use Redirect;
use DB;
use Coefficient;

class TracesController extends AdminBaseController {

    protected $modelName = 'App\Models\Traces';

    protected function beforeRender() {
        parent::beforeRender();
        switch ($this->action) {
            case 'index':
                $aCoefficient = Coefficient::$coefficients;
                $aStatus = baseOption('base.traces.status');
                $aPageSizes = [20, 50, 100];
                $this->setVars(compact('aCoefficient', 'aStatus', 'aPageSizes'));
                if (isset($this->params['lottery_id']) && !empty($this->params['lottery_id'])) {
                    $aWays = LotteryWays::getLotteryWaysByLotteryId($this->params['lottery_id']);
                    $aIssues = Issue::getIssuesByLotteryId($this->params['lottery_id']);
                    $this->setVars(compact('aWays', 'aIssues'));
                }
                break;
        }
        $this->setVars('aLotteries', Lottery::getSelectSearchArrays());
    }


    /**
     * 资源列表页面
     * GET
     * @return Response
     */
    public function index() {
        if (isset($this->params['action']) && $this->params['action'] == 'ajax') {
            $iLottery_id = $this->params['lottery_id'];
            $aLottery = Lottery::find($iLottery_id);
            if (!empty($aLottery)) {
                $aData = [];
                $aLotteryWays = LotteryWays::getLotteryWaysByLotteryId($iLottery_id);
                $aIssues = Issue::getIssuesByLotteryId($iLottery_id);
                $aData['lottery_ways'] = $aLotteryWays;
                $aData['issues'] = $aIssues;
                echo json_encode($aData);
            }
            exit;
        }
        $this->widgets = ['traces.traces_search'];
        return parent::index();
    }

    /**
     * 终止追号任务
     * @param int $iTraceId
     * @return Redirect
     */
    public function stop($iTraceId) {
        $oTrace = Traces::find($iTraceId);
        if (empty($oTrace)) {
            $this->goBack('error', ___('_basic.no-data'));
        }
        if ($oTrace->status != Traces::STATUS_RUNNING) {
            return Redirect::route('traces.view', $iTraceId)->with('error', ___('_traces.stop-failed-status'));
        }
        $bSucc = Traces::cancelTrace($iTraceId);
        if ($bSucc) {
            $sLangKey = '_traces.stoped';
            $sMsgType = 'success';
        } else {
            $sLangKey = '_traces.stop-failed';
            $sMsgType = 'error';
        }
        return Redirect::route('traces.index', $iTraceId)->with($sMsgType, ___($sLangKey));
    }

    public function generate($id){
        $oTrace = Traces::find($id);
        if (empty($oTrace)){
            return $this->goBack('error',__('_basic.no-data'));
        }
        if ($oTrace->status != Traces::STATUS_RUNNING){
            return $this->goBack('error',__('_trace.wrong-status'));
        }
        //TODO loren task (not)没有创建注单的定时任务
        return $this->goBack('error','没有创建注单的逻辑');
        if ($bSucc = $oTrace->setGenerateTask($sRealQueue)){
            $sLangKey = '_trace.generate-task-seted';
            $sMsgType = 'success';
        }
        else{
            $sLangKey = '_trace.generate-task-set-failed';
            $sMsgType = 'error';
        }
        return $this->goBack($sMsgType,___($sLangKey) . ': ' . $sRealQueue);
    }

}