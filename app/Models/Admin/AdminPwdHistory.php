<?php
namespace App\Models;

/**
 * 管理员密码历史
 *
 * @author system
 */
/** auto use begin **/
use App\Models\AdminUser;
use App\Models\BaseModel;
/** auto use end **/

class AdminPwdHistory extends BaseModel {

    protected $table                         = 'admin_pwd_histories';
    protected static $cacheUseParentClass    = false;
    protected static $cacheLevel             = self::CACHE_LEVEL_SECOND;
    protected static $cacheMinutes           = 0;
    protected $fillable                      = [
        'id',
        'admin_user_id',
        'admin_username',
        'password',
        'operator_id',
        'operator',
        'created_at',
        'updated_at',
    ];
    public static $sequencable               = false;
    public static $enabledBatchAction        = false;
    protected $validatorMessages             = [];
    protected $isAdmin                       = true;
    public static $resourceName              = 'AdminPwdHistory';
    protected $softDelete                    = false;
    protected $defaultColumns                = [ '*'];
    protected $hidden                        = [];
    protected $visible                       = [];
    public static $treeable                  = '';
    public static $foreFatherIDColumn        = '';
    public static $foreFatherColumn          = '';
    public static $columnForList             = [
        'id',
        'admin_username',
//        'password',
        'operator',
        'created_at',
    ];
    public static $totalColumns              = [];
    public static $totalRateColumns          = [];
    public static $weightFields              = [];
    public static $classGradeFields          = [];
    public static $floatDisplayFields        = [];
    public static $noOrderByColumns          = [];
    public static $ignoreColumnsInView       = [
        'admin_user_id',
        'operator_id',
        'password',
    ];
    public static $ignoreColumnsInEdit       = [
        'id',
        'admin_username',
        'operator',
        'updated_at',
    ];
    public static $listColumnMaps            = [];
    public static $viewColumnMaps            = [];
    public static $htmlSelectColumns         = [];
    public static $htmlTextAreaColumns       = [];
    public static $htmlNumberColumns         = [];
    public static $htmlOriginalNumberColumns = [];
    public static $amountAccuracy            = 0;
    public static $originalColumns;
    public $orderColumns                     = [
        'id' => 'desc'
    ];
    public static $titleColumn               = 'admin_username';
    public static $mainParamColumn           = 'admin_username';
    public static $rules                     = [
        'admin_user_id'  => 'required|min:0',
        'admin_username' => 'required|max:16',
        'password'       => 'required|max:60',
        'operator_id'    => 'required',
        'operator'       => 'required|max:16',
    ];

    protected function beforeValidate() {
        if ($this->admin_user_id && !$this->admin_username) {
            $oAdminUser           = AdminUser::find($this->admin_user_id);
            $this->admin_username = $oAdminUser->username;
        }
        if ($this->operator_id && !$this->operator) {
            $oOperator      = $this->operator_id == $this->admin_user_id ? $oAdminUser : AdminUser::find($this->operator_id);
            $this->operator = $oOperator->username;
        }
//        pr($this->toArray());
//        exit;
        return parent::beforeValidate();
    }

    public static function getPwdHistories($iAdminId, $iCount = 3) {
        return self::where('admin_user_id', '=', $iAdminId)
                ->orderBy('id', 'desc')
                ->take($iCount)
                ->pluck('password')->toArray();
    }

    public static function createRecord($iAdminUserId, $sPassword, $iOperatorId = null) {
        $data = [
            'admin_user_id' => $iAdminUserId,
            'password'      => $sPassword,
            'operator_id'   => $iOperatorId ? : $iAdminUserId
        ];
        $obj  = new static($data);
        return $obj->save();
    }

}
