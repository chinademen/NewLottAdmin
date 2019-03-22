<?php
namespace App\Http\Controllers;


use Auth;
use Config;
use DB;
use DbTool;
use Session;
use MyString;
use Illuminate\Support\Str;
use App\Models\BaseModel;
use App\Models\Functionality;
use App\Models\FunctionalityParam;
use App\Models\Menu;
use App\Models\SearchConfig;
use App\Models\SearchItem;

/**
 * 新模块向导
 *
 * @author winter
 */
class WizardController extends AdminBaseController {

    protected $resourceView = 'wizard';
    protected $resource = 'wizard';
    protected $templatePath = '';
    protected $funcParams = [];
    protected $paths;

    public function newModel() {
        $step = isset($this->params['step']) ? intval($this->params['step']) : 0;
        $step++;
        $this->setVars('aCacheLevels', BaseModel::$validCacheLevels);
        switch ($step) {
            case 1:
                $this->view = $this->resourceView . '.newModelSetp1';
                return $this->render();
                break;
            case 2:
                return $this->newModelStep2();
                break;
            case 3:
                return $this->newModelStep3();
                break;
            case 4:
                return $this->newModelStep4();
                break;
            case 5:
                return $this->newModelStep5();
                break;

        }
    }

    private function newModelStep2() {
        if (empty($this->params['table_name']) || empty($this->params['model_name'])) {
            return $this->goBack('error', ___('wizard.missing-table-name'));
        }
        $aColumns = DbTool::getColumnConfigs($sTableName = $this->params['table_name']);
        if (!$aColumns) {
            $this->goBack('error', 'wizard.missing-table');
        }
        $model_name = $this->params['model_name'];

        $this->setVars(compact('sTableName', 'model_name', 'aColumns'));
        $this->view = $this->resourceView . '.newModelSetp2';
        return $this->render();
    }

    private function newModelStep3() {
        if (empty($this->params['table_name']) || empty($this->params['model_name'])) {
            return $this->goBack('error', ___('wizard.missing-table-name'));
        }
        $aColumns = DbTool::getColumnConfigs($sTableName = $this->params['table_name']);
        if (!$aColumns) {
            $this->goBack('error', 'wizard.missing-table');
        }
        $model_name = $this->params['model_name'];
        $sController = $model_name . 'Controller';
        $aAvailableActions = ['create', 'edit', 'view', 'destroy'];
        $this->setVars(compact('sTableName', 'model_name', 'aColumns', 'sController', 'aAvailableActions'));
        $this->view = $this->resourceView . '.newModelSetp3';
        return $this->render();
    }

    private function newModelStep4() {
//        pr($this->params);
//        exit;
        if (empty($this->params['table_name']) || empty($this->params['model_name'])) {
            return $this->goBack('error', ___('wizard.missing-table-name'));
        }
        $aColumns = DbTool::getColumnConfigs($sTableName = $this->params['table_name']);
        if (!$aColumns) {
            $this->goBack('error', 'wizard.missing-table');
        }
        $sModelName = $this->params['model_name'];
        $sController = $sModelName . 'Controller';
        $aAvailableActions = ['create', 'edit', 'view', 'destroy'];
        $this->setVars(compact('sTableName', 'sModelName', 'aColumns', 'sController', 'aAvailableActions'));
        $this->setVars($this->params);

        Functionality::getTree($aFunctionalities, null, null, ['title' => 'asc']);
//        Menu::getTree($aMenus, null, null, ['title' => 'asc']);
        $aMenus = Menu::getMainMenu();
//        pr($aMenus);
//        exit;
        $this->setVars(compact('aFunctionalities', 'aMenus'));
        $this->setVars('aSearchItemValidTypes', SearchItem::getValidTypes());
        $this->view = $this->resourceView . '.newModelSetp4';
        return $this->render();
    }

