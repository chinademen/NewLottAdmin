<?php

/**
 * Way Group Ways
 * @author lawrence
 */

namespace App\Models;

class WayGroupWay extends BaseModel{
    protected $connection = 'mysql';
    protected $table = 'way_group_ways';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_FIRST;

    protected static $cacheMinutes = 0;

    protected $fillable = [

        'series_id',
        'terminal_id',
        'group_id',
        'series_way_id',
        'title',
        'en_title',
        'for_display',
        'for_search',
        'for_mobile',
        'sequence',
    ];

    public static $sequencable = true;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'Way Group Way';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'series_id',
        'terminal_id',
        'group_id',
        'title',
        'en_title',
        'series_way_id',
        'for_display',
        'sequence',
    ];

    public static $totalColumns = [];

    public static $totalRateColumns = [];

    public static $weightFields = [];

    public static $classGradeFields = [];

    public static $floatDisplayFields = [];

    public static $noOrderByColumns = ['sequence' => 'asc',
                                       'id'       => 'asc'];

    public static $ignoreColumnsInView = [
    ];

    public static $ignoreColumnsInEdit = [
        'created_at',
        'updated_at',
    ];

    public static $ignoreColumnsInCreate = [];

    public static $listColumnMaps = [

    ];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [
        'series_id'=>'aSeries',
        'terminal_id'=>'aTerminals',
        'group_id'=>'aGroups',
        'series_way_id'=>'aSeriesWays',
        'for_display'=>'aIstrue',
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'title';

    public static $mainParamColumn = 'terminal_id';

    public static $rules = [
        'group_id'      => 'required|integer',
        'terminal_id'   => 'integer',
        'sequence'      => 'integer',
        'title'         => 'max:20',
        'en_title'      => 'max:30',
        'series_way_id' => 'required|integer',
        'for_display'   => 'required|in:0,1',
        'for_search'    => 'required|in:0,1',
    ];


    protected function beforeValidate(){
        if(!empty($this->way_group))
            $this->series_id = $this->way_group->series_id;
        if(!$this->title && !empty($this->series_way))
            $this->title = $this->series_way->short_name;

        return parent::beforeValidate();
    }

    protected function afterSave($oSavedModel) {
        parent::afterSave($oSavedModel);
        WayGroup::deleteLotteryCache($oSavedModel->series_id, $oSavedModel->terminal_id);
    }

    public function series(){
        return $this->belongsTo(Series::class, 'series_id');
    }

    public function terminal(){
        return $this->belongsTo(Terminal::class, 'terminal_id');
    }

    public function way_group(){
        return $this->belongsTo(WayGroup::class, 'group_id');

    }

    public function series_way(){
        return $this->belongsTo(SeriesWay::class, 'series_way_id');
    }

}