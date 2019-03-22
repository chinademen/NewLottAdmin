<?php

/**
 * users
 * @author lawrence
 */

namespace App\Models;

class User extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'users';
    public static $merchantColumn = 'merchant_id';
    // 用户冻结状态
    const UNBLOCK = 0;
    const BLOCK_LOGIN = 1;
    const BLOCK_BUY = 2;
    const BLOCK_FUND_OPERATE = 3;
    public static $blockedTypes = [
        self::UNBLOCK            => 'unblock',
        self::BLOCK_LOGIN        => 'block-login',
        self::BLOCK_BUY          => 'block-bet',
        self::BLOCK_FUND_OPERATE => 'block-fund',
    ];

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [

        'username',
        'password',
        'fund_password',
        'account_id',
        'merchant_id',
        'prize_group',
        'blocked',
        'realname',
        'nickname',
        'email',
        'mobile',
        'is_tester',
        'bet_multiple',
        'bet_coefficient',
        'login_ip',
        'register_ip',
        'remember_token',
        'signin_at',
        'activated_at',
        'register_at',
        'deleted_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'User';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = ['password','token','deleted_at'];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'username',
        'nickname',
        'account_available',
        'prize_group',
        'blocked',
        'signin_at',// 登录时间
        'is_tester',
        'created_at',
    ];
    public static $totalColumns = [];

    public static $totalRateColumns = [];

    public static $weightFields = [];

    public static $classGradeFields = [];

    public static $floatDisplayFields = [];

    public static $noOrderByColumns = [ 'account_available' ];

    public static $ignoreColumnsInView = [ 'id', 'role_ids', 'password', 'fund_password', 'remember_token' ];
    public static $ignoreColumnsInEdit = [ 'password', 'fund_password', 'blocked' ];
    public static $readonlyColumnsInEdit = [
        'prize_group',
    ];
    public static $ignoreColumnsInCreate = [];

    public static $listColumnMaps = [
        'account_available' => 'available_for_account',
        'blocked'           => 'blocked_text',
        'signin_at'         => 'friendly_signin_at',
    ];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [
       'is_tester'=>'aTesters',
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
        'username'        => 'required|regex:/^[a-zA-Z]{3}\-[a-zA-Z]{1}[a-zA-Z0-9]+$/|between:6,16|unique:users,username',
        'merchant_id'     => 'required|max:11',
        'nickname'        => 'required|between:2,16',
        'account_id'      => 'min:0|max:10',
        'blocked'         => 'min:0|max:3',
        'bet_multiple'    => 'min:0|max:10',
        'bet_coefficient' => 'min:0|max:4',
        'password'        => 'max:60',
        'fund_password'   => 'max:60',
        'prize_group'     => 'max:20',
        'realname'        => 'max:30',
        'email'           => 'max:50',
        'mobile'          => 'max:20',
        'is_tester'       => 'max:1',
        'login_ip'        => 'max:15',
        'register_ip'     => 'max:15',
        'remember_token'  => 'max:200',
        'signin_at'       => 'max:19|date',
        'activated_at'    => 'max:19|date',
        'register_at'     => 'max:19|date',
        'deleted_at'      => 'max:19|date',
    ];
    // 单独提取出密码的验证规则, 以便在hash之前完成验证并将password字段替换为username . password三次md5后的字符串
    // 正则表达式: 大小写字母+数字, 长度6-16, 不能连续3位字符相同, 不能和资金密码字段相同
    public static $passwordRules = [
        'password' => 'required|custom_password|confirmed|different:username',
        //        'password_confirmation' => 'required',
    ];
    // 单独提取出资金密码的验证规则, 以便在hash之前完成验证并将fund_password字段替换为username . fund_password三次md5后的字符串
    // 正则表达式: 大小写字母+数字, 长度6-16, 不能连续3位字符相同, 不能和密码字段相同
    public static $fundPasswordRules = [
        'fund_password'              => 'required|custom_password|confirmed|different:username',
        'fund_password_confirmation' => 'required',
    ];
    protected $appends = [ 'account_available' ];
    protected $with = [ 'account' ];

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
    }

    protected function beforeValidate() {
        return parent::beforeValidate();
    }

    public function getAvailableForAccountAttribute() {
        return $this->account->available ?? '';
    }

    public function getAccountAvailableAttribute() {
        return $this->account->available ?? '';
    }

    public function getBlockedTextAttribute() {
        if($this->blocked == 0) return ___('_users.normal');

        return baseOption('base.user.blocked_type')[ $this->blocked ];
    }

    protected function getFriendlySigninAtAttribute() {
        if(is_null($this->signin_at))
            return ___('_users.not-before'); // '新账号尚未登录'
        else
            return friendly_date($this->signin_at);
    }

    /**
     * 设置用户冻结状态
     *
     * @param      $id       用户ID
     * @param      $iBlocked 冻结状态
     * @param null $sComment 备注
     *
     * @return array [boole,msg]
     */
    public function setUserBlockedStatus($id, $iBlocked, $sComment = null) {
        $oUser = static::find($id);
        if(!$oUser){
            return [ false, 'users not exists' ];
        }

        $sBlockedDesc = ___('_users.user').":$oUser->username ".baseOption('base.user.blocked_type')[ $iBlocked ].' -- ';
        \DB::beginTransaction();

        if(!in_array($iBlocked, array_keys(config('base.user.blocked_type')))){
            return [ false, ___('_users.illegal-request') ];
        }
        $oUser->blocked = $iBlocked;

        $bResult = $oUser->forceSave();
        if($bResult){ // 保存成功
            if($sComment){ // 备注
                $sComment = $sBlockedDesc.$sComment;
                $bResult = UserManageLogs::createLog($oUser->id,$sComment);
                //$bResult = 生成管理员操作日志 并返回结果 boole;
            }
        }

        if($bResult){
            // 冻结类型==禁止登录 ,删除session.强制登出当前用户
            $iBlocked == User::BLOCK_LOGIN && \SessionTool::deleteSession(false, $oUser->username);
            $sMsg = $sBlockedDesc.___("_users.success");
            \DB::commit();
        }else{
            $sMsg = $sBlockedDesc.___("_users.failed");
            \DB::rollBack();
        }

        return [ $bResult, $sMsg ];
    }

    /**
     * 修改用户密码
     *
     * @param User $oUser 修改的用户对象
     * @param  object    $oRequest
     * @param  integer    $iType 1:修改用户密码 2:修改资金密码
     * @return array [bool,msg0]
     */
    public function updatePassword($oUser, $oRequest, $iType = 1) {
        list($bSucc, $sMsg) = $this->generateAuditListData($oUser, $oRequest);
        if(!$bSucc){
            return [ $bSucc, $sMsg ];
        }
        $sPasswordStr = $this->generatePasswordStr($oRequest->password);
        $oUser->password = $sPasswordStr;
        $bSucc = $oUser->forceSave();
        $sMsg = $bSucc ? ___('_user.admin-reset-password-success') : ___('_user.admin-reset-password-failed');

        return [ $bSucc, $sMsg ];
    }

    /**
     * 生成审核表数据并验证表单
     *
     * @param object $oUser    当前用户对象
     * @param object $oRequest 表单请求数据
     *
     * @return array [bool,msg,data]
     */
    private function generateAuditListData($oUser, $oRequest) {
        if($this->checkPassword($oUser, $oRequest['password']))
            return [ false, ___('_users.same-with-password'),];
        // 密码验证需要验证 与用户名不相等 规则,request 添加 username 字段
        $oRequest->offsetSet('username', $oUser->username);
        list($bSucc, $sMsg) = $this->validatorPassword($oRequest);
        if(!$bSucc){
            return [ $bSucc, $sMsg, []];
        }
        return [ $bSucc, $sMsg, [] ];
    }

    /**
     * 验证表单密码
     *
     * @param object $oRequest 表单提交的数据
     * @return array [bool,msg]
     */
    public function validatorPassword($oRequest) {
        $aRules = static::$passwordRules;
        $customAttributes = [
            "password"                   => __('_user.login-password'),
            "password_confirmation"      => __('_user.password_confirmation'),
            "fund_password"              => __('_user.fund_password'),
            "fund_password_confirmation" => __('_user.fund_password_confirmation'),
            "username"                   => __('_user.login-username'),
        ];
        $oValidator = \Validator::make($oRequest->all(), $aRules, $customAttributes);
        if($oValidator->fails()){
            return [ false, implode(',', $oValidator->messages()->all()) ];
        }

        return [ true, '' ];
    }

    /**
     * 验证新密码与旧密码(当前模型)是否相同
     * todo:当前使用旧版md5*3 加密,后期修改密码算法,修改此处
     *
     * @param object $oUser     当前模型对象
     * @param string $sPassword 新密码
     * @return boolean true|false
     */
    public function checkPassword($oUser, $sNewPassword) {
        $sNewPwd = strtolower($oUser->username).$sNewPassword;
        $sNewEncrytPwd = md5(md5(md5($sNewPwd)));

        return \Hash::check($sNewEncrytPwd, $oUser->password);
    }

    /**
     * 生成密码字符串
     * todo:当前使用旧版md5*3 加密,后期修改密码算法,修改此处
     *
     * @param      $sPassword
     * @param null $sUserName
     *
     * @return string
     */
    public function generatePasswordStr($sPassword, $sUserName = null) {
        return md5(md5(md5(strtolower($sUserName).$sPassword)));
    }

    /**
     * 保存之后出发的事件
     *
     * @param $oSavedModel
     *
     * @return bool
     */
    protected function afterSave($oSavedModel) {
        $this->deleteCache($this->username);

        return parent::afterSave($oSavedModel);
    }

    //--------------------- 模型关系 begin  -------------------

    public function account() {
        return $this->hasOne(Account::class, 'user_id');
    }

    public function roles() {
        return $this->belongsToMany(AdminRoleUser::class, 'user_id', 'role_id');
    }
    /* public function prize_groups(){
         return $this->hasOne(PrizeGroup::class,'id');
     }*/

    //---------------------- 模型关系 end ----------------------

}