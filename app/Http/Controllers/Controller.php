<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Restable;
use Config;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function renderData($data, $key = null, $sFormatType = 'json') {
        $aResponseData = [];
        if (!is_array($data)) {
            $aResponseData['coding'] = $data;
        } else {
            $aResponseData = $data;
        }
        isset($data['msg']) or $aResponseData['msg'] = __(Config::get('custom-code.' . $aResponseData['coding']));
        $aResponseData['coding'] = $aResponseData['coding'] > 0 ? 1 : $aResponseData['coding'];
        ksort($aResponseData);
        $sSign = md5(http_build_query($aResponseData) . $key);
        $aResponseData['sign'] = $sSign;
        return Restable::single($aResponseData)->render($sFormatType);
    }

    public function __destruct() {
    }
}