    private function newModelStep5() {
        $this->init();
        $this->templatePath = Config::get('wizard.template');

        file_put_contents('/tmp/wizard-data', var_export($this->params, true));
        if ($bSucc = $this->generateModelFile($sModelFile)) {
            $this->outputMessage("模型类已生成，路径 " . $sModelFile);
        } else {
            $this->outputMessage("模型类未能生成，路径 " . $sModelFile);
        }
        $this->generateSearchConfig($oSearchConfig);
        $this->generateFunctionality($oSearchConfig);

        if ($bSucc = $this->generateController($sControllerFile)) {
            $this->outputMessage("控制器类已生成，路径 " . $sControllerFile);
        } else {
            $this->outputMessage("控制器类未能生成，路径 " . $sControllerFile);
        }
        if ($bSucc = $this->generateRoute($sRouteFile)) {
            $this->outputMessage("路由文件已生成，路径 " . $sRouteFile);
        } else {
            $this->outputMessage("路由文件未能生成，路径 " . $sRouteFile);
        }
    }

    private function compileRules(& $aColumnConfigs) {
        $aRules = $aRuleConfigs = [];
        $aRequiredColumns = explode(',', $this->params['requiredColumns']);

        foreach ($aRequiredColumns as $sColumn) {
            if ($sColumn == 'id') {
                continue;
            }
            $aRuleConfigs[$sColumn][] = 'required';
            switch ($aColumnConfigs[$sColumn]['type']) {
                case 'integer':
                case 'tinyint':
                case 'smallint':
                case 'mediumint':
                case 'bigint':
                    $sType = 'integer';
                    break;
                case 'decimal':
                case 'float':
                case 'double':
                    $sType = 'numeric';
                    break;
                case 'date':
                    $sType = 'date';
                    break;
                default :
                    $sType = '';
            }
            !$sType or $aRuleConfigs[$sColumn][] = $sType;

        }
        $aDoneMax = [];
        foreach ($this->params['minValues'] as $sColumn => $fMin) {
            if ($sColumn == 'id') {
                continue;
            }
            if (strlen($fMin) == 0) {
                continue;
            }
            if (in_array($sType, ['numeric', 'integer']) && $fMin == $this->params['maxValues'][$sColumn]) {
                $aRuleConfigs[$sColumn][] = 'size:' . $fMin;
                $aDoneMax[] = $sColumn;
            } else {
                $aRuleConfigs[$sColumn][] = 'min:' . $fMin;
            }
        }
        foreach ($this->params['maxValues'] as $sColumn => $fMax) {
            if ($sColumn == 'id') {
                continue;
            }
            if (strlen($fMax) == 0 || in_array($sColumn, $aDoneMax)) {
                continue;
            }
            $aRuleConfigs[$sColumn][] = 'max:' . $fMax;
        }

        foreach ($this->params['listValues'] as $sColumn => $sListValues) {
            if ($sColumn == 'id') {
                continue;
            }
            if (strlen($sListValues) == 0) {
                continue;
            }
            $aRuleConfigs[$sColumn][] = 'in:' . $sListValues;
        }

        foreach ($aRuleConfigs as $sColumn => $aRuleConfig) {
            $aRules[$sColumn] = implode('|', $aRuleConfig);
        }
        return $aRules;
    }

    private function getCacheLevelText($iLevel) {
        $a = [
            'self::CACHE_LEVEL_NONE',
            'self::CACHE_LEVEL_FIRST',
            'self::CACHE_LEVEL_SECOND',
            'self::CACHE_LEVEL_THIRD',
        ];
        return $a[$iLevel];
    }

