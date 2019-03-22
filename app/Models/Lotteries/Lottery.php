<?php

/**
 * 彩种
 *
 * @author lawrence
 */

namespace App\Models;

use Cache;
use MyDate;

class Lottery extends BaseModel {
    /**
     * 数字排列类型
     */
    const LOTTERY_TYPE_DIGITAL = 1;

    /**
     * 乐透类型
     */
    const LOTTERY_TYPE_LOTTO = 2;

    /**
     * 体育类型
     */
    const LOTTERY_TYPE_SPORT = 3;

    /**
     * 真人娱乐类型
     */
    const LOTTERY_TYPE_LIVE_CASINO = 4;

    /**
     * ga棋牌类型
     */
    const LOTTERY_TYPE_GA = 5;


    /**
     * 单区乐透类型
     */
    const LOTTERY_TYPE_LOTTO_SINGLE = 1;

    /**
     * 双区乐透类型
     */
    const LOTTERY_TYPE_LOTTO_DOUBLE = 2;
    const WINNING_SPLIT_FOR_DOUBLE_LOTTO = '+';

    /**
     * 针对正式用户可用
     */
    const STATUS_AVAILABLE_FOR_NORMAL_USER = 2;

    /**
     * 针对测试用户可用
     */
    const STATUS_AVAILABLE_FOR_TESTER = 1;

    /**
     * 不可用
     */
    const STATUS_NOT_AVAILABLE = 0;

    /**
     * 测试状态（此状态下系统不接受自动录号）
     */
    const STATUS_TESTING = 4;

    /**
     * 永久关闭
     */
    const STATUS_CLOSED_FOREVER = 8;

    /**
     * 所有用户可用
     */
    const STATUS_AVAILABLE = 3;
    const ERRNO_LOTTERY_MISSING = -900;
    const ERRNO_LOTTERY_CLOSED = -901;


    public static $validStatuses = [
        self::STATUS_NOT_AVAILABLE => 'status-closed',
        self::STATUS_AVAILABLE_FOR_TESTER => 'status-for-tester',
        self::STATUS_AVAILABLE => 'status-available',
        self::STATUS_TESTING => 'status-dev',
        self::STATUS_CLOSED_FOREVER => 'status-closed-forever'
    ];


    protected $connection = 'mysql';
    protected $table = 'lotteries';

    //
    public static $cacheLevel = self::CACHE_LEVEL_SECOND;

    //n
    protected static $cacheUseParentClass = false;

    //缓存时间
    protected static $cacheMinutes = 0;

    //保存是的字段，可修改字段
    protected $fillable = [
        'id',
        'series_id',
        'name',
        'type',
        'lotto_type',
        'is_self',
        'is_instant',
        'high_frequency',
        'sort_winning_number',
        'valid_nums',
        'buy_length',
        'wn_length',
        'identifier',
        'days',
        'issue_over_midnight',
        'issue_format',
        'bet_template',
        'begin_time',
        'end_time',
        'sequence',
        'status',
        'need_draw',
        'daily_issue_count',
        'trace_issue_count',
        'max_bet_group',
        'series_ways',
        'created_at',
        'updated_at',
    ];

    //排序按钮
    public static $sequencable = true;

    //
    public static $enabledBatchAction = false;

    //自定义验证消息
    protected $validatorMessages = [];

    //只有后台可用 废弃
    protected $isAdmin = true;

    //model 名称
    public static $resourceName = 'Lottery';

    //软删除   废弃
    protected $softDelete = false;

    protected $defaultColumns = ['*'];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    //关联treeable
    public static $foreFatherIDColumn = '';

    //关联treeable
    public static $foreFatherColumn = '';

    //列表显示字段
    public static $columnForList = [
        'id',
        'name',
        'type',
        'lotto_type',
        'identifier',
        'begin_time',
        'end_time',
        'daily_issue_count',
        'trace_issue_count',
        'status',
        'sequence',
    ];

    //统计列字段
    public static $totalColumns = [];

    //统计百分比
    public static $totalRateColumns = [];

    //权重字段
    public static $weightFields = [];

    public static $classGradeFields = [];

    public static $floatDisplayFields = [];

    //不排序字段
    public static $noOrderByColumns = [];

    //查看不显示字段
    public static $ignoreColumnsInView = [
        'series_ways'
    ];

    //创建 修改 不显示字段
    public static $ignoreColumnsInEdit = [
        'need_draw',
        'series_ways'
    ];

    //废弃
    public static $ignoreColumnsInCreate = [];

