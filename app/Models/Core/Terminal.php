<?php

/**
 * Terminal
 * @author lawrence
 */

namespace App\Models;

class Terminal extends BaseModel{
    protected $connection = 'mysql';
    protected $table = 'terminals';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'name',
        'safekey',
        'status',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'Terminal';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'id',
        'name',
        /*'safekey',*/
        'status',
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
        'created_at',
        'updated_at',
    ];

    public static $ignoreColumnsInCreate = [];

    public static $listColumnMaps = [

    ];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [
        'status'=>'aStatus'
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'name';

    public static $mainParamColumn = 'status';

    public static $rules = [
        'name'       => 'required|max:20',
        'safekey'    => 'required|max:32',
        'status'     => 'required|integer|min:0',
        'created_at' => 'max:19',
        'updated_at' => 'max:19',
    ];

    protected function beforeValidate(){
        $this->safekey= $this->safekey??$this->compileSafeKey();
        return parent::beforeValidate();
    }

    public function compileSafeKey(){
        return md5(md5(uniqid($this->name).mt_rand(0,99999999)));
    }
}