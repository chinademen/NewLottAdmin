<?php

/**
 * Transactions
 *
 * @author lawrence
 */

namespace App\Http\Controllers;


use App\Models\AdminUser;
use App\Models\Lottery;
use App\Models\SeriesWay;
use App\Models\Terminal;
use App\Models\TransactionType;
use App\Models\User;
use App\Models\Transaction;
use ViewHelper;
use Illuminate\Support\Facades\Redis;
use Coefficient;

class TransactionController extends ComplicatedSearchController {

    protected $modelName = 'App\Models\Transaction';

    protected $searchBlade = 'w.transaction_search';
    protected function beforeRender() {
        parent::beforeRender();
        $aIsTester = baseOption('base.isTester');
        $aTransactionTypes = TransactionType::getSelectSearchArrays(['id','cn_title']);
        $aAdminUsers = AdminUser::getSelectSearchArrays();
        $aWays = SeriesWay::getSelectSearchArrays();
        $aLotteries = Lottery::getSelectSearchArrays();
        $aCoefficients = Coefficient::$coefficients;
        $aTerminals = Terminal::getSelectSearchArrays();
        $this->setVars(compact('aWays','aIsTester','aTransactionTypes','aAdminUsers','aCoefficients','aLotteries','aTerminals'));
        //dd($this->viewVars['aSearchFields']);
    }

    /**
     * down功能的参数用index的
     */
    protected function setFunctionality() {
        if($this->action == 'download') $this->action = 'index';
        parent::setFunctionality();
    }


    protected function setSearchInfo() {
        if(empty($this->params['username'])){
            if(!empty($this->params['user_id'])) {
                $oUsers = User::find($this->params['user_id']);
                if (!empty($oUsers->id)) {
                    $this->params['username'] = $oUsers->username;
                }
            }
        }else{
            $oUsers = User::where('username','=',$this->params['username'])->first();
            if(!empty($oUsers->id)){
                $this->params['user_id'] = $oUsers->id;
            }
        }
        parent::setSearchInfo();
    }

    protected function compileParams(){
        if(!empty($this->params['user_id'])){
            $oUsers = User::where('username','=',$this->params['user_id'])->first();
            $this->params['user_id'] = $oUsers->id??0;
        } //dd($this->params);
    }


    public function download(){
        $oQuery = $this->indexQuery();
        $datas = $oQuery->get(Transaction::$columnForList);
        if (count($datas) > 0) {
            $this->setVars(compact('datas'));
            $this->action = 'view';
            $this->beforeRender();
            $this->compileRenderVars();
            $aData = [];
            foreach ($datas as $k => $v) {
                foreach (Transaction::$columnForList as $vk) {
                    $aData[$k][] = ViewHelper::compileDisplayValue($v, $vk, $this->viewVars['aViewSettings'], $this->viewVars['aArrayVars'], $sClass);
                }
            }
            (new Transaction())->downloadExcel(Transaction::$columnForList, $aData, 'Transaction List', '../uploads/', 'Browser');
            exit;
        }
        return $this->goBack('error', ___('_basic.no-data'));
    }
}