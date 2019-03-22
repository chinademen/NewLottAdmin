<?php

namespace App\Http\Controllers;

use App\Models\Functionality;
use App\Models\FunctionalityRelation;
use App\Models\SearchConfig;
use App\Models\SearchItem;
use App\Models\FunctionalityParam;
use App\Models\Menu;
use App\Models\Popup;

use Auth;
use Config;
use MyString;

use DB;

/**
 * 功能管理控制器
 */
class FunctionalityController extends AdminBaseController {

    protected $modelName = 'App\Models\Functionality';

    protected $resource = 'functionalities';

    function diffBetweenTwoDays ($day1, $day2)
    {
        $second1 = strtotime($day1);
        $second2 = strtotime($day2);

        if ($second1 < $second2) {
            $tmp = $second2;
            $second2 = $second1;
            $second1 = $tmp;
        }
        return ($second1 - $second2) / 86400;
    }

    /**
     * 在渲染前执行，为视图准备变量
     */
    protected function beforeRender() {
        $sModelName = $this->modelName;
        $this->setVars('aValidRealms', $sModelName::$realms);
        $this->setVars('aButtonTypes', $sModelName::$buttonTypes);

        switch ($this->action) {
            case 'view':
                break;
            case 'edit':
            case 'create':
                $this->model->getTree($functionalitiesTree, null, null, ['title' => 'asc']);
                $this->setVars('aSearchConfigs', SearchConfig::getTitleList());
                $this->setVars('functionalitiesTree', $functionalitiesTree);
                $this->setVars('aPopups', Popup::getTitleList());
                break;
        }
        parent::beforeRender();
    }

    /**
     * 自动创建CRUD权限
     *
     * @param int $id
     *
     * @return RedirectResponse
     */
    function createSubFunctionalities($id = null) {
        if (!$id && isset($this->params['parent_id'])) {
            $id = $this->params['parent_id'];
        }
        if (!$id) {
            return $this->goBack('error', ___('InValid functionality'));
        }
        $aActions = array('create', 'view', 'edit', 'destroy');
        if (!$oParentFunctionality = $this->model->find($id)) {
            return $this->goBack('error', ___('The functionality not exists!'), true);
        }
        if (!$oParentFunctionality->need_curd) {
            return $this->goBack('error', ___('The functionality could not use this action.'));
        }
        $oSubFunctionalities = $this->model->doWhere(['parent_id' => ['=', $id]])->get(['id', 'controller', 'action', 'sequence']);
        $aHadActions = [];
        $iMaxSequence = 0;
        foreach ($oSubFunctionalities as $oFunctionality) {
            if (in_array($oFunctionality->action, $aActions)) {
                $aHadActions[] = $oFunctionality->action;
            }
            $oFunctionality->sequence <= $iMaxSequence or $iMaxSequence = $oFunctionality->sequence;
        }
        $aNeedActions = array_diff($aActions, $aHadActions);
        // 开启事务
        $this->model->getConnection()->beginTransaction();
        if (!$aNeedActions) {
            return $this->goBack('error', ___('The CURD functionalities has been existed!'));
        }
        $aWords = explode(' ', $oParentFunctionality->title);
        $sResourceName = str_replace('Controller', '', $oParentFunctionality->controller);
        $sResourceName = MyString::slug(MyString::humenlize($sResourceName), '_');
        $bSucc = true;
        $aButtonConfigs = [
            'create' => [Functionality::BUTTON_TYPE_NORMAL, null, null],
            'view' => [Functionality::BUTTON_TYPE_NORMAL, null, null],
            'edit' => [Functionality::BUTTON_TYPE_EDIT, null, null],
            'destroy' => [Functionality::BUTTON_TYPE_DANGEROUS, 'modal', '_basic.delete-confirm'],
        ];

        foreach ($aNeedActions as $sAction) {
            $aNewData = [
                'parent_id' => $id,
                'title' => MyString::humenlize($sAction) . ' ' . MyString::humenlize($sResourceName),
                'controller' => $oParentFunctionality->controller,
                'action' => $sAction,
                'realm' => $oParentFunctionality->realm,
                'menu' => 0,
                'need_curd' => 0,
                'disabled' => 0,
                'sequence' => $iMaxSequence += 10,
                'button_type' => $aButtonConfigs[$sAction][0],
                'button_onclick' => $aButtonConfigs[$sAction][1],
                'confirm_msg_key' => $aButtonConfigs[$sAction][2],
            ];
            $oFunctionality = new Functionality;
            $oFunctionality->fill($aNewData);
            if (!$bSucc = $oFunctionality->save(Functionality::$rules)) {
                break;
            }
        }
        $bSucc ? $this->model->getConnection()->commit() : $this->model->getConnection()->rollBack();
        $sMessage = $bSucc ? ___('Successful: The CURD functionalities has been created.') : ___('Failure: The CURD functionalities could not be created. Please try again.');
        return $this->goBack('success', $sMessage);
    }

