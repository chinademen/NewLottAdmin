<?php

/**
 * 商户配置
 *
 * @author lawrence
 */

namespace App\Models;

class Merchant extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'merchants';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'identity',
        'name',
        'wallet_id',
        'safe_key',
        'post_url',
        'status',
        'is_tester',
        'template',
        'remark',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'Merchant';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'id',
        'identity',
        'name',
        'post_url',
        'status',
        'is_tester',
        'created_at',
        'updated_at',
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
        'created_at',
        'updated_at',
    ];

    public static $ignoreColumnsInCreate = [];

    public static $listColumnMaps = [

    ];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [
        'status'=>'aMerchantStatus',
        'is_tester'=>'aIsTester',
    ];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'name';

    public static $mainParamColumn = 'name';

    public static $rules = [
        'identity' => 'required|max:50',
        'name' => 'required|max:50',
        'wallet_id' => 'required|max:11',
        'safe_key' => 'required|max:32',
        'template' => 'required|integer|min:0',
        'post_url' => 'max:200',
        'status' => 'max:1',
        'is_tester' => 'max:1',
        'remark' => 'max:200',
        'created_at' => 'max:19',
        'updated_at' => 'max:19',
    ];

    protected function beforeValidate() {
        return parent::beforeValidate();
    }

    /*public function getStatusTextAttribute(){
        return baseOption('base.merchant.status')[$this->status];
    }
    public function getTesterTextAttribute(){
        return baseOption('base.merchant.is_tester')[$this->is_tester];
    }*/

    public static function getIdsByName($sName,$bLike = false){
        $data = [];
        $sType = '=';
        if($bLike){
            $sType = 'like';
            if(strpos($sName,'%') === false) $sName = '%'.$sName.'%';
        }
        $datas = static::where('name',$sType,$sName)->get()->toArray();
        foreach ($datas as $v){
            $data[] = $v['id'];
        }
        return $data;
    }
    public function users(){
        return $this->hasMany(AdminUser::class);
    }

    protected static function getCustormModel($oModel = null){
        if(!$oModel) $oModel = new static;
        if($iMerchatId = session('merchant_id')) {
            $oModel = $oModel->where('id',$iMerchatId);
        }
        return $oModel;
    }
}