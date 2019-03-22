<?php

/**
 * User Prize Set
 *
 * @author lawrence
 */

namespace App\Models;

class UserPrizeSet extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'user_prize_sets';
    public static $merchantColumn = 'merchant_id';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'merchant_id',
        'user_id',
        'username',
        'series_id',
        'lottery_id',
        'group_id',
        'prize_group',
        'classic_prize',
        'valid',
        'is_agent',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'UserPrizeSet';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'merchant_id',
        'username',
        'lottery_id',
        'prize_group',
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
        'lottery_id'=>'aLotteries',
        'merchant_id'=>'aMerchants',
        'series_id'=>'aSeries',
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'username';

    public static $mainParamColumn = 'username';

    public static $rules = [
        'lottery_id' => 'integer|min:0',
        'group_id' => 'min:0|max:10',
        'prize_group' => 'max:20',
        'classic_prize' => 'integer|min:0',
        'merchant_id' => 'min:0|max:10',
        'user_id' => 'min:0|max:20',
        'series_id' => 'min:0|max:3',
        'valid' => 'min:0|max:1',
        'is_agent' => 'min:0|max:1',
        'username' => 'max:16',
        'created_at' => 'max:19',
        'updated_at' => 'max:19',
    ];

    protected function beforeValidate() {
        return parent::beforeValidate();
    }

}