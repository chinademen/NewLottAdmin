<?php

/**
 * 基础投注方式
 * @author lawrence
 */

namespace App\Models;

class BasicWay extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'basic_ways';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'lottery_type',
        'name',
        'function',
        'description',
        'sequence',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'BasicWay';

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
        'description',
        'function',
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
        'lottery_type' => 'aLotteryTypes',
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'name';

    public static $mainParamColumn = 'lottery_type';

    public static $rules = [
        'lottery_type' => 'required|integer|min:0',
        'name'         => 'required|max:100',
        'function'     => 'required|max:64',
        'description'  => 'max:255',
        'sequence'     => 'max:16',
    ];

    protected function beforeValidate() {
        return parent::beforeValidate();
    }

    protected function afterSave($oSavedModel) {
        parent::afterSave($oSavedModel);
        $this->delThirdCache($oSavedModel);
        return true;
    }

    protected function afterDelete($oDeletedModel) {
        parent::afterDelete($oDeletedModel);
        $this->delThirdCache($oDeletedModel);
        return true;
    }
    protected function delThirdCache($oModel){
        $aKeys = ['basic_ways_list'];
        $this->deleteThirdCache($aKeys);
    }

}