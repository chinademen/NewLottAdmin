<?php

/**
 * 资金流设定
 *
 * @author garin
 */

namespace App\Http\Controllers;


class FundFlowController extends AdminBaseController {

    protected $modelName = 'App\Models\FundFlow';

    protected function beforeRender() {
        parent::beforeRender();
        $aActions = baseOption('base.fund_flow.action');
        $this->setVars('aActions',$aActions);
    }

}