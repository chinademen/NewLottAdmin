<?php

/**
 * 奖期状态
 *
 * @author loren
 */

namespace App\Models;

class IssuesStatus extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'issues_status';


    /**
     * 计奖类型
     */
    const STATUS_TYPE_CALCULATE         = 1;
    /**
     * 派奖类型
     */
    const STATUS_TYPE_TPRIZE            = 2;
    /**
     * 返点类型
     */
    const STATUS_TYPE_COMMISSION        = 3;
    /**
     * 追号类型
     */
    const STATUS_TYPE_TRACE_PRJ         = 4;

    /**
     * 计奖状态
     */
    const STATUS_CALCULATE_NONE       = 0;
    const STATUS_CALCULATE_PROCESSING = 1;
    const STATUS_CALCULATE_PARTIAL    = 2;
    const STATUS_CALCULATE_FINISHED   = 4;


    /**
     * 派奖状态
     */
    const STATUS_PRIZE_NONE       = 0;
    const STATUS_PRIZE_PROCESSING = 1;
    const STATUS_PRIZE_PARTIAL    = 2;
    const STATUS_PRIZE_FINISHED   = 4;

    /**
     * 派佣金状态
     */
    const STATUS_COMMISSION_NONE       = 0;
    const STATUS_COMMISSION_PROCESSING = 1;
    const STATUS_COMMISSION_PARTIAL    = 2;
    const STATUS_COMMISSION_FINISHED   = 4;

    /**
     * 追号单状态
     */
    const STATUS_TRACE_PRJ_NONE       = 0;
    const STATUS_TRACE_PRJ_PROCESSING = 1;
    const STATUS_TRACE_PRJ_PARTIAL    = 2;
    const STATUS_TRACE_PRJ_FINISHED   = 4;

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'type',
        'issues_id',
        'lottery_id',
        'issue',
        'status',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'IssuesStatus';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'id',
        'type',
        'issues_id',
        'lottery_id',
        'issue',
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

    public static $listColumnMaps = [];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'id';

    public static $mainParamColumn = '';

    public static $rules = [
        'type' => 'required|integer',
        'issues_id' => 'required|max:11',
        'lottery_id' => 'required|integer|min:0',
        'issue' => 'required|max:15',
        'status' => 'required|integer',
    ];

    protected function beforeValidate() {
        return parent::beforeValidate();
    }


}