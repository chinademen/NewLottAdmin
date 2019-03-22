<?php

/**
 * 追号详情
 *
 * @author loren
 */

namespace App\Http\Controllers;

use App\Models\Lottery;

class TraceDetailsController extends AdminBaseController {

    protected $modelName = 'App\Models\TraceDetails';

    /**
     * 在渲染前执行，为视图准备变量
     */
    protected function beforeRender() {
        parent::beforeRender();
        $aStatuses = baseOption('base.trace_details.status');
        $aLotteries = Lottery::getSelectSearchArrays();
        $this->setVars(compact('aStatuses', 'aLotteries'));
    }

}