<?php

namespace App\Http\Controllers;


use App\Models\Functionality;
use Auth;
use Config;
use DB;
use App\Models\Menu;

class MenuController extends AdminBaseController
{
    /**
     * 资源模型名称
     * @var string
     */
    protected $modelName = 'App\Models\Menu';
    protected $resource = 'menus';

    /**
     * 自定义验证消息
     * @var array
     */
    protected $validatorMessages = array(
        // 'title.required'   => '请输入菜单名。',
        // // 'title.alpha_dash' => '菜单名格式不正确。',
        // 'title.between'    => '菜单名长度请保持在:min到max位之间。',
        // // 'title.unique'     => '此用户名已被使用。',
        // 'disabled.in'      => '非法输入。',
        // 'new_win.in'       => '非法输入。',
        // 'sequence.numeric' => '必须是数字。'
    );

    protected $rules  = array(
        'title'      => 'required|between:1,30',
        'disabled'   => 'boolean',
        'new_window' => 'boolean',
        'sequence'   => 'integer'
    );

    /**
     * 在渲染前执行，为视图准备变量
     */
    protected function beforeRender() {
        parent::beforeRender();
        $oFunctionality = new Functionality;

        switch($this->action) {
            case 'index':
            case 'view':
                $aMenuTree        = & $this->model->getTitleList();
                $aFunctionalities = & $oFunctionality->getTitleList();
                break;
            case 'edit':
            case 'create':
                $this->model->getTree($aMenuTree,null,null,['title' => 'asc']);
                $oFunctionality->getTree($aFunctionalities, null, ['menu' => ['=', 1]], ['title' => 'asc']);
                break;
        }
        $this->setVars(compact('aMenuTree','aFunctionalities'));
    }

    /**
     * 用表单数据填充模型实例
     */
    protected function _fillModelDataFromInput() {
        parent::_fillModelDataFromInput();
        $this->model->functionality_id or $this->model->functionality_id = null;
    }

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

}
