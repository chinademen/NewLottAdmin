<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Models\Menu;
use config;

class SysConfigController extends AdminBaseController {
    protected $customViewPath = 'sysConfig';
    protected $customViews = [
        'settings',
        'setValue'
    ];

    /**
     * 资源模型名称
     * @var string
     */
    protected $modelName = 'App\Models\SysConfig';
    protected $resource = 'sys-configs';

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
            case 'settings':
                $this->setVars('aColumnForList', $sModelName::$columnForList);
            case 'index':
            case 'view':
            case 'edit':
            case 'create':
                $aValidDataTypes     = $sModelName::$validDataTypes;
                $aValidInputTypes    = $sModelName::$validInputTypes;
                $aValidValidateTypes = $sModelName::$validValidateRules;
                $aParentSysConfigs   = $sModelName::getGoupArray(true);
                $this->setVars(compact('aValidDataTypes', 'aValidInputTypes', 'aValidValidateTypes', 'aParentSysConfigs'));
                break;
        }
    }

    /**
     * for settings
     */
    public function settings(){
        return $this->index();
    }

    /**
     * 根据实际情况修改验证规则
     * @param model $oModel
     * @return array
     */
    protected function & _makeVadilateRules($oModel) {
        $sClassName = get_class($oModel);
        $iParentId = $oModel->parent_id or $iParentId = null;
        $aRules = $sClassName::$rules;
        if (!$iParentId){
            unset($aRules['value'], $aRules['data_type'], $aRules['data_type'], $aRules['form_face'], $aRules['validation']);
        }
        return $aRules;
    }

    public function setValue($id) {
        if (!$id && empty($this->params)) {
            return $this->goBack('error', ___('_basic.no-data'));
            $this->_goBackUrl('index');
        }
        $this->model = $this->model->find($id);
        if ($this->request->isMethod('POST')) {
            $mValue = isset($this->params['value']) ? $this->params['value'] : null;
            $this->model->value = $mValue;
            $aTrans = ['item' => $this->model->item];
            if ($bSucc = $this->model->save()){
                return $this->goBackToIndex('success', ___('_sysconfig.seted', $aTrans, 0));
            }
            else{
                return $this->goBackToIndex('error', ___('_sysconfig.set-failed', $aTrans, 0));
            }

        }
        $parent_id = $this->model->parent_id;
        $data = $this->model;
        $isEdit = true;
        $this->setVars(compact('data', 'parent_id', 'isEdit','id'));
        if (in_array($data->form_face, ['select', 'multi_select', 'checkbox', 'radio'])) {
            $aDataSource = $data->getSource($data->data_source);
            $this->setVars(compact('aDataSource'));
        }
        return $this->render();
    }

}

