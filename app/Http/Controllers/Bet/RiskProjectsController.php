<?php

/**
 * 风险注单
 *
 * @author loren
 */

namespace App\Http\Controllers;


use App\Models\Lottery;
use App\Models\RiskProjects;
use App\Models\Terminal;

class RiskProjectsController extends AdminBaseController {

    protected $modelName = 'App\Models\RiskProjects';

    protected function beforeRender() {
        parent::beforeRender();
        $aStatus = baseOption('base.risk_projects.status');
        $aLotteries = Lottery::getSelectSearchArrays();
        $aTerminals =  Terminal::getSelectSearchArrays();
        $this->setVars(compact('aLotteries', 'aStatus', 'aTerminals'));
    }

    public function audit($id){
        if (!$oRiskProject = $this->_checkId($id, $sError)){
            return $this->goBack('error', $sError);
        }
        if ($bSucc = $oRiskProject->setRiskAudited()){
            $sType = 'success';
            $sMsg = ___('_riskproject.audited');
        }
        else{
            $sType = 'error';
            $sMsg = ___('_riskproject.audit-failed');
        }
        return $this->goBack($sType, $sMsg);
    }

    public function setRisk($id){
        if (!$oRiskProject = $this->_checkId($id, $sError)){
            return $this->goBack('error', $sError);
        }
        if ($bSucc = $oRiskProject->setRisk($this->params['note'])){
            $sType = 'success';
            $sMsg = ___('_riskproject.set-risk-finished');
        }
        else{
            $sType = 'error';
            $sMsg = ___('_riskproject.set-risk-failed');
        }
        return $this->goBack($sType, $sMsg);
    }

    /**
     * 检查传入的id是否合法
     * @param int $id
     * @param string & $sError
     * @return RiskProject | false
     */
    private function _checkId($id, & $sError){
        if (!$oRiskProject = RiskProjects::find($id)){
            $sError = ___('basic.data-not-exists',['data' => ___('_model.riskproject')]);
            return false;
        }
        if ($oRiskProject->status != RiskProjects::STATUS_NORMAL){
            $sError = ___('_riskproject.status-error');
            return false;
        }
        return $oRiskProject;
    }
    

}