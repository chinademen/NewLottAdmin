<?php

/**
 * 休市管理
 *
 * @author loren
 */

namespace App\Http\Controllers;

use App\Models\Lottery;

class RestSettingsController extends AdminBaseController {

    protected $modelName = 'App\Models\RestSettings';

    protected function beforeRender() {
        parent::beforeRender();
        $this->setVars('aLotteryIds', Lottery::getSelectSearchArrays());
        $this->setVars('aPeriodics', baseOption('base.rest_settings.periodic'));
    }

}