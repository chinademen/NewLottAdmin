<?php

namespace App\Http\Controllers;

use App\Models\SysModel;
use App\Models\SysConfig;
use App\Models\Dictionary;
use App\Models\Vocabulary;
use Illuminate\Support\Str;

use DB;
use Auth;
use App\Models\Menu;
use Schema;
use Config;

class DictionaryController extends AdminBaseController {

    protected $modelName = 'App\Models\Dictionary';
    protected $resource = 'dictionaries';

    /**
     * 从模型表的数据建立对应的字典
     * @return Redirect
     */
    public function createFromModels(){
        $aModels = & SysModel::getTitleList();
        foreach ($aModels as $sModelName){
            $aTmp = explode('\\', $sModelName);
            $sShortName = strtolower($aTmp[count($aTmp) - 1]);
            $aConditons  = [
                'name' => [ '=',$sShortName]
            ];
            $modelName  = $this->modelName;
            $oQuery      = $modelName::doWhere($aConditons);
            $oDictionary = $oQuery->get(['id'])->first();
            if (!empty($oDictionary)){
                continue;
            }

            $aDictionary = [
                'name'      => $sShortName ,
                'models'    => 'SysModelColumn.name|sys_model_name=' . $sModelName,
                'zh_column' => 'column_comment'
            ];
            $aFailed     = [];
            $oDictionary = new Dictionary($aDictionary);
            if (!$oDictionary->save()){
                $aFailed[] = $sModelName;
            }
        }
        if ($bSucc = empty($aFailed)){
            $sKey     = 'success';
            $sMessage = ___('_dictionary.model-dictionaries-created');
        }
        else{
            $sKey     = 'error';
            $sMessage = ___('_dictionary.model-dictionaries-create-failed',['models' => implode(',',$aFailed)]);
        }
        return $this->goBackToIndex($sKey,$sMessage);
    }

    /**
     * 生成all语言包文件，存放在相应语言包位置app/lang/en|zh-CN
     * @return response
     */
    public function generateAll(){
        $aDics = & Dictionary::getTitleList();
        $bSucc = true;
        foreach($aDics as $id => $name){
            $aReturn = $this->_generate($id);
            if (!$bSucc = $aReturn['successful']){
                break;
            }
        }
        $sKey = $bSucc ? 'success' : 'error';
        $sMsg = $bSucc ? ___('_basic.all-generated',$this->langVars) : $aReturn['message'];
        return $this->goBackToIndex($sKey, $sMsg);
    }

    /**
     * 生成语言包文件，存放在相应语言包位置app/lang/en|zh-CN
     * @param int $iDirectoryId 字典id
     * @return response
     */
    public function generate($iDirectoryId = null) {
        if ($iDirectoryId == null) {
            $sMsg = ___('_basic.missing', $this->langVars);
            return $this->goBackToIndex('error', $sMsg);
        }
        $aReturn = $this->_generate($iDirectoryId);
        $sKey = $aReturn['successful'] ? 'success' : 'error';
        return $this->goBackToIndex($sKey, $aReturn['message']);
    }

