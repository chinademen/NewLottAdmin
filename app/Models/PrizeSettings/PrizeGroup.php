<?php

/**
 * Prize Groups
 * @author lawrence
 */

namespace App\Models;

class PrizeGroup extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'prize_groups';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_FIRST;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'series_id',
        'type',
        'name',
        'classic_prize',
        'water',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'PrizeGroup';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'series_id',
        'type',
        'name',
        'classic_prize',
        'water',
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
        'water' => 'water_formatted',
    ];

    public static $viewColumnMaps = [
        'water' => 'water_formatted',
    ];

    public static $htmlSelectColumns = [
        'series_id'=>'aSeries',
        'type'=>'aLotteryType'
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [ 'name' => 'asc' ];

    public static $titleColumn = 'name';

    public static $mainParamColumn = 'series_id';

    public static $rules = [
        'series_id'     => 'required|integer',
        'type'          => 'required|integer',
        'name'          => 'required|max:20',
        'classic_prize' => 'required|integer',
        'water'         => 'required|numeric',
    ];

    protected function beforeValidate() {
        $oSeries = Series::find($this->series_id);

        $this->water = static::countWater($oSeries->classic_amount, $this->classic_prize);

        if(!static::checkWater($oSeries->classic_amount, $this->classic_prize, $this->water)){
            $this->validationErrors->add('water', __('_prize.water-error'));

            return false;
        }
        if(empty($this->classic_prize)){
            $this->validationErrors->add('classic_prize', __('_prize.missing-classic-prize'));

            return false;
        }

        if(empty($this->series_id)){
            return false;
        }
        $this->type = $oSeries->type;
        if(empty($this->name)){
            $this->name = $this->classic_prize;
        }
        $this->updated_at = date('Y-m-d H:i:s');

        return parent::beforeValidate();
    }

    protected function afterSave($bSucc, $bNew = false) {
        if(!$bSucc){
            return $bSucc;
        }
        $oPrizeLevel = new PrizeLevel;
        $aConditions = [
            'lottery_type_id' => [ '=', $this->type ],
            'series_id'       => [ '=', $this->series_id ],
        ];
        $aFields = [
            'basic_method_id', 'level', 'probability', 'full_prize', 'max_prize', 'max_group', 'min_water',
        ];
        $aPrizeLevels = $oPrizeLevel->doWhere($aConditions)->get($aFields)->toArray();
        $oSeries = Series::find($this->series_id);
        foreach($aPrizeLevels as $aBasicLevel){
            $fPrize = PrizeDetail::countPrize($oSeries, $this->classic_prize, 1960, $aBasicLevel);
            $aAttributes = [
                'series_id'     => $this->series_id,
                'group_id'      => $this->id,
                'method_id'     => $aBasicLevel['basic_method_id'],
                'level'         => $aBasicLevel['level'],
                'probability'   => $aBasicLevel['probability'],
                'classic_prize' => $this->classic_prize,
                'group_name'    => $this->name,
                'prize'         => $fPrize,
                'full_prize'    => $aBasicLevel['full_prize'],
            ];
            $oPrizeDetail = new PrizeDetail;
            $aConditions = [
                'group_id'  => [ '=', $this->id ],
                'method_id' => [ '=', $aBasicLevel['basic_method_id'] ],
                'level'     => [ '=', $aBasicLevel['level'] ],
            ];
            $oExistsDetail = $oPrizeDetail->doWhere($aConditions)->get([ 'id' ])->first();
            empty($oExistsDetail) or $oPrizeDetail = $oExistsDetail;

            $oPrizeDetail->fill($aAttributes);
            if(!$bSucc = $oPrizeDetail->save(PrizeDetail::$rules)){
                return false;
            }
        }

        return $bSucc;
    }

    protected function afterDelete($oDeletedModel) {
        PrizeDetail::deleteByGroup($oDeletedModel->id);
        return parent::afterDelete($oDeletedModel); // TODO: Change the autogenerated stub
    }


    protected function getWaterFormattedAttribute() {
        return ( $this->water * 100 ).'%';
    }

    public static function countWater($iClassicAmount, $iClassicPrize) {
        return number_format(1 - $iClassicPrize / $iClassicAmount, 4);
    }

    public static function checkWater($iClassicAmount, $iClassicPrize, $fWater) {
        $fTrue = number_format(1 - $iClassicPrize / $iClassicAmount, 4);
        $fWater = number_format($fWater, 4);

        return $fTrue == $fWater;
    }

}