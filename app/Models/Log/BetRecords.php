<?php

/**
 * 注单详情
 *
 * @author loren
 */

namespace App\Models;

class BetRecords extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'bet_records';
    public static $merchantColumn = 'merchant_id';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'merchant_id',
        'user_id',
        'username',
        'is_tester',
        'lottery_id',
        'bet_count',
        'is_trace',
        'bet_data',
        'compressed_data',
        'created_at',
        'updated_at',
        'terminal_id',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'BetRecords';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'id',
        'username',
        'is_tester',
        'terminal_id',
        'lottery_id',
        'bet_count',
        'created_at',
    ];

    public static $totalColumns = [
        'bet_count',
    ];

    public static $totalRateColumns = [];

    public static $weightFields = [];

    public static $classGradeFields = [];

    public static $floatDisplayFields = [];

    public static $noOrderByColumns = [];

    public static $ignoreColumnsInView = [
        'user_id',
        'updated_at',
    ];

    public static $ignoreColumnsInEdit = [
    ];

    public static $ignoreColumnsInCreate = [];


    public static $listColumnMaps = [
        'is_tester' => 'is_tester_text',
        'terminal_id' => 'terminal_id_text'
    ];
    public static $viewColumnMaps = [
        'bet_data'  => 'bet_data_text',
        'is_tester' => 'is_tester_text',
        'terminal_id' => 'terminal_id_text'
    ];
    public static $htmlSelectColumns = [
        'lottery_id' => 'aLotteries',
    ];


    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'username';

    public static $mainParamColumn = 'user_id';

    public static $rules = [
        'user_id'    => 'required|integer|min:0',
        'username'   => 'required|max:16',
        'lottery_id' => 'required|integer|min:1',
        'bet_count'  => 'required|integer|min:1',
        'bet_data'   => 'required',
    ];

    protected function beforeValidate() {
        return parent::beforeValidate();
    }


    /***************************** ColumnMaps Start *******************************/
    protected function getTerminalIdTextAttribute($fieldValue = null) {
        if ($fieldValue == null && isset($this->attributes['terminal_id'])) {
            $fieldValue = $this->attributes['terminal_id'];
        }
        if ($fieldValue == null) {
            return $fieldValue;
        }
        return Terminal::getSelectSearchArrays()[$fieldValue ?? 1];
    }

    protected function getIsTesterTextAttribute($fieldValue = null) {
        if ($fieldValue == null && isset($this->attributes['is_tester'])) {
            $fieldValue = $this->attributes['is_tester'];
        }
        if ($fieldValue == null) {
            return $fieldValue;
        }
        return baseOption('base.isTester')[$fieldValue ?? 0];
    }

    protected function getBetDataTextAttribute($fieldValue = null) {
        if ($fieldValue == null && isset($this->attributes['lottery_id'])) {
            $fieldValue = $this->attributes['lottery_id'];
        }
        if ($fieldValue == null) {
            return $fieldValue;
        }
        $fieldValue = json_decode($fieldValue, true);
        return '<pre>' . nl2br(var_export($fieldValue, true)) . '</pre>';
    }

    /***************************** ColumnMaps End *******************************/
}