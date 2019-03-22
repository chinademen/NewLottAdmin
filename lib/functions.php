<?php
// use \app('config');
// use Html;
// use Lang;
/*
|--------------------------------------------------------------------------
| 复写官方函数
|--------------------------------------------------------------------------
|
| 官方函数库路径
| Illuminate/Support/helpers.php
|
*/




/*
|--------------------------------------------------------------------------
| 延伸自拓展配置文件
|--------------------------------------------------------------------------
|
*/

/**
 * 样式别名加载（支持批量加载）
 *
 * @param  string|array $aliases 配置文件中的别名
 * @param  array        $attributes 标签中需要加入的其它参数的数组
 *
 * @return string
 */
function style($aliases, $attributes = array(), $interim = '') {
    if (is_array($aliases)) {
        foreach ($aliases as $key => $value) {
            $interim .= (is_int($key)) ? style($value, $attributes, $interim) : style($key, $value, $interim);
        }
        return $interim;
    }
    $cssAliases = app('config')->get('extend.webAssets.cssAliases');
    $url = isset($cssAliases[$aliases]) ? $cssAliases[$aliases] : $aliases;
    return app('html')->style($url, $attributes);
}

/**
 * 脚本别名加载（支持批量加载）
 *
 * @param  string|array $aliases 配置文件中的别名
 * @param  array        $attributes 标签中需要加入的其它参数的数组
 *
 * @return string
 */
function script($aliases, $attributes = array(), $interim = '') {
    if (is_array($aliases)) {
        foreach ($aliases as $key => $value) {
            $interim .= (is_int($key)) ? script($value, $attributes, $interim) : script($key, $value, $interim);
        }
        return $interim;
    }
    $jsAliases = app('config')->get('extend.webAssets.jsAliases');
    $url = isset($jsAliases[$aliases]) ? $jsAliases[$aliases] : $aliases;
    return app('html')->script($url, $attributes);
}

/**
 * 脚本别名加载（补充）用于 js 的 document.write(）中
 *
 * @param  string $aliases 配置文件中的别名
 * @param  array  $attributes 标签中需要加入的其它参数的数组
 *
 * @return string
 */
function or_script($aliases, $attributes = array()) {
    $jsAliases = app('config')->get('extend.webAssets.jsAliases');
    $url = isset($jsAliases[$aliases]) ? $jsAliases[$aliases] : $aliases;
    $attributes['src'] = URL::asset($url);
    return "'<script" . app('html')->attributes($attributes) . ">'+'<'+'/script>'";
}

/*
|--------------------------------------------------------------------------
| 自定义核心函数
|--------------------------------------------------------------------------
|
*/

/**
 * 批量定义常量
 *
 * @param  array $define 常量和值的数组
 *
 * @return void
 */
function define_array($define = array()) {
    foreach ($define as $key => $value)
        defined($key) OR define($key, $value);
}

/**
 * 友好的日期输出
 *
 * @param  string Carbon $theDate 待处理的时间字符串
 *
 * @return string                         友好的时间字符串
 */
function friendly_date($theDate) {
    // 获取待处理的日期对象
    if (!$theDate instanceof \Carbon\Carbon)
        $theDate = \Carbon\Carbon::createFromTimestamp(strtotime($theDate));
    // 取得英文日期描述
    $friendlyDateString = $theDate->diffForHumans(\Carbon\Carbon::now());
    // 本地化
    $friendlyDateArray = explode(' ', $friendlyDateString);
    $friendlyDateString = $friendlyDateArray[0]
        . Lang::get('friendlyDate.' . $friendlyDateArray[1])
        . Lang::get('friendlyDate.' . $friendlyDateArray[2]);
    // 数据返回
    return $friendlyDateString;
}

/**
 * 拓展分页输出，支持临时指定分页模板
 *
 * @param  Illuminate\Pagination\Paginator $paginator 分页查询结果的最终实例
 * @param  string                          $viewName 分页视图名称
 *
 * @return \Illuminate\View\View
 */
function pagination($paginator, $viewName = null) {
    $viewName = $viewName ?: app('config')->get('view.pagination');
    $paginator->getEnvironment()->setViewName($viewName);
    return $paginator->links();
}

/**
 * 反引用一个经过 e（htmlentities）和 addslashes 处理的字符串
 *
 * @param  string $string 待处理的字符串
 *
 * @return 转义后的字符串
 */
function strip($string) {
    return stripslashes(app('html')->decode($string));
}


/*
|--------------------------------------------------------------------------
| 公共函数库
|--------------------------------------------------------------------------
|
*/

/**
 * 闭合 HTML 标签 （此函数仍存在缺陷，无法处理不完整的标签，暂无更优方案，慎用）
 *
 * @param  string $html HTML 字符串
 *
 * @return string
 */
