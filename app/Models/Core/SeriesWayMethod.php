<?php

/**
 * 投注方式与玩法关系
 * @author lawrence
 */

namespace App\Models;

class SeriesWayMethod extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'series_way_methods';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'series_id',
        'name',
        'single',
        'basic_way_id',
        'series_methods',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'SeriesWayMethod';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'id',
        'name',
        'series_id',
        'single',
        'basic_way_id',
        'series_methods',
    ];

    public static $totalColumns = [];

    public static $totalRateColumns = [];

    public static $weightFields = [];

    public static $classGradeFields = [];

    public static $floatDisplayFields = [];

    public static $noOrderByColumns = [];

    public static $ignoreColumnsInView = [
    ];

    public static $ignoreColumnsInEdit = [
    ];

    public static $ignoreColumnsInCreate = [];

    public static $listColumnMaps = [
        'series_methods' => 'series_method',
    ];

    public static $viewColumnMaps = [
        'series_methods' => 'series_method',
    ];

    public static $htmlSelectColumns = [
        'series_id'      => 'aSeries',
        'basic_way_id'   => 'aBasicWays',
        //'single'         => 'aIsTrue',
        'series_methods' => 'aSeriesMethods',
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'name';

    public static $mainParamColumn = 'series_id';

    public static $rules = [
        'series_id'      => 'required|integer',
        'name'           => 'required|max:30',
        'basic_way_id'   => 'required|integer',
        'series_methods' => 'required|max:1024',
        'single'         => 'required|in:0,1',
    ];

    protected function beforeValidate() {
        if(!isset($this->id)){
            if(!$this->basic_way_id || !$this->series_methods)
                return false;

            if(!$this->name){
                if(empty($this->basic_way))
                    return false;
                $this->name = $this->basic_way->name;
            }
        }

        return parent::beforeValidate();
    }

    public function getSingleTextAttribute() {
        return baseOption('base.isTrue')[ $this->single ?? 0 ];
    }

    public function getSeriesMethodAttribute() {
        return $this->series_methods;
    }

    public function series() {
        return $this->belongsTo(Series::class, 'series_id');
    }

    public function basic_way() {
        return $this->belongsTo(BasicWay::class, 'basic_way_id');
    }

}