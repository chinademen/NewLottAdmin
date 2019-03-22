<?php

namespace App\Http\Controllers;


use App\Models\Functionality;
use App\Models\SearchConfig;
use App\Models\SearchItem;

use DB;
use Auth;
use App\Models\Menu;
use config;
class SearchItemController extends AdminBaseController {
    /**
     * 资源模型名称
     * @var string
     */
    protected $modelName = 'App\Models\SearchItem';
    protected $resource = 'search-items';

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

        switch($this->action){
            case 'index':
            case 'view':
                Functionality::getTree($aFunctionalities,null,null,null,null);
                $aSearchForms = & SearchConfig::getTitleList();
                break;
            case 'edit':
            case 'create':
                Functionality::getTree($aFunctionalities,null,null,['title' => 'asc']);
                $aSearchForms = & SearchConfig::getTitleList();
                $this->setVars('aValidTypes', SearchItem::getValidTypes());
                break;
        }


        $this->setVars(compact('aFunctionalities','aSearchForms','aLoginUser'));
    }
}

