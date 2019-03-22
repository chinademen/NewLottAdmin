<?php

/**
 * Releases
 * @author lawrence
 */

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\Terminal;

class ReleasesController extends AdminBaseController {

    protected $modelName = 'App\Models\Releases';

    protected function beforeRender() {
        parent::beforeRender();
        $aTerminals = Terminal::getSelectSearchArrays();
        $aIsTrue = baseOption('base.isTrue');
        $aMerchants = Merchant::getSelectSearchArrays();
        $this->setVars(compact('aTerminals', 'aMerchants', 'aIsTrue'));
    }

}