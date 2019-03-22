<?php

/**
 * Prize Details
 *
 * @author lawrence
 */

namespace App\Models;

use Cache;

class PrizeDetail extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'prize_details';

    protected static $truncatePrize = false;
    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_FIRST;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'series_id',
        'group_id',
        'group_name',
        'classic_prize',
        'method_id',
        'method_name',
        'level',
        'probability',
        'prize',
        'full_prize',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'Prize Detail';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        /*'id',
        'series_id',
        'group_id',
        'group_name',
        'classic_prize',
        'method_id',
        'method_name',
        'level',
        'probability',
        'prize',
        'full_prize',*/
        'method_id',
        'group_name',
        'level',
        'prize',
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

    public static $listColumnMaps = [];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'group_name';

    public static $mainParamColumn = '';

    public static $rules = [
        'group_id'    => 'required|integer',
        'method_id'   => 'required|integer',
        'level'       => 'required|numeric',
        'probability' => 'required|numeric|max:0.9',
        'prize'       => 'numeric',
    ];

    protected function beforeValidate(){
        if($this->method_id){
            $oMethod = BasicMethod::find($this->method_id);
            $this->method_name = $oMethod->name;
        }
        if($this->prize > $this->full_prize) return false;

        return parent::beforeValidate();
    }


    protected function afterSave($oSavedModel) {
        $oSavedModel->deleteDetailCache();
        return parent::afterSave($oSavedModel);
    }

    protected function afterUpdate() {
        $this->deleteCache($this->id);
        $this->deleteDetailCache();
    }

    protected function afterDelete($oDeletedModel) {
        $this->deleteCache($oDeletedModel->id);
        $oDeletedModel->deleteDetailCache();
        return true;
    }

    protected function deleteDetailCache(){
        if (static::$cacheLevel != self::CACHE_LEVEL_NONE) {
            Cache::setDefaultDriver(static::$cacheDrivers[static::$cacheLevel]);
            $sCacheKey = static::makeCacheKeyOfGroupNew($this->group_id);
            Cache::forget($sCacheKey);
        }
        return true;
    }

    private static function makeCacheKeyOfGroupNew($iGroupId) {
        return static::getCachePrefix() . '-new-group-' . $iGroupId;
    }

    public static function countPrize($oSeries, $fClassicPrize, $iHighEstGroup, & $aBasicLevel) {
        $fPrize = $aBasicLevel['max_prize'] * $fClassicPrize / $iHighEstGroup;
        if (static::$truncatePrize) {
            $fPrize = \Math::truncateNumber($fPrize, static::$amountAccuracy);
        } else {
            $fPrize = formatNumber($fPrize, static::$amountAccuracy);
        }
        return $fPrize;
    }

    /**
     * 根据奖金组删除奖金组明细
     *
     * @param int $group_id
     *
     * @return bool
     */
    public static function deleteByGroup($group_id = 0){
        if(empty($group_id)) return false;
        return static::where('group_id','=',$group_id)->delete();
    }
}