<?php

/**
 * Prize Groups
 *
 * @author lawrence
 */

namespace App\Http\Controllers;


use App\Models\Series;
use App\Models\PrizeGroup;
use DB;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;

class PrizeGroupController extends AdminBaseController {

    protected $modelName = 'App\Models\PrizeGroup';
    protected $customViewPath = 'custom.prizeGroup';
    protected $customViews = ['create'];

    protected function beforeRender() {
        parent::beforeRender();
        $aSeries = Series::getSelectSearchArrays();
        $aLotteryType= baseOption('base.lottery.type');
        $this->setVars(compact('aSeries','aLotteryType'));
    }

    public function create($id=null){
        if ($this->request->Method() == 'POST') {
            set_time_limit(0);
            isset($this->params['step']) or $this->params['step'] = 1;
            DB::connection()->beginTransaction();
            for($iPrize = $this->params['from']; $iPrize <= $this->params['to']; $iPrize += $this->params['step']){
                $aAttributes = [
                    'series_id' => $this->params['series_id'],
                    'classic_prize' => $iPrize
                ];
                //判断是否有数据，有则更新，没有则添加
                $oPrizeGroup = PrizeGroup::where($aAttributes)->first();
                !empty($oPrizeGroup) or $oPrizeGroup = new PrizeGroup($aAttributes);
                if (!$bSucc       = $oPrizeGroup->Save()) {
                    DB::connection()->rollback();
                    pr($this->model->getValidationErrorString());
                    break;
                }
            }
            if ($bSucc){
                DB::connection()->commit();
                return $this->goBackToIndex('success', __('_basic.created', $this->langVars));
            } else{
                DB::connection()->rollback();
                $this->langVars['reason'] = & $this->model->getValidationErrorString();
                return $this->goBack('error', __('_basic.create-fail', $this->langVars));
            }
        } else {
            $data       = $this->model;
            $isEdit     = false;
            $this->setVars(compact('data', 'isEdit'));
            $sModelName = $this->modelName;
            if ($sModelName::$treeable) {
                $sFirstParamName = 'parent_id';
            } else {
                list($sFirstParamName, $tmp) = each($this->paramSettings);
            }
            $aInitAttributes = isset($sFirstParamName) ? [$sFirstParamName => $id] : [];
            $this->setVars(compact('aInitAttributes'));

            return $this->render();
        }
    }


}