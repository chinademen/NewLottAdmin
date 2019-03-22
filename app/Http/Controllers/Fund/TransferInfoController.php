<?php

/**
 * Transfer Info
 *
 * @author lawrence
 */

namespace App\Http\Controllers;


use App\Models\User;

class TransferInfoController extends AdminBaseController {

    protected $modelName = 'App\Models\TransferInfo';

    protected function beforeRender() {
        parent::beforeRender();
        $aTypes = baseOption('base.fund.transfer_info_type');
        $aUsers = User::getSelectSearchArrays(['id','username']);
        $this->setVars(compact('aTypes','aUsers'));
    }

    protected function compileParams(){
        if(!empty($this->params['user_id'])){
            $oUsers = User::where('username','=',$this->params['user_id'])->first();
            if($oUsers) $this->params['user_id'] = $oUsers->id;
        }

    }

}