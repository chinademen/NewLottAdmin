<?php

/**
 * 风险注单
 *
 * @author loren
 */

namespace App\Models;

use ChnNumber;
use Coefficient;
use Session;
use Cache;

class RiskProjects extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'risk_projects';
    public static $merchantColumn = 'merchant_id';


    const STATUS_NORMAL = 0;
    const STATUS_AUDITED = 1;
    const STATUS_RISKED = 2;
    /**
     * 风险状态改变规则
     * @var array
     */
    private $riskStatusChangeRules = [
        self::STATUS_AUDITED => [self::STATUS_NORMAL],
        self::STATUS_RISKED => [self::STATUS_NORMAL],
    ];


    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'merchant_id',
        'project_id',
        'terminal_id',
        'serial_number',
        'trace_id',
        'user_id',
        'username',
        'is_tester',
        'account_id',
        'prize_group',
        'lottery_id',
        'issue',
        'end_time',
        'way_id',
        'title',
        'position',
        'bet_number',
        'way_total_count',
        'single_count',
        'bet_rate',
        'display_bet_number',
        'multiple',
        'coefficient',
        'single_amount',
        'amount',
        'winning_number',
        'prize',
        'prize_sale_rate',
        'status',
        'auditor',
        'audited_at',
        'refuse_reason',
        'prize_set',
        'single_won_count',
        'won_count',
        'won_data',
        'ip',
        'proxy_ip',
        'bet_record_id',
        'bought_at',
        'counted_at',
        'bought_time',
        'bet_commit_time',
        'counted_time',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'RiskProjects';

    protected $softDelete = false;

    protected $defaultColumns = ['*'];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'id',
        'merchant_id',
        'serial_number',
        'trace_id',
        'username',
        'multiple',
        'lottery_id',
        'issue',
        'end_time',
        'title',
        'display_bet_number',
        'coefficient',
        'amount',
        'prize',
        'prize_sale_rate',
        'bought_at',
        'ip',
        'status',
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
        'status' => 'status_text',
        'prize' => 'prize_formatted',
        'display_bet_number' => 'display_bet_number_short',
        'is_tester' => 'is_tester_text',
        'end_time' => 'friendly_end_time',
        'bought_at' => 'friendly_bought_at',
        'coefficient' => 'formatted_coefficient',
        'terminal_id' => 'terminal_id_text',
    ];

    public static $viewColumnMaps = [
        'status' => 'status_text',
        'prize' => 'prize_formatted',
        'prize_set' => 'prize_set_formatted',
        'display_bet_number' => 'display_bet_number_for_view',
        'is_tester' => 'is_tester_text',
        'bet_rate' => 'bet_rate_formatted',
        'bet_commit_time' => 'bet_commit_time_formatted',
        'coefficient' => 'formatted_coefficient',
        'end_time' => 'friendly_end_time',
        'bought_at' => 'friendly_bought_at',
        'terminal_id' => 'terminal_id_text',
    ];

    public static $htmlSelectColumns = [
        'lottery_id' => 'aLotteries',
        'status' => 'Status',
        'terminal_id' => 'aTerminals',
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

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [
        'id' => 'desc'
    ];

    public static $titleColumn = 'serial_number';

    public static $mainParamColumn = 'project_id';


    public static $rules = [
        'project_id' => 'required|integer|min:0',
        'terminal_id' => 'required|integer|min:1',
        'serial_number' => 'required|max:32',
        'trace_id' => 'integer|min:0',
        'user_id' => 'required|min:0',
        'username' => 'required|max:32',
        'is_tester' => 'integer',
        'account_id' => 'required|min:0',
        'prize_group' => 'required|max:20',
        'lottery_id' => 'required|integer|min:0',
        'issue' => 'required|max:15',
        'end_time' => 'required|min:0',
        'way_id' => 'required|min:0',
        'title' => 'required|max:100',
        'bet_number' => 'required',
        'way_total_count' => 'required|integer|min:0',
        'single_count' => 'required|min:0',
        'bet_rate' => 'required|numeric|min:0',
        'display_bet_number' => 'required',
        'multiple' => 'required|min:0',
        'coefficient' => 'required|numeric|min:0',
        'single_amount' => 'required|numeric|min:0',
        'amount' => 'required|numeric|min:0',
        'winning_number' => 'required|max:60',
        'prize' => 'required|numeric|min:0',
        'prize_sale_rate' => 'required|numeric|min:0',
        'status' => 'required|integer|min:0',
        'prize_set' => 'required|max:1024',
        'single_won_count' => 'required|min:0',
        'won_count' => 'required|min:0',
        'won_data' => 'required|max:10240',
        'ip' => 'required|max:15',
        'proxy_ip' => 'required|max:15',
        'bet_record_id' => 'required|integer|min:0',
        'bought_at' => 'required',
        'counted_at' => 'required',
        'bought_time' => 'required|min:0',
    ];

    protected function beforeValidate() {
        return parent::beforeValidate();
    }


    /***************************** ColumnMaps Start *******************************/

    protected function getStatusTextAttribute($fieldValue = null) {
        if ($fieldValue == null && isset($this->attributes['status'])) {
            $fieldValue = $this->attributes['status'];
        }
        if ($fieldValue == null) {
            return $fieldValue;
        }
        return baseOption('base.risk_projects.status')[$fieldValue ?? 0];
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
     * 设置为有风险
     * @return bool
     */
    public function setRisk($sReason) {
        return $this->_setRiskStatus(self::STATUS_RISKED,['refuse_reason' => $sReason]);
    }

    /**
     * 设置为风险已审核
     * @return bool
     */
    public function setRiskAudited() {
        return $this->_setRiskStatus(self::STATUS_AUDITED);
    }

    /**
     * 设置风险状态
     *
     * @param int   $iToStatus 目标状态
     * @param bool  $bSetOther 是否设置用户名等信息
     * @param array $aExtraData 要同时设置的其他数据数组
     *
     * @return boolean
     */
    protected function _setRiskStatus($iToStatus, $aExtraData = [], $bSetOther = true) {
        if (!in_array($this->status, $this->riskStatusChangeRules[$iToStatus])) {
            return false;
        }
        $data = [
            'status' => $iToStatus
        ];
        if ($bSetOther) {
            $data['auditor'] = Session::get('admin_username');
            $data['audited_at'] = date('Y-m-d H:i:s');
        }
        $data = array_merge($data, $aExtraData);
        $aConditions = [
            'id' => ['=', $this->id],
            'status' => ['<>', $this->risk_status],
        ];
        return $this->strictUpdate($aConditions, $data);
    }


    /**
     * 获取未处理风险注单数量
     * @access public
     * @static
     */
    public static function getAlarmCount() {
       return static::doWhere(['status'=>['=',self::STATUS_NORMAL]])->count();
    }
}