<?php

namespace App\Http\Controllers;

// Frame
use App\Models\Merchant;
use App\Models\UserManageLogs;
use Illuminate\Support\Str;
use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;

// Model
use App\Models\Popup;
use App\Models\AdminLog;
use App\Models\PopupItem;
use App\Models\AdminUser;
use App\Models\AdminRole;
use App\Models\Functionality;
use App\Models\FunctionalityParam;
use App\Models\FunctionalityRelation;
use App\Models\SearchConfig;
use App\Models\SysConfig;

// Facades
use DB;
use Tool;
use Input;
use Lang;
use Carbon;
use Config;
use Route;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

// Custom
use FormHelper;

// Event
use Event;
use App\Events\BaseCacheEvent;


abstract class AdminBaseController extends Controller {
    static $aRediredtFullUrlActions = ['encode', 'index', 'settings', 'listSearchConfig'];

    /**
     * 需要加载的错误码定义文件
     * @var array
     */
    protected $errorFiles = [];
    protected $resourceView = 'default';
    protected $customViewPath = '';
    protected $view = '';
    protected $customViews = [];

    /**
     * 资源模型名称
     * @var string
     */
    protected $modelName;

    /**
     * friendly model
     * @var string
     */
    protected $friendlyModelName;

    /**
     * 模型实例
     * @var Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Resource , use for route
     */
    protected $resource;

    protected $request;
    /**
     * 资源数据库表
     * @var string
     */
    protected $resourceTable = '';

    /**
     * 资源名称
     * @var string
     */
    protected $resourceName = '';

    /**
     * pagesize
     * @var int
     */
    protected static $pagesize = 20;

    /**
     * 须自动准备数据的视图名称
     * @var array
     */
    protected $composerViews = array(
        'view',
        'index',
        'create',
        'edit',
    );

    /**
     * Functionality Model
     * @var Functionality
     */
    protected $functionality = null;

    /**
     * 用于关联按钮的语言包键数组
     * @var array
     */
    protected $langKeysForButtons = [];
    /**
     * 视图使用的样式名
     * @var array
     */
    public $viewClasses = [
        'div' => 'form-group ',
        'label' => 'col-sm-3 control-label ',
        'input_div' => 'col-sm-5 ',
        'msg_div' => 'col-sm-4 ',
        'msg_label' => 'text-danger control-label ',
        'radio_div' => 'switch ',
        'select' => 'form-control ',
        'input' => 'form-control ',
        'radio' => 'boot-checkbox',
        'date' => 'input-group date form_date ',
    ];

    /**
     * 自定义验证消息
     * @var array
     */
    protected $validatorMessages = [];

    /**
     * 消息对象
     * @var Illuminate\Support\MessageBag
     */
    protected $messages = null;

    /**
     * Controller
     */
    protected $controller;

    /**
     * Action
     */
    protected $action;

    /**
     * var for views
     */
    protected $viewVars = [];

    /**
     * sysConfig model
     * @var sysConfig
     */
    protected $sysConfig;

    /**
     * search config
     * @var array
     */
    protected $searchConfig;

    /**
     * search fields
     * @var array
     */
    protected $searchItems = [];

    /**
     * param settings
     * @var array
     */
    protected $paramSettings;

    /**
     * use for redirect
     * @var string
     */
    protected $redictKey;

    /**
     * save the all input data: get,post
     * @var array
     */
    protected $params = [];

    /**
     * Widgets
     * @var array
     */
    protected $widgets = [];

    /**
     * Breadcrumb
     * @var array
     */
    protected $breadcrumbs = [];

    /**
     * for lang transfer
     * @var array
     */
    protected $langVars = [];

    /**
     * for lang transfer, short title
     * @var array
     */
    protected $langShortVars = [];

    /**
     * default lang file
     */
    protected $defaultLangPack;

    /**
     * if is admininistrator
     */
    protected $admin;

    protected $isSystemAdmin = false;
    protected $aAvailableRealm = [];
    protected $userinfo;
    protected $onlinekf_list;


    /**
     * Client IP
     * @var string
     */
    protected $clientIP;

    /**
     * Proxy IP
     * @var string
     */
    protected $proxyIP;

    /**
     * Need Right Check
     * @var bool
     */
    protected $needRightCheck = true;

    /**
     * 当前用户可访问的功能ID列表
     * @var array
     */
    protected $hasRights = [];

    /**
     * 不进行权限检查的控制器列表
     * @var array
     */
    protected $openControllers = ['AuthController', 'HomeController', 'ClientAPIController'];

