<?php

/**
 * Transaction Type
 * @author lawrence
 */

namespace App\Models;

class TransactionType extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'transaction_types';

    const TYPE_DEPOSIT                 = 1;
    const TYPE_WITHDRAW                = 2;
    const TYPE_FREEZE_FOR_TRACE        = 5;
    const TYPE_UNFREEZE_FOR_BET        = 6;
    const TYPE_BET                     = 7;
    const TYPE_DROP                    = 8;
    const TYPE_SEND_PRIZE              = 11;
    const TYPE_CANCEL_PRIZE            = 12;
    const TYPE_UNFREEZE_FOR_TRACE      = 15;
    const TYPE_DEPOSIT_BY_ADMIN        = 18;
    const TYPE_SETTLING_CLAIMS         = 22;
    const TYPE_DEDUCTION               = 25;



    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'fund_flow_id',
        'description',
        'cn_title',
        'balance',
        'available',
        'frozen',
        'credit',
        'debit',
        'project_linked',
        'trace_linked',
        'reverse_type',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'TransactionType';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '1';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'id',
        'description',
        'cn_title',
        'fund_flow_id',
        'balance',
        'available',
        'frozen',
        'credit',
        'debit',
        'project_linked',
        'trace_linked',
        'reverse_type',
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
        'balance',
        'available',
        'frozen',
    ];

    public static $ignoreColumnsInCreate = [
        'balance',
        'available',
        'frozen',
    ];

    public static $listColumnMaps = [
    ];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [
        'fund_flow_id'   => 'aFundFlows',
//        'credit'         => 'aIsTrue',
//        'debit'          => 'aIsTrue',
//        'project_linked' => 'aIsTrue',
//        'trace_linked'   => 'aIsTrue',
        'balance' => 'aActions',
        'available' => 'aActions',
        'frozen' => 'aActions',
        'reverse_type' => 'aTransactionTypes'
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'cn_title';

    public static $mainParamColumn = 'cn_title';

    public static $rules = [
        'fund_flow_id'   => 'required|integer',
        'description'    => 'required|max:30',
        'cn_title'       => 'required|max:30',
        'credit'         => 'in:0,1',
        'debit'          => 'in:0,1',
        'project_linked' => 'in:0,1',
        'trace_linked'   => 'in:0,1',
        'reverse_type'   => 'integer',
    ];

    protected function beforeValidate() {
        if(!$this->fund_flow_id || !$oFund_flow = $this->fund_flow) return false;
        $this->balance = $oFund_flow->balance;
        $this->available = $oFund_flow->available;
        $this->frozen = $oFund_flow->frozen;
        $this->credit = $this->credit ?? 0;
        $this->debit = $this->debit ?? 0;
        $this->reverse_type = $this->reverse_type ?? null;

        return parent::beforeValidate();
    }

    public function fund_flow() {
        return $this->belongsTo(FundFlow::class, 'fund_flow_id');
    }

}