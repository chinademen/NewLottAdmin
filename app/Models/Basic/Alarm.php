<?php

/**
 * 警报/实时通知
 *
 * @author loren
 */

namespace App\Models;

class Alarm extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'alarms';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'name',
        'keyword',
        'content',
        'is_url',
        'is_closed',
        'is_audio',
        'audio_url',
        'audio_length',
        'sequence',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'Alarm';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'id',
        'name',
        'keyword',
        'content',
        'is_url',
        'is_audio',
        'audio_url',
        'audio_length',
        'is_closed',
        'sequence',
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
        'keyword'
    ];

    public static $ignoreColumnsInCreate = [];

    public static $listColumnMaps = [];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'name';

    public static $mainParamColumn = '';

    public static $rules = [
        'name' => 'required|max:255',
        'keyword' => 'required|max:50',
        'content' => 'required|max:500',
        'is_url' => 'required|integer|in:0,1',
        'is_audio' => 'required|integer|in:0,1',
        'audio_url' => 'max:255',
        'audio_length' => 'integer',
        'is_closed' => 'required|integer|in:0,1',
        'sequence' => 'required',
    ];

    protected function beforeValidate() {
        return parent::beforeValidate();
    }

    public static function getLists($aWhere = []){
        return static::doWhere($aWhere)->orderBy('sequence')->get();
    }

}