    /**
     * 生成语言包文件，存放在相应语言包位置app/lang/en|zh-CN
     * @param int $iDirectoryId 字典id
     * @return array    [successful,message]
     */
    private function _generate($iDirectoryId = null) {
        if ($iDirectoryId == null) {
            $sMsg = ___('invalid dictionary!');
            return [
                'successful' => false,
                'message' => ___('_basic.missing', $this->langVars)
            ];
        }
        $aConditions = [
            'dictionary_id' => ['=',$iDirectoryId],
        ];
        $sLanguages = SysConfig::readValue('sys_support_languages');
        $aLanguages = explode(',', $sLanguages);

        $aLangs = [];
        $oVocabulary = new Vocabulary;
        $aOriginalColumns = Schema::getColumnListing( $oVocabulary->getTable() );

        $aMissingFields = [];
        foreach($aLanguages as $sLang){
            $sField = Str::slug($sLang, '_');
            if (!in_array($sField, $aOriginalColumns)){
                $aMissingFields[] = $sLang;
            }
            $aFields[] = $sField;
            $aLangs[$sField] = $sLang;
        }
        if ($aMissingFields){
            return [
                'successful' => false,
                'message' => ___('_basic.generate-fail') . ':' . ___('_basic.missing-columns', ['columns' => implode(',',$aMissingFields)])
            ];
        }
        unset($aOriginalColumns);

        $aFields[] = 'keyword';
        $sDicName = strtolower(Dictionary::find($iDirectoryId)->getAttribute('name'));
        $sRootPath = base_path() . '/resources/lang/';
        $aWords = [];
        if ($oVocabularies = $oVocabulary->doWhere($aConditions)->orderBy('keyword','asc')->get($aFields)){
            foreach ($oVocabularies as $aVal) {
                foreach($aLangs as $sField => $sLang){
                    if (empty($aVal->$sField)) continue;
                    $aWords[$sLang][$aVal->keyword] = $aVal->$sField;
                }
            }
        }
        unset($oVocabularies);
        if (empty($aWords)){
            return ['successful' => true, 'message' => ___('_basic.no-data')];
        }
        $bSucc = true;
        $sDisplayName = null;
        foreach($aWords as $sLang => $aWordOfLang){
            $sPath = $sRootPath . $sLang;
            $sFile = '_' . $sDicName . '.php';
            $sDisplayName = $sLang . '/' . $sFile;
            $sFileName = $sPath . '/' . $sFile;
            if (file_exists($sFileName)){
                if (!is_writable($sFileName)){
                    return ['successful' => false, 'message' => ___('_basic.file-not-writable', ['file' => $sDisplayName])];
                }
            }
            else{
                if (!is_writeable($sPath)){
                    return ['successful' => false, 'message' => ___('_basic.file-write-fail-path', ['path' => $sPath])];
                }
            }
            if (!$bSucc = @file_put_contents($sFileName, "<?php\nreturn " . var_export($aWordOfLang, true) . ';')){
                break;
            }
        }
        $sLangKey = '_basic.' . ($bSucc ? 'generated' : 'file-write-fail');
        $aReturn = [
            'successful' => $bSucc,
            'message' => ___($sLangKey, ['file' => $sDisplayName])
        ];
        return $aReturn;
    }

    /**
     * 从语言包文件中导入词汇
     */
    public function importFromFiles(){
//        $this->importFromOldFiles();
//        exit;
        set_time_limit(0);
        $sRootPath = app_path() . '/../resources/lang/';
        $aLangs = glob($sRootPath . '*');
        $aVocabularies = [];
        foreach($aLangs as $sLangPath){
            $sLang = str_replace('-','_',strtolower(basename($sLangPath)));
            $files = glob($sLangPath . '/_*.php');
            foreach($files as $sFile){
                $sDicName = substr(basename($sFile),1,-4);
                isset($aVocabularies[$sDicName]) or $aVocabularies[$sDicName] = [];
                $aVocabulariesOfFile = include($sFile);
                foreach($aVocabulariesOfFile as $sKey => $sTranslate){
                    $aVocabularies[$sDicName][$sKey]['keyword'] = $sKey;
                    $aVocabularies[$sDicName][$sKey][$sLang] = $sTranslate;
                }
            }
        }
        foreach($aVocabularies as $sDicName => $aDataOfDictionary){
            echo "$sDicName:<br />";
            $oDic = Dictionary::getDictionaryByName($sDicName);
            if (empty($oDic)){
                $oDic = new Dictionary;
                $oDic->name = $sDicName;
                if (!$oDic->save()){
                    echo '未能建立词典：' . $sDicName . '<br/>';
                    echo $oDic->getValidationErrorString() . '<br/>';
                    break;
                }
                echo '建立新词典成功<br/>';

            }
            $iImported = $iUpdated = 0;
            foreach($aDataOfDictionary as $sKeyword => $aTrans){
                isset($aTrans['en']) or $aTrans['en'] = '';
                isset($aTrans['zh_cn']) or $aTrans['zh_cn'] = '';
                $oVocabulary = Vocabulary::getByDictionaryAndKeyword($oDic->id, $sKeyword);
                if (empty($oVocabulary)){
                    $iImported++;
                    $oVocabulary = new Vocabulary;
                    $oVocabulary->dictionary_id = $oDic->id;
                    $oVocabulary->keyword = $sKeyword;
                }
                else{
                    if ($oVocabulary->en == $aTrans['en'] && $oVocabulary->zh_cn == $aTrans['zh_cn']){
                        continue;
                    }
                    $iUpdated++;
                }
                $oVocabulary->fill($aTrans);
            }
            echo "Done: $iImported Imported, $iUpdated Updated<br /><br />";
        }
        echo 'All Done<br/>';
        exit;
    }

