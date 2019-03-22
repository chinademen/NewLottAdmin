<?php

/**
 * Bulletin
 *
 * @author lawrence
 */

namespace App\Http\Controllers;


use App\Models\BulletinType;

class BulletinController extends AdminBaseController {

    protected $modelName = 'App\Models\Bulletin';
    protected $customViewPath='custom.bulletin';
    protected $customViews=['create','edit'];

    protected function beforeRender() {
        parent::beforeRender();
        $aBulletinType = BulletinType::getSelectSearchArrays();
        $this->setVars(compact('aBulletinType'));
    }

}