<?php

/**
 * 商户账户
 *
 * @author lawrence
 */

namespace App\Models;

class MerchantAccount extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'merchants_accounts';
    public static $merchantColumn = 'merchant_id';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'merchant_id',
        'name',
        'balance',
        'transfer_limit',
        'bet_limit',
        'bonus_limit',
        'profit_scale',
        'profit_type',
        'created_at',
        'updated_at',
        'backup_made_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'MerchantAccount';

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
        'name',
        'balance',
        'transfer_limit',
        'bet_limit',
        'bonus_limit',
        'profit_scale',
        'profit_type',
        'created_at',
        'updated_at',
        'backup_made_at',
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
        'backup_made_at',
    ];

    public static $ignoreColumnsInCreate = [];

    public static $listColumnMaps = [
        'balance'=>'balance_text'
    ];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [
        'profit_type'=>'aProfitType',
        'merchant_id' => 'aMerchants'
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'name';

    public static $mainParamColumn = 'name';

    public static $rules = [
        'merchant_id' => 'required|max:11',
        'name' => 'max:50',
        'balance' => 'required|numeric',
        'transfer_limit' => 'required|numeric',
        'bet_limit' => 'required|numeric',
        'bonus_limit' => 'required|numeric',
        'profit_type' => 'required|max:4',
        'profit_scale' => 'max:16',
        'created_at' => 'max:19',
        'updated_at' => 'max:19',
        'backup_made_at' => 'max:19',
    ];

    protected function beforeValidate() {
        return parent::beforeValidate();
    }

    public function getBalanceTextAttribute(){
        if($this->balance == 0) return '不限额';
        else return $this->balance;
    }
}