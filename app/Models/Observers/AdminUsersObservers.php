<?php
/**
 * Created by PhpStorm.
 * User: lawrence
 * Date: 6/22/18
 * Time: 4:11 PM
 */

namespace App\Models;



class AdminUsersObservers{

    public function deleted(\App\Models\AdminUser $model){

        $aWhere = ['user_id'=>$model->id];
        //dd($aWhere,\App\Models\AdminRoleUser::where($aWhere)->get(),\DB::getQueryLog());
        \App\Models\AdminRoleUser::where($aWhere)->delete();
    }
}