    //列表字段需要自定义显示的方法 friendly_name getFriendlyNameAttribute()
    public static $listColumnMaps = [
        'name' => 'name_text',
//        'days' => 'days_text'
        'series_id' => 'series_id_text',
        'type' => 'type_text',
        'lotto_type' => 'lotto_type_text',
        'status' => 'status_text'
    ];


    public static $viewColumnMaps = [
        'name' => 'name_text',
        'days' => 'days_text',
        'series_id' => 'series_id_text',
        'type' => 'type_text',
        'lotto_type' => 'lotto_type_text',
        'status' => 'status_text'
    ];

    public static $htmlSelectColumns = [
        'series_id' => 'aSeriesIds',
        'type' => 'aLotteryTypes',
        'lotto_type' => 'aLottoTypes',
        'status' => 'aStatusArr'
    ];

    //创建 修改  字段是文本域
    public static $htmlTextAreaColumns = [];

    //创建 修改  字段是数字
    public static $htmlNumberColumns = [];

    //数字字段原样显示
    public static $htmlOriginalNumberColumns = [];

    //数字格式化 小数点位数
    public static $amountAccuracy = 0;

    //原始字段
    public static $originalColumns;

    //列表默认排序
    public $orderColumns = [
        'sequence' => 'asc'
    ];

    //数据头字段，一般用在弹出框标题或内容中，废弃
    public static $titleColumn = 'name';

    public static $mainParamColumn = '';

    //数据校验
    public static $rules = [
        'series_id' => 'required|integer',
        'name' => 'required|between:2,10',
        'type' => 'required|numeric',
        'lotto_type' => 'nullable|integer',
        'is_self' => 'in:0,1',
        'is_instant' => 'in:0,1',
        'high_frequency' => 'in:0,1',
        'sort_winning_number' => 'in:0,1',
        'valid_nums' => 'required',
        'buy_length' => 'required',
        'wn_length' => 'required',
        'identifier' => 'required|between:3,10',
        'days' => 'numeric',
        'issue_over_midnight' => 'in:0,1',
        'issue_format' => 'min:3',
        'bet_template' => 'min:3',
        'begin_time' => 'required_if:high_frequency,0|date_format:H:i:s',
        'end_time' => 'required_if:high_frequency,0|date_format:H:i:s',
        'sequence' => 'integer',
        'status' => 'in:0,1,3,4,8',
        'daily_issue_count' => 'integer',
        'trace_issue_count' => 'integer',
        'max_bet_group' => 'integer|min:1800',
    ];

    //在验证rules之前自定义验证
    protected function beforeValidate() {
        !empty($this->lotto_type) or $this->lotto_type = null;
        return parent::beforeValidate();
    }

    protected function afterSave($oSavedModel) {
        parent::afterSave($oSavedModel);
        $this->updateLotteryListCache();
        $this->deleteCacheByIdentifier();
        $this->deleteOtherCache();
        $this->delThirdCache($oSavedModel);
        return true;
    }

    protected function afterDelete($oDeletedModel) {
        parent::afterDelete($oDeletedModel);
        $this->updateLotteryListCache();
        $this->deleteOtherCache();
        $this->delThirdCache($oDeletedModel);
        return true;
    }
    protected function delThirdCache($oModel){
        $aKeys = ['lottery_list','lotteries:row:id_'.$oModel->id];
        $this->deleteThirdCache($aKeys);
    }

    public static function updateLotteryListCache() {
        if (static::$cacheLevel == self::CACHE_LEVEL_NONE)
            return true;
        Cache::setDefaultDriver(static::$cacheDrivers[static::$cacheLevel]);
        $sLanguageSource = SysConfig::readDataSource('sys_support_languages');
        // pr($sLanguageSource);
        $aLanguages = SysConfig::getSource($sLanguageSource);
        $aLotteries = static::getSelectSearchArrays()->toArray();
        foreach ($aLanguages as $sLocale => $sLanguage) {
            $aLotteriesOfLocale = array_map(function ($value) use ($sLocale) {
                return __('_lotteries.' . strtolower($value), [], 1, $sLocale);
            }, $aLotteries);
            $key = static::compileListCaheKey($sLocale);
            Cache::forever($key, $aLotteriesOfLocale);
        }
        return true;
    }

    protected static function compileListCaheKey($sLocate) {
        return 'lottery-list-' . $sLocate;
    }

    protected function deleteCacheByIdentifier() {
        $sKey = static::compileCacheKeyByIdentifier($this->identifier);
        !Cache::has($sKey) or Cache::forget($sKey);
    }

    protected static function compileCacheKeyByIdentifier($sIdentifier) {
        return 'lottery-identifier-' . strtolower($sIdentifier);
    }

