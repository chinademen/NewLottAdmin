<?php

/**
 * Bulletin Type
 *
 * @author lawrence
 */

namespace App\Http\Controllers;


class BulletinTypeController extends AdminBaseController {

    protected $modelName = 'App\Models\BulletinType';

    protected function beforeRender() {
        parent::beforeRender();
    }

}