<?php
namespace App\Server;

use  Input;
use  Illuminate\Support\Str;
use  App\Models\System\SysError;

/**
 * Api分发类
 *
 * @author winter
 */

/**
 * Class ApiService
 * @package App\Server
 */
class ApiService {

    public static function doService() {
        $sAction = Input::get('action');
        if (!$sAction) {
            $aReponse = self::compileResponse(SysError::MISSING_ACTION);
            self::halt($aReponse);
        }
        $sClass = 'App\Server\\'.Str::studly($sAction);
        $sClass .= 'Server';
        if (!class_exists($sClass)) {
            $aReponse = self::compileResponse(SysError::ACTION_NOT_DEFINED);
            self::halt($aReponse);
        }
        if (!$oServer = new $sClass) {
            $aReponse = self::compileResponse(SysError::MISSING_ACTION);
            self::halt($aReponse);
        }

        $aReponse = $oServer->fire();
        self::halt($aReponse, $oServer);
    }

    private static function halt(& $aReponse, $oServer = null) {

        if ($oServer && $oServer->safekey) {
            $aReponse['sign'] = Signature::compileSign($aReponse, $oServer->safekey);
        }
        $sReponse = json_encode($aReponse);
        self::encode($sReponse);
        die($sReponse);
    }

    private static function encode(& $sReponse) {
        /*if (!env('APP_DEBUG')) {
            $sReponse = base64_encode($sReponse);
        }*/
    }

    private static function & compileResponse($iErrno, $sExtraInfo = null) {
        $a = [
            'errno' => $iErrno,
            'error' => SysError::getMessage($iErrno, $sExtraInfo)
        ];
        return $a;
    }

}

