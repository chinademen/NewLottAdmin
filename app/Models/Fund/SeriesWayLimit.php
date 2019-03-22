<?php

/**
 * 投注限额
 *
 * @author loren
 */

namespace App\Models;

class SeriesWayLimit extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'series_way_limit';
    public static $merchantColumn = 'merchant_id';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'merchant_id',
        'lottery_id',
        'series_way_id',
        'prize',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'SeriesWayLimit';

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
        'lottery_id',
        'series_way_id',
        'prize',
        'created_at',
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
    ];

    public static $ignoreColumnsInCreate = [];

    public static $listColumnMaps = [];

    public static $viewColumnMaps = [
    ];

    public static $htmlSelectColumns = [
        'lottery_id' => 'aLotteries',
        'series_way_id' => 'aSeriesWays'
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'id';

    public static $mainParamColumn = 'merchant_id';

    public static $rules = [
        'merchant_id' => 'required|integer',
        'lottery_id' => 'required|integer',
        'series_way_id' => 'required|integer',
        'prize' => 'required|numeric',
    ];

    protected function beforeValidate() {
        return parent::beforeValidate();
    }

    public static function batch($input){
        $aSeriesWayIds = [];
        if(empty($input['series_way_id'])){
            $aWayGroupWays = WayGroup::doWhere(['terminal_id'=>['=',1],'for_display'=>['=',1],'series_id'=>['=',$input['series_id']],'parent_id'=>['=',$input['group_id']]])->get(['id']);
            $aGroupIds = [];
            foreach ($aWayGroupWays as $v){
                $aGroupIds[]=$v->id;
            }
            $aWayGroupWays = WayGroupWay::doWhere(['terminal_id'=>['=',1],'for_display'=>['=',1],'series_id'=>['=',$input['series_id']],'group_id'=>['in',$aGroupIds]])->get(['series_way_id']);
            foreach ($aWayGroupWays as $v){
                $aSeriesWayIds[] = $v->series_way_id;
            }
        }else{
            $aSeriesWayIds[] = $input['series_way_id'];
        }
        if(empty($aSeriesWayIds)){
            return false;
        }
        foreach ($aSeriesWayIds as $series_way_id){
            $limit = static::doWhere(['merchant_id'=>['=',$input['merchant_id']],'lottery_id'=>['=',$input['lottery_id']],'series_way_id'=>['=',$series_way_id]])->first();
            if($limit){
                if($input['is_del']){
                    if(!$limit->delete()){
                        return false;
                    }
                }else{
                    $limit->prize = $input['prize'];
                    if(!$limit->save()){
                        return false;
                    }
                }
            }else{
                if($input['is_del'] == 0){
                    $data = [
                        'merchant_id' => $input['merchant_id'],
                        'lottery_id' => $input['lottery_id'],
                        'series_way_id' => $series_way_id,
                        'prize' => $input['prize'],
                    ];
                    $limit     = new static;
                    $limit->fill($data);
                    if(!$limit->save()){
                        return false;
                    }
                }
            }

        }
        return true;
    }

}