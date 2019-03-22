<?php

/**
 * Releases
 * @author lawrence
 */

namespace App\Models;

class Releases extends BaseModel{
    protected $connection = 'mysql';
    protected $table = 'releases';
    public static $merchantColumn = 'merchant_id';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'merchant_id',
        'terminal_id',
        'version',
        'filename',
        'description',
        'is_force',
        'start_time',
        'status',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'Releases';

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
        'terminal_id',
        'version',
        'filename',
        'is_force',
        'start_time',
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
        'created_at',
        'updated_at',
    ];

    public static $ignoreColumnsInCreate = [
        'merchant_id'
    ];

    public static $listColumnMaps = [];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [
        'terminal_id'=>'aTerminals',
        'merchant_id'=>'aMerchants',
//        'is_force'=>'aIsTrue',
//        'status'=>'aIsTrue',
    ];

    public static $htmlTextAreaColumns = ['description'];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'filename';

    public static $mainParamColumn = 'filename';

    public static $rules = [
        'merchant_id' => 'max:11',
        'terminal_id' => 'integer|min:0',
        'version'     => 'required|max:12',
        'filename'    => 'required|max:200',
        'description' => 'max:65535',
        'is_force'    => 'required|integer|in:0,1',
        'start_time'  => 'required|max:19',
        'status'      => 'required|integer|in:0,1',
        'created_at'  => 'max:19',
        'updated_at'  => 'max:19',
    ];

    protected function beforeValidate(){
        $this->is_force = $this->is_force??0;
        $this->status = $this->status??0;
        return parent::beforeValidate();
    }

}