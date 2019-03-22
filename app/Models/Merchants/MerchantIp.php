<?php

/**
 * 商户IP白名单
 *
 * @author lawrence
 */

namespace App\Models;

class MerchantIp extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'merchants_ip';
    public static $merchantColumn = 'merchant_id';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'merchant_id',
        'ip',
        'parent_id',
        'parent_level',
        'parent_path',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'MerchantIp';

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
        'ip',
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
        'parent_id'
    ];

    public static $ignoreColumnsInEdit = [
        'parent_id',
        'created_at',
        'updated_at',
    ];

    public static $ignoreColumnsInCreate = ['parent_id'];

    public static $listColumnMaps = [
    ];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [
        'merchant_id'=>'aMerchants',
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
        'ip' => 'required|max:50',
        'parent_level' => 'max:11',
        'parent_path' => 'max:100',
        'parent_id' => 'max:11',
        'created_at' => 'max:19',
        'updated_at' => 'max:19',
    ];


    protected function beforeValidate() {
        return parent::beforeValidate();
    }


    public function merchant(){
        return $this->belongsTo(Merchant::class,'merchant_id','id');
    }
}