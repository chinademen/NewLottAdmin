<?php

/**
 * 奖期规则
 *
 * @author loren
 */

namespace App\Http\Controllers;
use App\Models\Lottery;

class IssueRulesController extends AdminBaseController {

    protected $modelName = 'App\Models\IssueRules';

    protected function beforeRender() {
        parent::beforeRender();
        $this->setVars('aLotteryIds', Lottery::getSelectSearchArrays());
    }

}