    private function generateModelFile(& $sModelFile) {
        $sModelTemplateFile = $this->templatePath . 'model.txt';
        if (!file_exists($sModelTemplateFile)) {
            die($sModelTemplateFile . ' 不存在');
        }
        $sModelPath = $this->paths['model'];
        $sModelName = $this->params['model_name'];
        $sModelFile = $sModelPath . $sModelName . '.php';
        if (file_exists($sModelFile) && !is_writeable($sModelFile)) {
            die("文件 $sModelFile 已存在，且不可写");
        }

        $sTableName = $this->params['table_name'];
        $aColumnForList = explode(',', $this->params['displayForLists']);
        $aDisplayForEdits = explode(',', $this->params['displayForEdits']);
        $aDisplayForViews = explode(',', $this->params['displayForViews']);
        $aColumnConfigs = DbTool::getColumnConfigs($sTableName = $this->params['table_name']);
        $aFillables = array_keys($aColumnConfigs);

        $aIgnoreColumnsInEdit = array_diff($aFillables, $aDisplayForEdits);
        $aIgnoreColumnsInView = array_diff($aFillables, $aDisplayForViews);
        $bTreeable = in_array('parent_id', $aFillables);

        $this->compileFuncParams($sMainParam);
        // 处理rules
        $aRules = $this->compileRules($aColumnConfigs);

        // 格式化
        $aPattern = [
            '/[\d]+ => /',
            '/array \((.*)\)/uis',
            '/ {2}/',
            '/ {4}]/',
        ];
        $aReplace = [
            '',
            '[$1  ]',
            '        ',
            ']',
        ];
        $aSearch = [
            '%note%',
            '%author%',
            '%modelName%',
            '%tableName%',
            '%cache_level%',
            '%fillable%',
            '%columnsForList%',
            '%ignoreColumnsInView%',
            '%ignoreColumnsInEdit%',
            '%treeable%',
            '%titleColumn%',
            '%mainParamColumn%',
            '%rules%',
        ];

        $aReplace = [
            $this->params['model_note'],
            Auth::user()->username,
            $sModelName,
            $sTableName,
            $this->getCacheLevelText($this->params['cache_level']),
            preg_replace($aPattern, $aReplace, var_export($aFillables, true)),
            preg_replace($aPattern, $aReplace, var_export($aColumnForList, true)),
            preg_replace($aPattern, $aReplace, var_export($aIgnoreColumnsInView, true)),
            preg_replace($aPattern, $aReplace, var_export($aIgnoreColumnsInEdit, true)),
            $bTreeable,
            $this->params['title_column'],
            $sMainParam,
            preg_replace($aPattern, $aReplace, var_export($aRules, true)),
        ];
        $sCode = file_get_contents($sModelTemplateFile);
        $sCode = str_replace($aSearch, $aReplace, $sCode);

        return file_put_contents($sModelFile, $sCode);
    }

    private function generateSearchConfig(& $oSearchConfig) {
        // 处理搜索规则
        $sModelName = $this->params['model_name'];
        if ($bNeedSearch = !empty($this->params['searchItems'])) {
            $search_config_name = $sModelName . '.default';
            $aSearchConfig = [
                'name' => $search_config_name,
                'row_size' => 6,
                'realm' => SearchConfig::REALM_ADMIN,
            ];
            $oSearchConfig = SearchConfig::where('name', '=', $search_config_name)->get()->first();
            if ($oSearchConfig) {
                $oSearchConfig->fill($aSearchConfig);
            } else {
                $oSearchConfig = new SearchConfig($aSearchConfig);
            }
            if ($oSearchConfig->save()) {
                $this->outputMessage("搜索表单配置已保存: " . $oSearchConfig->id);
            } else {
                $this->outputMessage("搜索表单配置未能保存: " . $oSearchConfig->getValidationErrorString());
            }
            $search_items = &$this->compileSearchItems($oSearchConfig->id);
            $bSucc = true;
            $iCount = 0;
            foreach ($search_items as $sField => $aConfigs) {
                $oSearchItem = SearchItem::where('search_config_id', '=', $oSearchConfig->id)
                    ->where('field', '=', $sField)
                    ->get()->first();
                if ($oSearchItem) {
                    $oSearchItem->fill($aConfigs);
                } else {
                    $oSearchItem = new SearchItem($aConfigs);
                }
                if (!$bSucc = $oSearchItem->save()) {
                    $this->outputMessage("搜索字段配置未能保存: " . $oSearchConfig->getValidationErrorString());
                    break;
                }
                $iCount++;
            }
            if ($iCount == count($search_items)) {
                $this->outputMessage("搜索字段配置已保存");
            }
        }
    }

