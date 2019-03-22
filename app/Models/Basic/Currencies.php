<?php

/**
 * 国家/地区法定货币信息
 *
 * @author garin
 */

namespace App\Models;

class Currencies extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'currencies';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_NONE;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'country_id',
        'label',
        'symbol',
        'name_zh',
        'name_en',
        'is_active',
        'updated_at',
        'created_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'Currencies';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'id',
        'country_id',
        'label',
        'symbol',
        'name_zh',
        'name_en',
        'is_active',
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
        'updated_at',
    ];

    public static $ignoreColumnsInCreate = [];

    public static $listColumnMaps = [];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [
        "country_id" => "aCountryCode",
        "is_active" => "aActiveStatus",
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'label';

    public static $mainParamColumn = 'country_id';

    public static $rules = [
        'country_id' => 'required',
        'label' => 'required|max:4',
        'name_zh' => 'required|max:32',
        'name_en' => 'required|max:32',
        'is_active' => 'required|integer',
        'symbol' => 'max:10',
    ];

    protected function beforeValidate() {
        return parent::beforeValidate();
    }

}