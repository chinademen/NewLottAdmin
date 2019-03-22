<?php

/**
 * Terminal Lotteries
 * @author lawrence
 */

namespace App\Http\Controllers;

use App\Models\Terminal;
use App\Models\Lottery;

class TerminalLotteryController extends AdminBaseController{

    protected $modelName = 'App\Models\TerminalLottery';

    protected function beforeRender(){
        parent::beforeRender();
        $aTerminals = Terminal::getSelectSearchArrays();
        $aLotterys = Lottery::getSelectSearchArrays();
        $aStatuses = baseOption('base.terminal_lottery.status');
        $this->setVars(compact("aTerminals","aLotterys","aStatuses"));
    }

}