    private function generateFunctionality($oSearchConfig) {
        $sModelName = $this->params['model_name'];
        $controller = $this->params['controller'];
        $action = 'index';
        $func_parent_id = $this->params['parent_function'];
        $menu_parent_id = $this->params['parent_menu'];
        $bMenu = intval($menu_parent_id > 0);
        $bNeedSearch = !empty($oSearchConfig);
        $aFunctionalityInfo = [
            'title' => $this->params['function_title'],
            'parent_id' => $func_parent_id,
            'controller' => $controller,
            'action' => $action,
            'need_curd' => intval(count($this->params['actions']) > 0),
            'button_type' => Functionality::BUTTON_TYPE_NORMAL,
            'realm' => Functionality::REALM_ADMIN,
            'menu' => $bMenu,
            'need_search' => $bNeedSearch,
            'search_config_id' => $bNeedSearch ? $oSearchConfig->id : null,
        ];
        $oFunctionality = Functionality::getByCA($controller, $action);

        if (empty($oFunctionality)) {
            $oFunctionality = new Functionality($aFunctionalityInfo);
        } else {
            $oFunctionality->fill($aFunctionalityInfo);
        }
        if (!$bSucc = $oFunctionality->save()) {
            $this->outputMessage("主功能配置未能保存: " . $oFunctionality->getValidationErrorString());
            exit;
        } else {
            $this->outputMessage("主功能配置已保存: " . $oFunctionality->id);
        }

        $aSubFuncBasicInfo = [
            'parent_id' => $oFunctionality->id,
            'controller' => $controller,
            'need_curd' => 0,
            'realm' => Functionality::REALM_ADMIN,
            'menu' => 0,
            'need_search' => 0,
            'search_config_id' => null,
        ];
        foreach ($this->params['actions'] as $sAction) {
            switch ($sAction) {
                case 'edit':
                    $iButtonType = Functionality::BUTTON_TYPE_EDIT;
                    break;
                case 'destroy':
                    $iButtonType = Functionality::BUTTON_TYPE_DANGEROUS;
                    break;
                default:
                    $iButtonType = Functionality::BUTTON_TYPE_NORMAL;

            }
            $aSubOtherInfo = [
                'title' => MyString::humenlize($sAction) . ' ' . MyString::humenlize($sModelName),
                'action' => $sAction,
                'button_type' => $iButtonType,
            ];
            $aSubFuncInfo = array_merge($aSubFuncBasicInfo, $aSubOtherInfo);
            $oSubFunctionality = Functionality::getByCA($controller, $sAction);
            if (empty($oSubFunctionality)) {
                // 2018-07-09 lawrence 添加默认数据:向导生成 destroy 方法 缺少默认参数,列表无法正常删除数据
                if($sAction=='destroy'){
                    $aSubFuncInfo['popup_id']=1;
                    $aSubFuncInfo['popup_title']='_basic.confirm-delete-title';
                    $aSubFuncInfo['confirm_msg_key']='_basic.delete-confirm';
                }
                $oSubFunctionality = new Functionality($aSubFuncInfo);
            } else {
                $oSubFunctionality->fill($aSubFuncInfo);
            }
            if (!$bSucc = $oSubFunctionality->save()) {
                $this->outputMessage("$sAction 功能配置未能保存: " . $oSubFunctionality->getValidationErrorString());
                exit;
            } else {
                $this->outputMessage("$sAction 功能配置已保存: " . $oSubFunctionality->id);
            }

        }

        if ($bMenu) {
            $aMenu = [
                'title' => $this->params['function_title'],
                'parent_id' => $menu_parent_id,
                'controller' => $controller,
                'action' => $action,
                'functionality_id' => $oFunctionality->id,
            ];
            $oAdminMenu = Menu::where('controller', '=', $controller)
                ->where('action', '=', 'index')->get()->first();
            if ($oAdminMenu) {
                $oAdminMenu->fill($aMenu);
            } else {
                $oLastMenu = Menu::where('parent_id', '=', $menu_parent_id)
                    ->orderBy('sequence', 'desc')
                    ->limit(1)->get(['sequence'])->first();
                $iLastSequence = $oLastMenu ? $oLastMenu->sequence : 0;
                $aMenu['sequence'] = $iLastSequence + 10;
                $oAdminMenu = new Menu($aMenu);
            }
            if ($oAdminMenu->save()) {
                $this->outputMessage("菜单配置已保存: " . $oAdminMenu->id);
            } else {
                $this->outputMessage("菜单配置未能保存: " . $oAdminMenu->getValidationErrorString());
            }
        }

        // 保存参数
        $aColumnConfigs = DbTool::getColumnConfigs($sTableName = $this->params['table_name']);
        foreach ($this->funcParams as $iSequence => $aConfig) {
            switch ($aColumnConfigs[$aConfig['name']]['type']) {
                case 'integer':
                case 'tinyint':
                case 'smallint':
                case 'mediumint':
                case 'bigint':
                    $sType = 'int';
                    break;
                default :
                    $sType = 'string';
            }
            $aConfig['type'] = $sType;
            $oParam = FunctionalityParam::where('functionality_id', '=', $oFunctionality->id)
                ->where('name', '=', $aConfig['name'])->get()->first();
            $aConfig['functionality_id'] = $oFunctionality->id;
            if ($oParam) {
                $oParam->fill($aConfig);
            } else {
                $oParam = new FunctionalityParam($aConfig);
            }
            if (!$bSucc = $oParam->save()) {
                $this->outputMessage("$oParam->name 参数配置未能保存: " . $oParam->getValidationErrorString());
                exit;
            } else {
                $this->outputMessage("$oParam->name 参数配置已保存: " . $oParam->id);
            }
        }
    }

