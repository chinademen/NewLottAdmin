<?php

/**
 * User Login Ip
 *
 * @author lawrence
 */

namespace App\Http\Controllers;


use App\Models\Merchant;

class UserLoginIpController extends AdminBaseController {

    protected $modelName = 'App\Models\UserLoginIp';

    protected function beforeRender() {
        parent::beforeRender();
        $aMerchants = Merchant::getSelectSearchArrays();
        $aIsTester = baseOption('base.isTester');
        $this->setVars(compact('aMerchants','aIsTester'));
    }

}