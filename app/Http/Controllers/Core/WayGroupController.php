<?php

/**
 * 玩法组
 * @author lawrence
 */

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\Terminal;

class WayGroupController extends AdminBaseController {

    protected $modelName = 'App\Models\WayGroup';

    protected function beforeRender() {
        parent::beforeRender();
        $aSeries = Series::getSelectSearchArrays();
        $aTerminals = Terminal::getSelectSearchArrays();
        $aParents = $this->model::getModelRelationArrays(['id','title','series_id'],$aSeries,[ 'parent_id' => null ]);
        $aIsTrue = baseOption('base.isTrue');
        $this->setVars(compact("aSeries", 'aTerminals', 'aParents', 'aIsTrue'));
    }
}