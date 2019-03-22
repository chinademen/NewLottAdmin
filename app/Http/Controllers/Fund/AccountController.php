<?php

/**
 * Account
 * @author lawrence
 */

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Merchant;

use ViewHelper;
use Illuminate\Http\Request;

class AccountController extends AdminBaseController {

    protected $modelName = 'App\Models\Account';

    protected $customViewPath = 'fund.account';
    protected $customViews = [
        'index',
    ];

    function __construct(Request $request) {
        parent::__construct($request);
    }

    protected function beforeRender() {
        parent::beforeRender();
        $aMerchants = Merchant::getSelectSearchArrays();

        $aIsTester = baseOption('base.isTester');
        $this->setVars(compact('aIsTester','aMerchants'));
    }

    /**
     * down功能的参数用index的
     */
    protected function setFunctionality() {
        if($this->action == 'download') $this->action = 'index';
        parent::setFunctionality();
    }

    /**
     * 把w.search 替换成 w.search_download
     *
     * @param $sWidget
     */
    protected function addWidget($sWidget) {
        if($sWidget == 'w.search') $sWidget = 'w.search_download';
        parent::addWidget($sWidget);
    }


    public function index() {
        $aConditions = &$this->makeSearchConditions();
        $aConditions['balance'] = [ '>', 0 ];
        $merchant_id=session('merchant_id');
        if($merchant_id){
            $aConditions['merchant_id'] = [ '=', $merchant_id ];
            $showFiles=false;
        }else{
            $showFiles=true;
        }

        $sumInfo = Account::getAccountSumInfo($aConditions);
        $this->setVars(compact('sumInfo','showFiles'));
        return parent::index();
    }

    public function download(){
        $oQuery = $this->indexQuery();
        $datas = $oQuery->get(Account::$columnForList);
        if (count($datas) > 0) {
            $this->setVars(compact('datas'));
            $this->action = 'view';
            $this->beforeRender();
            $this->compileRenderVars();
            $aData = [];
            foreach ($datas as $k => $v) {
                foreach (Account::$columnForList as $vk) {
                    $aData[$k][] = ViewHelper::compileDisplayValue($v, $vk, $this->viewVars['aViewSettings'], $this->viewVars['aArrayVars'], $sClass);
                }
            }
            (new Account())->downloadExcel(Account::$columnForList, $aData, 'Account List', '../uploads/', 'Browser');
            exit;
        }
        return $this->goBack('error', ___('_basic.no-data'));
    }


}