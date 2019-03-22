<?php

/**
 * projects
 *
 * @author lawrence
 */

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\LotteryWays;
use App\Models\Lottery;
use App\Models\PrjPrizeSets;
use App\Models\Project;
use App\Models\User;
use App\Models\Account;
use App\Models\Transaction;

use DB;
use Illuminate\Support\Facades\Redirect;
use ViewHelper;
use Message;
use Coefficient;


class ProjectController extends AdminBaseController {

    protected $modelName = 'App\Models\Project';

    public $customViewPath = 'project';
    public $customViews = ['view'];


    protected function beforeRender() {
        parent::beforeRender();
        $aIsTester = baseOption('base.isTester');
        $aCoefficient = Coefficient::$coefficients;
        $aStatus = baseOption('base.projects.status');
        $aLotteries = Lottery::getSelectSearchArrays();
        $this->setVars(compact('aLotteries', 'aCoefficient', 'aIsTester', 'aStatus'));
        switch ($this->action) {
            case 'index':
                $aPageSizes = [20, 50, 100];
                $this->setVars('aPageSizes',$aPageSizes);
                if (isset($this->params['lottery_id']) && !empty($this->params['lottery_id'])) {
                    $aWays = LotteryWays::getLotteryWaysByLotteryId($this->params['lottery_id']);
                    $aIssues = Issue::getIssuesByLotteryId($this->params['lottery_id']);
                    $this->setVars(compact('aWays', 'aIssues'));
                }
                break;
        }
    }

    protected function setFunctionality() {
        //当下载的时候，用index的参数和搜索配置
        if ($this->action == 'download') $this->action = 'index';
        parent::setFunctionality();
    }

    protected function setSearchInfo() {
        isset($this->params['way_id']) or $this->params['way_id'] = null;
        isset($this->params['is_tester']) or $this->params['is_tester'] = '0';
        if (isset($this->params['lottery_id']) && isset($this->params['issue'])) {
            $oIssue = Issue::getIssue($this->params['lottery_id'], $this->params['issue']);
            isset($this->params['bought_at_from']) or $this->params['bought_at_from'] = date('Y-m-d 00:00:00', $oIssue->begin_time);
        }
        if (empty($this->params['bought_at_from']) && empty($this->params['bought_at_to'])) {
            $this->params['bought_at_from'] = date('Y-m-d 00:00:00');
        }
        parent::setSearchInfo();
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
        $this->widgets = ['project.project_search'];
        return parent::index();
    }

    public function download() {
        $oQuery = $this->indexQuery();
        $datas = $oQuery->get(Project::$columnForList);
        if (count($datas) > 0) {
            $this->setVars(compact('datas'));
            $this->action = 'view';
            $this->beforeRender();
            $this->compileRenderVars();
            $aData = [];
            foreach ($datas as $k => $v) {
                foreach (Project::$columnForList as $vk) {
                    $aData[$k][] = ViewHelper::compileDisplayValue($v, $vk, $this->viewVars['aViewSettings'], $this->viewVars['aArrayVars'], $sClass);
                }
            }
            (new Project())->downloadExcel(Project::$columnForList, $aData, 'Project Report', '../uploads/', 'Browser');
            exit;
        }
        return $this->goBack('error', '没有数据');
    }

    /**
     * 撤单
     *
     * @param int $id
     *
     * @return Redirect
     */
    function drop($id) {
        $oProject = Project::find($id);
        if (empty($oProject)) {
            return $this->goBack('error', ___('_project.project-empty'));
        }
        if (in_array($oProject->status, [Project::STATUS_DROPED, Project::STATUS_DROPED_BY_SYSTEM])) {
            return $this->goBack('error',  ___('_project.drop-failed-status'));
        }
        $bSucc = Project::cancelProject($id);
        if(!$bSucc){
            return $this->goBack('error', ___('_project.drop-failed'));
        }
        return $this->goBack('success', ___('_project.droped'));
    }

    /**
     * 跳转到游戏记录
     *
     * @param int $id
     *
     * @return Redirect
     */
    public function ShowBetRecords($id){
        $oProject = Project::find($id);
        $sBetRecordId = $oProject->bet_record_id;
        if (!$sBetRecordId){
            return $this->goBack('error',  "没有此游戏记录");
        }

        return Redirect::route('bet-records.view')->with('id',$sBetRecordId);
    }

}