function close_tags($html) {
    // 不需要补全的标签
    $arr_single_tags = array('meta', 'img', 'br', 'link', 'area');
    // 匹配开始标签
    preg_match_all('#<([a-z1-6]+)(?: .*)?(?<![/|/ ])>#iU', $html, $result);
    $openedtags = $result[1];
    // 匹配关闭标签
    preg_match_all('#</([a-z]+)>#iU', $html, $result);
    $closedtags = $result[1];
    // 计算关闭开启标签数量，如果相同就返回html数据
    if (count($closedtags) === count($openedtags)) return $html;
    // 反向排序数组，将最后一个开启的标签放在最前面
    $openedtags = array_reverse($openedtags);
    // 遍历开启标签数组
    foreach ($openedtags as $key => $value) {
        // 跳过无需闭合的标签
        if (in_array($value, $arr_single_tags)) continue;
        // 开始补全
        if (in_array($value, $closedtags)) {
            unset($closedtags[array_search($value, $closedtags)]);
        } else {
            $html .= '</' . $value . '>';
        }
    }
    return $html;
}

/**
 *创建父节点树形数组
 * 参数 $ar 数组，邻接列表方式组织的数据 $id 数组中作为主键的下标或关联键名 $pid 数组中作为父键的下标或关联键名
 * 返回 多维数组
 **/
function find_parent($ar, $id = 'id', $pid = 'pid') {
    foreach ($ar as $v)
        $t [$v [$id]] = $v;
    foreach ($t as $k => $item) {
        if ($item [$pid]) {
            if (!isset ($t [$item [$pid]] ['parent'] [$item [$pid]]))
                $t [$item [$id]] ['parent'] [$item [$pid]] = &$t [$item [$pid]];
        }
    }

    return $t;
}

/**
 * * 创建子节点树形数组 * 参数 * $ar 数组，邻接列表方式组织的数据 * $id 数组中作为主键的下标或关联键名 * $pid
 * 数组中作为父键的下标或关联键名 * 返回 多维数组 *
 */
function find_child($ar, $id = 'id', $pid = 'pid') {
    foreach ($ar as $v)
        $t [$v [$id]] = $v;
    foreach ($t as $k => $item) {
        if ($item [$pid]) {
            $t [$item [$pid]] ['child'] [$item [$id]] = &$t [$k];
        }
    }

    return $t;
}

/**
 * 翻译
 *
 * @param string $key
 * @param array  $replace
 * @param int    $uc_type 1: 首字母大写； 2：全部单词首字母大写；3：先将slug格式转换为自然语言格式，再全部单词首字母大写
 * @param string $locale 语言代码
 *
 * @return string
 */
function ___($key, $replace = array(), $uc_type = 1, $locale = null) {
    !empty($replace) or $replace = [];
    $aKeyParts = explode('.', $key);
    if (count($aKeyParts) > 1) {
        list($sFile, $sKey) = $aKeyParts;
    } else {
        $sFile = '_basic';
        $sKey = $aKeyParts[0];
        $key = $sFile . '.' . $sKey;
    }
    $key = strtolower($key);
    $str = Lang::get($key, $replace, $locale);
    $str != $key or $str = MyString::humenlize($sKey);
    if ($uc_type > 0) {
        switch ($uc_type) {
            case 1:
                $str = ucfirst($str);
                break;
            case 2:
                $str = ucwords($str);
                break;
            case 3:
                $str = MyString::humenlize($str);
                $str = ucwords($str);
        }

    }
    return $str;
}

function yes_no($val) {
    return __((boolean)$val ? 'Yes' : 'No');
}

function pr($val) {
    $bCli = php_sapi_name() == 'cli';
    $prefix = $bCli ? "\n" : '<pre>';
    $suffix = $bCli ? "\n" : '</pre>';
    if (app('config')->get('app.debug')) {
        echo $prefix;
        print_r($val);
        echo $suffix;
    }
}

function useclass() {
    $args = func_get_args();
    foreach ($args as $file) {
        require_once(app_path() . '/lib/' . $file . '.php');
    }
}

function trimArray($array) {
    $data = [];
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $data[$key] = trimArray($value);
        } else {
            $data[$key] = trim($value);
        }
    }
    return $data;
}

function objectToArray($d) {
    if (is_object($d)) {
        $d = get_object_vars($d);
    }
    if (is_array($d)) {
        return array_map(__FUNCTION__, $d);
    } else {
        return $d;
    }
}

