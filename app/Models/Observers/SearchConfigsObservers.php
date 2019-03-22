<?php
/**
 * Created by PhpStorm.
 * User: lawrence
 * Date: 6/22/18
 * Time: 4:11 PM
 */

namespace App\Models;

use App\Models\SearchConfig;
use App\Models\SearchItem;

class SearchConfigsObservers{

    public function deleted(SearchConfig $model){
        $aWhere = [ 'search_config_id' => $model->id ];
        SearchItem::where($aWhere)->delete();
    }
}