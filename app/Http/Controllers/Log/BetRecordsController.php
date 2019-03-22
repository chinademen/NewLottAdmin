<?php

/**
 * 投注记录详情
 *
 * @author loren
 */

namespace App\Http\Controllers;


class BetRecordsController extends AdminBaseController {

    protected $modelName = 'App\Models\BetRecords';

    protected function beforeRender() {
        parent::beforeRender();
        $this->setVars('aLotteries', Lottery::getSelectSearchArrays());
    }

}