    protected static function deleteOtherCache() {
        if (static::$cacheLevel == self::CACHE_LEVEL_NONE)
            return true;
        Cache::setDefaultDriver(static::$cacheDrivers[static::$cacheLevel]);
        $sKey = static::compileLotteryListCacheKey();
        !Cache::has($sKey) or Cache::forget($sKey);
        $sKey = static::compileLotteryListCacheKey(1);
        !Cache::has($sKey) or Cache::forget($sKey);
        $sKey = static::compileLotteryListCacheKey(0);
        !Cache::has($sKey) or Cache::forget($sKey);
    }

    protected static function compileLotteryListCacheKey($bOpen = null) {
        $sKey = static::getCachePrefix(true) . 'list';
        if (!is_null($bOpen)) {
            $sKey .= $bOpen ? '-open' : '-close';
        }
        return $sKey;
    }

    /***************************** ColumnMaps Start *******************************/

    protected function getNameTextAttribute() {
//        return $this->name;
        return ___('_lotteries.' . $this->name);
    }

    protected function getDaysTextAttribute() {
        $iValidDays = $this->attributes['days'];
        return implode(',', MyDate::checkWeekDays($iValidDays, 1));
    }

    protected function getSeriesIdTextAttribute() {
        return Series::getSelectSearchArrays()[$this->series_id ?? 1];
    }

    protected function getTypeTextAttribute() {
        return baseOption('base.lottery.type')[$this->type ?? 1];
    }

    protected function getLottoTypeTextAttribute() {
        return baseOption('base.lottery.lotto_type')[$this->lotto_type ?? 1] ?? '';
    }

    protected function getStatusTextAttribute() {
        return baseOption('base.lottery.status')[$this->status ?? 1];
    }


    /***************************** ColumnMaps End *******************************/

    /**
     * 格式化中奖号码，返回规范化的中奖号码
     *
     * @param string $sWinningNumber
     * @param        $sSplitChar 双区乐透类型时的区分隔符，非双区乐透型时无效
     *
     * @return string
     */
    public function formatWinningNumber($sWinningNumber, $sSplitChar = '+') {
        switch ($this->type) {
            case self::LOTTERY_TYPE_DIGITAL:    // num type
                $pattern = '/[^\d]/';
                $sWinningNumber = preg_replace($pattern, '', $sWinningNumber);
                if ($this->sort_winning_number) {
                    $a = str_split($sWinningNumber, 1);
                    sort($a);
                    $sWinningNumber = implode($a);
                }
                return $sWinningNumber;
                break;
            case self::LOTTERY_TYPE_LOTTO:
                switch ($this->lotto_type) {
                    case self::LOTTERY_TYPE_LOTTO_SINGLE:
                        return $this->_formatWinningNumberForSingleLotto($sWinningNumber, $this->sort_winning_number);
                        break;
                    case self::LOTTERY_TYPE_LOTTO_DOUBLE:
                        $aAreas = explode($sSplitChar, $sWinningNumber);
                        $aBonusCode = [];
                        foreach ($aAreas as $iKey => $sBonusCodeForArea) {
                            $aBonusCode[$iKey] = $this->_formatWinningNumberForSingleLotto($sBonusCodeForArea, $this->sort_winning_number);
                        }
                        return implode(self::WINNING_SPLIT_FOR_DOUBLE_LOTTO, $aBonusCode);
                    default :       // 尚不支持多区乐透型
                        return false;
                }
                break;
            default:  // 尚不支持其他类型
                return false;
        }
    }

    /**
     * 格式化单区乐透型的号码
     *
     * @param string $sWinningNumber
     * @param bool   $bSort
     *
     * @return string
     */
    private function _formatWinningNumberForSingleLotto($sWinningNumber, $bSort) {
        $sWinningNumber = preg_replace('/[^\d]/', ' ', $sWinningNumber);
        $aNums = array_unique(explode(' ', $sWinningNumber));
        $aNums = array_diff($aNums, ['']);
        !$bSort or sort($aNums);
        $aBalls = [];
        foreach ($aNums as $iNum) {
            $aBalls[] = $this->formatBall($iNum, self::LOTTERY_TYPE_LOTTO, self::LOTTERY_TYPE_LOTTO_SINGLE);
        }
        return implode(' ', $aBalls);
    }

