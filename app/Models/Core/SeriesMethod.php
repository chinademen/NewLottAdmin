<?php

/**
 * Series Methods
 * @author lawrence
 */

namespace App\Models;

class SeriesMethod extends BaseModel{
    protected $connection = 'mysql';
    protected $table = 'series_methods';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'series_id',
        'name',
        'basic_method_id',
        'is_adjacent',
        'offset',
        'position',
        'hidden',
        'open',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'SeriesMethod';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'id',
        'series_id',
        'name',
        'basic_method_id',
        'is_adjacent',
        'offset',
        'position',
        'hidden',
        'open',
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
        'id', 'created_at', 'updated_at',
    ];

    public static $ignoreColumnsInCreate = [];

    public static $listColumnMaps = [

    ];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [
        'series_id'       => 'aSeries',
        'basic_method_id'       => 'aBasicMethods',
        'hidden'       => 'aIstrue',
        'open'       => 'aIstrue',
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
        'series_id'       => 'required|integer|min:0',
        'name'            => 'required|max:30',
        'basic_method_id' => 'required|integer',
        'is_adjacent'     => 'required|in:0,1',
        'offset'          => 'integer|max:127',
        'position'        => 'required|max:100',
        'hidden' => 'in:0,1',
        'open' => 'in:0,1'
    ];

    protected function beforeValidate(){
        if(!isset($this->offset) && !isset($this->position))
            return false;

        if($this->offset == '')
            $this->offset = substr($this->position, 0, 1);

        return parent::beforeValidate();

    }



    public function series(){
        return $this->belongsTo(Series::class, 'series_id');
    }

    public function basic_method(){
        return $this->belongsTo(BasicMethod::class, 'basic_method_id');
    }

}