    /**
     * auto create default relations
     * @return response
     */
    function updateRelations() {
        $aFields = ['id', 'title', 'controller', 'action', 'realm', 'sequence'];
        $aActions = [
            'index' => [
                'create' => FunctionalityRelation::POS_PAGE,
                'edit' => FunctionalityRelation::POS_ITEM,
                'view' => FunctionalityRelation::POS_ITEM,
                'destroy' => FunctionalityRelation::POS_ITEM,
            ],
            'list' => [
                'create' => FunctionalityRelation::POS_PAGE,
                'edit' => FunctionalityRelation::POS_ITEM,
                'view' => FunctionalityRelation::POS_ITEM,
                'destroy' => FunctionalityRelation::POS_ITEM,
            ],
            'view' => [
                'index' => FunctionalityRelation::POS_PAGE,
                'edit' => FunctionalityRelation::POS_PAGE,
                'destroy' => FunctionalityRelation::POS_PAGE,
            ],
            'create' => [
                'index' => FunctionalityRelation::POS_PAGE,
            ],
            'edit' => [
                'index' => FunctionalityRelation::POS_PAGE,
                'destroy' => FunctionalityRelation::POS_PAGE,
            ],
        ];
        $aNeedActions = [];
        $oFunctionality = new Functionality;
        $oFunctionalityRelation = new FunctionalityRelation;
        foreach ($aActions as $sMainAction => $aSubActions) {
            $aCondtions = [
                'action' => ['=', $sMainAction]
            ];
            $oBaseFunctionalities = $oFunctionality->doWhere($aCondtions)->get($aFields);

            foreach ($oBaseFunctionalities as $oFunctionalityInfo) {
                $aData = $oFunctionalityInfo->getAttributes();
                $aSubCondtions = [
                    'controller' => ['=', $aData['controller']],
                    'action' => ['in', array_keys($aSubActions)]
                ];
                $oSubFunctionalities = $oFunctionality->dowhere($aSubCondtions)->get($aFields);
                foreach ($oSubFunctionalities as $oSubFunctionalityInfo) {
                    $aSubData = $oSubFunctionalityInfo->getAttributes();
                    if (array_key_exists($aSubData['action'], $aSubActions)) {
                        $aTmpConditions = [
                            'functionality_id' => ['=', $aData['id']],
                            'r_functionality_id' => ['=', $aSubData['id']]
                        ];
                        $oExistRelation = $oFunctionalityRelation->doWhere($aTmpConditions)->first();
                        if (empty($oExistRelation->id)) {
                            $iPosition = $aSubActions[$aSubData['action']];
                            if ($iPosition == FunctionalityRelation::POS_ITEM) {
                                $aParts = explode(' ', $aSubData['title']);
                                $sLabel = $aParts[0];
                            } else {
                                $sLabel = $aSubData['title'];
                            }
                            $aNeedActions[] = array(
                                'functionality_id' => $aData['id'],
                                'r_functionality_id' => $aSubData['id'],
                                'realm' => $aSubData['realm'],
                                'position' => $iPosition,
                                'label' => $sLabel,
                                'sequence' => $aSubData['sequence'],
                                'use_redirector' => intval($aSubData['action'] == 'index')
                            );
                        }
                    }
                }
            }
        }
        // begin Transaction
        DB::connection()->beginTransaction();
        // 写数据
        $bSucc = true;
        foreach ($aNeedActions as $aRelation) {
            $oNewRelation = new FunctionalityRelation($aRelation);
            if (!$bSucc = $oNewRelation->save(FunctionalityRelation::$rules)) {
                break;
            }
        }
        $bSucc ? DB::connection()->commit() : DB::connection()->rollback();
        $sMessage = $bSucc ? 'Successful: The functionality relations has been created.' : 'Failure: The functionality relations could not be created. Please try again.';
        return $this->goBackToIndex('success', $sMessage);
    }


