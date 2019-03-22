<?php

/**
 * Bulletin
 *
 * @author lawrence
 */

namespace App\Models;

class Bulletin extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'bulletin';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'title',
        'type_id',
        'description',
        'content',
        'status',
        'sequence',
        'author',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'Bulletin';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'id',
        'title',
        'type_id',
        'description',
        'status',
        'sequence',
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
        'updated_at','author'
    ];

    public static $ignoreColumnsInCreate = [];

    public static $listColumnMaps = [];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [
        'type_id'=>'aBulletinType'
    ];

    public static $htmlTextAreaColumns = [
        'content'
    ];

    public static $htmlNumberColumns = ['sequence'];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = ['sequence'=>'asc'];

    public static $titleColumn = 'title';

    public static $mainParamColumn = 'title';

    public static $rules = [
        'title' => 'required|max:300',
        'type_id' => 'required|integer',
        'description' => 'max:500',
        'content' => 'max:65535',
        'author' => 'max:100',
        'status' => 'in:0,1',
        'sequence' => 'integer',
        'created_at' => 'max:19',
        'updated_at' => 'max:19',
    ];

    protected function beforeValidate() {
        $this->author = session('admin_username');
       // $this->sequence = intval($this->sequence);
        return parent::beforeValidate();
    }

    protected function afterSave($oSavedModel) {
        parent::afterSave($oSavedModel);
        $this->delThirdCache($oSavedModel);
        return true;
    }

    protected function afterDelete($oDeletedModel) {
        parent::afterDelete($oDeletedModel);
        $this->delThirdCache($oDeletedModel);
        return true;
    }

    protected function delThirdCache($oModel){
        $aKeys = ['bulletin_list'];
        $this->deleteThirdCache($aKeys);
    }

    public function bulletin_type(){
        return $this->belongsTo(BulletinType::class,'type_id');
    }

}