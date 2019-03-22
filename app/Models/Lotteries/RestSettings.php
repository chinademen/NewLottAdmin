<?php

/**
 * 休市管理
 *
 * @author loren
 */

namespace App\Models;

class RestSettings extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'rest_settings';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'lottery_id',
        'periodic',
        'begin_date',
        'end_date',
        'week',
        'begin_time',
        'end_time',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'RestSettings';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'lottery_id',
        'periodic',
        'begin_date',
        'end_date',
        'week',
        'begin_time',
        'end_time',
    ];

    public static $totalColumns = [];

    public static $totalRateColumns = [];

    public static $weightFields = [];

    public static $classGradeFields = [];

    public static $floatDisplayFields = [];

    public static $noOrderByColumns = [];

    public static $ignoreColumnsInView = [
        'keep_issue'
    ];

    public static $ignoreColumnsInEdit = [
        'keep_issue'
    ];

    public static $ignoreColumnsInCreate = [
        'keep_issue'
    ];

    public static $listColumnMaps = [
        'periodic' => 'periodic_text',
    ];

    public static $viewColumnMaps = [
    ];

    public static $htmlSelectColumns = [
        'lottery_id' => 'aLotteryIds',
        'periodic' => 'aPeriodics',
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'begin_date';

    public static $mainParamColumn = 'lottery_id';

    public static $rules = [
        'periodic'         => 'required|in:0,1',
        'begin_date'       => 'date|date_format:Y-m-d',
        'end_date'         => 'date|date_format:Y-m-d',
        'begin_time'       => 'date_format:H:i:s',
        'end_time'         => 'date_format:H:i:s',
        'week'             => 'max:20'
    ];

    protected function beforeValidate() {
        $this->periodic or $this->periodic = 0;
        foreach ($this->columnSettings as $sColumn => $aSettings) {
            switch ($sColumn) {
                case 'end_date':
                case 'begin_date':
                case 'begin_time':
                case 'end_time':
                    !empty($this->$sColumn) or $this->$sColumn = null;
                    break;
            }
        }

        return parent::beforeValidate();
    }
}