    public function importFromOldFiles(){
        set_time_limit(0);
        $sRootPath = app_path() . '/../resources/lang/old/';
        $aLangs = glob($sRootPath . '*');
        $aVocabularies = [];
        foreach($aLangs as $sLangPath){
            $sLang = str_replace('-','_',strtolower(basename($sLangPath)));
            $files = glob($sLangPath . '/_*.php');
            foreach($files as $sFile){
                $sDicName = substr(basename($sFile),1,-4);
                isset($aVocabularies[$sDicName]) or $aVocabularies[$sDicName] = [];
                $aVocabulariesOfFile = include($sFile);
                foreach($aVocabulariesOfFile as $sKey => $sTranslate){
                    $aVocabularies[$sDicName][$sKey]['keyword'] = $sKey;
                    $aVocabularies[$sDicName][$sKey][$sLang] = $sTranslate;
                }
            }
        }

        foreach($aVocabularies as $sDicName => $aDataOfDictionary){

            $oDic = Dictionary::getDictionaryByName($sDicName);
            if (empty($oDic)){
                //$oDic = Dictionary::getDictionaryByName(ucfirst($sDicName));
                if (empty($oDic)){
                    //echo '无词典：' . $sDicName . '<br/>';
                    continue;
                }
            }
            //continue;
            echo "$sDicName:===============================<br />";
            $iImported = $iUpdated = 0;
            foreach($aDataOfDictionary as $sKeyword => $aTrans){
                isset($aTrans['en']) or $aTrans['en'] = '';
                isset($aTrans['zh_cn']) or $aTrans['zh_cn'] = '';
                $oVocabulary = Vocabulary::getByDictionaryAndKeyword($oDic->id, $sKeyword);
                if (empty($oVocabulary)){
                    $iImported++;
                    $oVocabulary = new Vocabulary;
                    $oVocabulary->dictionary_id = $oDic->id;
                    $oVocabulary->dictionary = $sDicName;
                    $oVocabulary->keyword = $sKeyword;
                }
                else{
                    if ((empty($aTrans['en']) || $oVocabulary->en == $aTrans['en']) && (empty($aTrans['zh_cn']) || $oVocabulary->zh_cn == $aTrans['zh_cn'])){
                        continue;
                    }
                    echo $sKeyword.'------------<br />';
                    echo $aTrans['en'] .'=>'. $oVocabulary->en .'<br />';
                    echo $aTrans['zh_cn'] .'=>'. $oVocabulary->zh_cn .'<br />';
                    empty($aTrans['en']) and $aTrans['en'] = $oVocabulary->en;
                    empty($aTrans['zh_cn']) and $aTrans['zh_cn'] = $oVocabulary->zh_cn;
                    $iUpdated++;
                }
                $oVocabulary->fill($aTrans);
                $bSucc = $oVocabulary->save();
                if(!$bSucc){
                    echo "$sKeyword: failed<br /><br />";
                }
            }
            echo "Done: $iImported Imported, $iUpdated Updated<br /><br />";
        }
        echo 'All Done<br/>';
        exit;
    }
}