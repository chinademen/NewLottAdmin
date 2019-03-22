<?php

/**
 * Terminal Lotteries
 * @author lawrence
 */

namespace App\Models;

class TerminalLottery extends BaseModel{
    protected $connection = 'mysql';
    protected $table = 'terminal_lotteries';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'terminal_id',
        'lottery_id',
        'status',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'TerminalLottery';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'terminal_id',
        'lottery_id',
        'status',
        'created_at',
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
        'id',
        'created_at',
        'updated_at',
    ];

    public static $ignoreColumnsInCreate = [];

    public static $listColumnMaps = [];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [
        'terminal_id' => 'aTerminals',
        'lottery_id' => 'aLotterys',
        'status' => 'aStatuses'
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'lottery_id';

    public static $mainParamColumn = '';

    public static $rules = [
        'terminal_id' => 'required|min:0|max:10',
        'lottery_id'  => 'required|integer|min:0',
        'status'      => 'required|integer|min:0',
        'created_at'  => 'max:19',
        'updated_at'  => 'max:19',
    ];

    protected function beforeValidate(){
        return parent::beforeValidate();
    }

}