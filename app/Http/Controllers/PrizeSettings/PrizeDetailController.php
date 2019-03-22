<?php

/**
 * Prize Details
 *
 * @author lawrence
 */

namespace App\Http\Controllers;


class PrizeDetailController extends AdminBaseController {

    protected $modelName = 'App\Models\PrizeDetail';

    protected function beforeRender() {
        parent::beforeRender();
    }

}