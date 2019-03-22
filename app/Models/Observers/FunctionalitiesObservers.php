<?php
/**
 * Created by PhpStorm.
 * User: lawrence
 * Date: 6/22/18
 * Time: 4:11 PM
 */

namespace App\Models;



use App\Models\Functionality;
use App\Models\FunctionalityRelation;
use App\Models\Menu;



class FunctionalitiesObservers{

    public function deleted(Functionality $model){
        $aWhere = ['functionality_id'=>$model->id];
        FunctionalityRelation::where($aWhere)->delete();
        FunctionalityRelation::where(['r_functionality_id'=>$model->id])->delete();
        Menu::where($aWhere)->delete();
    }
}