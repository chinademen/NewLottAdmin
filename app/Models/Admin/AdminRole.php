<?php

namespace App\Models;

use App\Models\AdminUser;
use App\Models\Functionality;
use Cache;

/**
 * 管理员角色模型
 *
 * @author Winter
 */
class AdminRole extends BaseModel {

    static $cacheLevel = self::CACHE_LEVEL_SECOND;
    protected $connection = 'mysql';
    protected $table = 'admin_roles';
    /**
     * 软删除
     * @var boolean
     */
    protected $softDelete = false;
    protected $fillable = [
        'name',
        'description',
        'rights',
        'priority',
        'is_system',
        'right_settable',
        'user_settable',
        'disabled',
        'sequence',
    ];

    /**
     * the columns for list page
     * @var array
     */
    public static $columnForList = [
        'id',
        'name',
        'description',
        'priority',
        'is_system',
        'right_settable',
        'user_settable',
        'disabled',
        'sequence',
    ];
    public static $sequencable = true;
    /**
     * 下拉列表框字段配置
     * @var array
     */
    public static $htmlSelectColumns = [
        'priority' => 'aPriority',
    ];
    public static $aPriority = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    public static $aRoleTypes = ['Admin', 'User'];

    /**
     * order by config
     * @var array
     */
    public $orderColumns = [
        'sequence' => 'asc'
    ];
    public static $ignoreColumnsInEdit = ['rights'];
    public static $ignoreColumnsInView = ['rights'];

    /**
     * the main param for index page
     * @var string
     */
    public static $mainParamColumn = 'name';
    public static $titleColumn = 'name';


    public static $rules = [
        'name'          => 'required|max:40',
        'rights'        => 'max:10240',
        'description'   => 'max:255',
        'priority'      => 'integer|between:0,9',
        'is_system'     => 'boolean',
        'right_settable'=> 'boolean',
        'user_settable' => 'boolean',
        'disabled'      => 'boolean',
        'sequence'      => 'integer',
    ];
    const ADMIN        = 1;
    const EVERYONE     = 2;
    const DENY         = 3;
    const NORMAL_ADMIN = 4;
    const REPORT       = 6;
    const MONITOR      = 7;
    const MERCHANT     = 30007;

    public function users(){
        return $this->belongsToMany('App\Models\AdminUser', 'admin_role_admin_user', 'role_id', 'user_id')->withPivot(AdminRoleUser::$columnsForPivot)->withTimestamps();
    }

    public static function updateUserRole($iUserId, $iRoleId)
    {
        $query = AdminRoleUser::where('role_id', '=', $iRoleId)->where('user_id', '=', $iUserId);
        $oUser = AdminUser::find($iUserId);
        $oRole = self::find($iRoleId);
        $aParams = ['role_name' => $oRole->name, 'username' => $oUser->username];
        if ($query->get(['id'])->toArray())
            $bSucc = 2;
        else {
            self::find($iRoleId)->users()->attach($iUserId, $aParams);
            $bSucc = (int)$query->get(['id'])->toArray();
        }
        return $bSucc;
    }

    protected function beforeValidate()
    {
        $this->rights or $this->rights = 0;
        $this->priority or $this->priority = 0;
        $this->description or $this->description = '';
        return parent::beforeValidate();
    }


    public function getRightArrayAttribute(){
        return explode(',', $this->rights);
    }

    /**
     * 返回指定角色ID序列的功能ID的合并后的数组
     * @param array $aRoleIds
     * @return type
     */
    public static function & getRightsOfRoles($aRoleIds){
        $aRights = [];
        foreach($aRoleIds as $iRoleId){
            $aRightsOfRole = & self::getRights($iRoleId);
            $aRights = array_merge($aRights, $aRightsOfRole);
        }
        $aRights = array_unique($aRights);
        return $aRights;
    }

    /**
     * 返回指定角色的有权限的功能ID数组
     * @param int $iRoleId
     * @return array
     */
    public static function & getRights($iRoleId){
        if (static::$cacheLevel == self::CACHE_LEVEL_NONE){
            $obj = self::find($iRoleId);
            $aRights = & $obj->explodeRights();
        }
        else{
            $key = self::getRightsCacheKey($iRoleId);
            Cache::setDefaultDriver(static::$cacheDrivers[static::$cacheLevel]);
            if (!$aRights = Cache::get($key)){
                $obj = self::find($iRoleId);
                $aRights = & $obj->explodeRights();
                Cache::forever($key, $aRights);
            }
        }




        return $aRights;
    }

    /**
     * 返回CacheKey
     * @param int $iRoleId
     * @return string
     */
    public static function getRightsCacheKey($iRoleId){
        return get_called_class() . '-rights-' . $iRoleId;
    }

    /**
     * 返回有权限的功能ID的数组
     * @return array
     */
    public function & explodeRights(){
        if ($this->id == self::ADMIN){
            $aRights = Functionality::whereIn('realm',[Functionality::REALM_SYSTEM, Functionality::REALM_ADMIN])->pluck('id')->toArray();
        }
        else{
            $aRights = explode(',',$this->rights);
        }
        return $aRights;
    }

    protected function afterSave($oSavedModel){
        if (!parent::afterSave($oSavedModel)){
            return false;
        }
        self::deleteRightCache($this->id);
        $this->wrtieFileCache();
        return true;
    }

    /**
     * 删除角色权限缓存
     * @param int|array $mRoleId 如果为空，则意为删除全部
     * @return boolean
     */
    protected static function deleteRightCache($mRoleId = null){
        if (static::$cacheLevel == self::CACHE_LEVEL_NONE) return true;
        Cache::setDefaultDriver(static::$cacheDrivers[static::$cacheLevel]);
        if (empty($mRoleId)){
            $aRoleId = [];
            $oRoles = self::all(['id']);
            foreach($oRoles as $oRole){
                $aRoleId[] = $oRole->id;
            }
        }
        else{
            $aRoleId = (array)$mRoleId;
        }
        foreach($aRoleId as $iRoleId){
            $sCacheKey = self::getRightsCacheKey($iRoleId);
            !Cache::has($sCacheKey) or Cache::forget($sCacheKey);
        }
        return true;
    }

    private function wrtieFileCache(){
        $data = explode(',', $this->rights);
        $sValues = 'return ' . var_export($data, true) . ";\n";
        $sFileName = app_path('config/rights') . DS . $this->id . '.php';
        if (!is_writable($sFileName)){
            return false;
        }
        return file_put_contents($sFileName, $sValues);
    }
}

