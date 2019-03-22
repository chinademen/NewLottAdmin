<?php
namespace App\Models;

/*
 * 字典模型类
 * 作用：管理语言包词汇
 */

class Dictionary extends BaseModel {

    protected $connection = 'mysql';
    protected $table                  = 'dictionaries';
    public static $resourceName       = 'Dictionary';
    public static $titleColumn        = 'name';
    public static $enabledBatchAction = true;
    public static $mainParamColumn    = 'name';

    public static $columnForList = [
        'name',
        'models',
        'en_column',
        'zh_column',
    ];

    public static $rules = [
        'name'      => 'required|max:64',
        'models'    => 'max:512',
        'en_column' => 'max:64',
        'zh_column' => 'max:64',
    ];

    protected $fillable = [
        'name',
        'models',
        'en_column',
        'zh_column',
    ];


    /**
     * 获取关联的词汇
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getVocabulary() {
        return $this->hasMany('App\Models\Vocabulary', 'dictionary_id', 'id');
    }

    public static function getDictionaryByName($name) {
        return self::where('name', '=', $name)->first();
    }


}

