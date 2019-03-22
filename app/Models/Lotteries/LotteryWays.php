<?php

/**
 * 彩种投注方式
 *
 * @author loren
 */

namespace App\Models;

class LotteryWays extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'lottery_ways';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'series_id',
        'lottery_id',
        'series_way_id',
        'name',
        'short_name',
        'status',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'LotteryWays';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'series_id',
        'lottery_id',
        'name',
        'short_name',
        'series_way_id',
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

    public static $viewColumnMaps = [
    ];

    public static $htmlSelectColumns = [
        'series_id' => 'aSeriesIds',
        'series_way_id' => 'aSeriesWayIds',
        'lottery_id' => 'aLotteryIds'
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'name';

    public static $mainParamColumn = 'lottery_id';

    public static $rules = [
        'series_id' => 'required|integer',
        'lottery_id' => 'required|integer',
        'series_way_id' => 'required|integer',
        'name' => 'required|max:30',
        'short_name' => 'required|max:30',
        'for_display' => 'in:0,1',
        'status' => 'in:0,1',
    ];

    protected function beforeValidate() {
        return parent::beforeValidate();
    }

    protected $with=[
        'black_list'
    ];

    public static function & getLotteryWaysByLotteryId($iLotteryId) {
        $aData = [];
        $aColumns = ['id','series_way_id', 'name'];
        $aLotteryWays = $oQuery = static::where('lottery_id', '=', $iLotteryId)->orderBy('name','asc')->get($aColumns);
        foreach ($aLotteryWays as $id => $value) {
            $aData[] = [
                'id' => $value->series_way_id,
                'name' => $value->name,
            ];
        }
        return $aData;
    }

    public static function getWayIsDisplay($iSeriesId, $iLotteryId, $iSeriesWayId) {
        $bIsDisplay = false;
        $oLotteryWay = static::where('series_id', $iSeriesId)->where('lottery_id', $iLotteryId)
            ->where('series_way_id', $iSeriesWayId)->first();
        if ($oLotteryWay) {
            $bIsDisplay = $oLotteryWay->for_display == 1 ? true : false;
        }
        return $bIsDisplay;
    }

    public function black_list(){
        return $this->hasMany(LotteryWayBlackList::class,'lottery_way_id','id');
    }

    /**
     * 更新彩种投注方式
     * @param       $oLottery
     * @param       $oSeries
     * @param array $aSeriesWayIds
     * @param array $aLotteryWayIds
     *
     * @return bool
     */
    public static function updateLotteryWays($oLottery, $oSeries, &$aSeriesWayIds = [], &$aLotteryWayIds = []) {
        //查找对应的彩种投注方式
        $aConditions = [
            'lottery_id' => ['=', $oLottery->id],
        ];
        $oTempLotteryWays = LotteryWays::doWhere($aConditions)->get();
        $oLotteryWays = [];
        foreach ($oTempLotteryWays as $oLotteryWay) {
            $oLotteryWays[$oLotteryWay->series_way_id] = $oLotteryWay;
        }
        unset($oTempLotteryWays);
        $iMaxDigital = $oSeries->digital_count;
        //查找对应的系列投注方式
        $aConditions = [
            'series_id' => ['=', $oSeries->id],
            'digital_count' => ['<=', $iMaxDigital],
        ];
        $oSeriesWays = SeriesWay::doWhere($aConditions)->get();
        $aSeriesWayIds = $aLotteryWayIds = [];
        foreach ($oSeriesWays as $oSeriesWay) {
            $aOffset = explode(',', $oSeriesWay->offset);
            $iMinOffset = min($aOffset);
            if ($oSeriesWay->digital_count + $iMinOffset > $iMaxDigital) {
                continue;
            }
            $aSeriesWayIds[] = $oSeriesWay->id;
            if (empty($oLotteryWays[$oLotteryWay->series_way_id])) {
                $oLotteryWay = new LotteryWays;
                $bIsAddOrCut = true;
                $aLotteryWays = [
                    'series_id' => $oLottery->series_id,
                    'lottery_id' => $oLottery->id,
                    'series_way_id' => $oSeriesWay->id,
                    'name' => $oSeriesWay->name,
                    'short_name' => $oSeriesWay->short_name,
                ];
            } else {
                $oLotteryWay = $oLotteryWays[$oSeriesWay->id];
                if ($oLotteryWay->name == $oSeriesWay->name && $oLotteryWay->short_name == $oSeriesWay->short_name) {
                    $aLotteryWayIds[] = $oLotteryWay->id;
                    continue;
                }
                $aLotteryWays = [
                    'name' => $oSeriesWay->name,
                    'short_name' => $oSeriesWay->short_name,
                ];
            }
            $oLotteryWay->fill($aLotteryWays);
            $bSucc = $oLotteryWay->save();
            if (!$bSucc) {
                return false;
            }
            $aLotteryWayIds[] = $oLotteryWay->id;
        }
        unset($oSeriesWays,$oLotteryWays);
        return true;
    }
}