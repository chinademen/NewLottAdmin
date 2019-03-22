<?php

/**
 * 追号详情
 *
 * @author loren
 */

namespace App\Models;

use Carbon;

class TraceDetails extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'trace_details';
    public static $merchantColumn = 'merchant_id';

    const ERRNO_STATUS_WRONG = -4000;
    const ERRNO_UPDATE_ERROR = -4001;
    // const PAGE_SIZE = 15;

    const STATUS_WAITING         = 0;
    const STATUS_FINISHED        = 1;
    const STATUS_USER_CANCELED   = 2;
    const STATUS_ADMIN_CANCELED  = 3;
    const STATUS_SYSTEM_CANCELED = 4;
    const STATUS_USER_DROPED     = 5;

    public static $validStatuses       = [
        self::STATUS_WAITING         => 'Running',
        self::STATUS_FINISHED        => 'Finished',
        self::STATUS_USER_CANCELED   => 'User Canceled',
        self::STATUS_ADMIN_CANCELED  => 'Admin Canceled',
        self::STATUS_SYSTEM_CANCELED => 'System Canceled',
        self::STATUS_USER_DROPED     => 'Droped'
    ];
    public static $cancelStatuses      = [
        self::STATUS_USER_CANCELED,
        self::STATUS_ADMIN_CANCELED,
        self::STATUS_SYSTEM_CANCELED,
    ];


    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'merchant_id',
        'user_id',
        'account_id',
        'trace_id',
        'lottery_id',
        'issue',
        'end_time',
        'multiple',
        'amount',
        'project_id',
        'status',
        'bought_at',
        'canceled_at',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'TraceDetails';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'id',
        'trace_id',
        'lottery_id',
        'issue',
        'end_time',
        'multiple',
        'project_id',
        'amount',
        'status',
        'bought_at',
        'canceled_at',
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
        'end_time' => 'end_time_formatted',
    ];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [
        'lottery_id' => 'aLotteries',
        'status'     => 'aStatuses',
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [
        'amount' => 4,
    ];

    public static $htmlOriginalNumberColumns = [
        'multiple'
    ];

    public static $amountAccuracy = 4;

    public static $originalColumns;

    public $orderColumns = [
        'issue' => 'asc'
    ];

    public static $titleColumn = 'id';

    public static $mainParamColumn = 'trace_id';

    public static $rules = [
        'user_id'     => 'required|integer',
        'account_id'  => 'required|integer',
        'multiple'    => 'required|integer',
        'issue'       => 'required|max:12',
        'end_time'    => 'required|integer',
        'lottery_id'  => 'required|integer',
        'amount'      => 'regex:/^[\d]+(\.[\d]{0,4})?$/',
        'status'      => 'in:0,1,2,3',
        'bought_at'   => 'date_format:Y-m-d H:i:s',
        'canceled_at' => 'date_format:Y-m-d H:i:s',
    ];

    protected function beforeValidate() {
        if (!$this->amount || !$this->user_id || !$this->lottery_id || !$this->issue || !$this->multiple) {
            return false;
        }
        if (!$this->account_id) {
            $oUser = User::find($this->user_id);
            $this->account_id = $oUser->account_id;
        }
        return parent::beforeValidate();
    }

    /***************************** ColumnMaps Start *******************************/
    protected function getEndTimeFormattedAttribute() {
        return Carbon::createFromTimestamp($this->attributes['end_time'])->toDateTimeString();
    }
    /***************************** ColumnMaps End *******************************/


    /**
     * 更新指定TRACE下的所有预约的状态为Canceled
     *
     * @param int $iTraceId Trace Id
     * @param bool $bBySystem if by system, default false
     * @return bool
     */
    public static function setAllCanceled($iTraceId, $iToStatus) {
        $data = [
            'status'      => $iToStatus,
            'canceled_at' => Carbon::now()->toDateTimeString()
        ];
        return static::where('trace_id', '=', $iTraceId)
            ->where('status', '=', self::STATUS_WAITING)
            ->update($data);
    }

}