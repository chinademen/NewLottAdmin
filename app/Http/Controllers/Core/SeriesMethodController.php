<?php

/**
 * Series Methods
 * @author lawrence
 */

namespace App\Http\Controllers;

use App\Models\BasicMethod;
use App\Models\Series;

class SeriesMethodController extends AdminBaseController{

    protected $modelName = 'App\Models\SeriesMethod';

    protected function beforeRender(){
        parent::beforeRender();
        $aSeries = Series::getSelectSearchArrays();
        $aBasicMethods = BasicMethod::getModelRelationArrays('series_id',$aSeries);
        $aIstrue = baseOption('base.isTrue');
        $this->setVars(compact('aSeries', 'aBasicMethods','aIstrue'));

    }

}