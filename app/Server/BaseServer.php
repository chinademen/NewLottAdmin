<?php
namespace App\Server;


use     App\Models\System\SysError;
use     App\Models\Basic\BusinessPartner;
use     App\Models\Basic\GameType;
use     App\Models\Func\SysConfig;
use     Config;
use     Input;
use     Carbon;
use     String;
use     Request;
use     Cache;

/**
 * 服务器基类
 *
 * Class BaseServer
 * @package App\Server
 */
class BaseServer {

    protected $no;
    protected $action;
    protected $Customer;
    protected $oGameType;
    protected $pid;
    protected $logId;
    protected $logPath;
    protected $logFile;
    protected $logBase;
    protected $logNormal = true;
    protected $isAutoLog = false;
    protected $params;
    protected $sign;
    public $safekey;
    protected $postMethod = false;
    protected $errno = 0;
    protected $error;
    protected $data;
    protected $requiredKeys = [];

    /**
     * 校验必传参数
     *
     * @return bool
     */
    protected function checkParams() {
        $aKeys = array_keys($this->params);
        if ($aDiff = array_diff($this->requiredKeys, $aKeys)) {
            $this->setError(SysError::MISSING_PARAMS, [], "Missing params: " . implode(',', $aDiff));
            return false;
        }
        foreach ($this->requiredKeys as $sKey){//验证必传参数是否为空
            if (empty($this->params[$sKey])){
                $this->setError(SysError::MISSING_PARAMS, [], "Params: {$sKey} is empty!");
                return false;
            }
        }

        //必传参数有game_type,则判断赛事类型合法性
        $aGameType = GameType::getTitleList();
        $sGameType = isset($this->params['game_type']) ? $this->params['game_type'] : '';
        if (in_array('game_type', $this->requiredKeys) && !in_array($sGameType, $aGameType)) {
            $this->setError(SysError::GAME_TYPE_ERROR, [], "game_type in : " . implode(',', $aGameType));
            return false;
        }

        //必传参数有game_type, game_type合法,判断是否可用
        if (in_array('game_type', $this->requiredKeys)) {
            $this->oGameType = GameType::getAvailableGameType($sGameType);
            if (!$this->oGameType) {
                $this->setError(SysError::GAME_TYPE_ERROR, [], "game_type {$sGameType} can not use!");
                return false;
            }
        }
        return true;
    }

    /**
     * 校验签名
     *
     * @return bool
     */
    protected function checkSign() {
        if (!$this->sign = trim(Input::get('sign'))) {
            $this->setError(SysError::MISSING_SIGN);
            return false;
        }

        file_put_contents('/tmp/api-sign', "post_data: \n" . var_export($this->params, 1) . "\n", FILE_APPEND);
        file_put_contents('/tmp/api-sign', "post_sign: \n" . $this->sign . "\n", FILE_APPEND);

        $sRealSign = Signature::compileSign($this->params, $this->safekey);
        file_put_contents('/tmp/api-sign', "real_sign: \n" . $sRealSign . "\n", FILE_APPEND);
        if ($sRealSign != $this->sign) {
            $this->setError(SysError::SIGN_ERROR);
            return false;
        }
        return true;
    }

    /**
     *校验请求方法
     *
     * @return bool
     */
    protected function checkMethod() {
        $sNeedMethod = $this->postMethod ? 'POST' : 'GET';
        if (Request::method() != $sNeedMethod) {
            $iErrno = $sNeedMethod == 'GET' ? SysError::METHOD_NEED_GET : SysError::METHOD_NEED_POST;
            $this->setError($iErrno);
            return false;
        }
        return true;
    }

    /**
     * 校验商户
     *
     * @return bool
     */
    public function getCustomer() {
        $sIdentity = array_get($this->params, 'identity');
        if (!$sIdentity) {
            $this->setError(SysError::CUSTOMER_ERROR);
            return false;
        }
        $oCustomer = BusinessPartner::getActivateBusinessParnter($sIdentity);
        if (!$oCustomer) {
            $this->setError(SysError::CUSTOMER_ERROR);
            return false;
        }
        $this->Customer = $oCustomer;
        $this->safekey = $this->Customer->key;
        return true;
    }


    protected function init() {
        $this->pid = posix_getpid();
        $this->logPath = Config::get('custom-sysconfig.default-log-path') . DS . 'api' . DS . date('Ym') . DS . date('d');
        if (!file_exists($this->logPath)) {
            @mkdir($this->logPath, 0777, true);
            @chmod($this->logPath, 0777);
        }

        $sAction = str_replace(['\ ', ' '], ['-', ''], String::humenlize(get_class($this)));
        $this->logFile = $this->logPath . DS . $sAction;
        $this->logId = uniqid($this->pid, true);
        $this->logBase = $this->getBaseLog();
        $this->isAutoLog = SysConfig::readValue('is_auto_log');
        $this->params = trimArray(Input::except('sign'));

        //记录请求参数日志
        if ($this->isAutoLog) {
            $this->writeLog('Params[' . json_encode(Input::all()) . "]END\n");
        }

    }

    public function fire() {
        $this->init();
        if (!$this->checkMethod()) {
            return $this->compileResponse();
        }
        if (!$this->checkParams()) {
            return $this->compileResponse();
        }
        if (!$this->getCustomer()) {
            return $this->compileResponse();
        }
        if (!$this->checkSign()) {
            //if (!env('APP_DEBUG') && !$this->checkSign()) {
            return $this->compileResponse();
        }
        $this->serve();
        return $this->compileResponse();
    }

    protected function serve() {

    }

    protected function setError($iErrno, $aLangVars = [], $sExtraInfo = null) {
        $this->errno = $iErrno;
        $this->error = &SysError::getMessage($iErrno, $aLangVars, $sExtraInfo);
        return false;
    }

    private function & compileResponse() {
        $a = [
            'errno' => $this->errno,
            'error' => $this->error,
            'data' => $this->data,
        ];
        //记录返回数据日志
        if ($this->isAutoLog) {
            $this->writeLog('Response[' . json_encode($a) . "]END\n");
        }

        return $a;
    }

    public function __destruct() {

    }

    protected function writeLog($log) {
        @file_put_contents($this->logFile, $this->logBase . ' ' . $log . "\n", FILE_APPEND);
    }

    /**
     * 生成日志基础信息
     *
     * @return string
     */
    protected function & getBaseLog() {
        $date = Carbon::now()->toDateTimeString();
        $sAction = String::humenlize(get_class($this));
        $sLogInfo = "$date PID: $this->pid Log Id: $this->logId $sAction: ";
        return $sLogInfo;
    }

    /**
     * 获取缓存的tag
     *
     * @param array $aTag
     *
     * @return string
     */
    protected function getDataCacheTag($aTag = []) {
        $sAction = str_replace(['\ ', ' '], ['-', ''], String::humenlize(get_class($this)));
        $sTag = $aTag ? implode('-', $aTag) : $sAction;
        return $sTag;
    }

    /**
     * 获取缓存key
     *
     * @param $aParams
     *
     * @return string
     */
    protected function getDataCacheKey($aParams) {
        $sKey = generateComplexDataCacheKey(implode('-', array_merge($aParams, [Carbon::today()->toDateString()])));
        return $sKey;
    }

}
