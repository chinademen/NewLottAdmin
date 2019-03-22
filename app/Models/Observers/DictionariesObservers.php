<?php
/**
 * Created by PhpStorm.
 * User: lawrence
 * Date: 6/22/18
 * Time: 4:11 PM
 */

namespace App\Models;


use App\Models\Dictionary;
use App\Models\Vocabulary;

class DictionariesObservers{

    public function deleted(Dictionary $model){
        $aWhere = ['dictionary_id'=>$model->id];
        Vocabulary::where($aWhere)->delete();
    }
}