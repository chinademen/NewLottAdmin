<?php

/**
 * 商户API日志
 *
 * @author loren
 */

namespace App\Models;

class ApiLogs extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'api_logs';
    public static $merchantColumn = 'merchant_id';

    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'merchant_id',
        'ip',
        'url',
        'domain',
        'request_body',
        'server_id',
        'start_time',
        'end_time',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'ApiLogs';

    protected $softDelete = false;

    protected $defaultColumns = ['*'];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'id',
        'merchant_id',
        'ip',
        'server_id',
        'url',
        'request_body',
        'start_time',
        'time_length'
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
        'merchant_id' => 'merchant_id_text',
        'time_length' => 'time_length_text'
    ];

    public static $viewColumnMaps = [];

    public static $htmlSelectColumns = [];

    public static $htmlTextAreaColumns = [];

    public static $htmlNumberColumns = [];

    public static $htmlOriginalNumberColumns = [];

    public static $amountAccuracy = 0;

    public static $originalColumns;

    public $orderColumns = [
        'id' => 'desc'
    ];

    public static $titleColumn = 'id';

    public static $mainParamColumn = 'merchant_id';

    public static $rules = [
        'merchant_id' => 'required|max:11',
        'ip' => 'required|max:15',
        'url' => 'required|max:150',
        'domain' => 'required|max:50',
        'request_body' => 'required|max:65535',
        'server_id' => 'required|max:50',
        'start_time' => 'required|max:19',
        'end_time' => 'required|max:19',
        'created_at' => 'max:19',
        'updated_at' => 'max:19',
    ];

    protected function beforeValidate() {
        return parent::beforeValidate();
    }

    /***************************** ColumnMaps Start *******************************/
    protected function getMerchantIdTextAttribute($fieldValue = null) {
        if ($fieldValue == null && isset($this->attributes['merchant_id'])) {
            $fieldValue = $this->attributes['merchant_id'];
        }
        if ($fieldValue == null) {
            return $fieldValue;
        }
        if (empty($fieldValue)) return '';
        $oMerchant = Merchant::find($fieldValue);

        return empty($oMerchant->name) ? $fieldValue : $oMerchant->name;
    }


    protected function getTimeLengthTextAttribute() {
        if (!isset($this->attributes['start_time']) || !isset($this->attributes['end_time'])) {
            return '';
        }
        return strtotime($this->attributes['end_time']) - strtotime($this->attributes['start_time']);
    }
    /***************************** ColumnMaps End *******************************/

}