    private function & compileSearchItems($iSearchFormId) {
        $aItems = [];
        $i = 0;
        foreach ($this->params['searchItems'] as $sField) {
            $i++;
            if (($sType = $this->params['searchTypes'][$sField]) == 'select') {
                $source = str_replace(',', "<br />\n", $this->params['searchListValues'][$sField]);
            } else {
                $source = '';
            }
            $iSequence = $this->params['searchSequences'][$sField] or $iSequence = $i * 10;
            $aItems[$sField] = [
                'search_config_id' => $iSearchFormId,
                'model' => $this->params['model_name'],
                'field' => $sField,
                'label' => $this->params['searchLabels'][$sField],
                'type' => $sType,
                'default_value' => $this->params['searchDefaults'][$sField],
                'source' => $source,
                'match_rule' => $this->params['searchMatchRules'][$sField],
                'sequence' => $iSequence,
            ];
        }
        return $aItems;
    }

    private function compileFuncParams(& $sMainParam) {
        if (!isset($this->params['params'])) {
            return;
        }
        $iMinOrder = 9999999999;
        $this->funcParams = [];
        foreach ($this->params['params'] as $sParam) {
            $iOrder = $this->params['paramSequences'][$sParam];
            if (strlen($iOrder) == 0) {
                continue;
            }
            $this->funcParams[$iOrder] = [
                'name' => $sParam,
                'type' => $this->params['searchTypes'][$sParam],
                'default_value' => $this->params['paramDefaults'][$sParam],
                'limit_when_null' => isset($this->params['paramBindNulls'][$sParam]) ? 1 : 0,
                'sequence' => $iOrder
            ];
            $iOrder >= $iMinOrder or $iMinOrder = $iOrder;
        }
        ksort($this->funcParams);
        $sMainParam = $this->funcParams[$iMinOrder]['name'];
    }

