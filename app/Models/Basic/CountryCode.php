<?php

/**
 * 国家代码信息
 *
 * @author garin
 */

namespace App\Models;

class CountryCode extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'country_code';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_NONE;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'english_name',
        'chinese_name',
        'short_code',
        'phone_code',
        'time_equation',
        'language',
        'status',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'CountryCode';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'id',
        'english_name',
        'chinese_name',
        'short_code',
        'phone_code',
        'time_equation',
        'language',
        'status',
        'created_at',
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
        'id',
        'created_at',
        'updated_at',
    ];

    public static $ignoreColumnsInCreate = [];

    public static $listColumnMaps = [];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [
        'status' => 'aStatus'
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'chinese_name';

    public static $mainParamColumn = 'english_name';

    public static $rules = [
        'english_name' => 'required|max:30',
        'chinese_name' => 'required|max:20',
        'short_code' => 'required|max:4',
        'phone_code' => 'required|max:4',
        'time_equation' => 'required|integer',
        'status' => 'required|integer',
    ];

    protected function beforeValidate() {
        return parent::beforeValidate();
    }

}