<?php

namespace App\Http\Controllers;

use App\Models\Dictionary;
use DB;
use Auth;
use App\Models\Menu;
use Config;
/**
 * 词汇管理控制器
 */
class VocabularyController extends AdminBaseController {

    protected $modelName = 'App\Models\Vocabulary';
    protected $resource = 'vocabularies';

    /**
     * 在渲染前执行，为视图准备变量
     */
    protected function beforeRender() {
        parent::beforeRender();

        $aDicts = & Dictionary::getTitleList();
        $this->setVars(compact('aDicts'));
    }

    /**
     * 导入所有需要国际化的信息
     *
     * @param null $id
     *
     * @return RedirectResponse|\Illuminate\Http\RedirectResponse
     */
    public function import($id = null) {
        $iDictionaryId = $id;
        if ($iDictionaryId == null) {
            $sMsg = __(sprintf('invalid dictionary !'));
            return $this->goBackToIndex('error', $sMsg);
        }
        $aDic = Dictionary::find($iDictionaryId)->getAttributes();
        $aModels = [
            'Functionality' => 'App\Models\Functionality',
            'FunctionalityRelation' => 'App\Models\FunctionalityRelation',
            'Menu' => 'App\Models\Menu',
            'SearchItem' => 'App\Models\SearchItem',
            'SysModelColumn' => 'App\Models\SysModelColumn',
            'SysModel' => 'App\Models\SysModel',
        ];
        if (is_array($aDic) && $aDic['models']) {
            $this->model->getConnection()->beginTransaction();
            $aVocabulary = $aKeyWords = [];
            foreach (explode(",", $aDic['models']) as $val) {
                $aConfig = explode('|', $val);
                $aModel = explode(".", $aConfig[0]);
                $sModelName = $aModel[0];
                $sField = count($aModel) == 2 ? $aModel[1] : $sModelName::$titleColumn;
                $oModel = new $aModels[$sModelName];
                $aConditions = [];

                if (isset($aConfig[1])) {
                    $aTmp = explode('=', $aConfig[1]);
                    $aConditions = [
                        $aTmp[0] => ['=', $aTmp[1]]
                    ];
                } else {
                    $aConditions = [
                        $aModel[1] => ['!=', ''],
                    ];
                }
                $aValues = $oModel->getValueListArray($sField, $aConditions);
                $aFields = [$sField];
                $aTranslateFields = [];
                if ($aDic['en_column']) {
                    $aFields[] = $aDic['en_column'];
                    $aTranslateFields['en'] = $aDic['en_column'];
                }
                if ($aDic['zh_column']) {
                    $aFields[] = $aDic['zh_column'];
                    $aTranslateFields['zh_cn'] = $aDic['zh_column'];
                }
                $aOriValues = $oModel->doWhere($aConditions)->get($aFields)->toArray();
                $aValues = [];
                foreach ($aOriValues as $aInfo) {
                    $aValues[strtolower($aInfo[$sField])] = $aInfo;
                }
                $aToImportKeywords = array_keys($aValues);
                $aToImportKeywords = array_map('strtolower', $aToImportKeywords);
                $aKeyWords = array_merge($aKeyWords, $aToImportKeywords);
            }

            $aKeyWords = array_unique($aKeyWords);
            $aConditions = [
                'dictionary_id' => ['=', $iDictionaryId],
            ];
            empty($aKeyWords) or $aConditions['keyword'] = ['in', $aKeyWords];
            $aExistKeyWords = $this->model->getValueListArray('keyword', $aConditions, null, false);
            $aKeyWords = array_diff($aKeyWords, $aExistKeyWords);
            foreach ($aKeyWords as $sKeyword) {
                $data = [
                    'dictionary_id' => $iDictionaryId,
                    'dictionary' => $aDic['name'],
                    'keyword' => $sKeyword
                ];
                foreach ($aTranslateFields as $sToField => $sKey) {
                    $data[$sToField] = $aValues[$sKeyword][$sKey];
                }
                $aVocabulary[] = $data;
            }
            if (count($aVocabulary)) {
                if ($bSucc = $this->model->insert($aVocabulary)) {
                    DB::connection()->commit();
                    $sMsg = ___('_basic.imported', $this->langVars);
                    $sMsgKey = 'success';
                } else {
                    DB::connection()->rollback();
                    $this->langVars['reason'] = $this->model->getValidationErrorString();
                    $sMsg = ___('_basic.import-fail', $this->langVars);
                    $sMsgKey = 'error';
                }
            } else {
                $sMsg = ___('_basic.no-data');
                $sMsgKey = 'error';
            }
            return $this->goBack($sMsgKey, $sMsg);
        }
        return $this->goBack('error', ___('_basic.no-data'));
    }

}