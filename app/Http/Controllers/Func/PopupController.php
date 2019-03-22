<?php

namespace App\Http\Controllers;

use App\Models\Popup;

use DB;
use Auth;
use App\Models\Menu;
use config;
/**
 * 操作确认窗口配置
 *
 * @author system
 */
class PopupController extends AdminBaseController {

    protected $modelName = 'App\Models\Popup';
    protected $resource  = 'popups';

    protected function beforeRender() {
        parent::beforeRender();

        $aLoginUser = Auth::user();

        
        
        
        

        $this->setVars('aValidMethods', Popup::getValidMethods());
    }

}