    /**
     * 格式化数字
     *
     * @param int $iNum
     * @param int $iLotteryType
     * @param int $iLottoType
     *
     * @return string
     */
    public function formatBall($iNum, $iLotteryType = self::LOTTERY_TYPE_DIGITAL, $iLottoType = self::LOTTERY_TYPE_LOTTO_SINGLE) {
        switch ($iLotteryType) {
            case self::LOTTERY_TYPE_DIGITAL:
                return $iNum + 0;
                break;
            case self::LOTTERY_TYPE_LOTTO:
                switch ($iLottoType) {
                    case self::LOTTERY_TYPE_LOTTO_SINGLE:
                    case self::LOTTERY_TYPE_LOTTO_DOUBLE:
                    case self::LOTTERY_TYPE_LOTTO_MIXED:
                        return str_pad($iNum, 2, '0', STR_PAD_LEFT);
                        break;
                }
        }
    }

    /**
     * 检验号码是否正确, move in from ec,need modify
     *
     * @param string $sWinningNumber
     *
     * @return boolean
     */
    public function checkWinningNumber($sWinningNumber) {
        switch ($this->type) {
            case self::LOTTERY_TYPE_DIGITAL:    // num type
                $sPattern = '/^[' . str_replace(',', '', $this->valid_nums) . ']{' . ($this->wn_length) . '}$/uis';
                return preg_match($sPattern, $sWinningNumber);
                break;
            case self::LOTTERY_TYPE_LOTTO:
                switch ($this->lotto_type) {
                    case self::LOTTERY_TYPE_LOTTO_SINGLE:
                        $aValidBalls = $this->getValidNums($this->valid_nums, $this->type, $this->lotto_type);
                        return $this->_checkWinningNumberForSingleLotto($sWinningNumber, $aValidBalls, $this->wn_length);
                        break;
                    case self::LOTTERY_TYPE_LOTTO_DOUBLE:
                        $aBonusCode = explode(self::BONUS_CODE_SPLIT_CHAR_FOR_DOUBLE_LOTTO, $sWinningNumber);
                        if (count($aBonusCode) != 2) {
                            return false;
                        }
                        $aValidBalls = $this->getValidNums($this->valid_nums, $this->type, $this->lotto_type);
                        $aCodeLen = explode('|', $this->wn_length);
                        $bValid = true;
                        foreach ($aBonusCode as $iArea => $sBonusCodeOfArea) {
                            if (!$bValid = $this->_checkWinningNumberForSingleLotto($sBonusCodeOfArea, $aValidBalls[$iArea], $aCodeLen[$iArea])) {
                                break;
                            }
                        }
                        return $bValid;
                        break;
                    default :       // 尚不支持多区乐透型
                        return false;
                }
                break;
            default:  // 尚不支持其他类型
                return false;
        }
    }

    /**
     * 检验号码是否正确,用于单区乐透型
     *
     * @param string $sWinningNumber
     * @param array  $aValidBalls
     * @param int    $iCodeLen
     *
     * @return bool
     */
    private function _checkWinningNumberForSingleLotto($sWinningNumber, & $aValidBalls, $iCodeLen) {
        $aBalls = array_unique(explode(' ', $sWinningNumber));
        foreach ($aBalls as $i => $iBall) {
            $iBall = $this->formatBall($iBall, self::LOTTERY_TYPE_LOTTO, self::LOTTERY_TYPE_LOTTO_SINGLE);
            if (!in_array($iBall, $aValidBalls)) {
                return false;
            }
            $aBalls[$i] = $iBall;
        }
        $aDiff = array_diff($aBalls, $aValidBalls);
        return empty($aDiff) && count($aBalls) == $iCodeLen;
    }


    /**
     * 返回可用的数字数组
     *
     * @param string $sString
     * @param int    $iLotteryType
     * @param int    $iLottoType
     *
     * @return array
     */
    public function & getValidNums($sString, $iLotteryType = self::LOTTERY_TYPE_DIGITAL, $iLottoType = self::LOTTERY_TYPE_LOTTO_SINGLE) {
        $data = [];
        if ($iLotteryType == self::LOTTERY_TYPE_LOTTO && $iLottoType != self::LOTTERY_TYPE_LOTTO_SINGLE) {
            $aStringOfAreas = explode('|', $sString);
            $data = [];
            foreach ($aStringOfAreas as $iArea => $sStr) {
                $data[$iArea] = &$this->getValidNums($sStr, self::LOTTERY_TYPE_LOTTO, self::LOTTERY_TYPE_LOTTO_SINGLE);
            }
        } else {
            $a = explode(',', $sString);
            foreach ($a as $part) {
                $aPart = explode('-', $part);
                if (count($aPart) == 1) {
                    $data[] = $this->formatBall($aPart[0], $iLotteryType, $iLottoType);
                } else {
                    for ($i = $aPart[0]; $i <= $aPart[1]; $i++) {
                        $data[] = $this->formatBall($i, $iLotteryType, $iLottoType);
                    }
                }
            }
        }
        return $data;
    }


