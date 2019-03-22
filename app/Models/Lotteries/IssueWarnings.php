<?php

/**
 * 奖期告警记录
 *
 * @author loren
 */

namespace App\Models;

class IssueWarnings extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'issue_warnings';


    const ISSUE_ADVANCED_SALE_CLOSE_TIME = '102001';
    const ISSUE__ADVANCED_DRAW_TIME = '104001';
    const ISSUE_CANCELLED = '105001';
    const ISSUE_REVISE_CODE = '103001';
    const STATUS_RESOLVED = 1;
    const STATUS_NOT_RESOLVED = 0;


    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'codecenter_id',
        'lottery_id',
        'issue',
        'number',
        'warning_type',
        'err_code',
        'err_msg',
        'earliest_draw_time',
        'record_id',
        'correct_time',
        'created_at',
        'updated_at',
        'status',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'IssueWarnings';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'lottery_id',
        'issue',
        'number',
        'warning_type',
        'err_code',
        'err_msg',
        'earliest_draw_time',
        'record_id',
        'correct_time',
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
    ];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [
        'lottery_id' => 'aLotteryIds',
        'status' => 'aStatusArr',
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [
        'id' => 'desc'
    ];

    public static $titleColumn = 'id';

    public static $mainParamColumn = '';

    public static $rules = [
//        'codecenter_id' => 'required|integer',
//        'lottery_id' => 'required|integer',
//        'issue' => 'required|max:25',
//        'number' => 'required|max:60',
//        'warning_type' => 'required|max:6',
//        'err_code' => 'required|max:6',
//        'err_msg' => 'required|max:300',
//        'earliest_draw_time' => 'required|max:19',
//        'record_id' => 'required|max:11',
//        'correct_time' => 'required|max:19',
//        'status' => 'required|integer',
//        'created_at' => 'max:19',
//        'updated_at' => 'max:19',
    ];

    protected function beforeValidate() {
        return parent::beforeValidate();
    }


    /***************************** ColumnMaps Start *******************************/
    protected function getStatusTextAttribute() {
        return baseOption('base.issue_warnings.status')[$this->status ?? 0];
    }
    /***************************** ColumnMaps End *******************************/

    public static function setStatusToResolved($id) {
        $aConditions = [
            'id' => ['=', $id],
            'status' => ['=', self::STATUS_NOT_RESOLVED],
        ];
        $data = [
            'status' => self::STATUS_RESOLVED,
        ];
        return IssueWarning::doWhere($aConditions)->update($data) > 0;
    }

    /**
     * 获取未处理告警记录数量
     * @access public
     * @static
     */
    public static function getAlarmCount() {
        return static::doWhere(['status'=>['=',self::STATUS_NOT_RESOLVED]])->count();
    }
}