    /**
     * 导出某功能相关的ＳＱＬ数据
     *
     * @return RedirectResponse
     */
    public function exportFunctionality() {

        $iControllerId = isset($this->params['controller_id']) ? $this->params['controller_id'] : 0;
        $sController = '';
        if ($iControllerId) {
            if ($oFunctionality = Functionality::find($iControllerId)) {
                $sController = $oFunctionality->controller;
            }
        }
        if (empty($sController)) {
            return $this->goBackToIndex('success', 'controller is empty!');
        }

        $sSaveDir = storage_path() . DS . 'functionality_data/';
        if (!file_exists($sSaveDir)) {
            @mkdir($sSaveDir, 0777, true);
            @chmod($sSaveDir, 0777);
        }

        $sFileName = $sSaveDir . $sController . '.sql';
        if (file_exists($sFileName)) {
            return $this->goBackToIndex('error', $sController . ' is already exported! please delete this file ' . $sFileName . ' and try again!');
        }

        $aFunctionalitys = Functionality::doWhere(['controller' => ['=', $sController]])->get()->toArray();

        $bSucc = true;
        if ($aFunctionalitys) {
            foreach ($aFunctionalitys as $key => $item) {

                //搜索配置
                $aSearchConfigs = SearchConfig::doWhere(['id' => ['=', $item['search_config_id']]])->get()->toArray();
                $aSearchItem = SearchItem::doWhere(['search_config_id' => ['=', $item['search_config_id']]])->get()->toArray();

                //功能注册信息
                $aFunctionality[0] = $item;

                //参数
                $aFunctionalityParams = FunctionalityParam::doWhere(['functionality_id' => ['=', $item['id']]])->get()->toArray();

                //关系
                $aFunctionalityRelations = FunctionalityRelation::doWhere(['functionality_id' => ['=', $item['id']]])->get()->toArray();

                //菜单
                $aAdminMenus = Menu::doWhere(['title' => ['=', $item['title']]])->get()->toArray();

                //存储数据到文件
                $sql = $this->getSql($aSearchConfigs, 'search_configs');
                $sql .= $this->getSql($aSearchItem, 'search_items');
                $sql .= $this->getSql($aFunctionality, 'functionalities');
                $sql .= $this->getSql($aFunctionalityParams, 'functionality_params');
                $sql .= $this->getSql($aFunctionalityRelations, 'functionality_relations');
                $sql .= $this->getSql($aAdminMenus, 'menus');

                $bSucc = file_put_contents($sFileName, $sql, FILE_APPEND);

                if (!$bSucc) {
                    break;
                }

            }
        }

        if ($bSucc === false) {
            return $this->goBackToIndex('error', 'export  ' . $sController . ' is fail!');
        } else {
            return $this->goBackToIndex('success', 'export  ' . $sController . ' is success!');

        }
    }

