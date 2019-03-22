<?php

/**
 * 注单的中奖设置
 *
 * @author loren
 */

namespace App\Models;

class PrjPrizeSets extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'prj_prize_sets';
    public static $merchantColumn = 'merchant_id';

    const STATUS_WAIT    = 0;
    const STATUS_SENDING = 1;
    const STATUS_SENT    = 2;
    const STATUS_DROPED  = 4;


    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'merchant_id',
        'trace_id',
        'project_id',
        'user_id',
        'account_id',
        'username',
        'is_tester',
        'user_forefather_ids',
        'project_no',
        'lottery_id',
        'issue',
        'way_id',
        'basic_method_id',
        'level',
        'coefficient',
        'agent_sets',
        'prize_set',
        'single_won_count',
        'multiple',
        'prize',
        'won_count',
        'status',
        'locked',
        'sent_at',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'PrjPrizeSets';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'id',
        'merchant_id',
        'trace_id',
        'project_id',
        'user_id',
        'account_id',
        'username',
        'is_tester',
        'user_forefather_ids',
        'project_no',
        'lottery_id',
        'issue',
        'way_id',
        'basic_method_id',
        'level',
        'coefficient',
        'agent_sets',
        'prize_set',
        'single_won_count',
        'multiple',
        'prize',
        'won_count',
        'status',
        'locked',
        'sent_at',
        'created_at',
        'updated_at',
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
        'merchant_id' => 'required|min:0|max:10',
        'trace_id' => 'required|integer|min:0',
        'project_id' => 'required|integer|min:0',
        'user_id' => 'required|min:0|max:10',
        'account_id' => 'required|min:0|max:10',
        'username' => 'required|max:16',
        'is_tester' => 'required|integer',
        'user_forefather_ids' => 'required|max:1024',
        'project_no' => 'required|max:32',
        'lottery_id' => 'required|integer|min:0',
        'issue' => 'required|max:15',
        'way_id' => 'required|min:0|max:10',
        'basic_method_id' => 'required|integer|min:0',
        'level' => 'required|integer|min:0',
        'coefficient' => 'required|numeric|min:0|max:4',
        'agent_sets' => 'required|max:1024',
        'prize_set' => 'required|numeric|min:0|max:14',
        'single_won_count' => 'required|min:0|max:10',
        'multiple' => 'required|min:0|max:10',
        'prize' => 'required|numeric|min:0|max:16',
        'won_count' => 'required|min:0|max:10',
        'status' => 'required|integer|min:0',
        'locked' => 'required|integer|min:0',
        'sent_at' => 'required|max:19',
        'created_at' => 'max:19',
        'updated_at' => 'max:19',
    ];

    protected function beforeValidate() {
        return parent::beforeValidate();
    }

    /**
     * 将指定注单的中奖记录设置为已取消
     * @param int $iProjectId
     * @return bool
     */
    public static function cancelOfProject($iProjectId) {
        return static::where('project_id', '=', $iProjectId)->where('status', '=', self::STATUS_SENT)->update(['status' => self::STATUS_DROPED]) > 0;
    }

}