function arrayToObject($array) {
    if (!is_array($array)) {
        return $array;
    }

    $object = new stdClass();
    if (is_array($array) && count($array) > 0) {
        foreach ($array as $name => $value) {
            $name = strtolower(trim($name));
            // pr(!empty($name));exit;
            if (isset($name)) {
                $object->$name = arrayToObject($value);
            }
        }
        return $object;
    } else {
        return FALSE;
    }
}

function formatNumber($number, $decimal = 4) {
    $number = str_replace(',', '', $number);
    return number_format($number, $decimal, '.', '');
}

function mapToArray($aObject, $sValueName = 'name') {
    $aArr = [];
    foreach ($aObject as $key => $oObject) {
        $aArr[$oObject->id] = $oObject->{$sValueName};
    }
    return $aArr;
}

/**
 * 获取当前日期前的n天的数组
 *
 * @param int $n
 *
 * @return array
 */
function getDatesArrBeforeNow($n = 15) {
    $aDates = [];
    for ($i = 0; $i < $n; $i++) {
        $aDates[] = date('Y-m-d', strtotime('-' . $i . 'day'));
    }
    return $aDates;
}

/**
 * 生成流水号
 *
 * @param string $sPre
 *
 * @return string
 */
function generateSerialNumber($sPre = '') {
    $sSerialNumber = rand(1000, 9999).
        strtoupper(dechex(date('m'))) . date('d') .
        substr(time(), -5) . substr(microtime(), 2, 6) . sprintf('%02d', rand(0, 99));
    return $sPre . $sSerialNumber;
}

/**
 * 组合公式算法
 *
 * @param        $arr
 * @param int    $len
 * @param        $res
 * @param string $str
 */
function combination($arr, $len = 0, &$res, $str = '') {
    $arr_len = count($arr);
    if ($len == 0) {
        $res[] = explode(',', $str);
    } else {
        for ($i = 0; $i < $arr_len - $len + 1; $i++) {
            $tmp = array_shift($arr);
            combination($arr, $len - 1, $res, ($str ? $str . ',' . $tmp : $tmp));
        }
    }
}

/**
 * 排列公式算法
 *
 * @param        $arr
 * @param int    $len
 * @param        $res
 * @param string $str
 */
function arrangement($arr, $len = 0, & $res, $str = '') {
    $arr_len = count($arr);
    if ($len == 0) {
        $res[] = explode(',', $str);
    } else {
        for ($i = 0; $i < $arr_len; $i++) {
            $tmp = array_shift($arr);
            arrangement($arr, $len - 1, $res, ($str ? $str . ',' . $tmp : $tmp));
            array_push($arr, $tmp);
        }
    }
}

/**
 * 笛卡尔积算法
 *
 * @return array|mixed
 */
function descartes() {
    $t = func_get_args();
    if (func_num_args() == 1) return call_user_func_array(__FUNCTION__, $t[0]);
    $a = array_shift($t);
    if (!is_array($a)) $a = [$a];
    $a = array_chunk($a, 1);
    do {
        $r = [];
        $b = array_shift($t);
        if (!is_array($b)) $b = [$b];
        foreach ($a as $p)
            foreach (array_chunk($b, 1) as $q)
                $r[] = array_merge($p, $q);
        $a = $r;
    } while ($t);
    return $r;
}

/**
 * 更精确的计数保留(四舍六入五成双)
 *
 * @param $fNumber 需要舍掉的数字
 * @param $iPrec  小数位数
 *
 * @return float|int
 */

if (!function_exists('exactRound')) {
    function exactRound($fNumber, $iPrec) {
        $pow = pow(10, $iPrec);

        //舍去位为5 && 舍去位后无数字 && 舍去位前一位是偶数,不进一
        if ((floor($fNumber * $pow * 10) % 5 == 0) && (floor($fNumber * $pow * 10) == $fNumber * $pow * 10) && (floor($fNumber * $pow) % 2 == 0)) {
            return floor($fNumber * $pow) / $pow;
        } else {//四舍五入
            return round($fNumber, $iPrec);
        }
    }
}

function getShortClassName($object) {
    $sFullName = get_class($object);
    return substr($sFullName, strrpos($sFullName, '\\') + 1);
}

function generateComplexDataCacheKey($key) {
    return Config::get('cache.prefix') . $key;
}

/**
 * 基础选项
 * (根据用户当前语言翻译)
 *
 * @param $key config参数
 * return array|string base配置文件的值
 */
function baseOption($key){
    if(!session('admin_language')) return [];
    if(session('admin_language') == 'zh-CN')
        return config($key)??config('en_'.$key);
    else
        return config('en_'.$key)??config($key);
}

if(!function_exists('dda')){
    /**
     * @param $object
     */
    function dda($object){
        if(method_exists($object,'toArray'))
            dd($object->toArray());
        else
            dd($object);
    }
}