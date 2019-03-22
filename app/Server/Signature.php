<?php
namespace App\Server;
/**
 * 签名类
 *
 * @author winter
 */
class Signature {

    public static function compileSign($aData, $sSafeKey) {
        $sString = http_build_query($aData);
        $sString = urlencode(urldecode($sString));
        $sString .= $sSafeKey;
        return md5($sString);
    }
}
