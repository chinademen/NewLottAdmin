<?php
namespace App\Http\Controllers;

use App\Http\Controllers\AdminBaseController;

use App\Models\Functionality;

use DB;
use Auth;
use App\Models\Menu;
use config;
use Illuminate\Support\Facades\Session;
use Input;
/**
 * 管理员角色管理
 *
 * @author white
 */
class AdminRoleController extends AdminBaseController {

    protected $customViewPath     = 'admin.role';
    protected $customViews    = [
        'setRights',
        'viewRights',
    ];
    protected $modelName = 'App\Models\AdminRole';
    protected $resource  = 'admin-roles';
    /**
     * 在渲染前执行，为视图准备变量
     */
    protected function beforeRender() {
        parent::beforeRender();
        $sModelName = $this->modelName;

        switch($this->action){
            case 'index':
            case 'view':
            case 'edit':
            case 'create':
                $aPriority = $sModelName::$aPriority;
                $aRoleTypes = $sModelName::$aRoleTypes;
                $this->setVars(compact('aPriority', 'aRoleTypes'));
                break;
            case 'bindUser':
                $aRoles = $sModelName::getAllRoleNameArray($this->roleType);
                $this->setVars(compact('aRoles'));
                break;
            case 'showRights':
            case 'setRights':
                break;
        }
    }

    public function viewRights ($role_id){
        if (! $role_id) {
            $this->langVars['reason'] = ___('_basic.no-role', $this->langVars);
            return $this->goBack('error', ___('_basic.update-fail', $this->langVars));
        }
        $oRole       = $this->model->find($role_id);
        $sRoleName  = $oRole->name;
        // 获取排序条件
        $orderColumn = Input::get('sort_up', Input::get('sort_down', 'sequence'));
        $direction   = Input::get('sort_up') ? 'asc' : 'desc' ;
        // 构造查询语句
        if (!$oRole->right_settable) {
            return redirect()->back()
                ->with('error', '<strong>' . ___("The Role don't allow setting rights") . '</strong>');
        }
        $checked = explode(',', $oRole->rights);
        Functionality::getTreeArray($datas, null, Functionality::REALM_ADMIN);
        $readonly = true;
        $this->action = 'setRights';
        $this->setVars(compact('datas', 'checked', 'role_id', 'readonly', 'sRoleName'));
        return $this->render();
    }

    /**
     * [setRights 给角色绑定功能权限]
     * @param  [Int] $role_id [角色id]
     * @return [Response]          [description]
     */
    public function setRights ($role_id = null)
    {

        if (!$role_id) {
            $this->langVars['reason'] = ___('_basic.no-role', $this->langVars);
            return $this->goBack('error', ___('_basic.update-fail', $this->langVars));
        }
        $oRole     = $this->model->find($role_id);
        $sRoleName = $oRole->name;

        if ($this->request->isMethod('POST') || $this->request->isMethod('PUT')) {
            $backUrl = $this->request->session()->get('curPage');
            $aRights = Input::get('functionality_id', '');
            if (is_array($aRights)) {
                $aRights       = array_unique($aRights);
                // pr($aRights);exit;
                $oRole->rights = implode(',', $aRights);
            }
            else {
                $oRole->rights = $aRights;
            }
            $bSucc = $oRole->save();
            if ($bSucc) {
                return $this->goBackToIndex('success', '_role.right-updated');
            }
            else {
                return $this->goBack('error', ___('_role.right-updated-fail', $this->langVars));
            }
        }
        else {
            // 获取排序条件
            $orderColumn = Input::get('sort_up', Input::get('sort_down', 'sequence'));
            $direction   = Input::get('sort_up') ? 'asc' : 'desc';
            // 构造查询语句
            if (!$oRole->right_settable) {
                return redirect()->back()
                        ->with('error', '<strong>' . ___("The Role don't allow setting rights") . '</strong>');
            }

            Functionality::getTreeArray($datas, null, Functionality::REALM_ADMIN);
            $checked = explode(',', $oRole->rights);
            $readonly = false;
            $this->setVars(compact('datas', 'role_id', 'checked', 'readonly', 'sRoleName'));
            return $this->render();
        }

        return $this->render();
    }
}