    /**
     * 导出某功能相关的Json数据
     *
     * @return RedirectResponse
     */
    public function exportFunctionalityJson() {

        $sController = isset($this->params['controller']) ? $this->params['controller'] : '';
        if (empty($sController)) {
            return $this->goBackToIndex('success', 'param  controller is empty!');
        }

        $sSaveDir = storage_path() . DS . 'functionality_data/';
        if (!file_exists($sSaveDir)) {
            @mkdir($sSaveDir, 0777, true);
            @chmod($sSaveDir, 0777);
        }

        $sFileName = $sSaveDir . $sController . '.json';
        if (file_exists($sFileName)) {
            return $this->goBackToIndex('error', $sController . ' is already exported! please delete this file ' . $sFileName . ' and try again!');
        }
        $aFunctionalitys = Functionality::doWhere(['controller' => ['=', $sController]])->get()->toArray();

        $bSucc = true;
        if ($aFunctionalitys) {
            foreach ($aFunctionalitys as $key => $item) {

                //搜索配置
                $aSearchConfigs = SearchConfig::doWhere(['id' => ['=', $item['search_config_id']]])->get()->toArray();
                $aSearchItem = SearchItem::doWhere(['search_config_id' => ['=', $item['search_config_id']]])->get()->toArray();

                $this->_filterField($aSearchConfigs, $item['title'], 'search_configs');
                if (!empty($aSearchConfigs) && !empty($aSearchItem)) {
                    $this->_filterField($aSearchItem, $aSearchConfigs[0]['name'], 'search_item');
                }

                //功能注册信息
                $aFunctionality[0] = $item;
                $sSearchConfig = isset($aSearchConfigs[0]['name']) ? $aSearchConfigs[0]['name'] : '';
                $this->_filterField($aFunctionality, $item['title'], 'functionality', $sSearchConfig);

                //参数
                $aFunctionalityParams = FunctionalityParam::doWhere(['functionality_id' => ['=', $item['id']]])->get()->toArray();
                $this->_filterField($aFunctionalityParams, $item['title'], 'params');

                //关系
                $aFunctionalityRelations = FunctionalityRelation::doWhere(['functionality_id' => ['=', $item['id']]])->get()->toArray();
                $this->_filterField($aFunctionalityRelations, $item['title'], 'relations');

                //菜单
                $aAdminMenus = AdminMenu::doWhere(['title' => ['=', $item['title']]])->get()->toArray();
                $this->_filterField($aAdminMenus, $item['title'], 'admin_menus');

                //存储数据到文件
                $data = empty($aSearchConfigs) ? '' : json_encode(['search_configs' => $aSearchConfigs]) . "\n";
                $data .= empty($aSearchItem) ? '' : json_encode(['search_item' => $aSearchItem]) . "\n";
                $data .= empty($aFunctionality) ? '' : json_encode(['functionality' => $aFunctionality]) . "\n";
                $data .= empty($aFunctionalityParams) ? '' : json_encode(['params' => $aFunctionalityParams]) . "\n";
                $data .= empty($aFunctionalityRelations) ? '' : json_encode(['relations' => $aFunctionalityRelations]) . "\n";
                $data .= empty($aAdminMenus) ? '' : json_encode(['admin_menus' => $aAdminMenus]) . "\n";

                $bSucc = file_put_contents($sFileName, $data, FILE_APPEND);

                if (!$bSucc) {
                    break;
                }

            }
        }

        if ($bSucc === false) {
            return $this->goBackToIndex('error', 'export  ' . $sController . ' is fail!');
        } else {
            return $this->goBackToIndex('success', 'export  ' . $sController . ' is success!');

        }
    }

