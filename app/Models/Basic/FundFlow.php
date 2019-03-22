<?php

/**
 * 资金流设定
 *
 * @author garin
 */

namespace App\Models;

class FundFlow extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'fund_flows';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'description',
        'balance',
        'available',
        'frozen',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'FundFlow';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'id',
        'description',
        'balance',
        'available',
        'frozen',
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
        'created_at',
        'updated_at',
    ];

    public static $ignoreColumnsInCreate = [];

    public static $listColumnMaps = [];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [
        'balance' => 'aActions',
        'available' => 'aActions',
        'frozen' => 'aActions',
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'description';

    public static $mainParamColumn = 'description';

    public static $rules = [
        'description' => 'required|max:50',
        'balance' => 'required|integer',
        'available' => 'required|integer',
        'frozen' => 'required|integer',
    ];

    protected function beforeValidate() {
        return parent::beforeValidate();
    }

}