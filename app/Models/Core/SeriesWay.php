<?php

/**
 * Series Ways
 * @author lawrence
 */

namespace App\Models;

use Request;
use Str;

class SeriesWay extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'series_ways';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_FIRST;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'lottery_type',
        'series_id',
        'name',
        'short_name',
        'need_split',
        'way_maps',
        'series_way_method_id',
        'basic_way_id',
        'basic_methods',
        'series_methods',
        'way_function',
        'wn_function',
        'digital_count',
        'need_position',
        'price',
        'offset',
        'position',
        'buy_length',
        'wn_length',
        'wn_count',
        'area_count',
        'area_config',
        'valid_nums',
        'rule',
        'all_count',
        'bonus_note',
        'bet_note',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'Series Way';

    protected $softDelete = false;

    protected $defaultColumns = ['*'];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'id',
        'series_id',
        'name',
        'short_name',
        'need_split',
        'basic_way_id',
        'series_methods',
        'digital_count',
        'offset',
        'position',
        'buy_length',
        'wn_length',
        'wn_count',
        'area_count',
        'area_config',
        'valid_nums',
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
        'created_at',
        'updated_at',
    ];

    public static $ignoreColumnsInCreate = [];

    public static $listColumnMaps = [];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [
        'basic_way_id' => 'aBasicWays',
        'series_methods' => 'aSeriesMethods',
        'series_id' => 'aSeries',
        'series_way_method_id' => 'aSeriesWayMethods',
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = ['id' => 'asc'];

    public static $titleColumn = 'name';

    public static $mainParamColumn = 'series_id';

    public static $rules = [
        'series_id' => 'required|integer',
        'series_way_method_id' => 'required|integer',
        'name' => 'required|max:30',
        'short_name' => 'required|max:30',
        'way_maps' => 'max:1024',
        'need_split' => 'required|integer|in:0,1',
        'digital_count' => 'required|numeric',
        'price' => 'required|numeric',
        'offset' => 'max:100',
        'position' => 'max:100',
        'buy_length' => 'required|numeric',
        'wn_length' => 'required|numeric',
        'wn_count' => 'required|numeric',
        'area_count' => 'nullable|integer',
        'area_config' => 'max:20',
        'valid_nums' => 'max:50',
        'rule' => 'max:50',
        'all_count' => 'max:100',
    ];

    protected function beforeValidate() {
//        $this->validationErrors->add('basic_way_id', __('validation.required',['attribute'=>__('_seriesway.basic_way_id')]));
//        $this->validationErrors->add('series_way_method_id', __('validation.required',['attribute'=>__('_seriesway.series_way_method_id')]));

        if (empty($this->basic_way_id)) {
            $this->validationErrors->add('basic_way_id', ___('validation.required', ['attribute' => ___('_seriesway.basic_way_id')]));
            return false;
        }
        $oBasicWay = BasicWay::find($this->basic_way_id);
        if (empty($oBasicWay)) {
            $this->validationErrors->add('basic_way_id', ___('_basic.data-not-exists', ['data'=>___('_model.' . Str::slug($oBasicWay::$resourceName))]));
            return false;
        }
        if (empty($this->series_way_method_id)) {
            $this->validationErrors->add('series_way_method_id', ___('validation.required', ['attribute' => ___('_seriesway.series_way_method_id')]));
            return false;
        }
        $oWayMethod = SeriesWayMethod::find($this->series_way_method_id);
        if (empty($oWayMethod)) {
            $this->validationErrors->add('series_way_method_id', ___('_basic.data-not-exists', ['data'=>___('_model.' . Str::slug($oWayMethod::$resourceName))]));
            return false;
        }
        $this->basic_way_id = $oWayMethod->basic_way_id;
        $this->need_split or $this->need_split = 0;
        $aSeriesMethodId = explode(',', $this->series_methods);
        $aOffsets = $aAllCount = $aBasicMethods = $aPositions = [];
        if(count($aSeriesMethodId) < 1){
            $this->validationErrors->add('series_methods', ___('validation.required', ['attribute' => ___('_seriesway.series_methods')]));
            return false;
        }
        foreach ($aSeriesMethodId as $iSeriesMethodId) {
            if (empty($iSeriesMethodId)){
                $this->validationErrors->add('series_methods', ___('_basic.attribute_error', ['attribute' => ___('_seriesway.series_methods')]));
                return false;
            }
            $oSeriesMethod = SeriesMethod::find($iSeriesMethodId);
            if (empty($oSeriesMethod)) {
                $this->validationErrors->add('series_methods', ___('_basic.data-not-exists', ['data'=>___('_model.' . Str::slug($oSeriesMethod::$resourceName))]));
                return false;
            }
            $oBasicMethod = BasicMethod::find($oSeriesMethod->basic_method_id);
            if (empty($oBasicMethod)) {
                $this->validationErrors->add('series_methods', ___('_basic.data-not-exists', ['data'=>___('_model.' . Str::slug($oBasicMethod::$resourceName))]));
                return false;
            }
            $aBasicMethods[] = $oSeriesMethod->basic_method_id;
            $aPositions[] = $oSeriesMethod->position;
            $aOffsets[] = $oSeriesMethod->offset;
            $aAllCount[] = $oBasicMethod->all_count;
        }

        $this->way_function = $oBasicWay->function;
        $this->wn_function = $oBasicMethod->wn_function;
        $this->basic_methods = implode(',', $aBasicMethods);
        $this->all_count = implode(',', $aAllCount);
        $this->offset = $aOffsets ? implode(',', $aOffsets) : null;
        $this->position = $aPositions ? implode(',', $aPositions) : null;
        $this->price or $this->price = $oBasicMethod->price;
        $this->buy_length or $this->buy_length = $oBasicMethod->buy_length;
        $this->wn_length or $this->wn_length = $oBasicMethod->wn_length;
        $this->wn_count or $this->wn_count = $oBasicMethod->wn_count;
        strlen($this->valid_nums) or $this->valid_nums = $oBasicMethod->valid_nums;
        strlen($this->rule) or $this->rule = $oBasicMethod->rule;
        $this->area_count or $this->area_count = null;
        unset($aSeriesMethodId, $iSeriesMethodId);

        return parent::beforeValidate();
    }

    public function series() {
        return $this->belongsTo(Series::class, 'series_id');
    }

}