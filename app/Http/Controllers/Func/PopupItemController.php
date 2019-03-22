<?php
namespace App\Http\Controllers;

use App\Models\Popup;
/**
 * 弹出窗口输入项配置
 *
 * @author system
 */
class PopupItemController extends AdminBaseController {

    protected $modelName = 'App\Models\PopupItem';
    protected $resource  = 'popup-items';

    protected function beforeRender() {
        parent::beforeRender();
        $this->setVars('aPopups', Popup::getTitleList());
    }

}