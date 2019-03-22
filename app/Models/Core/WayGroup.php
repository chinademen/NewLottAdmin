<?php

/**
 * 玩法组
 * @author lawrence
 */

namespace App\Models;
use Cache;
class WayGroup extends BaseModel{
    protected $connection = 'mysql';
    protected $table = 'way_groups';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_FIRST;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'series_id',
        'terminal_id',
        'title',
        'parent',
        'parent_id',
        'en_title',
        'for_display',
        'sequence',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'Way Group';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'id',
        'series_id',
        'terminal_id',
        'title',
        'parent',
        'en_title',
        'for_display',
        'sequence',
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
        'series_id'   => 'aSeries',
        'terminal_id'   => 'aTerminals',
//        'for_display'   => 'aIsTrue',
        'parent_id'   => 'aParents',
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [
        'parent_id'
    ];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [
        'sequence' => 'asc',
        'id'       => 'asc',
    ];

    public static $titleColumn = 'title';

    public static $mainParamColumn = 'series_id';

    public static $rules = [
        'series_id'   => 'required|integer|min:0',
        'terminal_id' => 'required|integer|min:0',
        'title'       => 'required|max:20',
        'for_display' => 'integer|in:0,1',
        'en_title'    => 'max:20',
        'sequence'    => 'integer',
        'created_at'  => 'max:19',
        'updated_at'  => 'max:19',
    ];



    protected function afterSave($oSavedModel){
        parent::afterSave($oSavedModel);
        $oSavedModel->deleteLotteryCache($oSavedModel->series_id, $oSavedModel->terminal_id);
    }

    private static function makeCacheKeyLottery($iLotteryId, $bForBet = true, $iTerminalId = 1) {
        return static::getCachePrefix(true) . 'Lottery-' . $iLotteryId . '-' . ($bForBet ? 'true' : 'false') . '-' . $iTerminalId;
    }

    protected function afterUpdate(){
        $this->deleteCache($this->id);
        $this->deleteLotteryCache($this->series_id, $this->terminal_id);
    }

    protected function afterDelete($oDeletedModel){
        $this->deleteCache($oDeletedModel->id);
        $this->deleteLotteryCache($oDeletedModel->series_id, $oDeletedModel->terminal_id);

        return true;
    }

    protected function beforeValidate(){
        if($this->parent_id){
            $oParnetGroup = static::find($this->parent_id);
            $this->series_id = $oParnetGroup->series_id;
            $this->terminal_id = $oParnetGroup->terminal_id;
        }else{
            $this->parent_id = null;
        }

        return parent::beforeValidate();
    }

    public static function deleteLotteryCache($iSeriesId, $iTerminalId = 1) {
        if (static::$cacheLevel != self::CACHE_LEVEL_NONE) {
            Cache::setDefaultDriver(static::$cacheDrivers[static::$cacheLevel]);
            $sCacheKey = static::makeCacheKeyLottery($iSeriesId, true, $iTerminalId);
            Cache::forget($sCacheKey);
            $sCacheKey = static::makeCacheKeyLottery($iSeriesId, false, $iTerminalId);
            Cache::forget($sCacheKey);
        }
    }

    public function series(){
        return $this->belongsTo(Series::class, 'series_id');
    }

    public function terminal(){
        return $this->belongsTo(Terminal::class, 'terminal_id');
    }

}