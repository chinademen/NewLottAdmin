<?php

/**
 * Created by PhpStorm.
 * User: loren
 * Date: 7/16/18
 * Time: 5:37 PM
 */

//use MyCurl;

class MyApi {
    private $apiName = '';          //api名称
    private $apiTime = '';          //接口超时时间
    private $apiUrl = '';           //api地址
    private $apiData = '';          //api内容
    private $apiLog = false;        //是否写日志
    private $apiLogPath = 'myapi';  //日志路径
    private $oMyCurl = '';          //MyCurl 对象
    private $reType = 'array';      //返回数据类型  array,json,bool
    private $apiSuccessCode = '';   //返回数据成功的状态码
    private $reData = [             //返回数据
        'status' => '0',
        'msg' => '参数错误',
        'data' => []
    ];

    /**
     * MyApi constructor.
     *
     * @param string $apiTime
     * @param string $reType
     * @param int    $apiSuccessCode
     * @param bool   $apiLog
     */
    public function __construct($apiTime = '5', $reType = 'bool', $apiSuccessCode = 200, $apiLog = true) {
        $this->apiTime = $apiTime;
        $this->reType = $reType;
        $this->apiSuccessCode = $apiSuccessCode;
        $this->apiLog = $apiLog;
        $this->oMyCurl = new MyCurl('');
    }

    /**
     * @param bool|string $apiLog
     */
    public function setApiLog($apiLog) {
        $this->apiLog = $apiLog;
    }

    /**
     * @param string $apiTime
     */
    public function setApiTime(string $apiTime) {
        $this->apiTime = $apiTime;
    }

    /**
     * @param string $reType
     */
    public function setReType(string $reType) {
        $this->reType = $reType;
    }

    /**
     * @param int|string $apiSuccessCode
     */
    public function setApiSuccessCode($apiSuccessCode) {
        $this->apiSuccessCode = $apiSuccessCode;
    }

    /**
     * @return array
     */
    public function getReData(): array {
        return $this->reData;
    }

    /**
     * 发送请求并返回响应内容，本类的主要方法
     *
     * @param string $apiName
     * @param array  $aData
     *
     * @return array|bool|string
     */
    public function apiRequest($apiName = '', $aData = []) {
        if (empty($apiName)) {
            $this->reData['msg'] = 'ApiName Is Empty！';
            return $this->retApiResponse();
        }
        $this->apiName = $apiName;
        $apiList = config('api');
        if (!isset($apiList[$apiName])) {
            $this->reData['msg'] = 'ApiName Is Undefined！';
            return $this->retApiResponse();
        }

        isset($aData['admin_name']) or $aData['admin_name'] = session('admin_username');
        $this->apiUrl = $this->getFormatApiUrl($apiList[$apiName], $aData);
        if (empty($this->oMyCurl)) {
            $this->oMyCurl = new MyCurl($this->apiUrl);
        }
        if (!empty($this->apiTime)) {
            $this->oMyCurl->setTimeout($this->apiTime);
        }
        if (isset($apiList[$apiName]['type']) && $apiList[$apiName]['type'] == 'POST') {
            $this->apiData = $this->getFormatApiData($apiList[$apiName], $aData);
            if ($this->apiData === false) {
                return $this->retApiResponse();
            }
            $this->oMyCurl->setPost($this->apiData);
        }

        $this->oMyCurl->createCurl($this->apiUrl);
        $this->oMyCurl->execute();
        $status = $this->oMyCurl->getHttpStatus();
        $body = $this->oMyCurl->__tostring();
        //dd($this->apiUrl, $this->apiData, $status, $body);
        if ($status != '200') {
            $this->reData['status'] = $status;
            $this->reData['msg'] = 'Request Failed！';
            $this->reData['data'] = $body;
            return $this->retApiResponse();
        }
        $body = json_decode($body, true);
        $this->reData['status'] = isset($body['status']) ? $body['status'] : 0;
        $this->reData['msg'] = isset($body['msg']) ? $body['msg'] : 'No Msg！';
        $this->reData['data'] = isset($body['data']) ? $body['data'] : $body;
        return $this->retApiResponse();
    }

    /**
     * 获取请求url，根据api配置
     *
     * @param array $aApiData
     * @param array $aData
     *
     * @return mixed
     */
    private function getFormatApiUrl($aApiData = [], $aData = []) {
        $url = $aApiData['url'];
        preg_match_all("|{(.*)}|U", $url, $getkeys);
        if (!empty($getkeys[0])) {
            foreach ($getkeys[1] as $k => $v) {
                isset($aData[$v]) && $getkeys[1][$k] = $aData[$v];
            }
            $url = str_replace($getkeys[0], $getkeys[1], $url);
            unset($getkeys);
        }
        return $url;
    }