    /**
     * 初始化
     *
     * AdminBaseController constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request) {

        // CSRF 保护
        $this->request = $request;
        $this->isAjax = $request->ajax();

        //验证是否登录
        if (!Auth::check()) {
            return $this->doNotLogin();
        }

        if (SysConfig::check('sys_use_sql_log', true)) {
            DB::enableQueryLog();
        }
        $this->initCA() or abort(404);
        $this->params = trimArray($this->request->except('_token'));

        // 设置功能配置信息
        $this->setFunctionality();
        if (!in_array($this->controller, $this->openControllers)) {
            $this->functionality or abort(404);
            $this->checkRight() or abort(403);
        }

        // 实例化 消息对象
        $this->messages = new MessageBag;
        $this->setReirectKey();
        if ($request->isMethod('GET') && in_array($this->action, static::$aRediredtFullUrlActions)) {
            $request->session()->put($this->redictKey, $request->fullUrl());
        }

        // language
        $sLanguage = $request->session()->get('language', 'zh-CN');
        app()->setLocale($sLanguage);

        // 实例化资源模型
        $this->initModel();
        $this->compileResourceName();


        $this->clientIP = $request->ip();
        $this->proxyIP = $_SERVER['REMOTE_ADDR'];

    }

    /**
     * 初始化controller　action属性
     * @return boolean
     */
    protected function initCA() {
        if (!$ca = Route::currentRouteAction()) {
            return false;
        }
        $aCAs = explode('@', $ca);
        $iPos = strripos($aCAs[0], '\\') - strlen($aCAs[0]) + 1;
        $sController = substr($aCAs[0], $iPos);
        list($this->controller, $this->action) = [$sController, $aCAs[1]];
        return true;
    }


    /**
     * 如果未登录时执行的动作
     * @return type
     */
    protected function doNotLogin() {
        if ($this->isAjax) {
            //TODO AJAX请求处理
            die;
        } else {
            return redirect()->route('login');
        }
    }

    protected function setFunctionality() {
        $this->functionality = Functionality::getByCA($this->controller, $this->action, $this->aAvailableRealm);
    }

    protected function setReirectKey() {
        $this->redictKey = 'curPage-' . $this->modelName;
    }

    /**
     * [checkRight 检查当前用户是否有权限访问当前功能]
     * @return [Boolean] [可否访问]
     */
    protected function checkRight() {
        if (!$this->functionality || $this->functionality->disabled) {
            return false;
        }

        $this->paramSettings = FunctionalityParam::getParams($this->functionality->id);
        if ($this->functionality->need_search) {
            $this->getSearchConfig();
            $this->setSearchInfo();
        }
        if (!isset($enabled)) {
            $this->blockedFuncs = &$this->getBlockedFuncs();
            if ($enabled = !in_array($this->functionality->id, $this->blockedFuncs)) {
                $this->hasRights = &$this->getUserRights();
                $enabled = in_array($this->functionality->id, $this->hasRights);
            }

        }

        return $enabled;
    }

    /**
     * [initModel 初始化模型实例及语言包等]
     * @return [Void] [description]
     */
    protected function initModel() {
        if ($sModelName = $this->modelName) {
            $this->resourceName = ___('_model.' . $sModelName::$resourceName);
//            pr($this->resourceName);
            $this->model = app()->make($sModelName);
            $this->resourceTable = $this->model->getTable();
            $this->friendlyModelName = Str::slug($sModelName);
            $this->langVars = ['resource' => ___('_model.' . Str::slug($sModelName::$resourceName))];
            $this->langShortVars = ['resource' => null];
            $this->defaultLangPack = $sModelName::comaileLangPack();
        }
    }

    protected function & getBlockedFuncs() {
        $aBlockedFuncIds = [];
        return $aBlockedFuncIds;
    }

    protected function setSearchInfo() {
        $bNeedCalendar = SearchConfig::makeSearhFormInfo($this->searchItems, $this->params, $aSearchFields);
        $this->setVars(compact('aSearchFields', 'bNeedCalendar'));
        $this->setVars('aSearchConfig', $this->searchConfig);
        $this->addWidget('w.search');
    }

    /**
     * get search config
     */
    protected function getSearchConfig() {
        if ($this->searchConfig = SearchConfig::getForm($this->functionality->id)) {
            $this->searchItems = &$this->searchConfig->getItems();
        }
        $this->setMerchantConfig();
    }

    /**
     * 设置商户的搜索配置
     * @return bool
     */
    protected function setMerchantConfig(){
        $sModelName = $this->modelName;
        if(!$sModelName::$merchantColumn){
            return false;
        }
        $searchItems = [];
        $searchItems["model"] = $sModelName::$resourceName;
        $searchItems["field"] = $sModelName::$merchantColumn;
        $searchItems["label"] = $sModelName::$merchantColumn;
        $searchItems["type"] = "select";
        $searchItems["default_value"] = "";
        $searchItems["source"] = '$aMerchantIds';
        $searchItems["div"] = "0";
        $searchItems["empty"] = "0";
        $searchItems["empty_text"] = "";
        $searchItems["match_rule"] = '$model.$field = $$field';
        $searchItems["sequence"] = "0";
        $this->searchItems = array_merge([$sModelName::$merchantColumn=>$searchItems],$this->searchItems);

        $paramSettings = [];
        $paramSettings["name"] = $sModelName::$resourceName;
        $paramSettings["type"] = "int";
        $paramSettings["default_value"] = "";
        $paramSettings["limit_when_null"] = "0";
        $paramSettings["sequence"] = "0";
        $this->paramSettings = array_merge([$sModelName::$merchantColumn=>$paramSettings],$this->paramSettings);
    }

