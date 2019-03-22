<?php

/**
 * 银行信息表
 *
 * @author leon01
 */

namespace App\Models;

class Banks extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'banks';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_NONE;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'name',
        'identifier',
        'mode',
        'card_type',
        'code_length',
        'min_load',
        'max_load',
        'url',
        'help_url',
        'logo',
        'status',
        'sequence',
        'notice',
        'deposit_notice',
        'fee_valve',
        'fee_expressions',
        'fee_switch',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = true;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'Banks';

    protected $softDelete = false;

    protected $defaultColumns = ['*'];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'sequence',
        'name',
        'identifier',
        'mode',
        'card_type',
        'code_length',
        'min_load',
        'max_load',
        'url',
        'help_url',
        'logo',
        'status',
        'notice',
        'deposit_notice',
        'fee_valve',
        'fee_expressions',
        'fee_switch',
        'created_at',
        'updated_at',
    ];

    public static $totalColumns = [];

    public static $totalRateColumns = [];

    public static $weightFields = [];

    public static $classGradeFields = [];

    public static $floatDisplayFields = [];

    public static $noOrderByColumns = [];

    public static $ignoreColumnsInView = [];

    public static $ignoreColumnsInEdit = [];

    public static $ignoreColumnsInCreate = [];

    public static $listColumnMaps = [];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [
        'status' => "aStatus",
        'mode' => "aMode",
        'fee_switch' => "aFeeSwitch",
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [
        'min_load',
        'max_load',
        'fee_valve',
        'fee_expressions',
    ];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'name';

    public static $mainParamColumn = 'name';

    public static $rules = [
        'name' => 'required|max:50',
        'identifier' => 'required|max:10',
        'mode' => 'required|integer',
        'card_type' => 'required|max:20',
        'code_length' => 'required|max:20',
        'min_load' => 'required|numeric',
        'max_load' => 'required|numeric',
        'url' => 'required|max:200',
        'help_url' => 'required|max:200',
        'logo' => 'required|max:100',
        'status' => 'required|integer',
        'sequence' => 'required|min:0',
        'notice' => 'required|max:100',
        'deposit_notice' => 'required|max:65535',
        'fee_valve' => 'required|numeric',
        'fee_expressions' => 'required|max:65535',
        'fee_switch' => 'required|integer',
    ];

    protected function beforeValidate() {
        return parent::beforeValidate();
    }

    public static $aStatus = [
        0 => "关闭",
        1 => "开启",
    ];

    public static $aMode = [
        1 => "银行卡充值",
        2 => "第三方支付",
        3 => "兼容所有",
    ];

    public static $aFeeSwitch = [
        0 => "关闭",
        1 => "开启",
    ];

}