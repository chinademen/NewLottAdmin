<?php

/**
 * 商户配置
 *
 * @author lawrence
 */

namespace App\Http\Controllers;


use Carbon\Carbon;

class MerchantController extends AdminBaseController {

    protected $modelName = 'App\Models\Merchant';

    protected $customViewPath = 'merchant';
    protected $customViews = [
          'merchantTester'
    ];
    protected function beforeRender() {
        parent::beforeRender();
        $aIsTester = baseOption('base.isTester');
        $aMerchantStatus = baseOption('base.merchant.status');
        $this->setVars(compact('aIsTester','aMerchantStatus'));
    }

    public function merchantTester(){

        /*isset($iLotteryId) or $iLotteryId     = 1;
        $oIssue         = new ManIssue;
        $sModelName     = & $this->modelName;
        $oLatestIssue   = $oIssue->getFirstNonNumberIssue($iLotteryId);
        $aColumnForList = $sModelName::$columnForList;
        //            $datas          = $oQuery->paginate(static::$pagesize);
        $datas          = $oIssue->getIssueObjects($iLotteryId, 100, null, time(), true);
        $this->setVars(compact('oLatestIssue', 'aColumnForList', 'datas'));
        $this->setVars('iCurrentLotteryId', $iLotteryId);*/
        $sModelName = $this->modelName;
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
        }
        $oQuery = $this->indexQuery();
        $oQuery = $oQuery->where('is_tester','=','1'); // 测试商户
        // 搜索
        if(!empty($this->params)){
            $sKeyWord = $this->params['name'];
            $oQuery  = $oQuery->where('name','like','%'.$sKeyWord.'%');
        }
        $iPageSize = isset($this->params['pagesize']) && is_numeric($this->params['pagesize']) ? $this->params['pagesize'] : static::$pagesize;
        $datas = $oQuery->paginate($iPageSize);
        $this->setVars(compact('datas'));
        if ($sMainParamName = $sModelName::$mainParamColumn) {
            if (isset($aConditions[$sMainParamName])) {
                $$sMainParamName = is_array($aConditions[$sMainParamName][1]) ? $aConditions[$sMainParamName][1][0] : $aConditions[$sMainParamName][1];
            } else {
                $$sMainParamName = null;
            }
            $this->setVars(compact($sMainParamName));
        }
        $sDataUpdatedTime = $this->viewVars['datas']->count() ? $this->viewVars['datas'][0]->updated_at : Carbon::now()->toDateTimeString();
        $this->setVars(compact('sDataUpdatedTime'));
        return $this->render();
    }



}