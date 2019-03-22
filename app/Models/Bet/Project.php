<?php

/**
 * projects
 *
 * @author lawrence
 */

namespace App\Models;

use EsApi;
use ChnNumber;
use Coefficient;
use Config;
use Session;
use MyApi;

class Project extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'projects';
    public static $merchantColumn = 'merchant_id';

    static $oEsApi;
    const PROJECT_INDEX = 'projects';

    const ERRNO_LOCK_FAILED = -980;
    const ERRNO_PRIZE_SENDING = -981;
    const ERRNO_COMMISSION_SENDING = -982;


    const STATUS_NORMAL = 0;
    const STATUS_DROPED = 1;    //撤单
    const STATUS_LOST = 2;
    const STATUS_WON = 3;
//    const STATUS_PRIZE_SENT         = 4;
    const STATUS_DROPED_BY_SYSTEM = 5;   //系统撤单

    const DROP_BY_USER = 1;
    const DROP_BY_ADMIN = 2;
    const DROP_BY_SYSTEM = 3;


    public static $aHiddenColumns = [];
    public static $aReadonlyInputs = [];

    /**
     * User
     * @var User|Model
     */
    public $User;

    /**
     * Account
     * @var Account|Model
     */
    public $Account;

    /**
     * Lottery
     * @var Lottery|Model
     */
    public $Lottery;


    const ERRNO_BET_SUCCESSFUL = -200;
    const ERRNO_PROJECT_MISSING = -201;
    const ERRNO_BET_SLAVE_DATA_SAVED = -202;
    const ERRNO_SLAVE_DATA_CANCELED = -203;
    const ERRNO_COUNT_ERROR = -204;
    const ERRNO_PRIZE_OVERFLOW = -205;
    const ERRNO_BET_ERROR_SAVE_ERROR = -210;
    const ERRNO_BET_ERROR_COMMISSIONS = -211;
    const ERRNO_BET_ERROR_DATA_ERROR = -213;
    const ERRNO_BET_ERROR_LOW_BALANCE = -214;
    const ERRNO_DROP_SUCCESS = -230;
    const ERRNO_DROP_ERROR_STATUS = -231;
    const ERRNO_DROP_ERROR_NOT_YOURS = -232;
    const ERRNO_DROP_ERROR_STATUS_UPDATE_ERROR = -233;
    const ERRNO_DROP_ERROR_PRIZE = -234;
    const ERRNO_DROP_ERROR_COMMISSIONS = -235;
    const ERRNO_BET_TURNOVER_UPDATE_FAILED = -236;
    const ERRNO_BET_ALL_CREATED = -500;
    const ERRNO_BET_PARTLY_CREATED = -501;
    const ERRNO_BET_FAILED = -502;
    const ERRNO_BET_DATA_ERROR = -503;
    const ERRNO_BET_LOW_AMOUNT = -504;
    const ERRNO_BET_NO_RIGHT = -999;


    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_NONE;

    protected static $cacheMinutes = 1;

    protected $fillable = [
        'winning_number',
        'prize',
        'single_won_count',
        'won_count',
        'won_data',
        'status',
        'counted_at',
        'prize_sent_at',
        'commission_sent_at',
        'counted_time',
        'prize_sent_time',
        'commission_sent_time',
        'prize_sale_rate',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'Project';

    protected $softDelete = false;

    protected $defaultColumns = ['*'];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'id',
        'terminal_id',
        'serial_number',
        'trace_id',
        'bet_record_id',
        'username',
        'is_tester',
        'lottery_id',
        'issue',
        'prize_group',
        'title',
        'multiple',
        'winning_number',
        'coefficient',
        'amount',
        'prize',
        'end_time',
        'bought_at',
        'ip',
        'status',
    ];

    public static $totalColumns = [
        'amount',
        'prize',
    ];

    public static $totalRateColumns = [
        'display_bet_number',
        'amount',
        'winning_number',
        'prize',
    ];

    public static $weightFields = [];

    public static $classGradeFields = [];

    public static $floatDisplayFields = [
        'display_bet_number',
        'bought_at',
    ];

    public static $noOrderByColumns = [];

    public static $ignoreColumnsInView = [
        'account_id',
        'user_forefather_ids',
        'way_id',
        'won_issue',
        'user_id',
        'bet_number',
        'bought_time',
        'counted_time',
        'prize_sent_time',
        'commission_sent_time',
    ];

    public static $ignoreColumnsInEdit = [
        'created_at',
        'updated_at',
    ];

    public static $ignoreColumnsInCreate = [];

    public static $listColumnMaps = [
        'serial_number' => 'serial_number_short',
        'amount' => 'amount_formatted',
        'prize' => 'prize_formatted',
        'display_bet_number' => 'display_bet_number_short',
        'end_time' => 'friendly_end_time',
        'bought_at' => 'friendly_bought_at',
    ];

    public static $viewColumnMaps = [
        'amount' => 'amount_formatted',
        'prize' => 'prize_formatted',
        'prize_set' => 'prize_set_formatted',
        'display_bet_number' => 'display_bet_number_for_view',
        'bet_rate' => 'bet_rate_formatted',
        'bet_commit_time' => 'bet_commit_time_formatted',
        'end_time' => 'friendly_end_time',
        'bought_at' => 'friendly_bought_at',
    ];

    public static $htmlSelectColumns = [
        'lottery_id' => 'aLotteries',
        'status' => 'aStatus',
        'terminal_id' => 'aTerminals',
        'coefficient' => 'aCoefficient',
        'is_tester' => 'aIsTester',
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [
        'amount' => 4,
        'prize' => 6
    ];

    public static $htmlOriginalNumberColumns = [
        'won_count',
        'single_won_count'
    ];

    public static $amountAccuracy = 4;

    public static $originalColumns;

    public $orderColumns = [
        'id' => 'desc'
    ];

    public static $titleColumn = 'serial_number';

    public static $mainParamColumn = 'user_id';

    public static $rules = [
        'bought_at' => 'date_format:Y-m-d H:i:s',
        'counted_at' => 'date_format:Y-m-d H:i:s',
        'prize_sent_at' => 'date_format:Y-m-d H:i:s',
        'commission_sent_at' => 'date_format:Y-m-d H:i:s',
        'counted_time' => 'integer',
        'prize_sent_time' => 'integer',
        'commission_sent_time' => 'integer',
        'won_count' => 'integer',
    ];


    protected function beforeValidate() {
        return parent::beforeValidate();
    }


    /****************************** ES Start ******************************/
    /**
     * 从Elasticsearch中查询数据
     *
     * @param $aParams
     *
     * @return mixed
     */
    public static function getInfoFromEs($aParams) {
        $iYear = isset($aParams['year']) ? $aParams['year'] : '';
        $iMonth = isset($aParams['month']) ? $aParams['month'] : '';
        $iLottery_id = isset($aParams['lottery_id']) ? $aParams['lottery_id'] : '';
        $iProjectId = isset($aParams['project_id']) ? $aParams['project_id'] : '';

        $sql = "select * from " . self::PROJECT_INDEX . " where is_tester=0  ";

        if ($iProjectId != '') {
            $sql = $sql . " and id = " . $iProjectId;
        }

        $oEsApi = new EsApi(SysConfig::readValue('es_address'), SysConfig::readValue('es_port'));
        $obj = $oEsApi->aggregateQuery($sql, $all);
        $aFnal = [];

        if (count($obj) > 0) {
            foreach ($obj['hits']['hits'] as $k => $v) {
                $aFnalTmp['id'] = $v['_source']['id'];
                $aFnalTmp['serial_number'] = $v['_source']['serial_number'];
                $aFnalTmp['trace_id'] = $v['_source']['trace_id'];
                $aFnalTmp['username'] = $v['_source']['username'];
                $aFnalTmp['multiple'] = $v['_source']['multiple'];
                $aFnalTmp['lottery_id'] = static::getLotteryIdTextAttribute($v['_source']['lottery_id']);
                $aFnalTmp['issue'] = $v['_source']['issue'];
                $aFnalTmp['end_time'] = $v['_source']['end_time'];
                $aFnalTmp['title'] = $v['_source']['title'];
                $aFnalTmp['bet_number'] = $v['_source']['bet_number'];
                $aFnalTmp['coefficient'] = $v['_source']['coefficient'];
                $aFnalTmp['amount'] = $v['_source']['amount'];
                $aFnalTmp['prize'] = $v['_source']['prize'];
                $aFnalTmp['bought_at'] = $v['_source']['bought_at'];
                $aFnalTmp['ip'] = $v['_source']['ip'];
                $aFnalTmp['status'] = static::getStatusTextAttribute($v['_source']['status']);

                $aFnalTmp['terminal_id'] = static::getTerminalIdTextAttribute($v['_source']['terminal_id']);
                $aFnalTmp['is_tester'] = static::getIsTesterTextAttribute($v['_source']['is_tester']);
                $aFnalTmp['prize_group'] = $v['_source']['prize_group'];
                $aFnalTmp['winning_number'] = $v['_source']['winning_number'];
                $aFnal[] = $aFnalTmp;
            }
        }

        if (count($aFnal) > 0) {
            foreach ($aFnal as $k => $v) {
                if ($iLottery_id != '' && $v['lottery_id'] != $iLottery_id) {
                    unset($aFnal[$k]);
                }
            }
        }

        return $aFnal;
    }

    /****************************** ES End ******************************/

    /***************************** ColumnMaps Start *******************************/
    protected function getLotteryIdTextAttribute($fieldValue = null) {
        if ($fieldValue == null && isset($this->attributes['lottery_id'])) {
            $fieldValue = $this->attributes['lottery_id'];
        }
        if ($fieldValue == null) {
            return $fieldValue;
        }
        $oLottery = Lottery::find($fieldValue);

        return empty($oLottery->name) ? $fieldValue : $oLottery->name;
    }

    protected function getStatusTextAttribute($fieldValue = null) {
        if ($fieldValue == null && isset($this->attributes['status'])) {
            $fieldValue = $this->attributes['status'];
        }
        if ($fieldValue == null) {
            return $fieldValue;
        }
        return baseOption('base.projects.status')[$fieldValue ?? 0];
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

    protected function getSerialNumberShortAttribute($fieldValue = null) {
        if ($fieldValue == null && isset($this->attributes['serial_number'])) {
            $fieldValue = $this->attributes['serial_number'];
        }
        if ($fieldValue == null) {
            return $fieldValue;
        }
        return substr($fieldValue, -6);
    }

    protected function getDisplayBetNumberShortAttribute($fieldValue = null) {
        if ($fieldValue == null && isset($this->attributes['display_bet_number'])) {
            $fieldValue = $this->attributes['display_bet_number'];
        }
        if ($fieldValue == null) {
            return $fieldValue;
        }
        return mb_strlen($fieldValue) > 10 ? mb_substr($fieldValue, 0, 10) . '...' : $fieldValue;
    }


    protected function getFriendlyEndTimeAttribute($fieldValue = null) {
        if ($fieldValue == null && isset($this->attributes['end_time'])) {
            $fieldValue = $this->attributes['end_time'];
        }
        if ($fieldValue == null) {
            return $fieldValue;
        }
        return date('H:i:s', $fieldValue);
    }

    protected function getFriendlyBoughtAtAttribute($fieldValue = null) {
        if ($fieldValue == null && isset($this->attributes['bought_at'])) {
            $fieldValue = $this->attributes['bought_at'];
        }
        if ($fieldValue == null) {
            return $fieldValue;
        }
        return substr($fieldValue, 11);
    }

    protected function getFormattedCoefficientAttribute($fieldValue = null) {
        if ($fieldValue == null && isset($this->attributes['coefficient'])) {
            $fieldValue = $this->attributes['coefficient'];
        }
        if ($fieldValue == null) {
            return $fieldValue;
        }
        return !is_null($fieldValue) ? Coefficient::getCoefficientText($fieldValue) : '';
    }


    protected function getdisplayBetNumberForViewAttribute($fieldValue = null) {
        if ($fieldValue == null && isset($this->attributes['display_bet_number'])) {
            $fieldValue = $this->attributes['display_bet_number'];
        }
        if ($fieldValue == null) {
            return $fieldValue;
        }
        $iWidthScreen = 120;
        if (strlen($fieldValue) > $iWidthScreen) {
            $sSplitChar = Config::get('bet.split_char');
            $aNumbers = explode($sSplitChar, $fieldValue);
            $iWidthBetNumber = strlen($aNumbers[0]);
            $aMultiArray = array_chunk($aNumbers, intval($iWidthScreen / $iWidthBetNumber));
            $aText = [];
            foreach ($aMultiArray as $aNumberArray) {
                $aText[] = implode($sSplitChar, $aNumberArray);
            }
            return implode('<br />', $aText);
        } else {
            return $fieldValue;
        }
    }

    protected function getBetRateFormattedAttribute($fieldValue = null) {
        if ($fieldValue == null && isset($this->attributes['bet_rate'])) {
            $fieldValue = $this->attributes['bet_rate'];
        }
        if ($fieldValue == null) {
            return $fieldValue;
        }
        return formatNumber($fieldValue * 100, 2) . '%';
    }

    protected function getBetCommitTimeFormattedAttribute($fieldValue = null) {
        if ($fieldValue == null && isset($this->attributes['bet_commit_time'])) {
            $fieldValue = $this->attributes['bet_commit_time'];
        }
        if ($fieldValue == null) {
            return $fieldValue;
        }
        return !empty($fieldValue) ? date('Y-m-d H:i:s', $fieldValue) : null;
    }

    /***************************** ColumnMaps End *******************************/

    /**
     * 返回经格式化后的数字，用于金额显示
     *
     * @param string $sColumn
     *
     * @return string
     * @access public
     */
    protected function getFormattedNumberForHtml($sColumn, $bTruncate = false) {
        $iAccuracy = isset(static::$htmlNumberColumns[$sColumn]) ? static::$htmlNumberColumns[$sColumn] : static::$amountAccuracy;
        $fNumber = $this->{$sColumn};
        if ($bTruncate) {
            $iBaseNumber = pow(10, $iAccuracy);
            return number_format(intval($fNumber * $iBaseNumber) / $iBaseNumber, $iAccuracy);
        } else {
            return number_format($this->{$sColumn}, $iAccuracy);
        }
    }


    /**
     * 更新状态为撤单
     * @return bool
     */
    public function setDroped($iType = self::DROP_BY_USER) {
        //TODO 撤销佣金
        $data                = ['canceled_at' => date('Y-m-d H:i:s')];
        $iType != self::DROP_BY_ADMIN or $data['canceled_by'] = Session::get('admin_username');
        $iStatus             = $iType == self::DROP_BY_SYSTEM ? self::STATUS_DROPED_BY_SYSTEM : self::STATUS_DROPED;
        if (!$this->setStatus($iStatus, self::STATUS_NORMAL, $data)) {
            return self::ERRNO_DROP_ERROR_STATUS_UPDATE_ERROR;
        }
        $this->canceled_at = $data['canceled_at'];
        $this->status      = $iStatus;
        $iType != self::DROP_BY_ADMIN or $this->canceled_by = $data['canceled_by'];
        return self::ERRNO_DROP_SUCCESS;
    }

    /**
     * 更新状态
     *
     * @param int $iToStatus
     * @param int $iFromStatus
     * @param $aExtraData
     * @return int  0: success; -1: prize set cancel fail; -2: commissions cancel fail
     */
    protected function setStatus($iToStatus, $iFromStatus, $aExtraData = []) {
        $aExtraData['status'] = $iToStatus;
        $aConditions          = [
            'id'     => ['=', $this->id],
            'status' => ['=', $iFromStatus],
            'status' => ['<>', $iToStatus],
        ];
        if ($bSucc = $this->strictUpdate($aConditions, $aExtraData)) {
            $this->status = $iToStatus;
        }
        return $bSucc;
    }


    protected function cancelProject($id){
        $aJobData = [
            'project_id' => $id
        ];
        $oMyApi = new MyApi();
        $bSucc = $oMyApi->apiRequest('cancel_project', $aJobData);
        return $bSucc;
    }

}