    /**
     * 导入某功能相关的数据
     *
     * @return RedirectResponse
     */
    public function importFunctionality() {
        $sController = isset($this->params['controller']) ? $this->params['controller'] : '';
        if (empty($sController)) {
            return $this->goBackToIndex('success', 'param  controller is empty!');
        }

        $sSaveDir = storage_path() . DS . 'functionality_data/';

        $sFileName = $sSaveDir . $sController . '.json';

        if (!file_exists($sFileName)) {
            dd($sFileName . ' is not exists!');
        }

        $aData = file($sFileName);
        if (empty($aData)) {
            dd($sFileName . ' is empty!');
        }

        $aRelations = [];


        $aResults = ['error_msg' => '', 'success_msg' => '', 'error_num' => 0];

        foreach ($aData as $item) {
            $bSucc = false;
            $aData = (json_decode($item, true));
            $sKey = (key($aData));

            switch ($sKey) {
                case 'search_configs':
                    foreach ($aData as $searchConfigs) {
                        foreach ($searchConfigs as $searchConfig) {
                            unset($searchConfig['rel_title']);
                            $aExists = SearchConfig::doWhere(['name' => ['=', $searchConfig['name']]])->get()->toArray();
                            if (!empty($aExists)) {
                                //$this->importData['search_config_id'] = $aExists[0]['id'];
                                continue;
                            }

                            $this->importData['search_config_id'] = SearchConfig::createDataRecord($searchConfig);
                            if (!$this->importData['search_config_id']) {
                                $aResults['error_msg']['search_configs'][] = 'search config' . $searchConfig['name'] . ' insert database fail!';
                                $aResults['error_num'] = $aResults['error_num'] + 1;
                            } else {
                                $aResults['success_msg']['search_configs'][] = 'search config' . $searchConfig['name'] . ' insert database!';
                            }
                        }

                    }
                    break;

                case 'search_item':
                    foreach ($aData as $searchItems) {
                        if ($this->importData['search_config_id']) {
                            foreach ($searchItems as $searchItem) {
                                $searchItem['search_config_id'] = $this->importData['search_config_id'];
                                $aWhere = [
                                    'search_config_id' => ['=', $searchItem['search_config_id']],
                                    'label' => ['=', $searchItem['label']]
                                ];
                                $aExists = SearchItem::doWhere($aWhere)->get()->toArray();
                                if (!empty($aExists)) {
                                    continue;
                                }

                                unset($searchItem['rel_title']);
                                $bSucc = SearchItem::createDataRecord($searchItem);
                                if (!$bSucc) {
                                    $aResults['error_msg']['search_item'][] = 'search item' . $searchItem['label'] . ' insert database fail!';
                                    $aResults['error_num'] = $aResults['error_num'] + 1;
                                } else {
                                    $aResults['success_msg']['search_item'][] = 'search item' . $searchItem['label'] . ' insert database!';
                                }

                            }
                        }


                    }
                    break;

                case 'functionality':
                    foreach ($aData as $functionalitys) {
                        foreach ($functionalitys as $functionality) {
                            if (empty($functionality)) {
                                continue;
                            }

                            if ($functionality['parent']) {
                                $aParentInfo = Functionality::doWhere(['title' => ['=', $functionality['parent']], 'controller' => ['<>', '']])->first();
                                $functionality['parent_id'] = isset($aParentInfo->id) ? $aParentInfo->id : 0;
                                $functionality['forefather_ids'] = isset($aParentInfo->forefather_ids) ? $aParentInfo->forefather_ids . ',' . $functionality['parent_id'] : $functionality['parent_id'];
                            } else {
                                $functionality['parent_id'] = 0;
                                $functionality['forefather_ids'] = 0;
                            }

                            $aExists = Functionality::doWhere(['title' => ['=', $functionality['title']]])->get()->toArray();
                            if (!empty($aExists)) {
                                //$this->importData['func_id'] = $aExists[0]['id'];
                                continue;
                            }

                            $functionality['search_config_id'] = $functionality['need_search'] ? $this->importData['search_config_id'] : 0;
                            unset($functionality['rel_title'], $functionality['search_config']);

                            $this->importData['func_id'] = Functionality::createDataRecord($functionality);

                            if (!$this->importData['func_id']) {
                                $aResults['error_msg']['functionality'][] = 'functionality ' . $functionality['title'] . ' insert database fail!';
                                $aResults['error_num'] = $aResults['error_num'] + 1;
                            } else {
                                $aResults['success_msg']['functionality'][] = 'functionality ' . $functionality['title'] . ' insert database!';

                            }
                        }


                    }
                    break;

                case 'params':
                    foreach ($aData as $params) {

                        if ($this->importData['func_id']) {
                            foreach ($params as $param) {

                                $param['functionality_id'] = $this->importData['func_id'];
                                $aWhere = [
                                    'functionality_id' => ['=', $param['functionality_id']],
                                    'name' => ['=', $param['name']]
                                ];
                                $aExists = FunctionalityParam::doWhere($aWhere)->get()->toArray();

                                if (!empty($aExists)) {
                                    continue;
                                }
                                unset($param['rel_title'], $param['functionality_name']);
                                $bSucc = FunctionalityParam::createDataRecord($param);
                                if (!$bSucc) {
                                    $aResults['error_msg']['params'][] = 'params ' . $param['name'] . ' insert database fail!';
                                    $aResults['error_num'] = $aResults['error_num'] + 1;
                                } else {
                                    $aResults['success_msg']['params'][] = 'params ' . $param['name'] . ' insert database!';

                                }
                            }
                        }

                    }
                    break;

                case 'relations':
                    foreach ($aData as $relations) {
                        foreach ($relations as $relation) {
                            $aRelations[] = $relation;
                        }
                    }

                    break;

                case 'admin_menus':
                    foreach ($aData as $adminMenus) {

                        if ($this->importData['func_id']) {
                            foreach ($adminMenus as $adminMenu) {
                                $adminMenu['functionality_id'] = $this->importData['func_id'];
                                $aExists = AdminMenu::doWhere(['title' => ['=', $adminMenu['title']]])->get()->toArray();
                                if (!empty($aExists)) {
                                    continue;
                                }

                                if ($adminMenu['parent']) {
                                    $aParentInfo = AdminMenu::doWhere(['title' => ['=', $adminMenu['parent']]])->first();
                                    $adminMenu['parent_id'] = isset($aParentInfo->id) ? $aParentInfo->id : 0;
                                    $adminMenu['forefather_ids'] = isset($aParentInfo->forefather_ids) ? $aParentInfo->forefather_ids . ',' . $aParentInfo['parent_id'] : $aParentInfo['parent_id'];
                                }
                                unset($adminMenu['rel_title'], $adminMenu['functionality_name']);
                                $bSucc = AdminMenu::createDataRecord($adminMenu);
                                if (!$bSucc) {
                                    $aResults['error_msg']['admin_menus'][] = 'admin menu ' . $adminMenu['title'] . ' insert database fail!';
                                    $aResults['error_num'] = $aResults['error_num'] + 1;
                                } else {
                                    $aResults['success_msg']['admin_menus'][] = 'admin menu ' . $adminMenu['title'] . ' insert database!';

                                }
                            }
                        }


                    }
                    break;
                default:

            }

        }

        //补关系数据
        if (empty($aRelations)) {
            return false;
        }

        foreach ($aRelations as $relation) {

            $relation['functionality_id'] = 0;
            if ($relation['functionality_name']) {
                $aFunctionalityInfo = Functionality::doWhere(['title' => ['=', $relation['functionality_name']]])->first();
                $relation['functionality_id'] = isset($aFunctionalityInfo->id) ? $aFunctionalityInfo->id : 0;
            }

            $relation['r_functionality_id'] = 0;
            if ($relation['r_functionality_name']) {
                $aRelFunctionalityInfo = Functionality::doWhere(['title' => ['=', $relation['r_functionality_name']]])->first();
                $relation['r_functionality_id'] = isset($aRelFunctionalityInfo->id) ? $aRelFunctionalityInfo->id : 0;
            }

            $aWhere = [
                'functionality_id' => ['=', $relation['functionality_id']],
                'r_functionality_id' => ['=', $relation['r_functionality_id']],
                'label' => ['=', $relation['label']]
            ];
            $aExists = FunctionalityRelation::doWhere($aWhere)->get()->toArray();
            if (!empty($aExists)) {
                continue;
            }
            unset($relation['rel_title'], $relation['functionality_name'], $relation['r_functionality_name']);

            $bSucc = FunctionalityRelation::createDataRecord($relation);

            $aCarr = [$relation['functionality_id'], $relation['r_functionality_id']];
            if (!$bSucc) {
                $aResults['error_msg']['relations'][] = 'relations  ' . implode('#', $aCarr) . ' insert database fail!';
                $aResults['error_num'] = $aResults['error_num'] + 1;
            } else {
                $aResults['success_msg']['relations'][] = 'relations  ' . implode('#', $aCarr) . ' insert database!';

            }
        }

        if ($aResults['error_num'] > 0) {
            dd($aResults['error_msg']);
        } else {
            pr($aResults['error_msg']);
            dd('import  ' . $sController . ' is success!');
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
        $id = $oModel->id or $id = 'null';
        $iParentId = $oModel->parent_id or $iParentId = null;
        if (isset($sClassName::$rules['title'])) {
            $aRules = array_merge($sClassName::$rules, ['title' => sprintf($sClassName::$rules['title'], $id, $iParentId)]);
        } else {
            $aRules = &$sClassName::$rules;
        }
        if (empty($iParentId)) {
            unset($aRules['controller'], $aRules['action']);
        }
        return $aRules;
    }

    /**
     * 过滤不需要的字段
     *
     * @param        $aData
     * @param string $sFuncTitle
     * @param string $sDataType
     * @param string $sSearchConfig
     *
     * @return bool
     */
    private function _filterField(&$aData, $sFuncTitle = '', $sDataType = '', $sSearchConfig = '') {
        if (empty($aData)) {
            return false;
        }

        $aFilterField = [
            'id',
            'search_config_id',
            'created_at',
            'updated_at',
            'parent_id',
            'forefather_ids'
        ];

        if ($sDataType == 'functionality') {
            unset($aFilterField['search_config_id']);
        }

        foreach ($aData as $key => $item) {
            if (empty($item)) {
                continue;
            }
            foreach ($item as $k => $v) {
                if ($k == 'functionality_id') {
                    $aData[$key]['functionality_name'] = Functionality::find($v)->title;
                    unset($aData[$key]['functionality_id']);

                }
                if ($k == 'r_functionality_id') {
                    $aData[$key]['r_functionality_name'] = Functionality::find($v)->title;
                    unset($aData[$key]['r_functionality_id']);
                }

                if (in_array($k, $aFilterField)) {
                    unset($aData[$key][$k]);
                }
                $aData[$key]['rel_title'] = $sFuncTitle;
                if ($sDataType == 'functionality') {
                    $aData[$key]['search_config'] = $sSearchConfig;
                }

            }
        }

    }

    /**
     * 拼装ＳＱＬ
     *
     * @param  array $aData
     * @param string $sTableName
     *
     * @return string
     */
    private function getSql($aData, $sTableName = '') {
        $sSql = '';
        if (empty($aData)) {
            return $sSql;
        }
        $sSql = 'INSERT INTO `' . $sTableName . '` VALUES ';
        foreach ($aData as $item) {
            if (empty($item)) {
                continue;
            }
            if (is_array($item)) {
                $sSql .= "('" . implode("','", $item) . "'),";
            } else {
                $sSql .= "('" . implode("','", $aData) . "'),";
                break;
            }
        }
        $sSql = trim($sSql, ',');
        $sSql .= ';' . "\n";
        return $sSql;
    }


}

