<?php

/**
 * 彩种投注方式
 *
 * @author loren
 */

namespace App\Models;

class LotteryWayBlackList extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'lottery_way_black_list';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'series_id',
        'lottery_id',
        'terminal_id',
    ];

    public $timestamps = false;

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'LotteryWayBlackList';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'series_id',
        'lottery_id',
        'name',
        'short_name',
        'series_way_id',
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
    ];

    public static $viewColumnMaps = [
    ];

    public static $htmlSelectColumns = [

    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'name';

    public static $mainParamColumn = 'lottery_id';

    public static $rules = [
        'lottery_id' => 'required|integer',
        'series_way' => 'required|integer',
        'terminal_id' => 'required|integer',
    ];

    protected function beforeValidate() {
        return parent::beforeValidate();
    }



}