    /**
     * 生成面包屑导航
     * @return array
     */
    protected function _getBreadcrumb() {
        return [];
    }

    /**
     * [compileRenderVars 将视图配置数组和字段配置数组分别整合成两个数组]
     * @return [Void]
     */
    protected function compileRenderVars() {
        $aArrayVars = [];
        if ($this->model) {
            foreach ($this->model->columnSettings as $sColumn => $aSettings) {
                if (isset($aSettings['type']) && $aSettings['type'] == 'select') {
                    $aArrayVars[$aSettings['options']] = &$this->viewVars[$aSettings['options']];
                }
            }
            $this->setVars(compact('aArrayVars'));
        }
        $aViewSettingVars = [
            'aClassGradeFields',
            'aColumnSettings',
            'aFloatDisplayFields',
            'aListColumnMaps',
            'aNumberColumns',
            'aOriginalNumberColumns',
            'aTotalColumns',
            'aTotalColumnMaps',
            'aViewColumnMaps',
            'aWeightFields',
            'iDefaultAccuracy',
            'sLangPrev',
        ];
        $aViewSettings = [];
        foreach ($aViewSettingVars as $sVarName) {
            if (isset($this->viewVars[$sVarName])) {
                $aViewSettings[$sVarName] = &$this->viewVars[$sVarName];
            }
        }
        $this->setVars(compact('aViewSettings'));
    }


    protected function setVars($sKey, $mValue = null) {
        if (is_array($sKey)) {
            foreach ($sKey as $key => $value) {
                $this->setVars($key, $value);
            }
        } else {
            $this->viewVars[$sKey] = $mValue;
        }
    }

    protected function addWidget($sWidget) {
        $this->widgets[] = $sWidget;
    }

