<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use App\Models\AdminRole;
use App\Models\AdminRoleUser;

use DB;
use Auth;
use App\Models\Menu;
use config;
/**
 * 管理员角色关系管理
 *
 * @author Winter
 */
class AdminRoleUserController extends AdminBaseController {
    protected $modelName = 'App\Models\AdminRoleUser';
    protected $resource  = 'admin-role-users';

    /**
     * 在渲染前执行，为视图准备变量
     */
    protected function beforeRender() {
         parent::beforeRender();
        $sModelName = $this->modelName;

        switch($this->action){
            case 'view':
            case 'create':
                $this->setVars('aRoles', AdminRole::getTitleList(true));
                $this->setVars('aUsers', AdminUser::getTitleList(true));
                break;
            case 'bindUser':
                $aRoles = AdminRole::getAllRoleNameArray($this->roleType);
                $this->setVars(compact('aRoles'));
                break;
            case 'showRights':
            case 'setRights':
                break;
        }
    }

    public function create($id = null) {
        if ($this->request->isMethod('POST')) {
            $iRoleId = $this->request->input('role_id');
            $iUserId = $this->request->input('user_id');

            if (AdminRoleUser::checkUserRoleRelation($iRoleId, $iUserId)) {
                $this->langVars['reason'] = ___('exists');
                return $this->goBack('error', ___('_basic.create-fail', $this->langVars));
            }
        }
        return parent::create($id);
    }

}
