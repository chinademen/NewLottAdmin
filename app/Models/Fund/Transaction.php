<?php

/**
 * Transactions
 * @author lawrence
 */

namespace App\Models;

use Carbon\Carbon;
use Coefficient;
use Config;
use Illuminate\Support\Facades\Redis;

class Transaction extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'transactions';
    public static $merchantColumn = 'merchant_id';

    const ERRNO_CREATE_SUCCESSFUL    = -100;
    const ERRNO_CREATE_ERROR_DATA    = -101;
    const ERRNO_CREATE_ERROR_SAVE    = -102;
    const ERRNO_CREATE_ERROR_BALANCE = -103;
    const ERRNO_CREATE_LOW_BALANCE   = -104;
    public static $sCountKey = 'lm:count:transaction';  // 官方彩投注 缓存 键
    public static $sCountOfficialBet = 'lm:CountOfficialBet';  // 官方彩投注 缓存 键
    public static $sCountSelfBet = 'lm:CountSelfBet';  // 自主彩投注 缓存 键
    public static $sCountOfficialAward = 'lm:CountOfficialAward';  // 官方彩派奖 缓存 键
    public static $sCountSelfAward = 'lm:CountSelfAward';  // 官方彩派奖 缓存 键
    public static $sCountTotalBet = 'lm:CountTotalBet';  // 总投注 缓存 键
    public static $sCountTotalAward = 'lm:CountTotalBetAward';  // 总派奖 缓存 键
    public static $sCountTotalLoad = 'lm:CountTotalLoad';  // 总充值 缓存 键
    public static $sCountTotalWithdraw = 'lm:CountTotalWithdraw';  // 总提现 缓存 键


    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'merchant_id',
        'terminal_id',
        'serial_number',
        'user_id',
        'username',
        'is_tester',
        'account_id',
        'type_id',
        'is_income',
        'trace_id',
        'lottery_id',
        'issue',
        'method_id',
        'way_id',
        'coefficient',
        'description',
        'project_id',
        'project_no',
        'amount',
        'note',
        'previous_balance',
        'previous_frozen',
        'previous_available',
        'balance',
        'frozen',
        'available',
        'tag',
        'admin_user_id',
        'administrator',
        'ip',
        'proxy_ip',
        'safekey',
        'extra_data',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'Transaction';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'id',
        'type_id',
        'terminal_id',
        'username',
        'serial_number',
        'is_tester',
        'lottery_id',
        'issue',
        'coefficient',
        'way_id',
        'amount',
        'available',
        'tag',
        'note',
        'admin_user_id',
        'ip',
    ];

    public static $totalColumns = [ 'amount' ];

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
        'username'      => 'username_for_user',
        'amount'        => 'amount_formatted',
        'available'     => 'available_formatted',
    ];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [
        'is_tester'=>'aIsTester',
        'lottery_id'=>'aLotteries',
        'way_id'=>'aWays',
        'type_id'=>'aTransactionTypes',
        'coefficient'=>'aCoefficients',
        'admin_user_id'=>'aAdminUsers',
        'terminal_id'=>'aTerminals',

    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [
        'id' => 'desc',
    ];

    public static $titleColumn = 'username';

    public static $mainParamColumn = 'user_id';

    public static $rules = [
        'merchant_id'   => 'required|min:0|max:10',
        'terminal_id'   => 'integer|min:0',
        'serial_number' => 'max:255',
        'user_id'       => 'integer|min:0',
        'username'      => 'max:16',
        'is_tester'     => 'integer|max:1',
        'account_id'    => 'integer|min:0|',
        'type_id'       => 'required|integer|min:0',
        'is_income'     => 'integer|min:0',
        'trace_id'      => 'integer|min:0',
        'lottery_id'    => 'integer|min:0',
        'method_id'     => 'integer|min:0',
        'way_id'        => 'integer|min:0',

        'description'        => 'required|max:50',
        'project_id'         => 'integer|min:0',
        'project_no'         => 'max:32',
        'amount'             => 'required|numeric|min:0',
        'previous_balance'   => 'numeric|max:16',
        'previous_frozen'    => 'numeric|max:16',
        'previous_available' => 'required|numeric|max:16',
        'balance'            => 'numeric|max:16',
        'frozen'             => 'numeric|max:16',
        'available'          => 'numeric|max:16',
        'tag'                => 'max:30',
        'admin_user_id'      => 'min:0|max:10',
        'administrator'      => 'max:16',
        'safekey'            => 'max:32',
        'issue'              => 'max:20',
        'note'               => 'max:100',
        'ip'                 => 'max:15',
        'proxy_ip'           => 'max:15',
        'created_at'         => 'max:19',
        'updated_at'         => 'max:19',
        'extra_data'         => 'max:1024',
    ];
    protected $with = [  'user' ];

    protected function beforeValidate() {
        $this->serial_number = static::makeSeriesNumber($this->user_id);
        $this->makeSafeKey();

        return parent::beforeValidate();
    }

    public static function makeSeriesNumber($iUserId) {
        return uniqid($iUserId, true);
    }

    protected function afterSave($oSavedModel) {
        parent::afterSave($oSavedModel);
        $oSavedModel->deleteUserDataListCache();
    }

    public function makeSafeKey() {
        $aFields = [
            'user_id',
            'type_id',
            'account_id',
            'trace_id',
            'amount',
            'lottery_id',
            'issue',
            'way_id',
            'coefficient',
            'description',
            'project_id',
            'amount',
            'admin_user_id',
            'ip',
            'proxy_ip',
        ];
        $aData = [];
        foreach($aFields as $sField){
            $aData[] = $this->$sField;
        }

        return $this->safekey = md5(implode('|', $aData));
    }

    public function getUsernameForUserAttribute() {
        return $this->user->username ?? $this->username;
    }


    public function getTypeTextAttribute() {
        return $this->transaction_type->cn_title ?? '';
    }

    public function getCoefficientTextAttribute() {
        return Coefficient::getCoefficientText($this->coefficient) ?? '';
    }



    public function getDescriptionDefaultAttribute() {
        if($this->description == ''){
            return '无';
        }

        return $this->description;
    }

    public function getAdminUserNameAttribute() {
        return $this->admin_user->name ?? '';
    }

    protected function getAvailableFormattedAttribute() {
        return $this->getFormattedNumberForHtml('available');
    }

    protected function getAmountFormattedAttribute() {
        return ( $this->is_income ? '+' : '-' ).$this->getFormattedNumberForHtml('amount');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function oIssue() {
        return $this->belongsTo(Issue::class, 'issue','issue');
    }

    public function transaction_type() {
        return $this->hasOne(TransactionType::class, 'id','type_id');
    }

    public function lottery() {
        return $this->belongsTo(Lottery::class, 'lottery_id');
    }

    public function admin_user() {
        return $this->belongsTo(AdminUser::class, 'admin_user_id');
    }

    public function series_way() {
        return $this->belongsTo(SeriesWay::class, 'way_id');
    }

    public function merchant() {
        return $this->belongsTo(Merchant::class, 'merchant_id');
    }



    /**
     * 反转，即进行逆操作
     *
     * @param Account $oAccount
     * @return int      0: 成功; -1: 数据错误; -2: 账变保存失败; -3: 账户余额保存失败
     */
    public function reverse($oAccount) {
        $oType = TransactionType::find($this->type_id);
        if (empty($oType) || empty($oType->reverse_type)) {
            return true;
        }
        $oUser        = User::find($this->user_id);
        $aExtractData = $this->getAttributes();
        unset($aExtractData['id']);
        return static::addTransaction($oUser, $oAccount, $oType->reverse_type, $this->amount, $aExtractData);
    }

    /**
     * 增加新的账变
     * @param User      $oUser
     * @param Account   $oAccount
     * @param int      $iTypeId
     * @param float     $fAmount
     * @param array     $aExtraData
     * @param Transaction     & $oNewTransaction
     * @return int      0: 成功; -1: 数据错误; -2: 账变保存失败; -3: 账户余额保存失败
     */
    public static function addTransaction($oUser, $oAccount, $iTypeId, $fAmount, $aExtraData = [], & $oNewTransaction = null) {
        if ($fAmount <= 0) {
            return self::ERRNO_CREATE_ERROR_DATA;
        }
        if (!$aAttributes = static::compileData($oUser, $oAccount, $iTypeId, $fAmount, $aNewBalance, $aExtraData)) {
            return self::ERRNO_CREATE_ERROR_DATA;
        }
        $oNewTransaction = new Transaction($aAttributes);
        $rules           = & static::compileRules();
        if (!$oNewTransaction->save($rules)) {
            return self::ERRNO_CREATE_ERROR_SAVE;
        }
        $oAccount->fill($aNewBalance);
        if (!$oAccount->save()) {
            return self::ERRNO_CREATE_ERROR_BALANCE;
        }
        return self::ERRNO_CREATE_SUCCESSFUL;
    }

    private static function & compileRules() {
        $rules                = static::$rules;
        $rules['coefficient'] = 'numeric|in:' . implode(',', Coefficient::getValidCoefficientValues());
        return $rules;
    }

    private static function compileData($oUser, $oAccount, $iTypeId, $fAmount, & $aNewBalance, & $aExtraData = []) {
        $oTransactionType           = TransactionType::find($iTypeId);
        $fAmount                    = formatNumber($fAmount, static::$amountAccuracy);
        isset($aExtraData['trace_id']) or $aExtraData['trace_id']     = null;
        $aAttributes                = [
            'trace_id'                 => $aExtraData['trace_id'],
            'user_id'                  => $oUser->id,
            'is_tester'                => $oUser->is_tester,
            'amount'                   => $fAmount,
            'type_id'                  => $iTypeId,
            'is_income'                => $oTransactionType->credit,
            'previous_frozen'          => $oAccount->frozen,
            'previous_balance'         => $oAccount->balance,
            'previous_available'       => $oAccount->available,
            'frozen'                   => $oAccount->frozen,
            'balance'                  => $oAccount->balance,
            'available'                => $oAccount->available,
            'account_id'               => $oAccount->id,
            'username'                 => $oUser->username,
            'description'              => $oTransactionType->description,
        ];

        !isset($aExtraData['terminal_id']) or $aAttributes['terminal_id'] = $aExtraData['terminal_id'];

        if (isset($aExtraData['clent_ip'])) {
            $aAttributes['ip'] = $aExtraData['client_ip'];
        }
        if (isset($aExtraData['proxy_ip'])) {
            $aAttributes['proxy_ip'] = $aExtraData['proxy_ip'];
        }
        if ($oTransactionType->trace_linked) {
            if (!isset($aExtraData['lottery_id']) || !isset($aExtraData['way_id']) || !isset($aExtraData['coefficient'])
            ) {
                return false;
            }
            $aAttributes['trace_id'] = $aExtraData['trace_id'];
        }

        if ($oTransactionType->project_linked) {
            if (!isset($aExtraData['project_id']) || !isset($aExtraData['project_no']) || !isset($aExtraData['lottery_id']) || !isset($aExtraData['way_id']) || !isset($aExtraData['coefficient'])) {
                return false;
            }
            $aNonIssueLotteries = Config::get('transaction.non_issue_lotteries') or $aNonIssueLotteries = [];
            if (!in_array($aExtraData['lottery_id'], Config::get('transaction.non_issue_lotteries')) && !isset($aExtraData['issue'])) {
                return false;
            }
            $aAttributes['project_id'] = $aExtraData['project_id'];
            $aAttributes['project_no'] = $aExtraData['project_no'];
            isset($aExtraData['trace_id']) or $aAttributes['trace_id']   = $aExtraData['trace_id'];
        }

        if ($oTransactionType->trace_linked || $oTransactionType->project_linked) {
            $aAttributes['lottery_id']  = $aExtraData['lottery_id'];
            $aAttributes['way_id']      = $aExtraData['way_id'];
            $aAttributes['coefficient'] = $aExtraData['coefficient'];
        }

        !isset($aExtraData['issue']) or $aAttributes['issue']         = $aExtraData['issue'];
        !isset($aExtraData['admin_user_id']) or $aAttributes['admin_user_id'] = $aExtraData['admin_user_id'];
        !isset($aExtraData['administrator']) or $aAttributes['administrator'] = $aExtraData['administrator'];
        !isset($aExtraData['note']) or $aAttributes['note']          = $aExtraData['note'];
        !isset($aExtraData['tag']) or $aAttributes['tag']           = $aExtraData['tag'];
        !isset($aExtraData['extra_data']) or $aAttributes['extra_data']    = $aExtraData['extra_data'];

        $aSubAccounts = ['balance', 'available', 'frozen'];

        foreach ($aSubAccounts as $sField) {
            if (!$oTransactionType->$sField) {
                continue;
            }
            $aAttributes[$sField] += $oTransactionType->$sField * $fAmount;
            $aNewBalance[$sField] = $aAttributes[$sField];
        }

        return $aAttributes;
    }


    /**
     * 根据时间缓存数据
     * @param $sStartDate
     * @param $sEndDate
     */
    public static function setCountTransactionDataBToCache($sStartDate,$sEndDate) {
        $iDiff = Carbon::parse($sStartDate)->diffInDays($sEndDate);
        $aCountDates = [];
        for($i=0;$i<=$iDiff;$i++){
            array_push($aCountDates,Carbon::parse($sStartDate)->addDays($i)->toDateString());
        }
        $aAllData =[];
        foreach($aCountDates as $date){
            $aAllData[$date] = self::getTransactionByDate($date);
        }
        $sCacheData = Redis::get(self::$sCountKey);
        if($sCacheData){
            $aCacheData=@unserialize($sCacheData);
        }else{
            $aCacheData=[];
        }
        $newData = collect($aCacheData)->merge($aAllData)->all();
        ksort($newData);
        Redis::set(self::$sCountKey,@serialize($newData));
        return $newData;
    }

    public static function getTransactionByDate($date,$merchant_id=null){
        // 今天官方彩投注总额----------        -撤销总额
        $fCountOfficialBet = self::sumTransactionAmount(7, 0,$date,$merchant_id) - self::sumTransactionAmount(8, 0,$date,$merchant_id);

        // 今天自主彩投注总额----------  -撤销总额
        $fCountSelfBet = self::sumTransactionAmount(7, 1,$date,$merchant_id) - self::sumTransactionAmount(8, 1,$date,$merchant_id);

        // 官彩派奖总额 -   -官彩撤销派奖
        $fOfficialAwardTotal = self::sumTransactionAmount(11, 0,$date,$merchant_id)-self::sumTransactionAmount(12, 0,$date,$merchant_id);

        //自主派奖总额 -  自主彩撤销派奖
        $fSelfAwardTotal = self::sumTransactionAmount(11, 1,$date,$merchant_id)-self::sumTransactionAmount(12, 1,$date,$merchant_id);

        // 净投注总额--------
        $fBetTotal = $fCountOfficialBet + $fCountSelfBet;
        // 净派奖总额
        $fAwardTotal = $fOfficialAwardTotal + $fSelfAwardTotal;

        // 在线充值总额------
        $ftotalLoad = self::sumTransactionAmount(1,-1,$date,$merchant_id);
        // 提款总额
        $ftotalWithdraw = self::sumTransactionAmount(2,-1,$date,$merchant_id);

        $todayData = [
            Transaction::$sCountOfficialBet=>$fCountOfficialBet,
            Transaction::$sCountSelfBet=>$fCountSelfBet,
            Transaction::$sCountOfficialAward=>$fOfficialAwardTotal,
            Transaction::$sCountSelfAward=>$fSelfAwardTotal,
            Transaction::$sCountTotalBet=>$fBetTotal,
            Transaction::$sCountTotalAward=>$fAwardTotal,
            Transaction::$sCountTotalLoad=>$ftotalLoad,
            Transaction::$sCountTotalWithdraw=>$ftotalWithdraw
        ];
        return $todayData;
    }

    public static function sumTransactionAmount(int $iTypeId,int $iLotteryIsSelf = -1,$day=null,$merchant_id=null) :float{
        is_null($day) && $day = Carbon::today()->toDateString();
        $transaction = Transaction::whereTypeId($iTypeId)
            ->whereDate('created_at', $day);
        is_null($merchant_id) || $transaction = $transaction->where('merchant_id',$merchant_id);
        // 不区分官彩和自主彩
        if($iLotteryIsSelf === -1){
            return (float)$transaction->sum('amount');
        }else{
            return (float)$transaction->with('lottery')
                ->whereHas('lottery', function($query) use ($iLotteryIsSelf) {
                    $query->whereIsSelf($iLotteryIsSelf);
                })->sum('amount');
        }
    }
}