    protected function beforeRender() {
        $this->setVars($this->params);
        $this->setVars('aParams', $this->params);
        $resource = $this->resource;
        $resourceName = $this->resourceName;
        $breadcrumb = $this->_getBreadcrumb();
        if ($sModelName = &$this->modelName) {
            $bTreeable = $sModelName::$treeable;
        }
        $this->setVars(compact('resource', 'resourceName', 'breadcrumb', 'bTreeable'));

        $oFormHelper = new FormHelper;
        $bEdit = in_array($this->action, ['edit', 'create']);
        if ($this->model) {
            !empty($this->model->columnSettings) or $this->model->makeColumnConfigures($bEdit);
            $oFormHelper->setModel($this->model);
            $this->setVars('aColumnSettings', $this->model->columnSettings);
        }
        $sLangKey = '_basic.';
        switch ($this->action) {
            case 'index':
                $sLangKey .= 'management';
                if ($sModelName) {
                    $this->setVars('aColumnForList', $sModelName::$columnForList);
                    $this->setVars('sModelSingle', ___('_model.' . $this->friendlyModelName));
                    $this->setVars('bSequencable', $sModelName::$sequencable);
                    $this->setVars('bCheckboxForBatch', $sModelName::$enabledBatchAction);
                    if ($sModelName::$sequencable) {
                        $sSetOrderRoute = $this->resource . '.set-order';
                        $this->setvars(compact('sSetOrderRoute'));
                    }
                    $this->setVars('aListColumnMaps', $sModelName::$listColumnMaps);
                    $this->setVars('aNoOrderByColumns', $sModelName::$noOrderByColumns);
                    if ($sModelName::$totalColumns) {
                        $this->setVars('aTotalColumns', $sModelName::$totalColumns);
                    }
                }
                // pr($this->viewVars['datas'])
                $sDataUpdatedTime = $this->viewVars['datas']->count() ? $this->viewVars['datas'][0]->updated_at : Carbon::now()->toDateTimeString();
                $this->setVars(compact('sDataUpdatedTime'));
                break;
            case 'create':
                $sLangKey .= 'create';
                if ($sModelName) {
                    $this->setVars('aOriginalColumns', $sModelName::$originalColumns);
                }
                $this->setVars(compact('oFormHelper'));
                break;
            case 'view':
                if ($sModelName) {
                    $this->setVars('aViewColumnMaps', $sModelName::$viewColumnMaps);
                }
            default:
                $sLangKey = '_function.' . strtolower($this->functionality->title);
                break;
        }
        $sAction = Lang::get($sLangKey, $this->langVars);
        $oFormHelper->setClass($this->viewClasses);
        $oFormHelper->setLangPrev($this->defaultLangPack . '.');
        // set the form helper
        $this->setVars(compact('oFormHelper'));
        // addWidget
        $this->setVars('aWidgets', $this->widgets);
        $this->setVars('sLangKey', $sLangKey);
        isset($this->viewVars['bNeedCalendar']) or $this->viewVars['bNeedCalendar'] = false;

        $sPageTitle = $sTitle = ___('_function.' . $this->functionality->title, null, 3);
        if ($sAction != $sPageTitle) {
            $sPageTitle .= ' - ' . $sAction;
        }
        if ($sTitlePrev = env('APP_ENV')) {
            $sPageTitle = $sTitlePrev . '-' . $sPageTitle;
        }
        $this->setVars(compact('sPageTitle', 'sModelName', 'sTitle'));
        $this->setvars('sLangPrev', $this->defaultLangPack . '.');
        $this->setvars('aLangVars', $this->langVars);
        if ($sModelName) {
            $this->setVars('aNumberColumns', $sModelName::$htmlNumberColumns);
            $this->setVars('aOriginalNumberColumns', $sModelName::$htmlOriginalNumberColumns);
            $this->setVars('iDefaultAccuracy', $sModelName::$amountAccuracy);
        }
        if ($this->functionality->refresh_cycle && $this->functionality->refresh_cycle > 0) {
            $this->setVars('iRefreshTime', $this->functionality->refresh_cycle);
        }

        // Admin Before Render
        if ($this->modelName) {
            $sModelName = $this->modelName;
            $this->setVars('aWeightFields', $sModelName::$weightFields);
            $this->setVars('aClassGradeFields', $sModelName::$classGradeFields);
            $this->setVars('aFloatDisplayFields', $sModelName::$floatDisplayFields);
            $this->setVars('aTotalRateColumns', $sModelName::$totalRateColumns);
            //如果有商户，传递商户的数组
            if(in_array('aMerchantIds',$sModelName::$htmlSelectColumns)){
                $this->setVars('aMerchantIds',Merchant::getSelectSearchArrays());
            }
        }
        $buttons = &$this->_getButtons();
        $this->setVars(compact('buttons'));
        $this->setVars('aLangKeysForButtons', $this->langKeysForButtons);


        $KF_All = Redis::hgetall("KF");
        $onlinekf_list = array();
        foreach ($KF_All as $k => $v) {
            $kfinfo = json_decode($v);

            $platform_d = DB::select("SELECT
                           `name`
                            FROM
                            sys_platform where id in(" . $kfinfo->platform . ")");
            $pl = "";
            foreach ($platform_d as $k1 => $v1) {
                $pl .= $v1->name . ",";
            }
            $kfinfos = array(
                "status" => $kfinfo->status,
                "User" => $kfinfo->User,
                "Userid" => $kfinfo->Userid,
                "sysid" => $kfinfo->sysid,
                "platform" => $kfinfo->platform,
                "Onlinestatus" => $kfinfo->Onlinestatus,
                "maxrevice" => $kfinfo->maxrevice,
                "name" => $kfinfo->name,
                "TIMESTAMP" => $kfinfo->TIMESTAMP,
                "userimg" => $kfinfo->userimg,
                "Monitor" => $kfinfo->Monitor,
                "platname" => $pl,
                "channle" => $kfinfo->channle,
            );
            $onlinekf_list[$k] = $kfinfos;
        }
        $this->setVars(compact('onlinekf_list'));
    }

    protected function render() {
        $this->beforeRender();
        $this->compileRenderVars();
        if (!$this->view) {
            if (in_array($this->action, $this->customViews) && $this->customViewPath) {
                $this->resourceView = $this->customViewPath;
            }
            $this->view = $this->resourceView . '.' . $this->action;
        }
        //dd($this->view,$this->viewVars);

        return view($this->view)->with($this->viewVars);
    }

    /**
     * [index 列表查询]
     * @return [Response]
     */
    public function index() {
        $oQuery = $this->indexQuery();
        $sModelName = $this->modelName;
        $iPageSize = isset($this->params['pagesize']) && is_numeric($this->params['pagesize']) ? $this->params['pagesize'] : static::$pagesize;
        $datas = $oQuery->paginate($iPageSize);//dd(\DB::getQueryLog(),$datas);


        $this->setVars(compact('datas'));
        if ($sMainParamName = $sModelName::$mainParamColumn) {
            if (isset($aConditions[$sMainParamName])) {
                $$sMainParamName = is_array($aConditions[$sMainParamName][1]) ? $aConditions[$sMainParamName][1][0] : $aConditions[$sMainParamName][1];
            } else {
                $$sMainParamName = null;
            }
            $this->setVars(compact($sMainParamName));
        }
        return $this->render();
    }

    protected function compileParams() {

    }

    public function indexQuery() {
        $aParams = $this->params;
        $this->compileParams();
        $aConditions = &$this->makeSearchConditions();
        $oQuery = $this->model->doWhere($aConditions);//$aConditions ? $this->model->doWhere($aConditions) : $this->model; //dd($aParams,$aConditions);
        $bWithTrashed = trim($this->request->input('_withTrashed', 0));
        if ($bWithTrashed)
            $oQuery = $oQuery->withTrashed();
        if ($sGroupByColumn = $this->request->input('group_by')) {
            $oQuery = $this->model->doGroupBy($oQuery, [$sGroupByColumn]);
        }
        // 获取排序条件
        $aOrderSet = [];
        if ($sOorderColumn = $this->request->input('sort_up', $this->request->input('sort_down'))) {
            $sDirection = $this->request->input('sort_up') ? 'asc' : 'desc';
            $aOrderSet[$sOorderColumn] = $sDirection;
        }
        $oQuery = $this->model->doOrderBy($oQuery, $aOrderSet);
        $oQuery = $this->customSearchConditions($oQuery,$aParams);
        return $oQuery;
    }


    protected function & makeSearchConditions() {
        $aConditions = [];
        $iCount = count($this->params);
        foreach ($this->paramSettings as $sColumn => $aParam) {
            if (!isset($this->params[$sColumn])) {
                if ($aParam['limit_when_null'] && $iCount <= 1) {
                    $aFieldInfo[1] = null;
                } else {
                    continue;
                }
            }
            $mValue = isset($this->params[$sColumn]) ? $this->params[$sColumn] : null;
            if (!mb_strlen($mValue) && !$aParam['limit_when_null'])
                continue;
            if (!isset($this->searchItems[$sColumn])) {
                $aConditions[$sColumn] = ['=', $mValue];
                continue;
            }
            $aPattSearch = ['!\$model!', '!\$\$field!', '!\$field!'];
            $aItemConfig = &$this->searchItems[$sColumn];
            $aPattReplace = [$aItemConfig['model'], $mValue, $aItemConfig['field']];
            $sMatchRule = preg_replace($aPattSearch, $aPattReplace, $aItemConfig['match_rule']);
            $aMatchRule = explode("\n", $sMatchRule);
            if (count($aMatchRule) > 1) {        // OR
                // todo : or
            } else {
                $aFieldInfo = array_map('trim', explode(' = ', $aMatchRule[0]));
                $aTmp = explode(' ', $aFieldInfo[0]);
                $iOperator = (count($aTmp) > 1) ? $aTmp[1] : '=';
                if (!mb_strlen($mValue) && $aParam['limit_when_null']) {
                    $aFieldInfo[1] = null;
                }
                list($tmp, $sField) = explode('.', $aTmp[0]);
                $sField{0} == '$' or $sColumn = $sField;
                if (isset($aConditions[$sColumn])) {
                    // TODO 原来的方式from/to的值和search_items表中的记录的顺序强关联, 考虑修改为自动从小到大排序的[from, to]数组
                    $arr = [$aConditions[$sColumn][1], $aFieldInfo[1]];
                    sort($arr);
                    $aConditions[$sColumn] = ['between', $arr];
                } else {
                    $aConditions[$sColumn] = [$iOperator, $aFieldInfo[1]];
                }
            }
        }
        return $aConditions;
    }

    /**
     * [create 新增记录]
     *
     * @param  [Integer] $id [要新增记录所属的父记录id]
     *
     * @return [Response]
     */
    public function create($id = null) {
        if ($this->request->isMethod('POST')) {
            DB::connection()->beginTransaction();
            if ($bSucc = $this->saveData($id) && $this->afterCreate($id)) {
                DB::connection()->commit();
                Event::fire(new BaseCacheEvent($this->model));
                return $this->goBackToIndex('success', ___('_basic.created', $this->langVars));
            } else {
                DB::connection()->rollback();
                $this->langVars['reason'] = &$this->model->getValidationErrorString();
                return $this->goBack('error', ___('_basic.create-fail', $this->langVars));
            }
        } else {
            $data = $this->model;
            $isEdit = false;
            $this->setVars(compact('data', 'isEdit'));
            $sModelName = $this->modelName;
            list($sFirstParamName, $tmp) = each($this->paramSettings);
            !isset($sFirstParamName) or $this->setVars($sFirstParamName, $id);
            $aInitAttributes = isset($sFirstParamName) ? [$sFirstParamName => $id] : [];
            $this->setVars(compact('aInitAttributes'));

            return $this->render();
        }
    }

    /**
     * 编辑
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $this->model = $this->model->find($id);
        if (!is_object($this->model)) {
            return $this->goBackToIndex('error', ___('_basic.missing', $this->langVars));
        }
        if ($this->request->isMethod('PUT')) {
            DB::connection()->beginTransaction();
            if ($bSucc = $this->saveData($id) && $this->afterEdit($id)) {
                DB::connection()->commit();
                return $this->goBackToIndex('success', ___('_basic.updated', $this->langVars));
            } else {
                DB::connection()->rollback();
                $this->langVars['reason'] = &$this->model->getValidationErrorString();
                return $this->goBack('error', ___('_basic.update-fail', $this->langVars));
            }
        } else {
            $parent_id = $this->model->parent_id;
            $data = $this->model;
            $isEdit = true;
            $this->setVars(compact('data', 'parent_id', 'isEdit', 'id'));
            return $this->render();
        }
    }

    /**
     * view model
     *
     * @param int $id
     *
     * @return bool
     */
    public function view($id) {
        dd($id);
        $this->model = $this->model->find($id);
        if (!is_object($this->model)) {
            return $this->goBackToIndex('error', ___('_basic.missing', $this->langVars));
        }
        $data = $this->model;
        $sModelName = $this->modelName;
        if ($sModelName::$treeable) {
            if ($this->model->parent_id) {
                if (!array_key_exists('parent', $this->model->getAttributes())) {
                    $sParentTitle = $sModelName::find($this->model->parent_id)->{$sModelName::$titleColumn};
                } else {
                    $sParentTitle = $this->model->parent;
                }
            } else {
                $sParentTitle = '(' . ___('_basic.top_level', [], 3) . ')';
            }
        }
        $this->setVars(compact('data', 'sParentTitle'));
        return $this->render();
    }


    /**
     * [destroy 删除]
     *
     * @param  [Integer] $id [记录id]
     *
     * @return [Response]
     */
    public function destroy($id = null) {
        // pr($id);exit;
        if (empty($id) && !isset($this->params['id'])) {
            return $this->goBackToIndex('error', ___('_basic.param-error', $this->langVars));
        }
        $id or $id = $this->params['id'];
        $aIds = explode(',', $id);
        $sModelName = $this->modelName;
        $bSucc = false;
        DB::connection()->beginTransaction();
        foreach ($aIds as $id) {
            $model = $sModelName::find($id);
            if (empty($model)) {
                break;
            }
            if ($sModelName::$treeable) {
                if ($iSubCount = $model->where('parent_id', '=', $model->id)->count()) {
                    $this->langVars['reason'] = ___('_basic.not-leaf', $this->langVars);
                    return redirect()->back()->with('error', ___('_basic.delete-fail', $this->langVars));
                }
            }
            if (!$bSucc = $model->delete() && $this->afterDestroy($model)) {
                break;
            }
        }
        $bSucc ? DB::connection()->commit() : DB::connection()->rollback();
        $sLangKey = '_basic.' . ($bSucc ? 'deleted.' : 'delete-fail.');
        $sType = $bSucc ? 'success' : 'error';
        // pr($sType);exit;
        return $this->goBackToIndex($sType, ___($sLangKey, $this->langVars));
    }

    public function setOrder() {
        if (!$this->request->isMethod('POST')) {
            return $this->goBack('error', ___('_basic.method-error'));
        }
        if (!isset($this->params['sequence']) || !is_array($this->params['sequence'])) {
            return $this->goBack('error', ___('_basic.data-error'));
        }
        $sModelName = $this->modelName;
        DB::connection()->beginTransaction();
        $bSucc = true;
        foreach ($this->params['sequence'] as $id => $sequence) {
            $oModel = $sModelName::find($id);
            if ($oModel->sequence == $sequence) {
                continue;
            }
            $oModel->sequence = $sequence;
            if (!$bSucc = $oModel->save(['sequence' => 'numeric'])) {
                break;
            }
        }
        if ($bSucc) {
            DB::connection()->commit();

            $sInfoType = 'success';
            $sLangKey = '_basic.ordered';
        } else {
            DB::connection()->rollback();
            $sInfoType = 'error';
            $sLangKey = '_basic.order-fail';
        }
        return $this->goBack($sInfoType, ___($sLangKey));
    }

    protected function afterDestroy($model) {
        return true;
    }

    protected function afterEdit($id) {
        return true;
    }

    protected function afterCreate($id) {
        return true;
    }

    /**
     * save data to database
     * auto redirect
     * @return bool
     */
    protected function saveData() {
        // 用表单数据填充模型实例
        $this->_fillModelDataFromInput();
        // 创建验证规则
        $aRules = &$this->_makeVadilateRules($this->model);
        return $this->model->save($aRules);
    }

    /**
     * 用表单数据填充模型实例
     */
    protected function _fillModelDataFromInput() {
        $data = $this->params;
        $sModelName = $this->modelName;
        !empty($this->model->columnSettings) or $this->model->makeColumnConfigures();
        foreach ($this->model->columnSettings as $sColumn => $aSettings) {
            if ($sColumn == 'id')
                continue;
            if (!isset($aSettings['type']))
                continue;
            switch ($aSettings['type']) {
                case 'bool':
                case 'numeric':
                case 'integer':
                    !empty($data[$sColumn]) or $data[$sColumn] = 0;
                    break;
                case 'select':
                    if (isset($data[$sColumn]) && is_array($data[$sColumn])) {
                        sort($data[$sColumn]);
                        $data[$sColumn] = implode(',', $data[$sColumn]);
                    }
            }
        }

        $this->model = $this->model->fill($data);
        if ($sModelName::$treeable) {
            $this->model->parent_id or $this->model->parent_id = null;
            if ($sModelName::$foreFatherColumn) {
                $this->model->{$sModelName::$foreFatherColumn} = $this->model->setForeFather();
            }
        }
    }

    /**
     * 根据实际情况修改验证规则
     *
     * @param model $oModel
     *
     * @return array
     */
    protected function & _makeVadilateRules($oModel) {
        $sClassName = get_class($oModel);
        return $sClassName::$rules;
    }

    /**
     * 构造 unique 验证规则
     *
     * @param  string $column 字段名称
     * @param  int    $id 排除指定 ID
     *
     * @return string
     */
    protected function unique($column = null, $id = null, $extraParam = null) {
        $rule = 'unique:' . $this->resourceTable;
        if (!is_null($column))
            $rule .= ',' . $column;
        if (!is_null($id))
            $rule .= ',' . $id . ',id';
        else
            $rule .= ',NULL,id';
        if (!is_null($extraParam) && is_array($extraParam)) {
            foreach ($extraParam as $key => $value) {
                $rule .= ',' . $key . ',' . $value;
            }
        }
        return $rule;
    }

    /**
     * [_getButtons 获取当前访问页面的按钮]
     * @return [Array] [pageButtons: 页级按钮, itemButtons: 行级按钮]
     */
    protected function & _getButtons() {
        $data = ['pageButtons' => [], 'itemButtons' => [], 'pageBatchButtons' => []];
        if (!$this->functionality) {
            return $data;
        }
        $aVars = [
            FunctionalityRelation::POS_ITEM => 'itemButtons',
            FunctionalityRelation::POS_PAGE => 'pageButtons',
            FunctionalityRelation::POS_BATCH => 'pageBatchButtons',
        ];
        $pageButtons = $itemButtons = $pageBatchButtons = [];
        $aHadRights = $this->hasRights;
        $buttons = $this->functionality->getRelationFunctionalities($aHadRights, $aRelationIds);
        $functionalities = &Functionality::getActionArray($aRelationIds);
        foreach ($buttons as $key => $oButton) {
            if (!isset($functionalities[$oButton->r_functionality_id])) {
                continue;
            }
            $aButtonFuncConfig = $functionalities[$oButton->r_functionality_id];
            $route_action = Config::get('namespace-map.CustomerControllerDefaultNamespace') . $aButtonFuncConfig['controller'] . '@' . $aButtonFuncConfig['action'];
            if ($iPopupId = $aButtonFuncConfig['popup_id']) {
                $oPopup = Popup::find($iPopupId);
                $oButton->popup_name = $oPopup->name;
                $oButton->button_onclick = $oPopup->name;
                $oItems = PopupItem::where('popup_id', '=', $oPopup->id)->orderBy('sequence', 'asc')->get(['label', 'field', 'type', 'required']);
                $this->langKeysForButtons[$oButton->button_onclick] = [
                    'action' => $oButton->route_name,
                    'title' => $aButtonFuncConfig['popup_title'],
                    'method' => $oPopup->method,
                    'items' => $oItems->toArray()
                ];
            }
            $oButton->popup_title = $aButtonFuncConfig['popup_title'];
            $oButton->route_name = $this->_getRouterName($route_action);
            $oButton->button_type = $aButtonFuncConfig['button_type'];
            $oButton->button_onclick or $oButton->button_onclick = $aButtonFuncConfig['button_onclick'];
            $oButton->confirm_msg_key or $oButton->confirm_msg_key = $aButtonFuncConfig['confirm_msg_key'];
            $oButton->target = $oButton->new_window ? '_new' : '_self';
            $bShort = false;
            $aShortActions = ['view', 'edit', 'delete', 'create'];
            if ($oButton->position == FunctionalityRelation::POS_ITEM) {
                $aWords = explode(' ', $oButton->label);

                //不是一个模块中的增删改查显示全称，不只显示 创建，查看这样的简称
                if(strtolower($aWords[0].' '.$this->resource) == strtolower($oButton->label)){
                    $sFirst = $aWords[0];
                }else{
                    $sFirst = $oButton->label;
                }

                $bShort = in_array(strtolower($sFirst), $aShortActions);
            } else {
                $bShort = in_array(strtolower($oButton->label), $aShortActions);
                $sFirst = $oButton->label;
            }
            if ($bShort) {
                $sDictionary = '_basic';
                $sKeyword = strtolower($sFirst);
                $sReplaceVarName = 'langShortVars';
            } else {
                $sDictionary = '_function';
                $sKeyword = strtolower($oButton->label);
                $sReplaceVarName = 'langVars';
            }
            $oButton->label = ___($sDictionary . '.' . $sKeyword, $this->$sReplaceVarName, 2);
            $oButton->keyword = $sKeyword;

            $iParamFunctionalityId = $oButton->position == FunctionalityRelation::POS_PAGE ? $oButton->functionality_id : $oButton->r_functionality_id;
            if ($oButton->params) {
//                $oButton->para_name = $oButton->params;
                if ($oButton->params{0} == '?') {
                    $oButton->para_name = null;
                    $oButton->querystring = $oButton->params;
                } else {
                    $aParts = explode('=', $oButton->params);
                    if (count($aParts) == 1) {
                        $oButton->para_name = $oButton->params;
                        $oButton->para_column = 'id';
                    } else {
                        $oButton->para_name = $aParts[0];
                        $oButton->para_column = $aParts[1];
                    }
                }
            } else {
                if ($sParamName = FunctionalityParam::getFirstParamKey($iParamFunctionalityId)) {
                    $oButton->para_name = $sParamName;
                } else {
                    $sModelName = &$this->modelName;
                    switch ($functionalities[$oButton->r_functionality_id]['action']) {
                        case 'index':
                        case 'list':
                        case 'create':
                            $oButton->para_name = $sModelName::$treeable ? 'parent_id' : null;
                            break;
                        case 'updateModels':
                        case 'generateAll':
                            $oButton->para_name = null;
                            break;
                        default:
                            $oButton->para_name = 'id';
                    }
                }
            }
            $oButton->url = $oButton->use_redirector ? $this->request->session()->get($this->redictKey) : null;
            $sVarName = $aVars[$oButton->position];
            array_push($$sVarName, $oButton);
            $this->needParams[] = $oButton->para_name;
        }
        $data = ['pageButtons' => $pageButtons, 'itemButtons' => $itemButtons, 'pageBatchButtons' => $pageBatchButtons];
        return $data;
    }

    protected function _getRouterName($route_action) {
        $sDefaultNamespace = Config::get('namespace-map.ControllerDefaultNamespace');
        $router = Route::getRoutes()->getByAction($sDefaultNamespace . $route_action);
//        pr($router);
//        exit;
        return $router ? $router->getName() : '';
    }

    /**
     * go back
     *
     * @param string $sMsgType in list: success, error, warning, info
     * @param string $sMessage
     *
     * @return RedirectResponse
     */
    protected function goBack($sMsgType, $sMessage, $bWithModelErrors = false) {
        $oRedirectResponse = redirect()->back();
        $oRedirectResponse->withInput()->with($sMsgType, $sMessage);
        !$bWithModelErrors or $oRedirectResponse = $oRedirectResponse->withErrors($this->model->validationErrors);
        return $oRedirectResponse;
    }

    /**
     * 回退到列表页面
     *
     * @param $sMsgType
     * @param $sMessage
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function goBackToIndex($sMsgType, $sMessage) {
        $sToUrl = $this->request->session()->get($this->redictKey) or $sToUrl = route('admin.dashboard');
        return redirect()->to($sToUrl)->with($sMsgType, $sMessage);
    }

    /**
     * 判断资源名是否设置，如未设置，则由模型名称生成资源名称，并填入resource属性
     * @return boolean
     */
    protected function compileResourceName() {
        if ($this->resource) {
            return true;
        }
        if (!$sModelName = $this->modelName) {
            return true;
        }
        $sResouceName = $sModelName::$resourceName;
        $this->resource = Str::snake(Str::plural($sResouceName), '-');
        return true;
    }

    public function __destruct() {
        parent::__destruct();
        if (!is_object($this->functionality)) {
            return;
        }
        //记录操作日志
        $oAdmin = AdminUser::find(Session::get('admin_user_id'));
        AdminLog::createLog($this->functionality, $oAdmin, $this->params);
//                    die('ccc');
        if (SysConfig::check('sys_use_sql_log', true)) {
            $sLogPath = Config::get('custom-sysconfig.default-log-path') . 'sql' . DIRECTORY_SEPARATOR . date('Ymd');
//            pr($sLogPath);
            if (!file_exists($sLogPath)) {
                @mkdir($sLogPath, 0777, true);
                @chmod($sLogPath, 0777);
            }
            $sLogFile = $sLogPath . DIRECTORY_SEPARATOR . date('H') . '.sql';
            if (!$queries = DB::getQueryLog()) {
                return;
            }
//            $me       = DB::connection();
//            pr($queries);
            foreach ($queries as $aQueryInfo) {
//                $sql       = $aQueryInfo['query'];
                $sql = '';
                $aSqlParts = explode('?', $aQueryInfo['query']);
                foreach ($aSqlParts as $i => $sPart) {
                    $sql .= $aSqlParts[$i];
                    if (isset($aQueryInfo['bindings'][$i])) {
                        $bindings = $aQueryInfo['bindings'][$i];
                        !(is_string($bindings) && strlen($bindings) > 0 && $bindings{0} != "'") or $bindings = "'" . $bindings . "'";
                        $sql .= $bindings;
                    }
                }
                $aLogs[] = $sql;
                $aLogs[] = number_format($aQueryInfo['time'], 3) . 'ms';
//                pr($sql);
            }

            @file_put_contents($sLogFile, date('Y-m-d H:i:s') . "\n", FILE_APPEND);
            @file_put_contents($sLogFile, 'controller: ' . $this->controller . ' action: ' . $this->action . "\n", FILE_APPEND);
//            @file_put_contents($sLogFile, var_export($queries, true) . "\n\n", FILE_APPEND);
            @file_put_contents($sLogFile, implode("\n", $aLogs) . "\n\n", FILE_APPEND);
        }
    }

    protected function getBaseInfo() {
        $aBaseInfo = Config::get('custom-sysinfo');
        return $aBaseInfo;
    }

    /**
     * 获取可访问的功能ID数组
     *
     * @return Array              根据$returnType得到的不同数组
     */
    protected function & getUserRights() {
        $roleIds = Session::get('CurUserRole');
        $aRights = &AdminRole::getRightsOfRoles($roleIds);
        return $aRights;
    }

    /**
     * 自定义搜索条件
     * (以副表数据作为搜索条件)
     * @param $oQuery
     */
    protected function customSearchConditions($oQuery,$aParams){
        return $oQuery;
    }


    /**
     * 添加用户管理日志
     *
     * @param      $iUserId
     * @param null $sComment
     *
     * @return bool
     */
    protected function createUserManageLogs($iUserId,$sComment = null){
        if(empty($iUserId)) return false;
        if (empty($sComment)) $sComment = $this->controller . '->'. $this->action;
        UserManageLogs::createLog($iUserId,$sComment);
    }

}
