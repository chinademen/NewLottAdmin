<?php

/**
 * Transaction Type
 * @author lawrence
 */

namespace App\Http\Controllers;

use App\Models\FundFlow;
use App\Models\TransactionType;

class TransactionTypeController extends AdminBaseController{

    protected $modelName = 'App\Models\TransactionType';

    protected function beforeRender(){
        parent::beforeRender();
        $aFundFlows = FundFlow::getSelectSearchArrays(['id','description']);
        $aIsTrue = baseOption('base.isTrue');
        $aActions = baseOption('base.fund_flow.action');
        $this->setVars('aTransactionTypes', TransactionType::getSelectSearchArrays(['id','description']));
        $this->setVars(compact('aFundFlows','aIsTrue','aActions'));
    }

}