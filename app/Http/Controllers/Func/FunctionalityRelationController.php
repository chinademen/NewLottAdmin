<?php

namespace App\Http\Controllers;


use App\Models\Functionality;
use App\Models\FunctionalityRelation;

use DB;
use Auth;
use App\Models\Menu;
use config;


class FunctionalityRelationController extends AdminBaseController
{
    /**
     * 资源模型名称，初始化后转为模型实例
     * @var string|Illuminate\Database\Eloquent\Model
     */
    protected $modelName = 'App\Models\FunctionalityRelation';
    protected $resource = 'functionality-relations';

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
        $this->setVars('aValidPositions', $sModelName::$validPositions);
        $this->setVars('aValidRealms', Functionality::$realms);

        switch($this->action){
            case 'index':
            case 'view':
                $aFunctionalities = & Functionality::getTitleList();
                $aValidPositions = FunctionalityRelation::$validPositions;
                $this->setVars(compact('aFunctionalities', 'aValidPositions'));
                break;
            case 'edit':
            case 'create':
                $oFunctionality = new Functionality;
                $oFunctionality->getTree($functionalitiesTree, null, null, ['title' => 'asc'], '--');
                $this->setVars('aFunctionalities', $functionalitiesTree);
                break;
        }
    }
}
