<?php

/**
 * User Prize Set
 *
 * @author lawrence
 */

namespace App\Http\Controllers;


use App\Models\Lottery;
use App\Models\Merchant;
use App\Models\Series;

class UserPrizeSetController extends AdminBaseController {

    protected $modelName = 'App\Models\UserPrizeSet';

    protected function beforeRender() {
        parent::beforeRender();
        $aLotteries = Lottery::getSelectSearchArrays();
        $aMerchants = Merchant::getSelectSearchArrays();
        $aSeries = Series::getSelectSearchArrays();
        $this->setVars(compact('aLotteries','aMerchants','aSeries'));
    }

    protected function afterDestroy($model) {
        $this->createUserManageLogs($model->user_id, '删除用户奖级组[用户：'.$model->user_id.'-彩种：'.$model->lottery_id.']');
        return parent::afterDestroy($model);
    }

    protected function afterEdit($id) {
        $this->createUserManageLogs($this->model->user_id, '编辑用户奖级组[用户：'.$this->model->user_id.'-彩种：'.$this->model->lottery_id.']');
        return parent::afterEdit($id);
    }
}