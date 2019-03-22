<?php

/**
 * Transfer Info
 *
 * @author lawrence
 */

namespace App\Models;

class TransferInfo extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'transfer_info';
    public static $merchantColumn = 'merchant_id';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'merchant_id',
        'user_id',
        'type_id',
        'merchant',
        'bill_no',
        'amount',
        'status',
        'accepted_at',
        'rejected_at',
        'canceled_at',
        'refunded_at',
        'expire_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'TransferInfo';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $columnForList = [
        'bill_no',
        'amount',
        'user_id',
        'type_id',
        'status',
        'accepted_at',
        'updated_at',
    ];

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

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
        'is_tester'=>'tester_text',
    ];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [
        'user_id'=>'aUsers',
        'type_id'=>'aTypes'
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'merchant';

    public static $mainParamColumn = 'type_id';

    public static $rules = [
        'merchant_id' => 'required|min:0|max:10',
        'user_id' => 'required|min:0|max:10',
        'type_id' => 'required|integer|min:0',
        'merchant' => 'required|max:20',
        'amount' => 'required|numeric|max:10',
        'status' => 'required|integer',
        'bill_no' => 'max:40',
        'accepted_at' => 'max:19',
        'rejected_at' => 'max:19',
        'canceled_at' => 'max:19',
        'refunded_at' => 'max:19',
        'expire_at' => 'max:19',
        'created_at' => 'max:19',
        'updated_at' => 'max:19',
    ];

    protected $appends=['is_tester'];
    protected function beforeValidate() {
        return parent::beforeValidate();
    }

    public function getTesterTextAttribute(){
        return baseOption('base.isTester')[$this->user->is_tester??0];
    }


    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}