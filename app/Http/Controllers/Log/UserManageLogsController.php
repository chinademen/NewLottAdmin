<?php

/**
 * 用户管理日志
 *
 * @author loren
 */

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserManageLogs;

class UserManageLogsController extends AdminBaseController {

    protected $modelName = 'App\Models\UserManageLogs';

    protected function beforeRender() {
        parent::beforeRender();
    }

    protected function setSearchInfo() {
        if(empty($this->params['user_name'])){
            if(!empty($this->params['user_id'])) {
                $oUsers = User::find($this->params['user_id']);
                if (!empty($oUsers->id)) {
                    $this->params['user_name'] = $oUsers->username;
                }
            }
        }else{
            $oUsers = User::where('username','=',$this->params['user_name'])->first();
            if(!empty($oUsers->id)){
                $this->params['user_id'] = $oUsers->id;
            }
        }
        parent::setSearchInfo();
    }

}