<?php

/**
 * User Login Ip
 *
 * @author lawrence
 */

namespace App\Models;

class UserLoginIp extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'user_login_ips';
    public static $merchantColumn = 'merchant_id';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'merchant_id',
        'user_id',
        'username',
        'is_tester',
        'ip',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'UserLoginIp';

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
        'username',
        'is_tester',
        'ip',
        'created_at',
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

    public static $listColumnMaps = [];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [
        'merchant_id'=>'aMerchants',
        'is_tester'=>'aIsTester'
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'username';

    public static $mainParamColumn = 'username';

    public static $rules = [
        'merchant_id' => 'max:11',
        'user_id' => 'max:11',
        'username' => 'max:16',
        'is_tester' => 'max:1',
        'ip' => 'max:15',
        'created_at' => 'max:19',
        'updated_at' => 'max:19',
    ];

    protected function beforeValidate() {
        return parent::beforeValidate();
    }

//    public static function createLoginIPRecord($oUser) {
//
//        $sIP = \Tool::getClientIp();
//        $oUserLoginIP = static::getObjectByParams(['user_id' => $oUser->id, 'ip' => $sIP]);
//        if (is_object($oUserLoginIP)) {
//            return true;
//        }
//        $oUserLoginIP = new static;
//        $oUserLoginIP->fill(
//            [
//                'merchant_id' => $oUser->merchant_id,
//                'user_id' => $oUser->id,
//                'username' => $oUser->username,
//                'is_tester' => $oUser->is_tester,
//                'nickname' => $oUser->nickname,
//                'parent_user' => $oUser->parent,
//                'parent_user_id' => $oUser->parent_id,
//                'forefather_ids' => $oUser->forefather_ids,
//                'forefathers' => $oUser->forefathers,
//                'top_agent_id' => $oUser->getTopAgentId(),
//                'top_agent' => $oUser->getTopAgentUserName(),
//                'ip' => $sIP,
//            ]
//        );
//        return $oUserLoginIP->save();
//    }

}