    /**
     * [getAllLotteries 获取所有彩种信息]
     *
     * @param  [Boolean] $bOpen  [open属性]
     * @param  [Array] $aColumns [要获取的数据列名]
     *
     * @return [Array]           [结果数组]
     */
    public static function getAllLotteries($iStatus = null, $aColumns = null) {
        $oLotteries = static::getLotteryListByStatus($iStatus);
        $data = [];
        foreach ($oLotteries as $key => $oLottery) {
            if ($aColumns) {
                foreach ($aColumns as $sColumn) {
                    $aTmpData[$sColumn] = $oLottery->$sColumn;
                }
            } else {
                $aTmpData = $oLottery->getAttributes();
            }
            $aTmpData['name'] = $oLottery->friendly_name;
            $data[] = $aTmpData;
        }
        return $data;
    }

    protected static function & getLotteryListByStatus($iStatus = null) {
        $bReadDb = true;
        $bPutCache = false;
        if (static::$cacheLevel != self::CACHE_LEVEL_NONE) {
            Cache::setDefaultDriver(static::$cacheDrivers[static::$cacheLevel]);
            $sCacheKey = static::compileLotteryListCacheKey($iStatus);
            if ($oLotteries = Cache::get($sCacheKey)) {
                $bReadDb = false;
            } else {
                $bPutCache = true;
            }
        }
        if ($bReadDb) {
            if (!is_null($iStatus)) {
                $aStatus = self::_getStatusArray($iStatus);
                $oLotteries = static::whereIn('status', $aStatus)->orderBy('sequence')->get();
            } else {
                $oLotteries = static::orderBy('sequence')->get();
            }
        }
        if ($bPutCache) {
            Cache::forever($sCacheKey, $oLotteries);
        }
        return $oLotteries;
    }


    protected static function _getStatusArray($iNeedStatus) {
        $aStatus = [];
        foreach (static::$validStatuses as $iStatus => $sTmp) {
            if (($iStatus & $iNeedStatus) == $iNeedStatus) {
                $aStatus[] = $iStatus;
            }
        }
        return $aStatus;
    }

    /**
     * 根据代码返回游戏对象
     *
     * @param string $sIdentifier
     *
     * @return Lottery | false
     */
    public static function getByIdentifier($sIdentifier) {
        $bReadDb = false;
        if (static::$cacheLevel != self::CACHE_LEVEL_NONE) {
            Cache::setDefaultDriver(static::$cacheDrivers[static::$cacheLevel]);
            $key = static::compileCacheKeyByIdentifier($sIdentifier);
            if ($aAttributes = Cache::get($key)) {
                $obj = new static;
                $obj = $obj->newFromBuilder($aAttributes);
            } else {
                $bReadDb = true;
            }
        }
        if ($bReadDb) {
            $obj = static::where('identifier', '=', $sIdentifier)->first();
            if (!is_object($obj)) {
                return false;
            }
            !$key or Cache::forever($key, $obj->getAttributes());
        }

        return $obj;
    }

    public static function getSelectSearchArrays($aColumns = ['id', 'name'], $aWheres = [], $isOrderByValue = false) {
        $aReturn = parent::getSelectSearchArrays($aColumns, $aWheres, $isOrderByValue);
        if($aReturn && is_array($aColumns) && $aColumns[1] == 'name'){
            foreach($aReturn as $key=>$val){
                $aReturn[$key] = ___('_lotteries.' . $val);
            }
        }
        return $aReturn;
    }

    public static function getModelRelationArrays($aColumn ,$aRelations, $aWheres=[], $isOrderByValue = false) {
        $aReturn = parent::getModelRelationArrays($aColumn ,$aRelations, $aWheres, $isOrderByValue);

        if($aReturn && ((is_array($aColumn) && $aColumn[1] == 'name') || !is_array($aColumn))){
            //$aRelations = $aRelations->toArray();
            foreach($aReturn as $key=>$val){
                $aVars = explode('-',$val);
                if(count($aVars) > 2){
                    for($i = 1;$i< count($aVars);$i++){
                        if(in_array($aVars[0],$aRelations)){
                            $aVars[1] = implode('-',array_slice($aVars,$i));
                            break;
                        }
                        $aVars[0] = $aVars[0].'-'.$aVars[$i];
                    }
                }
                $aReturn[$key] = $aVars[0] . '-' . ___('_lotteries.' . $aVars[1]);
            }
        }
        return $aReturn;
    }

}