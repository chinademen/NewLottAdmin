<?php

/**
 * 追单
 *
 * @author loren
 */

namespace App\Models;

use Coefficient;
use ChnNumber;
use Carbon;
use MyApi;
use Illuminate\Support\Facades\Redis;

class Traces extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'traces';
    public static $merchantColumn = 'merchant_id';


    const STATUS_RUNNING       = 0;
    const STATUS_FINISHED      = 1;
    const STATUS_USER_STOPED   = 2;
    const STATUS_ADMIN_STOPED  = 3;
    const STATUS_SYSTEM_STOPED = 4;

    const TERMINATE_BY_USER    = 0;
    const TERMINATE_BY_ADMIN   = 1;
    const TERMINATE_BY_SYSTEM  = 2;

    public static $cancelStatuses      = [
        self::TERMINATE_BY_USER   => self::STATUS_USER_STOPED,
        self::TERMINATE_BY_ADMIN  => self::STATUS_ADMIN_STOPED,
        self::TERMINATE_BY_SYSTEM => self::STATUS_SYSTEM_STOPED,
    ];

    const ERRNO_TRACE_SAVE_SUCCESSFUL           = -300;
    const ERRNO_TRACE_MISSING                   = -301;
    const ERRNO_TRACE_DETAIL_SAVED              = -302;
    const ERRNO_TRACE_DETAIL_SAVE_FAILED        = -303;
    const ERRNO_TRACE_ERROR_SAVE_ERROR          = -310;
    const ERRNO_TRACE_ERROR_DATA_ERROR          = -320;
    const ERRNO_TRACE_ERROR_LOW_BALANCE         = Project::ERRNO_BET_ERROR_LOW_BALANCE;
    const ERRNO_STOP_SUCCESS                    = -330;
    const ERRNO_STOP_ERROR_STATUS               = -331;
    const ERRNO_STOP_ERROR_NOT_YOURS            = -332;
    const ERRNO_STOP_ERROR_STATUS_UPDATE_ERROR  = -333;
    const ERRNO_STOP_ERROR_DETAIL_CANCEL_FAILED = -334;
    const ERRNO_DETAIL_CANCELED                 = -335;
    const ERRNO_DETAIL_CANCEL_FAILED            = -336;
    const ERRNO_PRJ_GERENATED                   = -340;
    const ERRNO_PRJ_GERENATE_FAILED_NO_DETAIL   = -341;
    const ERRNO_PRJ_GERENATE_FAILED_PRJ_ERROR   = -342;


    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'finished_issues',
        'canceled_issues',
        'won_issue',
        'prize',
        'finished_amount',
        'canceled_amount',
        'status',
        'canceled_at',
        'stoped_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'Traces';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'id',
        'serial_number',
        'username',
        'is_tester',
        'lottery_id',
        'title',
        'display_bet_number',
        'coefficient',
        'stop_on_won',
        'start_issue',
        'total_issues',
        'finished_issues',
        'amount',
        'prize',
        'status',
        'ip',
        'bought_at',
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
        'serial_number' => 'serial_number_short',
        'status'        => 'status_text',
        'coefficient' => 'coefficient_text',
        'stop_on_won'   => 'stop_on_won_formatted',
        'amount' => 'amount_formatted',
        'prize' => 'prize_formatted',
    ];

    public static $viewColumnMaps = [
        'status'        => 'status_text',
        'coefficient' => 'coefficient_text',
        'stop_on_won'   => 'stop_on_won_formatted',
        'is_tester' => 'is_tester_text',
        'terminal_id' => 'terminal_id_text',
        'amount' => 'amount_formatted',
        'prize' => 'prize_formatted',
        'prize_set' => 'prize_set_formatted',
    ];

    public static $htmlSelectColumns = [
        'coefficient' => 'aCoefficient',
        'status' => 'aStatus',
        'lottery_id' => 'aLotteries',
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [
        'amount'          => 2,
        'finished_amount' => 2,
        'canceled_amount' => 2,
        'prize'           => 4
    ];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [
        'id' => 'desc'
    ];

    public static $titleColumn = 'serial_number';

    public static $mainParamColumn = 'serial_number';

    public static $rules = [
        'user_id'             => 'required|integer',
        'account_id'          => 'required|integer',
        'serial_number'       => 'required|max:32',
        'title'               => 'required|max:100',
        'position'            => 'max:10',
        'bet_number'          => 'required',
        'lottery_id'          => 'required|integer',
        'way_id'              => 'required|integer',
        'coefficient'         => 'required|in:1.00,0.50,0.10,0.01',
        'single_amount'       => 'regex:/^[\d]+(\.[\d]{0,4})?$/',
        'amount'              => 'regex:/^[\d]+(\.[\d]{0,4})?$/',
        'status'              => 'in:0,1,2,3',
        'ip'                  => 'required|ip',
        'proxy_ip'            => 'required|ip',
        'bought_at'           => 'date_format:Y-m-d H:i:s',
        'way_total_count'     => 'integer',
        'bet_rate'            => 'numeric',
    ];

    protected function beforeValidate() {
        if (!$this->single_amount || !$this->amount || !$this->user_id || !$this->lottery_id || !$this->total_issues || !$this->way_id || !$this->coefficient) {
            pr('data-error');
            return false;
        }
        if (!$this->user_forefather_ids || !$this->account_id) {
            $oUser                     = User::find($this->user_id);
            $this->user_forefather_ids = $oUser->forefather_ids;
            $this->account_id          = $oUser->account_id;
        }
        $this->serial_number or $this->serial_number = static::makeSeriesNumber($this->user_id);
        return parent::beforeValidate();
    }

    /**
     * 生成序列号
     * @param int $iUserId
     * @return string
     */
    public static function makeSeriesNumber($iUserId) {
        return uniqid($iUserId, true);
    }


    /***************************** ColumnMaps Start *******************************/
    protected function getSerialNumberShortAttribute($fieldValue = null) {
        if ($fieldValue == null && isset($this->attributes['serial_number'])) {
            $fieldValue = $this->attributes['serial_number'];
        }
        if ($fieldValue == null) {
            return $fieldValue;
        }
        return substr($fieldValue, -6);
    }

    protected function getStatusTextAttribute($fieldValue = null) {
        if ($fieldValue == null && isset($this->attributes['status'])) {
            $fieldValue = $this->attributes['status'];
        }
        if ($fieldValue == null) {
            return $fieldValue;
        }
        return baseOption('base.traces.status')[$fieldValue ?? 0];
    }

    protected function getFormattedStopOnWonAttribute($fieldValue = null) {
        if ($fieldValue == null && isset($this->attributes['stop_on_won'])) {
            $fieldValue = $this->attributes['stop_on_won'];
        }
        if ($fieldValue == null) {
            return $fieldValue;
        }
        return baseOption('base.isTrue')[$fieldValue ?? 0];
    }

    protected function getCoefficientTextAttribute($fieldValue = null) {
        if ($fieldValue == null && isset($this->attributes['coefficient'])) {
            $fieldValue = $this->attributes['coefficient'];
        }
        if ($fieldValue == null) {
            return $fieldValue;
        }
        return !is_null($fieldValue) ? Coefficient::getCoefficientText($fieldValue) : '';
    }

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

    protected function getPrizeFormattedAttribute() {
        return $this->attributes['prize'] ? $this->getFormattedNumberForHtml('prize') : null;
    }

    protected function getAmountFormattedAttribute() {
        return $this->attributes['amount'] ? $this->getFormattedNumberForHtml('amount') : null;
    }

    protected function getPrizeSetFormattedAttribute($fieldValue = null) {
        if ($fieldValue == null && isset($this->attributes['prize_set'])) {
            $fieldValue = $this->attributes['prize_set'];
        }
        if ($fieldValue == null) {
            return $fieldValue;
        }
        $aPrizeSets = json_decode($fieldValue, true);
        $aDisplay = [];
        foreach ($aPrizeSets as $iBasicMethodId => $aPrizes) {
            $oBasicMethod = BasicMethod::find($iBasicMethodId);
            $oBasicMethod->name;
            $a = [];
            foreach ($aPrizes as $iLevel => $fPrize) {
                $a[] = ChnNumber::getLevel($iLevel) . ': ' . $fPrize * $this->coefficient . '元';
            }
            $aDisplay[$oBasicMethod->name] = $oBasicMethod->name . ' : ' . implode(' ; ', $a);
        }
        return implode('<br />', $aDisplay);
    }


    /***************************** ColumnMaps End *******************************/

    protected function afterUpdate() {
        parent::afterUpdate();
        $this->deleteUserDataListCache();
    }

    /**
     * after save, need save prize and commission settings
     * @param project $oSavedModel
     */
    protected function afterSave($oSavedModel) {
        parent::afterSave($oSavedModel);
        $oSavedModel->deleteUserDataListCache();
    }

    public function deleteUserDataListCache() {
        $sKeyPrifix = static::compileUserDataListCachePrefix($this->user_id);
        $redis      = Redis::connection();
        if ($aKeys      = $redis->keys($sKeyPrifix . '*')) {
            foreach ($aKeys as $sKey) {
                $redis->del($sKey);
            }
        }
    }

    protected static function compileUserDataListCachePrefix($iUserId) {
        return static::compileListCacheKeyPrefix() . $iUserId . '-';
    }

    protected static function compileListCacheKeyPrefix() {
        return static::getCachePrefix(true) . 'for-user-';
    }

    /**
     * set Account Model
     * @param Account $oAccount
     */
    public function setAccount($oAccount) {
        $this->Account = $oAccount;
    }

    /**
     * set User Model
     * @param User $oUser
     */
    public function setUser($oUser) {
        $this->User = $oUser;
    }

    /**
     * 更新状态
     *
     * @param int $iToStatus
     * @param int $iFromStatus
     * @return int  0: success; -1: prize set cancel fail; -2: commissions cancel fail
     */
    protected function setStatus($iToStatus, $iFromStatus, $aExtraData = null) {
        $aConditions = [
            'id'     => ['=', $this->id],
            'status' => ['=', $iFromStatus]
        ];
        $data        = [
            'status' => $iToStatus,
        ];
        empty($aExtraData) or $data        = array_merge($data, $aExtraData);
        return $this->strictUpdate($aConditions, $data);
    }

    /**
     * 更新状态为撤单
     * @return int 0: success; -1 to -3: return of Transaction::addTransaction; -4: Cancel details error; -5: change status fail
     */
    public function terminate($iType = self::TERMINATE_BY_USER) {
        if ($this->status != self::STATUS_RUNNING) {
            return false;
        }
        if (!in_array($iType, array_keys(static::$cancelStatuses))) {
            return false;
        }
        $iToStatus         = static::$cancelStatuses[$iType];
        // refund
        if ($iNeedRewordAmount = $this->amount - $this->finished_amount - $this->canceled_amount) {
            $aExtraData             = $this->getAttributes();
            unset($aExtraData['id']);
            $aExtraData['trace_id'] = $this->id;
            if (($iReturn                = Transaction::addTransaction($this->User, $this->Account, TransactionType::TYPE_UNFREEZE_FOR_TRACE, $iNeedRewordAmount, $aExtraData)) != Transaction::ERRNO_CREATE_SUCCESSFUL) {
                return $iReturn;
            }
        }
        if ($iType == self::TERMINATE_BY_USER) {
            $oDetails = $this->getDetails(null, TraceDetails::STATUS_WAITING);
            foreach ($oDetails as $oDetail) {
                $oIssue = Issue::getIssue($this->lottery_id, $oDetail->issue);
                if (time() > $oIssue->end_time) {
                    return false;
                }
            }
        }
        // cancel details
        $aDetailCancelStatuses = [
            self::TERMINATE_BY_USER   => TraceDetails::STATUS_USER_CANCELED,
            self::TERMINATE_BY_ADMIN  => TraceDetails::STATUS_ADMIN_CANCELED,
            self::TERMINATE_BY_SYSTEM => TraceDetails::STATUS_SYSTEM_CANCELED,
        ];
        $iDetailToStatus       = $aDetailCancelStatuses[$iType];
        if (!TraceDetails::setAllCanceled($this->id, $iDetailToStatus)) {
            return self::ERRNO_STOP_ERROR_DETAIL_CANCEL_FAILED;
        }
        $aExtraData = [
            'canceled_issues' => $iCanceledIssues  = $this->total_issues - $this->finished_issues,
            'canceled_amount' => $fCanceledAmount  = $this->amount - $this->finished_amount,
            'stoped_at'       => $dStopdAt         = Carbon::now()->toDateTimeString()
        ];
        // set status
        if (!$this->setStatus($iToStatus, self::STATUS_RUNNING, $aExtraData)) {
            return self::ERRNO_TRACE_ERROR_SAVE_ERROR;
        }
        $this->status          = $iToStatus;
        $this->canceled_issues = $iCanceledIssues;
        $this->canceled_amount = $fCanceledAmount;
        $this->stoped_at       = $dStopdAt;
        return true;
    }

    /**
     * 获取预约清单
     * @param int $iStatus
     * @return Collection|TraceDetail
     */
    public function getDetails($sBeginIssue = null, $iStatus = null, $iCount = -1) {
        $oQuery = TraceDetails::where('trace_id', '=', $this->id);
        !$sBeginIssue or $oQuery = $oQuery->where('issue', '>=', $sBeginIssue);
        is_null($iStatus) or $oQuery = $oQuery->where('status', '=', $iStatus);
        $oQuery = $oQuery->orderby('issue', 'asc');
        $iCount < 0 or $oQuery = $oQuery->limit($iCount);
        return $oQuery->get();
    }


    public function setGenerateTask(& $sRealQueue) {
        //TODO loren task (not)没有创建注单的定时任务
        return false;
        return BaseTask::addTask('CreateProject', ['trace_id' => $this->id, 'type' => 'manual'], 'trace', 0, $sRealQueue);
    }

    protected function cancelTrace($id){
        $aJobData = [
            'trace_id' => $id
        ];
        $oMyApi = new MyApi();
        $bSucc = $oMyApi->apiRequest('cancel_trace', $aJobData);
        return $bSucc;
    }

}