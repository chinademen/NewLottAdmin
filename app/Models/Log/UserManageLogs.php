<?php

/**
 * 用户管理日志
 *
 * @author loren
 */

namespace App\Models;

use Session;

class UserManageLogs extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'user_manage_logs';
    public static $merchantColumn = 'merchant_id';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'merchant_id',
        'user_id',
        'admin_id',
        'admin',
        'comment_admin_id',
        'comment_admin',
        'comment',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'UserManageLogs';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'id',
        'user_id',
        'admin',
        'comment_admin',
        'comment',
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
    ];

    public static $ignoreColumnsInCreate = [];

    public static $listColumnMaps = [
        'user_id' => 'user_id_text'
    ];

    public static $viewColumnMaps = [
        'user_id' => 'user_id_text'
    ];

    public static $htmlSelectColumns = [];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [
        'updated_at' => 'desc'
    ];

    public static $titleColumn = 'account';

    public static $mainParamColumn = 'user_id';

    public static $rules = [
        'user_id' => 'required|numeric',
        'admin_id' => 'required|numeric',
        'admin' => 'required|between:4,16',
        'comment_admin_id' => 'numeric',
        'comment_admin' => 'between:4,16',
    ];

    protected function beforeValidate() {
        return parent::beforeValidate();
    }

    /***************************** ColumnMaps Start *******************************/
    protected function getUserIdTextAttribute($fieldValue = null) {
        if ($fieldValue == null && isset($this->attributes['user_id'])) {
            $fieldValue = $this->attributes['user_id'];
        }
        if ($fieldValue == null) {
            return $fieldValue;
        }
        if(empty($fieldValue)) return '';
        $oData = User::find($fieldValue);
        return empty($oData->username) ? $fieldValue : $oData->username;
    }
    /***************************** ColumnMaps End *******************************/

    public static function createLog($iUserId, $sComment = null) {
        $iAdminId = session('admin_user_id');
        $sAdminName = session('admin_username');
        if (!$iAdminId || !$sAdminName || !$iUserId) {
            return false;
        }
        $oUser = User::find($iUserId);
        if(!$oUser){
            return false;
        }
        $aParam = [
            'user_id' => $iUserId,
            'admin_id' => $iAdminId,
            'admin' => $sAdminName,
            'merchant_id' => $oUser->merchant_id
        ];

        if (isset($sComment) && $sComment) {
            $aParam['comment_admin_id'] = $iAdminId;
            $aParam['comment_admin'] = $sAdminName;
            $aParam['comment'] = $sComment;
        }

        $oUserManageLogs = new static;
        $oUserManageLogs->fill( $aParam);
        return $oUserManageLogs->save();
    }


}