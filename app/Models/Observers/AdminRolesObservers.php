<?php
/**
 * Created by PhpStorm.
 * User: lawrence
 * Date: 6/22/18
 * Time: 4:11 PM
 */

namespace App\Models;




use App\Models\AdminRoleUser;

class AdminRolesObservers{

    public function deleted(\App\Models\AdminRole $model){
        $aWhere = ['role_id'=>$model->id];
        AdminRoleUser::where($aWhere)->delete();
    }
}