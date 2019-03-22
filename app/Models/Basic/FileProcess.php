<?php

/**
 * 文件上传记录
 *
 * @author leon01
 */

namespace App\Models;

class FileProcess extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'sys_file_upload_record';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_NONE;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'size',
        'ext',
        'original_file_name',
        'new_file_name',
        'created_user',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'FileProcess';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'size',
        'ext',
        'original_file_name',
        'new_file_name',
        'created_user',
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

    public static $listColumnMaps = [];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [];

    public static $titleColumn = 'original_file_name';

    public static $mainParamColumn = 'original_file_name';

    public static $rules = [
        'size' => 'required',
        'ext' => 'required|max:10',
        'original_file_name' => 'required|max:255',
        'new_file_name' => 'required|max:255',
        'created_user' => 'required|max:128',
    ];

    protected function beforeValidate() {
        return parent::beforeValidate();
    }

}