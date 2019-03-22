<?php

/**
 * Series Ways
 * @author lawrence
 */

namespace App\Http\Controllers;

use App\Models\BasicWay;
use App\Models\Series;
use App\Models\SeriesMethod;
use App\Models\SeriesWayMethod;

use Request;

class SeriesWayController extends AdminBaseController {

    protected $modelName = 'App\Models\SeriesWay';
    protected $customViewPath = 'custom.seriesWay';
    protected $customViews = [
        'create', 'edit', 'setNote'
    ];

    protected function beforeRender() {
        parent::beforeRender();
        $aLotteryTypes = baseOption('base.lottery.type');
        $aWhere = $aWhereByBasicWay = [];
        /*switch($this->action){
            case 'edit':
                $aWhere = ['series_id'=>$this->model->series->id];
                $aWhereByBasicWay =['lottery_type'=>$this->model->series->type];
                break;
        }*/
        $aSeries = Series::getSelectSearchArrays(['id', 'name']);
        $aSeriesMethods = SeriesMethod::getModelRelationArrays('series_id', $aSeries, $aWhere);
        $aSeriesWayMethods = SeriesWayMethod::getModelRelationArrays('series_id', $aSeries, $aWhere);
        $aBasicWays = BasicWay::getModelRelationArrays('lottery_type', $aLotteryTypes, $aWhereByBasicWay);

        $this->setVars(compact('aSeries', 'aBasicWays', 'aSeriesMethods', 'aSeriesWayMethods'));
    }

    /**
     * 设置投注说明和中奖说明
     *
     * @param $id
     *
     * @return RedirectResponse|SeriesWayController|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function setNote($id) {
        $this->model = $this->model->find($id);
        if (!is_object($this->model)) {
            return $this->goBackToIndex('error', ___('_basic.missing', $this->langVars));
        }
        if (Request::method() == 'PUT') {
            $this->model->bet_note = $this->params['bet_note'];
            $this->model->bonus_note = $this->params['bonus_note'];
            $this->model->fillable(['bet_note', 'bonus_note']);
            if ($bSucc = $this->model->save()) {
                return $this->goBackToIndex('success', ___('_seriesway.note-seted', $this->langVars));
            } else {
                $this->langVars['reason'] = &$this->model->getValidationErrorString();
                return $this->goBack('error', ___('_seriesway.note-set-failed', $this->langVars));
            }
        } else {
            $oSeries = Series::find($this->model->series_id);
            $this->setVars('data', $this->model);
            $this->setVars('series', $oSeries->name);
        }
        return $this->render();
    }

}