    /**
     * 获取请求data的内容，根据api配置
     *
     * @param array $aApiData
     * @param array $aData
     *
     * @return array
     */
    private function getFormatApiData($aApiData = [], $aData = []) {
        $apiData = [];
        if (empty($aApiData['data'])) {
            return $apiData;
        }
        foreach ($aApiData['data'] as $k => $v) {
            if (is_array($v)) {
                if (method_exists(get_called_class(), $v[0])) {
                    $apiData[$k] = $this->{$v[0]}($aData, $v[1]);
                } else {
                    $apiData[$k] = '';
                }

            } else {
                switch ($v) {
                    case 0:
                        $apiData[$k] = isset($aData[$k]) ? $aData[$k] : '';
                        break;
                    case 1:
                        if (!isset($aData[$k]) || $aData[$k] == '' || $aData[$k] == null) {
                            $this->reData['msg'] = 'ApiData:' . $k . ' Is Empty！';
                            return false;
                        }
                        $apiData[$k] = $aData[$k];
                        break;
                    default:
                        $apiData[$k] = $v;
                        break;
                }
            }
        }

        if (!empty($aApiData['datafun']) && method_exists(get_called_class(), $aApiData['datafun'])) {
            return $this->{$aApiData['datafun']}($apiData);
        } else {
            return $apiData;
        }
    }

    /**
     * 返回彩票中心后台接口特殊的数据格式
     * @param $apiData
     *
     * @return array
     */
    private function getNewlottApiPostData($apiData) {
        $apiData = is_array($apiData) ? http_build_query($apiData) : $apiData;
        return ['params' => $apiData];
    }


    /**
     * 按照格式返回api响应内容
     *
     * @return array|bool|string
     */
    private function retApiResponse() {
        switch ($this->reType) {
            case 'json':
                $redata = json_encode($this->reData);
                break;
            case 'bool':
                $redata = ($this->reData['status'] == $this->apiSuccessCode);
                break;
            default:
                $redata = $this->reData;
                break;
        }
        if ($this->apiLog) {
            $this->writeApiLog($redata);
        }
        return $redata;
    }

    /**
     * 写入api日志
     *
     * @param null $redata
     */
    private function writeApiLog($redata = null) {
        try {
            if ($this->apiLogPath) {
                $this->apiLogPath = storage_path('logs') . DS . $this->apiLogPath;
                if (!is_dir($this->apiLogPath)) {
                    //如果路径不存在，这里需要创建
                    mkdir($this->apiLogPath, 0777, true);
                }

                //写入内容
                $all_path = $this->apiLogPath . '/' . date("Y-m-d") . '.log';

                $apiLogMsg = [];
                $apiLogMsg['apiName'] = $this->apiName;
                $apiLogMsg['apiTime'] = $this->apiTime;
                $apiLogMsg['apiUrl'] = $this->apiUrl;
                $apiLogMsg['apiData'] = $this->apiData;
                $apiLogMsg['status'] = $this->oMyCurl->getHttpStatus();
                $apiLogMsg['body'] = $this->oMyCurl->__tostring();
                $apiLogMsg['oReData'] = $this->reData;
                $apiLogMsg['reData'] = ($redata === null) ? $this->reData : $redata;
                $text = date('Y-m-d H:i:s') . "\n $this->apiName:" . json_encode($apiLogMsg) . " \n";
                unset($apiLogMsg);
                @file_put_contents($all_path, $text, FILE_APPEND);
            }
        } catch (Exception $e) {

        }
    }

    /**
     * 彩票中心后台接口，对应api配置内容，返回加密密钥
     *
     * @param array $aData
     * @param array $aKey
     *
     * @return string
     */
    private function getNewlottApiSigin($aData = [], $aKey = []) {
        $md5Str = '';
        foreach ($aKey as $k => $v) {
            isset($aData[$v]) && $md5Str .= $aData[$v];
        }
        //dd($aKey,$aData,$md5Str . env('NEWLOTT_API_KEY', ''),md5($md5Str),md5($md5Str . env('NEWLOTT_API_KEY', '')));
        return md5($md5Str . env('NEWLOTT_API_KEY', ''));
    }
}