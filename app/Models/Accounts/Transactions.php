<?php

/**
 * 帐变记录
 *
 * @author leon01
 */

namespace App\Models;

class Transactions extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'transactions';
    public static $merchantColumn = 'merchant_id';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'user_id',
        'serial_number',
        'type',
        'money_identifier',
        'previous_balance',
        'previous_available',
        'previous_frozen',
        'amount',
        'balance',
        'available',
        'frozen',
        'entry_address',
        'tx_id',
        'ext_data',
        'repeat_verify',
        'description',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'Transactions';

    protected $softDelete = false;

    protected $defaultColumns = ['*'];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'user_id',
        'serial_number',
        'type',
        'money_identifier',
        'previous_balance',
        'previous_available',
        'previous_frozen',
        'amount',
        'balance',
        'available',
        'frozen'
    ];

    public static $totalColumns = [];

    public static $totalRateColumns = [];

    public static $weightFields = [];

    public static $classGradeFields = [];

    public static $floatDisplayFields = [];

    public static $noOrderByColumns = [];

    public static $ignoreColumnsInView = [];

    public static $ignoreColumnsInEdit = [];

    public static $ignoreColumnsInCreate = [];

    public static $listColumnMaps = [
        'user_id' => 'user_display',
    ];

    public static $viewColumnMaps = [
        'user_id' => 'user_display',
    ];

    public static $htmlSelectColumns = [
        'money_identifier' => "aMoneyIdentifier",
        'type' => "aType",
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [
        'previous_balance',
        'previous_available',
        'previous_frozen',
        'amount',
        'balance',
        'available',
        'frozen',
    ];

    public static $amountAccuracy = 8;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'money_identifier';

    public static $mainParamColumn = '';

    public static $rules = [
        'serial_number' => 'required|max:32',
        'type' => 'required|integer',
        'user_id' => 'required',
        'money_identifier' => 'required|max:20',
        'previous_balance' => 'required|numeric',
        'previous_available' => 'required|numeric',
        'previous_frozen' => 'required|numeric',
        'amount' => 'required|numeric',
        'balance' => 'required|numeric',
        'available' => 'required|numeric',
        'frozen' => 'required|numeric',
        'entry_address' => 'max:256',
        'tx_id' => 'max:256',
        'ext_data' => 'max:1024',
        'repeat_verify' => 'max:32',
        'description' => 'max:1024',
    ];

    protected function beforeValidate() {
        return parent::beforeValidate();
    }

    protected function getUserDisplayAttribute() {
        $oUser = User::find($this->user_id);
        return $oUser->nickname;
    }

    const ERROR_CREATE_SUCCESSFUL = 200;
    const ERROR_CREATE_ERROR_DATA = 201;
    const ERROR_CREATE_ERROR_SAVE = 202;
    const ERROR_CREATE_ERROR_BALANCE = 203;


    /*
     * 添加帐变更新账户再次封装 包含（发布，取消定案）
     *
     * @param object $oUser         用户对象
     * @param object $oUserAccount  用户账户锁定对象
     * @param int $iType            帐变类型
     * @param object $oOne          广告对象/
     * @param object $oTwo          订单对象/
     * @param string/array $extData 用于扩展字段添加  来源/添加数组
     */
    public static function updateUserAccount($oUser, $oUserAccount, $iType, $oOne = null, $oTwo = null, $extData = '') {
        if (!$oUser || !$oUserAccount) {
            return false;
        }
        $sMoneyIdentifier = 'BTC';
        //初始化额外字段内容
        $ext_data = [];

        switch ($iType) {
            case TransactionType::TYPE_BUY: //买入 3
                return false;
                break;
            case TransactionType::TYPE_SELL: //卖出 4
                return false;
                break;
            case TransactionType::TYPE_FREEZE_FOR_SELL: //卖出冻结 5    $oOne:广告  $oTwo:null
                if (!$oOne) {
                    return false;
                }
                //帐变金额
                $fQuantityForTransactions = $oOne->last_quantity;
                $sMoneyIdentifier = $oOne->money_identifier;
                $ext_data['ad_id'] = $oOne->id;
                $ext_data['repeat_verify'] = $oOne->id . '_' . $iType;
                break;
            case TransactionType::TYPE_UNFREEZE_FOR_SELL: //卖出解冻 6   $oOne:广告  $oTwo:订单
                if (!$oOne || !$oTwo) {
                    return false;
                }
                //帐变金额
                $fQuantityForTransactions = $oTwo->quantity;
                $sMoneyIdentifier = $oOne->money_identifier;
                $ext_data['order_id'] = $oTwo->id;
                $ext_data['ad_id'] = $oOne->id;
                $ext_data['repeat_verify'] = $oTwo->id . '_' . $iType;
                break;
            case TransactionType::TYPE_FREEZE_FOR_FEE: //冻结手续费用 13   $oOne:广告  $oTwo:null
                if (!$oOne) {
                    return false;
                }
                //帐变金额
                $fQuantityForTransactions = $oOne->last_fee_quantity;
                $sMoneyIdentifier = $oOne->money_identifier;
                $ext_data['ad_id'] = $oOne->id;
                $ext_data['repeat_verify'] = $oOne->id . '_' . $iType;
                break;
            case TransactionType::TYPE_UNFREEZE_FOR_FEE: //解冻手续费用 14   $oOne:广告  $oTwo:订单
                if (!$oOne || !$oTwo) {
                    return false;
                }
                //帐变金额
                $fQuantityForTransactions = $oTwo->fee_quantity;
                $sMoneyIdentifier = $oOne->money_identifier;
                $ext_data['order_id'] = $oTwo->id;
                $ext_data['ad_id'] = $oOne->id;
                $ext_data['repeat_verify'] = $oTwo->id . '_' . $iType;
                break;
            default:
                return false;
        }
        if (is_array($extData)) {
            $ext_data = array_merge($ext_data, $extData);
        } else {
            $ext_data['from'] = $extData;
        }
        $aExtraData = [
            "ext_data" => json_encode($ext_data),
            "repeat_verify" => md5($ext_data['repeat_verify'])
        ];
        //生成帐变
        $iReturn = self::addTransaction($oUser, $oUserAccount, $iType, $fQuantityForTransactions, $sMoneyIdentifier, $aExtraData);
        if ($iReturn != Transactions::ERROR_CREATE_SUCCESSFUL) {
            return false;
        }
        return true;
    }

    /**
     * 添加帐变
     *
     * @param User         $oUser
     * @param Account      $oAccount
     * @param int          $iTypeId
     * @param float        $fAmount
     * @param string       $sMoneyIdentifier
     * @param array        $aExtraData
     * @param Transactions $oNewTransaction
     *
     * @return int      0: 成功; -1: 数据错误; -2: 账变保存失败; -3: 账户余额保存失败
     */
    public static function addTransaction($oUser, $oAccount, $iTypeId, $fAmount, $sMoneyIdentifier, $aExtraData = [], & $oNewTransaction = null) {

        if ($fAmount <= 0) {
            return self::ERROR_CREATE_ERROR_DATA;
        }

        $aAttributes = static::compileData($oUser, $oAccount, $iTypeId, $fAmount, $sMoneyIdentifier, $aNewBalance, $aExtraData);
        if (!$aAttributes) {
            return self::ERROR_CREATE_ERROR_DATA;
        }

        $oNewTransaction = new static($aAttributes);
        $rules = &static::compileRules();
        if (!$oNewTransaction->save($rules)) {
            var_dump($oNewTransaction->getValidationErrorString());
            return self::ERROR_CREATE_ERROR_SAVE;
        }
        $oAccount->fill($aNewBalance);
        if (!$oAccount->save()) {
            return self::ERROR_CREATE_ERROR_BALANCE;
        }
        return self::ERROR_CREATE_SUCCESSFUL;
    }

    private static function compileData($oUser, $oAccount, $iTypeId, $fAmount, $sMoneyIdentifier, & $aNewBalance, & $aExtraData = []) {
        $oTransactionType = TransactionType::find($iTypeId);

        $fAmount = formatNumber($fAmount, static::$amountAccuracy);
        $aAttributes = [
            'serial_number' => generateSerialNumber(""),
            'type' => $iTypeId,
            'user_id' => $oUser->id,
            'is_income' => $oTransactionType->credit,
            'money_identifier' => $sMoneyIdentifier,
            'previous_frozen' => $oAccount->frozen,
            'previous_balance' => $oAccount->balance,
            'previous_available' => $oAccount->available,
            'amount' => $fAmount,
            'frozen' => $oAccount->frozen,
            'balance' => $oAccount->balance,
            'available' => $oAccount->available,
            'description' => $oTransactionType->description,
        ];

        !isset($aExtraData['entry_address']) or $aAttributes['entry_address'] = $aExtraData['entry_address'];
        !isset($aExtraData['tx_id']) or $aAttributes['tx_id'] = $aExtraData['tx_id'];
        if (isset($aExtraData['ext_data']) && !empty($aExtraData['ext_data'])) {
            $aAttributes['ext_data'] = is_array($aExtraData['ext_data']) ? json_encode($aExtraData['ext_data']) : $aExtraData['ext_data'];
        }

        if (isset($aExtraData['repeat_verify']) && !empty($aExtraData['repeat_verify'])) {
            $aAttributes['repeat_verify'] = $aExtraData['repeat_verify'];
        }

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

    private static function & compileRules() {
        $rules = static::$rules;
        return $rules;
    }

}