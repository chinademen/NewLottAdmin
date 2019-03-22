<?php

/**
 * 玩法类型
 * @author lawrence
 */

namespace App\Models;

class MethodType extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'method_types';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'lottery_type',
        'name',
        'attribute_code',
        'wn_function',
        'sequencing',
        'digital_count',
        'unique_count',
        'max_repeat_time',
        'min_repeat_time',
        'shaped',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'MethodType';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'id',
        'lottery_type',
        'name',
        'wn_function',
        'sequencing',
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
        'unique_count', 'max_repeat_time', 'min_repeat_time', 'shaped', 'digital_count',
    ];

    public static $ignoreColumnsInCreate = [
        'unique_count', 'max_repeat_time', 'min_repeat_time', 'shaped', 'digital_count'
    ];

    public static $listColumnMaps = [
    ];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [
        'lottery_type'   => 'aLotteryTypes',
        //'sequencing'     => 'aIsTrue',
        'attribute_code' => 'attribute_codes',
    ];

    public static $htmlTextAreaColumns = [

    ];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [
        'lottery_type' => 'asc',
        'id'           => 'asc',
    ];

    public static $titleColumn = '';

    public static $mainParamColumn = 'lottery_type';

    public static $rules = [
        'lottery_type'    => 'required|integer|min:0',
        'name'            => 'required|max:20',
        'wn_function'     => 'required|max:64',
        'sequencing'     => 'required|in:0,1',
        'attribute_code'  => 'max:20',
        'digital_count'   => 'max:4',
        'unique_count'    => 'max:4',
        'max_repeat_time' => 'max:4',
        'min_repeat_time' => 'max:4',
        'shaped'          => 'max:1',
        'created_at'      => 'max:19',
        'updated_at'      => 'max:19',
    ];

    protected function beforeValidate() {
        $this->sequencing or $this->sequencing = 0;
        $this->shaped or $this->shaped = 0;
        $this->digital_count or $this->digital_count = null;
        $this->unique_count or $this->unique_count = null;
        $this->max_repeat_time or $this->max_repeat_time = null;
        $this->min_repeat_time or $this->min_repeat_time = null;

        return parent::beforeValidate();

    }

}