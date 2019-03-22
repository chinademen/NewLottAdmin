<?php

/**
 * 商户IP白名单
 *
 * @author lawrence
 */

namespace App\Http\Controllers;


use App\Models\Merchant;

class MerchantIpController extends AdminBaseController {

    protected $modelName = 'App\Models\MerchantIp';

    protected function beforeRender() {
        parent::beforeRender();
        $aMerchants = Merchant::getSelectSearchArrays();
        $this->setVars(compact('aMerchants'));

    }
    protected function compileParams(){
        if(!empty($this->params)){
            $sKeyword = $this->params['merchant_id'];
            $oR = Merchant::where(['name'=>$sKeyword])->first(['id']);
            $oR && $this->params['merchant_id'] = $oR->id;
        }
    }


}