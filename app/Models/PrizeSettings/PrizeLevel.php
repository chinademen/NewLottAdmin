<?php

/**
 * Prize Levels
 * @author lawrence
 */

namespace App\Models;

class PrizeLevel extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'prize_levels';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'lottery_type_id',
        'series_id',
        'basic_method_id',
        'basic_method',
        'level',
        'offical_prize',
        'max_win_count',
        'probability',
        'full_prize',
        'max_prize',
        'max_group',
        'min_water',
        'rule',
        'prize_allcount',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'Prize Level';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'lottery_type_id',
        'series_id',
        'basic_method',
        'level',
        'offical_prize',
        'max_win_count',
        'probability',
        'full_prize',
        'max_prize',
        'min_water',
        'rule',
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

    public static $listColumnMaps = [
        'probability'     => 'probability_formatted',
        'max_win_count'   => 'max_win_count_formatted',
        'min_water'       => 'minWater_formatted',
        'full_prize'      => 'full_prize_formatted',
    ];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [
        'lottery_type_id'=>'aLotteryTypes',
        'series_id'=>'aSeries',
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'basic_method';

    public static $mainParamColumn = '';

    public static $rules = [
        /*'lottery_type_id' => 'required|integer|min:0|max:3',
        'series_id'       => 'required|integer|min:0|max:3',
        'basic_method_id' => 'required|integer|min:0|max:8',
        'level'           => 'required|integer|min:0|max:3',
        'offical_prize'   => 'min:0|max:10',
        'max_win_count'   => 'min:0|max:10',
        'full_prize'      => 'min:0|max:16',
        'max_prize'       => 'min:0|max:10',
        'max_group'       => 'min:0|max:8',
        'min_water'       => 'min:0|max:4',
        'prize_allcount'  => 'min:0|max:10',
        'basic_method'    => 'max:20',
        'probability'     => 'max:16',
        'rule'            => 'max:50',*/
        'basic_method_id' => 'required|integer',
        'level'           => 'required|numeric',
        'offical_prize'   => 'numeric',
        'max_win_count'   => 'integer',
        'probability'     => 'numeric|max:0.9',
        'rule'            => 'max:50',
        'max_group'       => 'required|numeric',
        'full_prize'      => 'numeric',
        'max_prize'       => 'numeric',
        'min_water'       => 'numeric|min:0',
    ];

    protected function beforeValidate() {
        if(empty($this->basic_method_id)){
            return false;
        }
        $oBasicMethod = BasicMethod::find($this->basic_method_id);
        $this->lottery_type_id = $oBasicMethod->lottery_type;
        //$oBasicMethod          = BasicMethod::find($this->basic_method_id);
        $this->basic_method or $this->basic_method = $oBasicMethod->name;
        if($this->max_win_count > $oBasicMethod->all_count){
            return false;
        }
        $oSeries = Series::find($oBasicMethod->series_id);
        if(!$this->probability){
            $this->probability = $this->max_win_count / $oBasicMethod->all_count;
        }else{
            if(substr($this->probability, -1) == '%'){
                $this->probability = substr($this->probability, 0, -1) / 100;
            }
            if(!$this->max_win_count){
                $this->max_win_count = intval($this->probability * $oBasicMethod->all_count);
            }
        }
        if(!$this->full_prize){
            if($this->offical_prize && $oSeries->offical_prize_rate){
                $this->full_prize = formatNumber($this->offical_prize / $oSeries->offical_prize_rate, 2);
            }else{
                if($this->probability){
                    $this->full_prize = formatNumber(2 / $this->probability, 4);
                }
            }
        }
        $this->series_id = $oBasicMethod->series_id;
        $this->max_group > 0 or $this->max_group = $oSeries->max_real_group;
        if(!doubleval($this->max_prize)){
            if($oSeries->id > 5){
                $this->max_prize = $this->full_prize * ( $this->max_group / 2000 );
            }else{
                $this->max_prize = $this->full_prize * ( $this->max_group / $oSeries->classic_amount );
            }
            $this->max_prize = Math::truncateNumber($this->max_prize, 2);
        }
        $this->min_water = 1 - $this->max_prize / $this->full_prize;
        return parent::beforeValidate();
    }




    protected function getProbabilityFormattedAttribute() {
        return $this->attributes['probability'] ? formatNumber($this->attributes['probability'] * 100, 8).'%' : null;
    }

    protected function getMaxWinCountFormattedAttribute() {
        return $this->attributes['max_win_count'] ? number_format($this->attributes['max_win_count']) : null;
    }

    protected function getMinWaterFormattedAttribute() {
        return formatNumber($this->attributes['min_water'] * 100, 2).'%';
    }

    protected function getFullPrizeFormattedAttribute() {
        return number_format($this->attributes['full_prize'], 4);
    }

}