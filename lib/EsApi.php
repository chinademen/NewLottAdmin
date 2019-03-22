<?php

/**
 * 操作elasticsearch搜索引擎的类
 * @version    v1.0.1
 * @author heart
 * @date 2017-07-27
 *
 * @example
 *  //$es = new EsApi();
 * //$sql='select * from gapple limit 20;';
 * //$res = $es->singleQuery($sql,$all);
 * //print_r($res);
 *
 *
 * //$sql='select count(*) as count from gapple limit 20;';
 * //$res = $es->aggregateQuery($sql,$all);
 * //print_r($res);
 *
 *
 * //$sql='select user_id,count(*) as count from gapple group by user_id limit 20;';
 * //$res = $es->groupQuery($sql,$all);
 * //print_r($res);
 *
 */
class EsApi {
    private $apiHost = '';         //es服务器地址
    private $apiPort = '';         //es服务器端口
    private $apiLogPath = '';      //日志路径
    private $apiTimeout;           //接口超时时间

    /**
     * 构造函数，初始化
     *
     * EsApi constructor.
     *
     * @param string $apiHost 服务器地址
     * @param string $apiPort 服务器端口，例如http用80,https用443等
     * @param string $apiLogPath 日志保存路径
     * @param int $apiTimeout
     */
    function __construct($apiHost = 'http://127.0.0.1', $apiPort = '9200', $apiLogPath = 'log', $apiTimeout = 30) {
        $this->apiHost = $apiHost;
        $this->apiPort = $apiPort;
        $this->apiLogPath = $apiLogPath;
        $this->apiTimeout = $apiTimeout;
    }

    /**
     * 分组查询,专门用于计算group
     *
     * @param $sql
     * @param $all
     *
     * @return array|mixed
     */
    public function groupQuery($sql, &$all) {
        $sGroupKey = '';
        $sql = str_replace(' ', '%20', $sql);
        $res = $this->requestBySocket('GET', '_sql', $sql);
        $arr = $this->queryResult($res);
        //对多级的数据进行剥离
        if (isset($arr['aggregations'])) {
            $arr = $arr['aggregations'];
            // 剥离keys
            foreach ($arr as $key => $v) {
                if (isset($v['buckets'])) {
                    $v = $v['buckets'];
                }
                $arr = $v;
                $sGroupKey = $key;
            }
            if ($arr) {
                foreach ($arr as $k => $v) {
                    $v[$sGroupKey] = $v['key'];
                    $v['count'] = $v['count']['value'];
                    unset($v['doc_count']);
                    unset($v['key']);
                    $arr[$k] = $v;
                }
            }
        }
        return $arr;
    }

    /**
     * 聚合查询,包含count,sum,avg,max,min等
     *
     * @param $sql
     * @param $all
     *
     * @return array|mixed
     */
    public function aggregateQuery($sql, &$all) {
        $sql = str_replace(' ', '%20', $sql);
        $res = $this->requestBySocket('GET', '_sql', $sql);

        $arr = $this->queryResult($res);
        //对多级的数据进行剥离
        if (isset($arr['aggregations'])) {
            $arr = $arr['aggregations'];
            //剥离下一级
            foreach ($arr as $key => $v) {
                if (isset($v['value'])) {
                    $v = $v['value'];
                }
                $arr[$key] = $v;
            }

        }


//        pr($arr);
//        die;
        return $arr;
    }


    /**
     * 单式查询结果处
     *
     * @param $sql 查询语句
     * @param $all  输出总计
     *
     * @return array|mixed
     */
    public function singleQuery($sql, &$all) {
        $all = 0;
        $sql = str_replace(' ', '%20', $sql);
        $res = $this->requestBySocket('GET', '_sql', $sql);
        $arr = $this->queryResult($res);
        //对多级的数据进行剥离
        if (isset($arr['hits'])) {
            $arr = $arr['hits'];
            //得到总数
            $all = $arr['total'];
            //剥离下一级
            if (isset($arr['hits'])) {
                $arr = $arr['hits'];
                //再剥离
                $a = array();
                foreach ($arr as $k => $v) {
                    $v = $v['_source'];
                    $arr[$k] = $v;
                }
            }
        }
        return $arr;
    }


