<?php

/**
 * 商户账户
 *
 * @author lawrence
 */

namespace App\Http\Controllers;

use App\Models\Merchant;

class MerchantAccountController extends AdminBaseController {

    protected $modelName = 'App\Models\MerchantAccount';

    protected function beforeRender() {
        parent::beforeRender();
        $aProfitType = baseOption('base.merchant.profit_type');
        $this->setVars(compact('aProfitType'));
        $aMerchants = Merchant::getSelectSearchArrays();
        $this->setVars(compact('aMerchants'));
    }

}