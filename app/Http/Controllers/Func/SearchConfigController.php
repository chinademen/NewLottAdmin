<?php

namespace App\Http\Controllers;


use App\Models\Functionality;

use Input;

use DB;
use Auth;
use App\Models\Menu;
use config;
class SearchConfigController extends AdminBaseController {
    /**
     * 资源模型名称
     * @var string
     */
    protected $modelName = 'App\Models\SearchConfig';
    protected $resource = 'search-configs';

    /**
     * 自定义验证消息
     * @var array
     */
    protected $validatorMessages = [];

    /**
     * 在渲染前执行，为视图准备变量
     */
    protected function beforeRender() {
        $sModelName = $this->modelName;

        $this->setVars('aValidRealms', $sModelName::$realms);
        switch ($this->action) {
            case 'index':
            case 'listSearchConfig':
                $this->action = 'index';
            case 'view':
            case 'edit':
            case 'create':
                break;
        }
        parent::beforeRender();
    }

    /**
     * 资源列表页面
     * GET
     * @return Response
     */
    public function listSearchConfig() {
        if (isset($this->params['id'])) {
            $oFunction = Functionality::find($this->params['id']);
            $aConditions = ['id' => ['=', ($oFunction->search_config_id ? $oFunction->search_config_id : null)]];
        } else {
            $aConditions = & $this->makeSearchConditions();
        }
        $oQuery = $this->model->doWhere($aConditions);
        // TODO 查询软删除的记录, 以后需要调整到Model层
        $bWithTrashed = trim(Input::get('_withTrashed', 0));
        // pr($bWithTrashed);exit;
        if ($bWithTrashed)
            $oQuery = $oQuery->withTrashed();
        if ($sGroupByColumn = Input::get('group_by')) {
            $oQuery = $this->model->doGroupBy($oQuery, [$sGroupByColumn]);
        }
        // 获取排序条件
        $aOrderSet = [];
        if ($sOorderColumn = Input::get('sort_up', Input::get('sort_down'))) {
            $sDirection = Input::get('sort_up') ? 'asc' : 'desc';
            $aOrderSet[$sOorderColumn] = $sDirection;
        }
        $oQuery = $this->model->doOrderBy($oQuery, $aOrderSet);


        $sModelName = $this->modelName;

        $datas = $oQuery->paginate(static::$pagesize);
        $this->setVars(compact('datas'));
        if ($sMainParamName = $sModelName::$mainParamColumn) {
            if (isset($aConditions[$sMainParamName])) {
                $$sMainParamName = is_array($aConditions[$sMainParamName][1]) ? $aConditions[$sMainParamName][1][0] : $aConditions[$sMainParamName][1];
            } else {
                $$sMainParamName = null;
            }
            $this->setVars(compact($sMainParamName));
        }

        return $this->render();
    }

}
