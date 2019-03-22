<?php

/**
 * 系列
 *
 * @author lawrence
 */

namespace App\Models;

class Series extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'series';


    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'type',
        'lotto_type',
        'name',
        'identifier',
        'sort_winning_number',
        'buy_length',
        'wn_length',
        'digital_count',
        'classic_amount',
        'group_type',
        'max_percent_group',
        'max_prize_group',
        'max_real_group',
        'max_bet_group',
        'valid_nums',
        'offical_prize_rate',
        'default_way_id',
        'link_to',
        'lotteries',
        'bonus_enabled'
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'Series';

    protected $softDelete = false;

    protected $defaultColumns = ['*'];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'id',
        'type',
        'lotto_type',
        'name',
        'identifier',
        'sort_winning_number',
        'digital_count',
        'classic_amount',
        'group_type',
        'max_percent_group',
        'max_prize_group',
        'max_real_group',
        'max_bet_group',
        'buy_length',
        'link_to'
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
        'bonus_enabled'
    ];

    public static $ignoreColumnsInCreate = [];

    public static $listColumnMaps = [
        'type' => 'type_text',
        'lotto_type' => 'lotto_type_text',
        'group_type' => 'group_type_text',
        'sort_winning_number' => 'sort_winning_number_text',
        'default_way_id' => 'default_way_id_text',
    ];

    public static $viewColumnMaps = [
        'type' => 'type_text',
        'lotto_type' => 'lotto_type_text',
        'group_type' => 'group_type_text',
        'sort_winning_number' => 'sort_winning_number_text',
        'default_way_id' => 'default_way_id_text',
    ];

    public static $htmlSelectColumns = [
        'type' => 'aLotteryTypes',
        'link_to' => 'aSeries',
        'group_type' => 'aGroupTypes',
        'lotto_type' => 'aLottoTypes',
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = '';

    public static $mainParamColumn = '';

    public static $rules = [
        'name' => 'required|max:20',
        'buy_length' => 'required|max:10',
        'wn_length' => 'required|max:10',
        'digital_count' => 'required|numeric',
        'max_real_group' => 'required|integer',
        'type' => 'required|integer',
        'lotto_type' => 'nullable|integer',
        'offical_prize_rate' => 'numeric|max:0.99',
        'link_to' => 'nullable|integer',
        'identifier' => 'required|max:10',
        'sort_winning_number' => 'in:0,1',
        'classic_amount' => 'required|integer',
        'group_type' => 'integer',
        'max_prize_group' => 'required|integer',
        'max_bet_group' => 'required|integer',
        'max_percent_group' => 'integer',
        'valid_nums' => 'required|max:250',
        'default_way_id' => 'nullable|integer',
        'lotteries' => 'max:200',
    ];

    public $timestamps = false;

    protected function beforeValidate() {
        if (strpos($this->valid_nums, '-')) {
            list($iMin, $iMax) = explode('-', $this->valid_nums);
            $aValidNums = [];
            for ($i = $iMin; $i <= $iMax; $i++) {
                $aValidNums[] = $i;
            }
            $this->valid_nums = implode(',', $aValidNums);
        }
        if (!$this->max_real_group || $this->max_real_group > $this->max_prize_group) {
            $this->max_real_group = $this->max_prize_group;
        }
        if (!$this->max_bet_group || $this->max_bet_group > $this->max_prize_group) {
            $this->max_bet_group = $this->max_prize_group;
        }
        !empty($this->link_to) or $this->link_to = null;
        !empty($this->lotto_type) or $this->lotto_type = null;
        !empty($this->default_way_id) or $this->default_way_id = null;
        if ($this->type == Lottery::LOTTERY_TYPE_DIGITAL) {
            $this->sort_winning_number = 0;
        } else {
            in_array($this->sort_winning_number, [0, 1]) or $this->sort_winning_number = 0;
        }
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
        $aKeys = ['series_list','series:row:id_'.$oModel->id];
        $this->deleteThirdCache($aKeys);
    }

    public function getTypeTextAttribute() {
        return baseOption('base.lottery.type')[$this->type ?? 1];
    }

    public function getLottoTypeTextAttribute() {
        return baseOption('base.series.lotto_type')[$this->lotto_type] ?? '';
    }

    public function getGroupTypeTextAttribute() {
        return baseOption('base.series.group_type')[$this->group_type ?? 1];
    }

    public function getSortWinningNumberTextAttribute() {
        return baseOption('base.isTrue')[$this->sort_winning_number ?? 0];
    }

    public function getDefaultWayIdTextAttribute() {
        if(empty($this->attributes['default_way_id'])){
            return $this->attributes['default_way_id'];
        }
        $oSeriesWay = SeriesWay::find($this->attributes['default_way_id']);

        return empty($oSeriesWay->name) ? $this->attributes['default_way_id'] : $oSeriesWay->name;
    }

    public static function & getSeriesLotteriesForEncode() {
        $aAllSeires = &static::getAllSeries();
        $data = [];
        $aLotteriesArray = Lottery::getAllLotteriesGroupBySeries();
        foreach ($aAllSeires as $aSeries) {
            if (isset($aLotteriesArray[$aSeries['id']])) {
                $oSeries = static::find($aSeries['id']);
                $subdata = [
                    'id' => $oSeries->id,
                    'name' => $oSeries->friendly_name,
                    'children' => []
                ];
                foreach ($aLotteriesArray[$aSeries['id']] as $aLotteryInfo) {
                    if ($aLotteryInfo['status'] == Lottery::STATUS_CLOSED_FOREVER || $aLotteryInfo['is_instant'] || $aLotteryInfo['plat_id']) {
                        continue;
                    }
                    $subdata['children'][] = [
                        'id' => $aLotteryInfo['id'],
                        'name' => $aLotteryInfo['name']
                    ];
                }
                $data[] = $subdata;
            }
        }
        return $data;
    }

}