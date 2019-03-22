<?php

/**
 * 商户关闭彩种
 *
 * @author lawrence
 */

namespace App\Models;

class MerchantLotteryClose extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'merchants_lottery_close';
    public static $merchantColumn = 'merchant_id';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'merchant_id',
        'lottery_ids','way_group_ids','series_method_ids','series_way_ids',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'lottery_ids'       => 'array',
        'way_group_ids'     => 'array',
        'series_method_ids' => 'array',
        'series_way_ids'    => 'array',
    ];
    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'MerchantLotteryClose';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'id',
        'merchant_id',
        'lottery_ids','way_group_ids','series_method_ids','series_way_ids',
        'updated_at',
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

    public static $listColumnMaps = [
        'lottery_ids'=>'lotteries',
        'way_group_ids'=>'way_groups',
        'series_method_ids'=>'series_method',
        'series_way_ids'=>'series_way',
        'merchant_id'=>'merchant_name',
    ];

    public static $viewColumnMaps = [
        'lottery_ids'=>'lotteries',
        'way_group_ids'=>'way_groups',
        'series_method_ids'=>'series_method',
        'series_way_ids'=>'series_way',
    ];

    public static $htmlSelectColumns = [
        'merchant_id' => 'aMerchants'
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'merchant_id';

    public static $mainParamColumn = 'merchant_id';

    public static $rules = [
        'merchant_id' => 'required|max:11',
    ];

    protected function beforeValidate() {
        return parent::beforeValidate();

    }

    protected function getLotteriesAttribute(){
        return implode(' | ',$this->lottery_ids??[]);
    }

    protected function getWayGroupsAttribute(){
        return implode(' | ',$this->way_group_ids??[]);
    }

    protected function getSeriesMethodAttribute(){
        return implode(' | ',$this->series_method_ids??[]);
    }

    protected function getSeriesWayAttribute(){
        return implode(' | ',$this->series_way_ids??[]);
    }

    protected function getMerchantNameAttribute(){
        return Merchant::find($this->merchant_id)['name'];
    }

    public function merchant(){
        return $this->belongsTo(Merchant::class,'merchant_id');
    }

}