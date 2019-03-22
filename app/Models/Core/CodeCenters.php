<?php

/**
 * 开奖中心配置
 *
 * @author loren
 */

namespace App\Models;

class CodeCenters extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'code_centers';

    const VALID_TIME_MAX_OFFSET         = 86400;
    const VALID_TIME_MIN_OFFSET         = -10;
    const ERRNO_REQUEST_FINISHED        = 64;
    const ERRNO_REQUEST_NON_POST        = 1;
    const ERRNO_REQUEST_INVALID         = 2;
    const ERRNO_REQUEST_SIGN_ERROR      = 3;
    const ERRNO_REQUEST_CC_EXPIRED      = 4;
    const ERRNO_REQUEST_CUSTOMER_ERROR  = 5;
    const ERRNO_REQUEST_CC_IP_ERROR     = 7;
    const ERRNO_REQUEST_CC_HOST_ERROR   = 9;
    const ERRNO_REQUEST_NEED_PUSH_AGAIN = 10;
    const ERRNO_REQUEST_ON_SALE         = 10;
    const ERRNO_REQUEST_LOTTERY_ERROR   = 11;
    const ERRNO_REQUEST_ISSUE_ERROR     = 12;
    const ERRNO_SET_PROC_NOT_EXISTS     = 20;
    const ERRNO_SET_PROC_INVALID        = 21;
    const ERRNO_SET_PROC_LOTTERY_ERROR  = 22;
    const ERRNO_SET_PROC_ISSUE_ERROR    = 23;
    const ERRNO_SET_PROC_NUMBER_ERROR   = 24;
    const ERRNO_SET_PROC_NO_RESPONSE    = 25;
    const ERRNO_SET_PROC_VALID          = 32;
    const ERRNO_GET_PROC_NOT_EXISTS     = 40;
    const ERRNO_GET_PROC_INVALID        = 41;
    const ERRNO_GET_PROC_VALID          = 48;


    protected static $cacheUseParentClass = false;

    protected static $cacheLevel = self::CACHE_LEVEL_SECOND;

    protected static $cacheMinutes = 0;

    protected $fillable = [
        'id',
        'name',
        'customer_id',
        'version',
        'domain',
        'ip',
        'set_url',
        'set_verify_url',
        'get_url',
        'revise_url',
        'revise_verify_url',
        'alarm_url',
        'alarm_verify_url',
        'customer_key',
        'created_at',
        'updated_at',
    ];

    public static $sequencable = false;

    public static $enabledBatchAction = false;

    protected $validatorMessages = [];

    protected $isAdmin = true;

    public static $resourceName = 'CodeCenters';

    protected $softDelete = false;

    protected $defaultColumns = [ '*' ];

    protected $hidden = [];

    protected $visible = [];

    public static $treeable = '';

    public static $foreFatherIDColumn = '';

    public static $foreFatherColumn = '';

    public static $columnForList = [
        'name',
        'domain',
        'version',
        'ip',
        'customer_id',
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

    public $orderColumns = [
        'id' => 'asc'
    ];

    public static $titleColumn = 'name';

    public static $mainParamColumn = '';

    public static $rules = [
        'name'              => 'required|max:20',
        'domain'            => 'required|url|max:50',
        'version'           => 'required|integer|min:1',
        'ip'                => 'required|max:100',
        'set_url'           => 'required|max:200',
        'set_verify_url'    => 'required|max:200',
        'revise_url'        => 'max:200',
        'revise_verify_url' => 'max:200',
        'alarm_url'         => 'max:200',
        'alarm_verify_url'  => 'max:200',
        'get_url'           => 'max:200',
        'customer_id'       => 'required|integer|min:1',
        'customer_key'      => 'required|size:32',
    ];

    /**
     * 强制域名最后加斜杠，其他url首字母去除斜杠
     * @return boolean
     */
    protected function beforeValidate() {
        if (isset($this->domain) && !empty($this->domain)) {
            $this->domain = str_finish($this->domain, '/');
        }
        if (isset($this->set_url) && !empty($this->set_url) && starts_with($this->set_url, '/')) {
            $this->set_url = substr($this->set_url, 1);
        }
        if (isset($this->set_verify_url) && !empty($this->set_verify_url) && starts_with($this->set_verify_url, '/')) {
            $this->set_verify_url = substr($this->set_verify_url, 1);
        }
        if (isset($this->revise_url) && !empty($this->revise_url) && starts_with($this->revise_url, '/')) {
            $this->revise_url = substr($this->revise_url, 1);
        }
        if (isset($this->revise_verify_url) && !empty($this->revise_verify_url) && starts_with($this->revise_verify_url, '/')) {
            $this->revise_verify_url = substr($this->revise_verify_url, 1);
        }
        if (isset($this->alarm_url) && !empty($this->alarm_url) && starts_with($this->alarm_url, '/')) {
            $this->alarm_url = substr($this->alarm_url, 1);
        }
        if (isset($this->alarm_verify_url) && !empty($this->alarm_verify_url) && starts_with($this->alarm_verify_url, '/')) {
            $this->alarm_verify_url = substr($this->alarm_verify_url, 1);
        }
        if (isset($this->get_url) && !empty($this->get_url) && starts_with($this->get_url, '/')) {
            $this->get_url = substr($this->get_url, 1);
        }
        return parent::beforeValidate();
    }

    /**
     * get default code center
     * @return CodeCenter
     */
    public static function getDefaultCenter() {
        return static::where('default', '=', 1)->get()->first();
    }

    public static function getCodeCenterByKey($sKey) {
        $obj = static::where('customer_key', '=', $sKey)->get();
        return empty($obj) ? null : $obj->first();
    }

    public static function getCodeCenterByCustomerId($iCustomerId, $sDomain) {
        $obj = static::where('customer_id', '=', $iCustomerId)
            ->where('domain', '=', $sDomain)
            ->get();
        return empty($obj) ? null : $obj->first();
    }

    /**
     * get code center
     * @return CodeCenter
     */
    public static function getCenter($iVersion = 1, $iCustomerId = 1) {
        return static::where('version', '=', $iVersion)
            ->where('customer_id', '=', $iCustomerId)
            ->get()->first();
    }

    public function getFormatedIpAttribute() {
        return explode(',', $this->attributes['ip']);
    }
}