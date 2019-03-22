<?php

/**
 * Account
 * @author lawrence
 */

namespace App\Models;

use Cache;
use DB;
use DbTool;

class Account extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'accounts';
    public static $merchantColumn = 'merchant_id';

    const ERRNO_LOCK_FAILED = -120;
    const RELEASE_DEAD_LOCK_NONE = 0;
    const RELEASE_DEAD_LOCK_RUNNING = 1;
    const RELEASE_DEAD_LOCK_SUCCESS = 2;
    const RELEASE_DEAD_LOCK_FAILED = 3;

    public static $releaseDeadLockMessages = [
        self::RELEASE_DEAD_LOCK_NONE => 'Unlocked',
        self::RELEASE_DEAD_LOCK_RUNNING => 'The Locker is Still Runing',
        self::RELEASE_DEAD_LOCK_SUCCESS => 'Released',
        self::RELEASE_DEAD_LOCK_FAILED => 'Unlock Failed!!!',
    ];
    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'merchant_id',
        'user_id',
        'username',
        'is_tester',
        'balance',
        'frozen',
        'available',
        'status',
        'locked',

    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'Account';

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
        'is_tester',
        'balance',
        'frozen',
        'available',
        'updated_at',
    ];

    public static $totalColumns = [
        'balance',
        'frozen',
        'available',
    ];

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
        'balance'=>'balance_formatted',
        'frozen'=>'frozen_formatted',
        'available'=>'available_formatted',
        //'is_tester'=>'tester_text',
    ];

    public static $viewColumnMaps = [
        'balance'=>'balance_formatted',
        'frozen'=>'frozen_formatted',
        'available'=>'available_formatted',
    ];

    public static $htmlSelectColumns = [
        'merchant_id' => 'aMerchants'
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'username';

    public static $mainParamColumn = 'is_tester';

    public static $rules = [
        'user_id'        => 'required|integer',
        'username'       => 'required|max:16',
        'balance'        => 'numeric|max:16',
        'frozen'         => 'numeric|max:16',
        'available'      => 'numeric|max:16',
        'status'         => 'required|integer|min:0',
        'backup_made_at' => 'requed|max:19',
        'locked'         => 'min:0|max:20',
        'is_tester'      => 'integer|in:0,1',
    ];

    protected function beforeValidate() {
        $this->availableChanged = $this->isDirty('available');

        return parent::beforeValidate();
    }

    protected function getBalanceFormattedAttribute() {
        return $this->getFormattedNumberForHtml('balance', true);
    }

    protected function getFrozenFormattedAttribute() {
        return $this->getFormattedNumberForHtml('frozen', true);
    }

    protected function getAvailableFormattedAttribute() {
        return $this->getFormattedNumberForHtml('available', true);
    }
    protected function getTesterTextAttribute() {
        return baseOption('base.isTester')[$this->is_tester];
    }

    protected function afterSave($oSavedModel) {
        if(!parent::afterSave($oSavedModel)){
            return false;
        }
        $this->deleteAvailableBalanceCache();

        return true;
    }

    public function deleteAvailableBalanceCache() {
        Cache::setDefaultDriver('redis');
        $sCacheKey = static::compileAvailableBalanceCacheKey($this->user_id);
        Cache::forget($sCacheKey);
    }

    protected static function compileAvailableBalanceCacheKey($iUserId) {
        return 'user-avaliable-balance-'.$iUserId;
    }

    /**
     * 代理盈亏总计
     * @param string $sBeginDate  开始日期
     * @param string $sEndDate    结束日期
     * @param int $iUserId         用户id
     * @return array
     */
    public static function getAccountSumInfo($aConditions) {
        $oQuery = DB::table('accounts')->select(DB::raw('sum(balance) total_balance, sum(frozen) total_frozen,sum(available) total_available'));
        $aResult = static::queryByConditions($oQuery, $aConditions)->first();
        return objectToArray($aResult);
    }

    /**
     * 批量设置查询条件，返回Query实例
     *
     * @param array $aConditions
     * @return Query
     */
    public static function queryByConditions($oQuery, $aConditions = []) {
        is_array($aConditions) or $aConditions = [];
        foreach ($aConditions as $sColumn => $aCondition) {
            $statement = '';
            switch ($aCondition[0]) {
                case '=':
                    if (is_null($aCondition[1])) {
                        $oQuery = $oQuery->whereNull($sColumn);
                    } else {
                        $oQuery = $oQuery->where($sColumn, '=', $aCondition[1]);
                    }
                    break;
                case 'in':
                    $array = is_array($aCondition[1]) ? $aCondition[1] : explode(',', $aCondition[1]);
                    $oQuery = $oQuery->whereIn($sColumn, $array);
                    break;
                case '>=':
                case '<=':
                case '<':
                case '>':
                case 'like':
                    if (is_null($aCondition[1])) {
                        $oQuery = $oQuery->whereNotNull($sColumn);
                    } else {
                        $oQuery = $oQuery->where($sColumn, $aCondition[0], $aCondition[1]);
                    }
                    break;
                case '<>':
                case '!=':
                    if (is_null($aCondition[1])) {
                        $oQuery = $oQuery->whereNotNull($sColumn);
                    } else {
                        $oQuery = $oQuery->where($sColumn, '<>', $aCondition[1]);
                    }
                    break;
                case 'between':
                    $oQuery = $oQuery->whereBetween($sColumn, $aCondition[1]);
                    break;
            }
        }
        //        exit;
        if (!isset($oQuery)) {
            $oQuery = static::where('id', '>', '0');
        }
        return $oQuery;
    }

    /**
     * Lock Account
     * @param int $id
     * @param int $iLocker
     * @return Account|boolean
     */
    public static function lock($id, & $iLocker) {
        $iThreadId = DbTool::getDbThreadId();
        $iCount    = static::where('id', '=', $id)->where('locked', '=', 0)->update(['locked' => $iThreadId]);
        if ($iCount > 0) {
            $iLocker = $iThreadId;
            return static::find($id);
        }
        else {
            static::addReleaseLockTask($id);
        }
        return false;
    }

    /**
     * Unlock Account
     * @param int $id
     * @param int $iLocker
     * @param bool $bReturnObject
     * @return Account|boolean
     */
    public static function unLock($id, & $iLocker, $bReturnObject = true) {
        if (empty($iLocker))
            return true;
        $iCount = static::where('id', '=', $id)->where('locked', '=', $iLocker)->update(['locked' => 0]);
        if ($iCount > 0) {
            $iLocker = 0;
            return $bReturnObject ? static::find($id) : true;
        }
        return false;
    }

    /**
     * 强制解锁，用于解开未及时解开的锁。
     * 强烈提示：本方法不检查加锁者是否是当前进程，因此，需特别小心！！
     * @param int $id
     * @param int $iLocker
     * @return int
     *      self;:RELEASE_DEAD_LOCK_NONE: 未锁定
     *      self;:RELEASE_DEAD_LOCK_RUNNING：加锁的进程仍在运行中
     *      self;:RELEASE_DEAD_LOCK_SUCCESS：解锁成功
     *      self::RELEASE_DEAD_LOCK_FAILED：解锁失败
     */
    public static function releaseDeadLock($id, $iLocker = null) {
        !is_null($iLocker) or $iLocker = static::getLocker($id);
        if (!$iLocker) {
            return self::RELEASE_DEAD_LOCK_NONE;
        }
        $aDbThreads = DbTool::getDbThreads();
        if (!in_array($iLocker, $aDbThreads)) {
            return static::unLock($id, $iLocker, false) ? self::RELEASE_DEAD_LOCK_SUCCESS : self::RELEASE_DEAD_LOCK_FAILED;
        }
        return self::RELEASE_DEAD_LOCK_RUNNING;
    }

    /**
     * 向队列增加解锁任务
     * @param int $id
     * @return bool
     */
    public static function addReleaseLockTask($id) {
        //TODO loren task (not)向队列增加解锁任务
        //return BaseTask::addTask('ReleaseDeadAccountLock', ['id' => $id], 'account');
    }
}