<?php

/**
 * 基础玩法
 * @author lawrence
 */

namespace App\Models;

class BasicMethod extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'basic_methods';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'lottery_type',
        'series_id',
        'type',
        'name',
        'full_prize',
        'price',
        'sequencing',
        'digital_count',
        'unique_count',
        'max_repeat_time',
        'min_repeat_time',
        'span',
        'min_span',
        'choose_count',
        'min_choose_count',
        'special_count',
        'fixed_number',
        'valid_nums',
        'buy_length',
        'wn_length',
        'wn_count',
        'all_count',
        'wn_function',
        'status',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'BasicMethod';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'id',
        'lottery_type',
        'series_id',
        'type',
        'name',
        'sequencing',
        'digital_count',
        'unique_count',
        'max_repeat_time',
        'min_repeat_time',
        'span',
        'min_span',
        'choose_count',
        'special_count',
        'wn_length',
        'wn_count',
        'valid_nums',
        'rule',
        'all_count',
        'status',
    ];

    public static $totalColumns = [];

    public static $totalRateColumns = [];

    public static $weightFields = [];

    public static $classGradeFields = [];

    public static $floatDisplayFields = [];

    public static $noOrderByColumns = ['rule'];

    public static $ignoreColumnsInView = [];

    public static $ignoreColumnsInEdit = [
        'lottery_type'
    ];

    public static $ignoreColumnsInCreate = [
        'lottery_type'
    ];

    public static $listColumnMaps = [
    ];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [
        'lottery_type' => 'aLotteryTypes',
        'series_id'    => 'aSeries',
        'type'         => 'aMethodTypes',
        //'sequencing'   => 'aIsTrue',
        //'status'       => 'aIsTrue',
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [ 'digital_count' => 'asc', ];

    public static $titleColumn = 'name';

    public static $mainParamColumn = 'lottery_type';

    public static $rules = [
        'lottery_type'     => 'required|integer',
        'series_id'        => 'required|integer',
        'type'             => 'required|integer',
        'name'             => 'required|max:10',
        'full_prize'       => 'numeric|min:0',
        'digital_count'    => 'required|numeric',
        'sequencing'       => 'required|in:0,1',
        'unique_count'     => 'integer|min:0',
        'max_repeat_time'  => 'integer|min:0',
        'min_repeat_time'  => 'integer|min:0',
        'span'             => 'integer|min:0',
        'min_span'         => 'integer|min:0',
        'choose_count'     => 'integer|min:0',
        'min_choose_count' => 'max:9',
        'special_count'    => 'integer|min:0',
        'fixed_number'     => 'integer|min:0',
        'price'            => 'numeric',
        'buy_length'       => 'required|numeric',
        'wn_length'        => 'required|numeric',
        'wn_count'         => 'required|numeric',
        'valid_nums'       => 'required|max:50',
        'all_count'        => 'required|numeric',
        'status'           => 'required|integer|in:0,1',
    ];

    protected function beforeValidate() {
        if($this->series_id){
            $this->lottery_type = $this->series->type;
        }
        $this->price or $this->price = config('prize.default');
        $this->sequencing or $this->sequencing = 0;
        $this->unique_count or $this->unique_count = null;
        $this->max_repeat_time or $this->max_repeat_time = null;
        $this->min_repeat_time or $this->min_repeat_time = null;
        $this->span or $this->span = null;
        $this->min_span or $this->min_span = null;
        $this->choose_count or $this->choose_count = null;
        $this->min_choose_count != '' or $this->min_choose_count = null;
        $this->special_count or $this->special_count = null;
        $this->fixed_number or $this->fixed_number = null;
        $this->status = intval($this->status);
        if(!$this->type){
            return false;
        }
        $this->wn_function = $this->method_type->wn_function;

        return parent::beforeValidate();
    }

    protected function afterSave($oSavedModel) {
        parent::afterSave($oSavedModel);
        $this->delThirdCache($oSavedModel);
        return true;
    }

    protected function afterDelete($oDeletedModel) {
        parent::afterDelete($oDeletedModel);
        $this->delThirdCache($oDeletedModel);
        return true;
    }
    protected function delThirdCache($oModel){
        $aKeys = ['basic_methods_list','basic_methods:row:id_'.$oModel->id];
        $this->deleteThirdCache($aKeys);
    }

    public function series() {
        return $this->belongsTo(Series::class, 'series_id');
    }

    public function method_type() {
        return $this->belongsTo(MethodType::class, 'type');
    }

}