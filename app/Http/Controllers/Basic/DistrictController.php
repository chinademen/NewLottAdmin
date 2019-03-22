<?php
namespace App\Http\Controllers;


use DB;
use Auth;
use App\Models\District;

class DistrictController extends AdminBaseController {


    /**
     * 资源模型名称，初始化后转为模型实例
     */
    protected $modelName = 'App\Models\District';
    protected $resource = 'districts';

    protected function beforeRender() {

        $aProvinces = District::getAllProvinces();

        $this->setVars(compact('aProvinces'));


        parent::beforeRender();
    }

    public function generateWidget() {
        $aDistricts = District::getCitiesByProvince();
        $sRootPath = realpath(app_path() . '/../widgets/');
        $sPath = $sRootPath . '/data/';
        $sDataName = 'province_cities';
        $sFile = $sDataName . '.blade.php';
        $sDisplayName = $sFile;
        $sFileName = $sPath . $sFile;
        if (file_exists($sFileName)) {
            if (!is_writable($sFileName)) {
                return ['successful' => false, 'message' => ___('_basic.file-not-writable', ['file' => $sDisplayName])];
            }
        } else {
            if (!is_writeable($sPath)) {
                return ['successful' => false, 'message' => ___('_basic.file-write-fail-path', ['path' => $sPath])];
            }
        }
        if (!$bSucc = @file_put_contents($sFileName, "var selectorData =  " . json_encode($aDistricts) . '')) {

        }
        $sLangKey = '_basic.' . ($bSucc ? 'generated' : 'file-write-fail');
        $aReturn = [
            'successful' => $bSucc,
            'message' => ___($sLangKey, ['file' => $sDisplayName])
        ];
        $sKey = $aReturn['successful'] ? 'success' : 'error';
        return $this->goBackToIndex($sKey, $aReturn['message']);
    }

}
