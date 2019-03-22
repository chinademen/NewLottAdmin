<?php

/**
 * 奖期
 *
 * @author loren
 */

namespace App\Models;

use Carbon;
use Cache;
use MyApi;
use Config;
use Illuminate\Support\Facades\Session;

class Issue extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'issues';


    /**
     * 中奖号码状态：等待开奖
     */
    const ISSUE_CODE_STATUS_WAIT_CODE = 1;

    /**
     * 中奖号码状态：已输入号码，等待审核
     */
    const ISSUE_CODE_STATUS_WAIT_VERIFY = 2;

    /**
     * 中奖号码状态：号码已审核
     */
    const ISSUE_CODE_STATUS_FINISHED = 4;

    /**
     * 中奖号码状态：号码已取消开奖
     */
    const ISSUE_CODE_STATUS_CANCELED = 8;

    /**
     * 中奖号码状态：提前开奖A，获取到开奖号码的时间早于官方理论开奖时间
     */
    const ISSUE_CODE_STATUS_ADVANCE_A = 32;

    /**
     * 中奖号码状态：提前开奖B，获取到开奖号码的时间早于销售截止时间
     */
    const ISSUE_CODE_STATUS_ADVANCE_B = 64;


    const ISSUE_OPERATE_TYPE_REVISE = 1;
    const ISSUE_OPERATE_TYPE_CANCEL = 2;
    const ISSUE_OPERATE_TYPE_ADVANCED = 3;


    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'lottery_id',
        'issue',
        'issue_rule_id',
        'begin_time',
        'end_time',
        'offical_time',
        'cycle',
        'wn_number',
        'allow_encode_time',
        'encoder_id',
        'encoder',
        'encoded_at',
        'status',
        'locker',
        'locker_fund',
        'tag',
        'calculated_at',
        'prize_sent_at',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'Issue';

    protected $softDelete = false;

    protected $defaultColumns = ['*'];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'lottery_id',
        'issue',
        'begin_time',
        'end_time',
        'offical_time',
        'wn_number',
        'encoder',
        'encoded_at',
        'status',
        'calculated_at',
        'prize_sent_at',
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
        'status' => 'status_text',
        'begin_time' => 'begin_time_text',
        'end_time' => 'end_time_text',
        'offical_time' => 'offical_time_text',
        'encoded_at' => 'encoded_at_text',
        'allow_encode_time' => 'allow_encode_time_text',
    ];

    public static $viewColumnMaps = [
        'status' => 'status_text',
        'begin_time' => 'begin_time_text',
        'end_time' => 'end_time_text',
        'offical_time' => 'offical_time_text',
        'encoded_at' => 'encoded_at_text',
        'allow_encode_time' => 'allow_encode_time_text',
    ];

    public static $htmlSelectColumns = [
        'lottery_id' => 'aLotteries',
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [
        'lottery_id' => 'asc',
        'issue' => 'asc'
    ];

    public static $titleColumn = 'issue';

    public static $mainParamColumn = 'lottery_id';

    public static $rules = [
        'lottery_id' => 'required|integer|min:0',
        'issue' => 'required|max:15',
        'wn_number' => 'required|max:60',
        'encoder_id' => 'required|max:16',
        'encoder' => 'required|max:32',
        'encoded_at' => 'required|max:19',
        'status' => 'required|integer|min:0',
        'issue_rule_id' => 'min:0|max:5',
        'begin_time' => 'max:16',
        'end_time' => 'max:16',
        'offical_time' => 'max:16',
        'cycle' => 'max:16',
        'allow_encode_time' => 'max:16',
        'locker' => 'max:16',
        'locker_fund' => 'max:16',
        'tag' => 'max:50',
        'calculated_at' => 'max:19',
        'prize_sent_at' => 'max:19',
        'created_at' => 'max:19',
        'updated_at' => 'max:19',
    ];

    protected function beforeValidate() {
        return parent::beforeValidate();
    }

    /**
     * 返回第一个没有号码的奖期对象
     *
     * @param int $iLotteryId
     *
     * @return Issue
     */
    public static function getFirstNonNumberIssue($iLotteryId) {
        $time = date('Y-m-d H:i:s', strtotime('-7 days'));
        $time2 = date('Y-m-d H:i:s');
        return static::whereBetween('end_time2', [$time, $time2])
            ->where('lottery_id', '=', $iLotteryId)
            ->where('allow_encode_time', '<', time())
            ->where('status', '=', 1)
            ->orderBy('issue', 'asc')
            ->first();
    }

    protected function afterUpdate() {
        $this->deleteCache($this->id);
        if (static::$cacheLevel == self::CACHE_LEVEL_NONE) {
            return true;
        }
        $key = static::compileIssueCacheKey($this->lottery_id, $this->issue);
        Cache::setDefaultDriver(static::$cacheDrivers[static::$cacheLevel]);
        !Cache::has($key) or Cache::forget($key);
    }


    /***************************** ColumnMaps Start *******************************/

    protected function getStatusTextAttribute() {
        return baseOption('base.issues.status')[$this->status ?? 0];
    }

    protected function getBeginTimeTextAttribute() {
        return $this->getTimeStr($this->attributes['begin_time']);
    }

    protected function getEndTimeTextAttribute() {
        return $this->getTimeStr($this->attributes['end_time']);
    }

    protected function getOfficalTimeTextAttribute() {
        return $this->getTimeStr($this->attributes['offical_time']);
    }

    protected function getAllowEncodeTimeTextAttribute() {
        return $this->getTimeStr($this->attributes['allow_encode_time']);
    }

    private function getTimeStr($iTime) {
        if (empty($iTime)) return $iTime;
        $oCarbon = Carbon::createFromTimestamp($iTime);
        $oCarbon->setToStringFormat('m-d H:i:s');
        return $oCarbon->__toString();
    }

    protected function getEncodedAtTextAttribute() {
        return empty($this->attributes['encoded_at']) ? $this->attributes['encoded_at'] : substr($this->attributes['encoded_at'], 5);
    }

    /***************************** ColumnMaps End *******************************/

    public function deleteAll($aConditions) {
        $oQuery = $this->doWhere($aConditions);
        return $oQuery->delete();
    }

    /**
     * 设置中奖号码
     *
     * @param string     $sWinningNumber
     * @param CodeCenter $oCodeCenter
     *
     * @return boolean
     */
    public function setWinningNumber($sWinningNumber, $oCodeCenter = null, $bGet = false, $iStatus = null) {
        if (time() < $this->allow_encode_time) {
            return -1;
        }
        $aConditions = [
            'id' => ['=', $this->id],
            'wn_number' => ['=', ''],
            'status' => ['=', self::ISSUE_CODE_STATUS_WAIT_CODE],
        ];
        if ($oCodeCenter) {
            $sEncoder = $oCodeCenter->name;
            !$bGet or $sEncoder .= '[get]';
        } else {
            $sEncoder = Session::get('admin_username');
        }
        $iStatus or $iStatus = self::ISSUE_CODE_STATUS_FINISHED;
        $data = [
            'wn_number' => $sWinningNumber,
            'status' => $iStatus,
            'encoded_at' => Carbon::now()->toDateTimeString(),
            'encoder_id' => $oCodeCenter ? 60000 + $oCodeCenter->id : Session::get('admin_user_id'),
            'encoder' => $sEncoder
        ];
        if ($bSucc = $this->strictUpdate($aConditions, $data)) {
            foreach ($data as $key => $value) {
                $this->$key = $value;
            }
            $this->updateCaches();
        }
        return $bSucc;
    }

    protected function updateCaches() {
        $this->updateRecentIssuesList();
        $this->updateWnNumberCache();
    }

    public function updateRecentIssuesList() {
        if (static::$cacheLevel == self::CACHE_LEVEL_NONE) {
            return true;
        }
        Cache::setDefaultDriver(static::$cacheDrivers[static::$cacheLevel]);
        $sCacheKey = static::compileRecentIssuesCacheKey($this->lottery_id);
        Cache::forget($sCacheKey);
    }

    public function updateWnNumberCache() {
        if (static::$cacheLevel == self::CACHE_LEVEL_NONE) {
            return true;
        }
        Cache::setDefaultDriver(static::$cacheDrivers[static::$cacheLevel]);
        $key = $this->compileLastWnNumberCacheKey($this->lottery_id);
        Cache::forget($key);
        return true;
    }

    protected static function compileRecentIssuesCacheKey($iLotteryId) {
        return static::getCachePrefix(true) . 'Recent-issues-' . $iLotteryId;
    }

    protected static function compileLastWnNumberCacheKey($iLotteryId) {
        return Config::get('cache.prefix') . 'Last-wnnumber-' . $iLotteryId;
    }

    protected static function compileIssueCacheKey($iLotteryId, $sIssue) {
        return static::getCachePrefix() . $iLotteryId . '-' . $sIssue;
    }

    /**
     * 返回指定游戏和奖期号的奖期对象
     *
     * @param int    $iLotteryId
     * @param string $sIssue
     *
     * @return Issue
     */
    public static function getIssue($iLotteryId, $sIssue) {
        if (!$iLotteryId || !$sIssue) {
            return false;
        }
        $bReadDb = true;
        $bPutCache = false;
        if (static::$cacheLevel != self::CACHE_LEVEL_NONE) {
            Cache::setDefaultDriver(static::$cacheDrivers[static::$cacheLevel]);
            $sCacheKey = static::compileIssueCacheKey($iLotteryId, $sIssue);
            if ($aIssueInfo = Cache::get($sCacheKey)) {
                $oIssue = new static;
                $oIssue = $oIssue->newFromBuilder($aIssueInfo);
                $bReadDb = false;
            } else {
                $bPutCache = true;
            }
        }
        if ($bReadDb) {
            $oIssue = static::where('lottery_id', '=', $iLotteryId)->where('issue', '=', $sIssue)->first();
            if (!is_object($oIssue)) {
                return false;
            }
        }

        if ($bPutCache) {
            Cache::put($sCacheKey, $oIssue->toArray(), intval($oIssue->cycle / 60));
        }
        return $oIssue;
    }

    public function addCalculateTask(& $sRealQueue = null) {
        $aJobData = [
            'lottery_id' => $this->lottery_id,
            'issue' => $this->issue,
        ];
        $oMyApi = new MyApi();
        return $oMyApi->apiRequest('calculate_prize', $aJobData);
        //return BaseTask::addTask('CalculatePrize', $aJobData, 'calculate', 0, $sRealQueue);
    }

    /**
     * 发起计奖重新开奖任务
     * @return boolean
     */
    public function setCancelPriceTask($iCodeCenterId, $sNewCode) {
        $aConditions = [
            'id' => ['=', $this->id],
            'status' => ['=', self::ISSUE_CODE_STATUS_FINISHED],
        ];
        $data = [
            'status' => self::ISSUE_CODE_STATUS_CANCELED,
        ];
        if ($bSucc = $this->strictUpdate($aConditions, $data)) {

            $aJobData = [
                'lottery_id' => $this->lottery_id,
                'issue' => $this->issue,
                'new_code' => $sNewCode,
                'code_center_id' => $iCodeCenterId,
            ];

            $oMyApi = new MyApi();
            $bSucc = $oMyApi->apiRequest('cancel_prize', $aJobData);
            if ($bSucc) {
                self::clearCacheByIssue($this->lottery_id, $this->issue);
                $this->afterUpdate();
            }
        }
        return $bSucc;
    }

    public static function clearCacheByIssue($iLotteryId, $sIssue) {
        $sCacheKey = static::compileIssueCacheKey($iLotteryId, $sIssue);
        if (static::$cacheLevel != self::CACHE_LEVEL_NONE) {
            Cache::setDefaultDriver(static::$cacheDrivers[static::$cacheLevel]);
            !Cache::has($sCacheKey) or Cache::forget($sCacheKey);
        }
    }

    /**
     * 发起未开奖撤单任务
     * @return bool
     */
    public function setCancelTask($sBeginTime = null) {
        if ($this->status == self::ISSUE_CODE_STATUS_CANCELED) {
            $bSucc = true;
        } else {
            $aConditions = [
                'id' => ['=', $this->id],
            ];
            if ($sBeginTime == null) {
                $aConditions['status'] = ['=', self::ISSUE_CODE_STATUS_WAIT_CODE];
            } else {
                $aConditions['status'] = ['in', [self::ISSUE_CODE_STATUS_WAIT_CODE, self::ISSUE_CODE_STATUS_FINISHED]];
            }
            $data = [
                'status' => self::ISSUE_CODE_STATUS_CANCELED,
            ];
            $bSucc = $this->strictUpdate($aConditions, $data);
            //$bSucc = (bool)$this->doWhere($aConditions)->count();
        }
        if ($bSucc) {
            $aJobData = [
                'lottery_id' => $this->lottery_id,
                'issue' => $this->issue,
            ];
            $sBeginTime == null or $aJobData['begin_time'] = $sBeginTime;
            $oMyApi = new MyApi();
            $bSucc = $oMyApi->apiRequest('cancel_issue', $aJobData);
            if ($bSucc) {
                $this->afterUpdate();
            }
        }
        return $bSucc;
    }

    /**
     * 发起计奖任务
     * @return bool
     */
    public function setCalculateTask(& $sRealQueue = null) {
        $bSucc = $this->addCalculateTask($sRealQueue);
        return $bSucc;
    }

    /**
     * 获取需要计奖的奖期
     */
    public static function getNeedCalculateIssues($iCount = 20, $iLotteryId = null) {
        $aConditions = [
            'status' => ['=', ISSUE::ISSUE_CODE_STATUS_FINISHED]
        ];
        empty($iLotteryId) or $aConditions['lottery_id'] = ['=', $iLotteryId];

        return static::doWhere($aConditions)->whereDoesntHave('issue_status', function ($query) {
            $query->where('type', '=', IssuesStatus::STATUS_TYPE_CALCULATE)->where('status', '=', IssuesStatus::STATUS_CALCULATE_FINISHED);
        })->orderBy('lottery_id', 'asc')->orderBy('issue', 'asc')->limit($iCount)->get(['id', 'lottery_id', 'issue']);
    }

    public function issue_status() {
        return $this->hasOne(IssuesStatus::class, 'issues_id', 'id');
    }

    public static function & getIssuesByLotteryId($iLotteryId) {
        $i = 0;
        $aData = [];
        $iStartTime = time() - 3600 * 24;
        $aColumns = ['id', 'issue'];
        $oIssues = static::where('lottery_id', '=', $iLotteryId)
            ->where('begin_time', '<', time())
            ->where('begin_time', '>', $iStartTime)
            ->orderBy('issue', 'desc')
            ->get($aColumns);
        foreach ($oIssues as $id => $oIssue) {
            $aData[$i]['id'] = $oIssue->id;
            $aData[$i]['name'] = $oIssue->issue;
            $i++;
        }
        return $aData;
    }

    /**
     * 建立专用于获取在售奖期的奖期列表缓存
     * @param string $iLotteryId
     * @return array|bool|string  返回bool型，在实例化时定义了返回的类型
     */
    public static function updateIssueCache($iLotteryId = '') {
        $aJobData = [
            'lottery_id' => $iLotteryId
        ];
        $oMyApi = new MyApi();
        return $oMyApi->apiRequest('make_issue_cache', $aJobData);
    }

    /**
     * 获取不提醒的彩种（7天奖期）
     * @access public
     * @static
     */
    public static function getNotAlarmLotterys() {
        $aLotteryIds = [];
        $oIssus = static::doWhere(['status'=>['=',static::ISSUE_CODE_STATUS_WAIT_CODE],'begin_time'=>['>',strtotime(date('Y-m-d') . '+7 days')]])->groupBy('lottery_id')->get(['lottery_id']);
        foreach ($oIssus as $issue){
            $aLotteryIds[] = $issue->lottery_id;
        }
        return $aLotteryIds;
    }

}