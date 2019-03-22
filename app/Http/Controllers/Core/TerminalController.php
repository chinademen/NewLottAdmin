<?php

/**
 * Terminal
 * @author lawrence
 */

namespace App\Http\Controllers;

class TerminalController extends AdminBaseController{

    protected $modelName = 'App\Models\Terminal';

    protected function beforeRender(){
        parent::beforeRender();
        $aStatus = baseOption('base.terminal.status');
        $this->setVars(compact("aStatus"));
    }

}