    private function generateController(& $sControllerFile) {
        $sTemplateFile = $this->templatePath . 'controller.txt';
        if (!file_exists($sTemplateFile)) {
            die($sTemplateFile . ' 不存在');
        }
        $sControllerPath = $this->paths['controller'];
        $sController = $this->params['controller'];
        $sControllerFile = $sControllerPath . $sController . '.php';
        if (file_exists($sControllerFile) && !is_writeable($sControllerFile)) {
            die("文件 $sControllerFile 已存在，且不可写");
        }

        $sModelName = $this->params['model_name'];

        // 格式化
        $aSearch = [
            '%note%',
            '%author%',
            '%modelName%',
            '%controller%',
        ];

        $aReplace = [
            $this->params['model_note'],
            Session::get('admin_username'),
            $sModelName,
            $sController,
        ];
        $sCode = file_get_contents($sTemplateFile);
        $sCode = str_replace($aSearch, $aReplace, $sCode);
        return file_put_contents($sControllerFile, $sCode);
    }

    private function generateRoute(& $sRouteFile) {
        $sTemplateFile = $this->templatePath . 'route.txt';
        if (!file_exists($sTemplateFile)) {
            die($sTemplateFile . ' 不存在');
        }
        $sRoutePath = $this->paths['route'];
        $sModelName = $this->params['model_name'];
        $sRouteFile = $sRoutePath . $sModelName . '.php';
        if (file_exists($sRouteFile) && !is_writeable($sRouteFile)) {
            die("文件 $sRouteFile 已存在，且不可写");
        }

        $sResource = $sUrl = Str::slug(Str::snake(Str::plural($sModelName)));
        $sController = $this->params['controller'];
        $aActions = $this->params['actions'];
        array_unshift($aActions, 'index');
        $aActionRoutes = [];
        foreach ($aActions as $sAction) {
            $aSearch = [
                '%action%'
            ];
            $aReplace = [
                $sAction
            ];
            $sActionTemplateFile = $this->templatePath . "route-action-$sAction.txt";
            if (!file_exists($sActionTemplateFile)) {
                die($sActionTemplateFile . ' 不存在');
            }
            $sActionRouteTemplate = file_get_contents($sActionTemplateFile);
            $aActionRoutes[] = str_replace($aSearch, $aReplace, $sActionRouteTemplate);
        }
        $aSearch = [
            '%note%',
            '%url%',
            '%resource%',
            '%controller%',
            '%actionRoutes%',
        ];
        $aReplace = [
            $this->params['model_note'],
            $sUrl,
            $sResource,
            $sController,
            implode($aActionRoutes)
        ];

        // 格式化
        $sCode = file_get_contents($sTemplateFile);
        $sCode = str_replace($aSearch, $aReplace, $sCode);
        return file_put_contents($sRouteFile, $sCode);
    }

    private function outputMessage($sMsg) {
        echo "$sMsg<br />\n";
    }

    private function init() {
        $this->paths = Config::get('wizard.path');
        if (empty($this->paths)) {
            $this->outputMessage('向导配置文件不存在');
            exit;
        }
        $aNotWritables = [];
        foreach ($this->paths as $sPath) {
            if (!file_exists($sPath)) {
                mkdir($sPath, 0755, true);
                chmod($sPath, 0755);
            }
            if (!is_writable($sPath)) {
                $aNotWritables[] = $sPath;
            }
        }
        if ($aNotWritables) {
            $this->outputMessage('下列目录不可写:');
            foreach ($aNotWritables as $sPath) {
                $this->outputMessage($sPath);
            }
            exit;
        }
    }
}
