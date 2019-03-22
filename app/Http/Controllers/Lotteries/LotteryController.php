<?php

/**
 * 彩种
 *
 * @author lawrence
 */

namespace App\Http\Controllers;

use App\Models\Lottery;
use App\Models\Series;

class LotteryController extends AdminBaseController {

    protected $modelName = 'App\Models\Lottery';

    protected function beforeRender() {
        parent::beforeRender();
        switch($this->action){
            case 'create':
                if(!$this->request->isMethod('POST') && !empty($this->viewVars['series_id'])){
                    $oSeries = Series::find($this->viewVars['series_id']);
                    if($oSeries){

                    }
                }
            case 'edit':
                $this->setVars('aSeriesIds', Series::getSelectSearchArrays());
                $this->setVars('aLottoTypes', baseOption('base.lottery.lotto_type'));
                $this->setVars('aStatusArr', baseOption('base.lottery.status'));
            case 'index':
                $this->setVars('aLotteryTypes', baseOption('base.lottery.type'));
                break;
        }
    }

    /**
     * 更新彩种的用户奖金组
     */
    public function updateUserPrizeSetByLottery($id){
        return $this->goBack('error', '更新彩种的用户奖金组,没有逻辑代码 ID：'.$id);
        //TODO loren artisan (not)更新彩种的用户奖金组 = 生成奖金组配置
        Artisan::call('user_prize_set:duplicate', ['lottery_id' => $id, '--quiet' => true]);
    }

}