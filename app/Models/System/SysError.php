<?php
namespace App\Models;

/**
 * 错误代码
 *
 * @author winter
 */
class SysError {

    const SERVICE_DOWN = 1000;
    const NET_ABNORMAL = 1001;
    const MISSING_ACTION = 1002;
    const ACTION_NOT_DEFINED = 1003;
    const METHOD_NEED_GET = 1004;
    const METHOD_NEED_POST = 1005;
    const MISSING_TOKEN = 1006;
    const MISSING_PARAMS = 1007;
    const MISSING_SIGN = 1008;
    const SIGN_ERROR = 1009;
    const NO_DATA = 1010;
    const CUSTOMER_ERROR = 2000;
    const BET_AMOUNT_ERROR = 2001;
    const CUSTOMER_BET_STATUS = 2002;
    const GAME_TYPE_ERROR = 2003;
    const GAME_OVERDUE = 2004;
    const LOCK_WALLET_FAILED = 2005;
    const WALLET_AMOUNT_NOT_ENOUGH = 2006;
    const GATE_METHOD_ERROR = 2007;
    const BET_PROGRAM_CONTENT_CHECK_ERROR = 2008;
    const CREATE_BILL_FAILED = 2009;
    const CREATE_TRANSACTIONS_FAILED = 3001;
    const MAX_MULTIPLE_LIMIT_ERROR = 3002;
    const WALLET_NOT_FOUND = 3003;
    const REPEAT_MERCHANT_NO = 3004;
    const MAX_GAME_NUM_ERROR = 3005;
    const ONE_GAME_METHOD_ERROR = 3006;
    const GATE_ERROR = 3007;
    const BATCH_BETTING_LIMIT = 3008;


    //错误信息语言包
    static $messages = [
        self::SERVICE_DOWN => '_apierror.service-down',
        self::NET_ABNORMAL => '_apierror.connection-error',
        self::MISSING_ACTION => '_apierror.missing-action',
        self::ACTION_NOT_DEFINED => '_apierror.action-not-defined',
        self::METHOD_NEED_GET => '_apierror.must-be-get',
        self::METHOD_NEED_POST => '_apierror.must-be-post',
        self::MISSING_TOKEN => '_apierror.missing-token',
        self::MISSING_PARAMS => '_apierror.missing-params',
        self::MISSING_SIGN => '_apierror.missing-signature',
        self::SIGN_ERROR => '_apierror.signature-error',
        self::NO_DATA => '_apierror.no-data-error',
        self::CUSTOMER_ERROR => '_apierror.invalid-customer',
        self::BET_AMOUNT_ERROR => '_apierror.bet-amount-error',
        self::CUSTOMER_BET_STATUS => '_apierror.customer-bet-status',
        self::GAME_TYPE_ERROR => '_apierror.game-type-error',
        self::GAME_OVERDUE => '_apierror.game-overdue',
        self::LOCK_WALLET_FAILED => '_apierror.lock-wallet-failed',
        self::WALLET_AMOUNT_NOT_ENOUGH => '_apierror.wallet-amount-not-enough',
        self::GATE_METHOD_ERROR => '_apierror.gate-method-error',
        self::BET_PROGRAM_CONTENT_CHECK_ERROR => '_apierror.bet-program-content-check-error',
        self::CREATE_BILL_FAILED => '_apierror.create-bill-failed',
        self::CREATE_TRANSACTIONS_FAILED => '_apierror.create-transactions-failed',
        self::WALLET_NOT_FOUND => '_apierror.wallet-not-found',
        self::MAX_MULTIPLE_LIMIT_ERROR => '_apierror.max-multiple-limit-error',
        self::REPEAT_MERCHANT_NO => '_apierror.repeat-merchant-no',
        self::MAX_GAME_NUM_ERROR => '_apierror.max-game-num-error',
        self::ONE_GAME_METHOD_ERROR => '_apierror.one-game-method-error',
        self::GATE_ERROR => '_apierror.gate-error',
        self::BATCH_BETTING_LIMIT => '_apierror.batch-betting-limit',

    ];

    //获取翻译后的错误信息
    static function & getMessage($iErrno, $aLangVars = [], $sExtra = null) {
        $sMsg = __(static::$messages[$iErrno], $aLangVars);
        !$sExtra or $sMsg .= ': ' . var_export($sExtra, true);
        return $sMsg;
    }

}
