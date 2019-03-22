<?php

namespace App\Http\Controllers;


use App\Models\Functionality;

use DB;
use Auth;
use App\Models\Menu;
use config;
class FunctionalityParamController extends AdminBaseController
{
    protected $modelName = 'App\Models\FunctionalityParam';
    protected $resource = 'functionality-params';

    function diffBetweenTwoDays ($day1, $day2)
    {
        $second1 = strtotime($day1);
        $second2 = strtotime($day2);

        if ($second1 < $second2) {
            $tmp = $second2;
            $second2 = $second1;
            $second1 = $tmp;
        }
        return ($second1 - $second2) / 86400;
    }

    /**
     * 自定义验证消息
     * @var array
     */
    protected $validatorMessages = [];

    /**
     * 在渲染前执行，为视图准备变量
     */
    protected function beforeRender() {
        parent::beforeRender();
        $sModelName = $this->modelName;
        $oFunctionality = new Functionality;
        $this->setVars('aValidTypes', ['int' => 'int','string' => 'string']);

        switch($this->action){
            case 'index':
            case 'view':
                $aFunctionalities = & $oFunctionality->getTitleList();
                $this->setVars(compact('aFunctionalities'));
                break;
            case 'edit':
            case 'create':
                $oFunctionality->getTree($functionalitiesTree,null,null,['title' => 'asc']);
                $this->setVars('aFunctionalities', $functionalitiesTree);
                break;
        }
    }

}
