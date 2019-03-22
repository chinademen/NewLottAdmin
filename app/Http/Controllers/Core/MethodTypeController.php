<?php

/**
 * 玩法类型
 * @author lawrence
 */

namespace App\Http\Controllers;


class MethodTypeController extends AdminBaseController{

    protected $modelName = 'App\Models\MethodType';

    protected function beforeRender(){
        parent::beforeRender();
        $aLotteryTypes = baseOption('base.lottery.type');
        $aIsTrue = baseOption('base.isTrue');
        $attribute_code = baseOption('base.method_type.attribute_code');
        $attribute_codes =collect($attribute_code)->mapWithKeys(function($item,$key){
            return [$key=>$key.' : '.$item];
        });
        $this->setVars(compact('aLotteryTypes','aIsTrue','attribute_codes'));
    }

}