    /**
     * 结果处理逻辑，将字符串变成数组，如果报错则日志下来
     *
     * @param string $data
     *
     * @return array|mixed
     */
    private function queryResult($data = '') {
        $arr = array();

        if ($data) {
            $aJsonArr = json_decode($data, true);
            //如果接口返回错误，这里记录下来
            if (isset($aJsonArr['error'])) {
                $this->logs($data);
            } else {
                $arr = $aJsonArr;
            }
        }
        return $arr;
    }

    /**
     * 保存日志
     *
     * @param string $sMsg 日志的内容
     */
    private function logs($sMsg = '') {
        try {
            if ($this->apiLogPath && $sMsg) {
                if (!is_dir($this->apiLogPath)) {
                    //如果路径不存在，这里需要创建
                    mkdir($this->apiLogPath, 0777, true);
                }

                //写入内容
                $all_path = $this->apiLogPath . '/es_' . date("Y-m-d") . '.log';
                $text = date('Y-m-d H:i:s') . "\n $sMsg \n";
                @file_put_contents($all_path, $text, FILE_APPEND);
            }
        } catch (Exception $e) {

        }
    }

    /**
     * 使用socket方式来模拟http请求
     *
     * @param string $sMethod 请求类型，例如：GET, POST, PUT, DELETE等
     * @param        $sRemotePath  url的路径
     * @param        $sPostString  发送的内容，如果是表单，请http_build_query后再发送
     *
     * @return mixed|string
     */
    private function requestBySocket($sMethod = 'POST', $sRemotePath, $sPostString) {
        $data = "";
        try {
            $ch = curl_init();
            $url = $this->apiHost . ':' . $this->apiPort . '/' . $sRemotePath;
            switch ($sMethod) {
                case "GET" :
                    curl_setopt($ch, CURLOPT_HTTPGET, true);
                    $url = $url . '?sql=' . $sPostString;
                    break;
                case "POST":
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $sPostString);
                    break;
                case "PUT" :
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $sPostString);
                    break;
                case "DELETE":
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $sPostString);
                    break;
            }

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($ch);
            curl_close($ch);
        } catch (Exception $e) {

        }
        return $data;
    }

    /**
     * 分组查询,专门用于计算group
     *
     * @param $sql
     * @param $all
     *
     * @return array|mixed
     */
    public function groupQueryS($sql, &$all) {
        pr($sql);
        $sGroupKey = '';
        $sql = str_replace(' ', '%20', $sql);
        $res = $this->requestBySocket('GET', '_sql', $sql);
        pr($res);
        $arr = $this->queryResult($res);
        //对多级的数据进行剥离
        if (isset($arr['aggregations'])) {
            $arr = $arr['aggregations'];
            // 剥离keys
            foreach ($arr as $key => $v) {
                if (isset($v['buckets'])) {
                    $v = $v['buckets'];
                }
                $arr = $v;
                $sGroupKey = $key;
            }
            if ($arr) {
                foreach ($arr as $k => $v) {
                    $v[$sGroupKey] = $v['key'];
                    $v['count'] = $v['doc_count'];
                    unset($v['doc_count']);
                    unset($v['key']);
                    $arr[$k] = $v;
                }
            }
        }
        return $arr;
    }


    /**
     * 单式查询结果处
     *
     * @param $sql 查询语句
     * @param $all  输出总计
     *
     * @return array|mixed
     */
    public function singleQueryS($sql, &$all) {
        $all = 0;
        $sql = str_replace(' ', '%20', $sql);
        $res = $this->requestBySocket('GET', '_sql', $sql);
        $arr = $this->queryResult($res);
        //对多级的数据进行剥离
        if (isset($arr['hits'])) {
            $arr = $arr['hits'];
            //得到总数
            $all = $arr['total'];
            //剥离下一级
            if (isset($arr['hits'])) {
                $arr = $arr['hits'];
                //再剥离
                $a = array();
                foreach ($arr as $k => $v) {
                    if (isset($v["fields"])) {
                        $a = $v["fields"];

                    }
                    $v = $v['_source'];
                    $arr[$k] = $v;
                    if ($a != null && sizeof($a) > 0) {
                        foreach ($a as $key => $value) {
                            $arr[$k][$key] = $value[0];
                        }
                    }
                }
            }
        }
        return $arr;
    }


    public function singleSendDSL($sMethod = 'POST', $sIndex, $dsl, &$all) {
        $all = 0;
        $res = "";
        try {
            $ch = curl_init();
            $url = $this->apiHost . ':' . $this->apiPort . '/' . $sIndex;
            $url = $url . '/_search';
            switch ($sMethod) {
                case "GET" :
                    curl_setopt($ch, CURLOPT_HTTPGET, true);
                    $url = $url . '/_search';
                    break;
                case "POST":
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $dsl);
                    break;
                case "PUT" :
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $dsl);
                    break;
                case "DELETE":
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $dsl);
                    break;
            }

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $res = curl_exec($ch);
            curl_close($ch);
        } catch (Exception $e) {

        }
        $arr = $this->queryResult($res);
        //对多级的数据进行剥离
        if (isset($arr['hits'])) {
            $arr = $arr['hits'];
            //得到总数
            $all = $arr['total'];
            //剥离下一级
            if (isset($arr['hits'])) {
                $arr = $arr['hits'];
                //再剥离
                $a = array();
                foreach ($arr as $k => $v) {
                    if (isset($v["fields"])) {
                        $a = $v["fields"];

                    }
                    $v = $v['_source'];
                    $arr[$k] = $v;
                    if ($a != null && sizeof($a) > 0) {
                        foreach ($a as $key => $value) {
                            $arr[$k][$key] = $value[0];
                        }
                    }
                }
            }
        }
        return $arr;
    }

    public function groupSendDSL($sMethod = 'POST', $sIndex, $dsl, &$all) {
        $all = 0;
        $res = "";
        try {
            $ch = curl_init();
            $url = $this->apiHost . ':' . $this->apiPort . '/' . $sIndex;
            $url = $url . '/_search';
            switch ($sMethod) {
                case "GET" :
                    curl_setopt($ch, CURLOPT_HTTPGET, true);
                    $url = $url . '/_search';
                    break;
                case "POST":
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $dsl);
                    break;
                case "PUT" :
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $dsl);
                    break;
                case "DELETE":
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $dsl);
                    break;
            }

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $res = curl_exec($ch);
            curl_close($ch);
        } catch (Exception $e) {

        }
        $arr = $this->queryResult($res);
        //对多级的数据进行剥离
        if (isset($arr['aggregations'])) {
            $arr = $arr['aggregations'];
            // 剥离keys
            foreach ($arr as $key => $v) {
                if (isset($v['buckets'])) {
                    $v = $v['buckets'];
                }
                $arr = $v;
                $sGroupKey = $key;
            }
            if ($arr) {
                foreach ($arr as $k => $v) {
                    $v[$sGroupKey] = $v['key'];
                    $v['count'] = $v['doc_count'];
                    unset($v['doc_count']);
                    unset($v['key']);
                    $arr[$k] = $v;
                }
            }
        }
        return $arr;
    }

    public function groupSendDSLS($sMethod = 'POST', $sIndex, $dsl, &$all) {
        $all = 0;
        $res = "";
        try {
            $ch = curl_init();
            $url = $this->apiHost . ':' . $this->apiPort . '/' . $sIndex;
            $url = $url . '/_search';
            switch ($sMethod) {
                case "GET" :
                    curl_setopt($ch, CURLOPT_HTTPGET, true);
                    $url = $url . '/_search';
                    break;
                case "POST":
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $dsl);
                    break;
                case "PUT" :
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $dsl);
                    break;
                case "DELETE":
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $dsl);
                    break;
            }

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $res = curl_exec($ch);
            pr($dsl);
            pr("<br>");
            pr($res);
            curl_close($ch);
        } catch (Exception $e) {

        }
        $arr = $this->queryResult($res);
        //对多级的数据进行剥离
        if (isset($arr['aggregations'])) {
            $arr = $arr['aggregations'];
            // 剥离keys
            foreach ($arr as $key => $v) {
                if (isset($v['buckets'])) {
                    $v = $v['buckets'];
                }
                $arr = $v;
                $sGroupKey = $key;
            }
            if ($arr) {
                foreach ($arr as $k => $v) {
                    $v[$sGroupKey] = $v['key'];
                    $v['count'] = $v['doc_count'];
                    unset($v['doc_count']);
                    unset($v['key']);
                    $arr[$k] = $v;
                }
            }
        }
        return $arr;
    }

}
