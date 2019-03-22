<?php

/**
 * 奖期规则
 *
 * @author loren
 */

namespace App\Models;

class IssueRules extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'issue_rules';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'lottery_id',
        'begin_time',
        'end_time',
        'cycle',
        'number_delay_time',
        'first_time',
        'stop_adjust_time',
        'encode_time',
        'issue_count',
        'enabled',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'IssueRules';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'lottery_id',
        'begin_time',
        'end_time',
        'cycle',
        'number_delay_time',
        'first_time',
        'stop_adjust_time',
        'encode_time',
        'issue_count',
        'enabled',
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
    ];

    public static $viewColumnMaps = [
    ];

    public static $htmlSelectColumns = [
        'lottery_id' => 'aLotteryIds',
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [
        'begin_time' => 'asc'
    ];

    public static $titleColumn = 'begin_time';

    public static $mainParamColumn = 'lottery_id';

    public static $rules = [
        'lottery_id'        => 'required|integer',
        'begin_time'        => 'required|date_format:H:i:s',
        'end_time'          => 'required|date_format:H:i:s',
        'cycle'             => 'integer',
        'number_delay_time' => 'required|integer',
        'first_time'        => 'required|date_format:H:i:s',
        'stop_adjust_time'  => 'integer',
        'encode_time'       => 'integer',
        'issue_count'       => 'integer',
        'enabled'           => 'in:0,1',
    ];

    protected function beforeValidate() {
        $oLottery = Lottery::find($this->lottery_id);
        if ($oLottery->is_instant) {
            return false;
        }
        $iEndTime          = strtotime($this->end_time);
        $this->end_time > $this->first_time or $iEndTime          += 3600 * 24;
        $iTotalTime        = $iEndTime - strtotime($this->first_time);
        $this->issue_count = floor($iTotalTime / ($this->cycle + $this->number_delay_time)) + 1;
        return parent::beforeValidate();
    }

    protected function afterSave($oSavedModel) {
        $oRules           = static::where('lottery_id', '=', $this->lottery_id)->where('enabled', '=', 1)->get(['id', 'issue_count']);
        $iIssueCountOfDay = 0;
        foreach ($oRules as $oRule) {
            $iIssueCountOfDay += $oRule->issue_count;
        }
        $oLottery                    = Lottery::find($this->lottery_id);
        $bTraceEqual                 = $oLottery->daily_issue_count == $oLottery->trace_issue_count;
        $oLottery->daily_issue_count = $iIssueCountOfDay;
        !$bTraceEqual or $oLottery->trace_issue_count = $iIssueCountOfDay;
        $oLottery->save();
//        $oLottery->
        return parent::afterSave($oSavedModel);
    }


}