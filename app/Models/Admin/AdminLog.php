<?php

namespace App\Models;

use  Tool;

class AdminLog extends BaseModel {
    protected $connection = 'mysql';
    protected $table = 'admin_logs';
    public static $resourceName = 'AdminLog';
    protected $fillable = [
        'is_admin',
        'user_id',
        'username',
        'functionality_id',
        'functionality_title',
        'controller',
        'action',
        'ip',
        'proxy_ip',
        'domain',
        'env',
        'request_uri',
        'request_data',
    ];

    public static $columnForList = [
        'id',
        'username',
        'request_uri',
        'domain',
        'functionality_title',
        'ip',
        'created_at',
    ];
    public $orderColumns = [
        'created_at' => 'desc'
    ];
    public static $rules = [
        /*'user_id' => 'required|numeric',
        'functionality_id' => 'required|numeric',
        'functionality' => 'required|between:1,50',
        'user_id'            => 'required|min:0',
        'username'          => 'required|max:16',
        'comment_admin_id' => 'numeric',
        'comment_admin' => 'between:4,16',*/
    ];

    public static $listColumnMaps = [
        'action' => 'friendly_action',
        'functionality_title' => 'friendly_functionality_title',
        'is_admin' => 'is_admin_text',
    ];
    public static $viewColumnMaps = [
        'action' => 'friendly_action',
        'functionality_title' => 'friendly_functionality_title',
        'is_admin' => 'is_admin_text',
    ];

    protected function getFriendlyActionAttribute() {
        return __('_function.' . $this->action);
    }

    protected function getFriendlyFunctionalityTitleAttribute() {
        return __('_function.' . strtolower($this->functionality_title));
    }

    protected function getIsAdminTextAttribute() {
        return baseOption('base.isTrue')[$this->is_admin ?? 0];
    }


    /**
     * 创建系统日志
     *
     * @param       $oFunctionality
     * @param       $oUser
     * @param array $aParams
     *
     * @return bool
     */
    public static function createLog($oFunctionality, $oUser, & $aParams = []) {

        if (!$oFunctionality->need_log) {//设置中不需要记录日志的直接返回
            return true;
        }
        $aData = [
            'is_admin' => boolval(get_class($oUser) == 'App\Models\AdminUser'),
            'user_id' => $oUser->id,
            'username' => $oUser->username,
            'functionality_id' => $oFunctionality->id,
            'functionality_title' => $oFunctionality->title,
            'controller' => $oFunctionality->controller,
            'action' => $oFunctionality->action,
            'request_uri' => $_SERVER['REQUEST_URI'],
            'ip' => Tool::getClientIp(),
            'proxy_ip' => Tool::getProxyIp(),
            'domain' => $_SERVER['HTTP_HOST'],
            'env' => json_encode($_SERVER),
        ];
        empty($aParams) or $aData['request_data'] = json_encode($aParams);
        $oLog = new static($aData);
        if (!$bSucc = $oLog->save()) {
            pr($oLog->getValidationErrorString());
        }
        return $bSucc;
    }

}
