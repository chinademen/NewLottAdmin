<?php

/**
 * 商户关闭彩种
 * @author lawrence
 */

namespace App\Http\Controllers;

use App\Models\Lottery;
use App\Models\Merchant;
use App\Models\SeriesMethod;
use App\Models\SeriesWay;
use App\Models\WayGroup;
use Carbon\Carbon;

class MerchantLotteryCloseController extends AdminBaseController {
    protected $modelName = 'App\Models\MerchantLotteryClose';

    protected $customViewPath = 'merchant';

    protected function beforeRender() {
        parent::beforeRender();
        $aMerchants = Merchant::getSelectSearchArrays();
        $this->setVars(compact('aMerchants'));
    }

    public function create($id = null) {
        if($this->request->method() == 'POST'){
            $oMerchantLotteryClose = $this->modelName::where([ 'merchant_id' => $this->params['merchant_id'] ])->first();
            $oMerchant = \App\Models\Merchant::find($this->params['merchant_id']);
            if(!$oMerchant){
                return $this->goBack('error', 'Merchant Non-existent');
            }
            if($oMerchantLotteryClose){
                return $this->goBack('error', 'MerchantLotteryClose Already existed');
            }

        }

        return parent::create();
    }

    // 商户关闭彩种
    public function closeLottery() {
        $sColumn = 'lottery_ids';
        if($this->request->ajax()){
            $r = $this->_changeStatus($this->request, $sColumn);

            return response()->json([ 'status' => $r ]);

        }else{
            $oObj = $this->_baseSetting();
            $aLotteryClosed = $oObj[ $sColumn ]; // 已关闭的彩种
            $this->render();
            $sPageTitle = 'local-Close Lottery - _function.close lottery';// 页面标题
            $resourceName = 'Close Lottery'; /// 重写导航栏
            $datas = Lottery::get([ 'id', 'name', 'updated_at' ]); // 数据
            $datas = $this->_setStatusAttribute($datas, $aLotteryClosed);
            $sDataUpdatedTime = $datas->count() ? $datas[0]->updated_at : Carbon::now()->toDateTimeString(); // 数据时间
            $this->setVars(compact('sPageTitle', 'resourceName', 'sDataUpdatedTime', 'datas'));

            return view($this->view)->with($this->viewVars);
        }

    }

    // 商户关闭玩法组
    public function closeWayGroup() {
        $sColumn = 'way_group_ids';
        if($this->request->ajax()){
            $bResult = $this->_changeStatus($this->request, $sColumn);

            return response()->json([ 'status' => $bResult ]);
        }else{
            $oObj = $this->_baseSetting();
            $aClosedArray = $oObj[ $sColumn ]; // 已关闭的玩法组
            $this->render();
            $sPageTitle = 'local-Close Lottery - _function.close way group';// 页面标题
            $resourceName = 'Close Way Group'; /// 重写导航栏
            $oDatas = WayGroup::get([ 'id', 'title as name', 'updated_at' ]); // 数据
            $datas = $this->_setStatusAttribute($oDatas, $aClosedArray);
            $sDataUpdatedTime = $datas->count() ? $datas[0]->updated_at : Carbon::now()->toDateTimeString(); // 数据时间
            $this->setVars(compact('sPageTitle', 'resourceName', 'sDataUpdatedTime', 'datas'));

            return view($this->view)->with($this->viewVars);
        }
    }

    // 商户关闭系列玩法
    public function closeSeriesMethod() {
        $sColumn = 'series_method_ids';
        if($this->request->ajax()){
            $bResult = $this->_changeStatus($this->request, $sColumn);

            return response()->json([ 'status' => $bResult ]);
        }else{
            $oObj = $this->_baseSetting();
            $aClosedArray = $oObj[ $sColumn ]; // 已关闭的玩法组
            $this->render();
            $sPageTitle = 'local-Close Lottery - _function.close series method';// 页面标题
            $resourceName = 'Close Series Method'; /// 重写导航栏
            $oDatas = SeriesMethod::get([ 'id', 'name', 'updated_at' ]); // 数据
            $datas = $this->_setStatusAttribute($oDatas, $aClosedArray);
            $sDataUpdatedTime = $datas->count() ? $datas[0]->updated_at : Carbon::now()->toDateTimeString(); // 数据时间
            $this->setVars(compact('sPageTitle', 'resourceName', 'sDataUpdatedTime', 'datas'));

            return view($this->view)->with($this->viewVars);
        }
    }

    // 商户关闭系列投注方式
    public function closeSeriesWay() {
        $sColumn = 'series_way_ids';
        if($this->request->ajax()){
            $bResult = $this->_changeStatus($this->request, $sColumn);

            return response()->json([ 'status' => $bResult ]);
        }else{
            $oObj = $this->_baseSetting();
            $aClosedArray = $oObj[ $sColumn ]; // 已关闭的玩法组
            $this->render();
            $sPageTitle = 'local-Close Lottery - _function.close series way';// 页面标题
            $resourceName = 'Close Series Way'; /// 重写导航栏
            $oDatas = SeriesWay::get([ 'id', 'name', 'updated_at' ]); // 数据
            $datas = $this->_setStatusAttribute($oDatas, $aClosedArray);
            $sDataUpdatedTime = $datas->count() ? $datas[0]->updated_at : Carbon::now()->toDateTimeString(); // 数据时间
            $this->setVars(compact('sPageTitle', 'resourceName', 'sDataUpdatedTime', 'datas'));

            return view($this->view)->with($this->viewVars);
        }
    }

    /**
     * 开启|关闭
     *
     * @param $request  表单提交的数据[merchant_id,id,status|0关闭,1开启]
     * @param $sColumn  修改的字段
     *
     * @return mixed true | false 是否修改成功
     */
    protected function _changeStatus($request, $sColumn) {
        $oObj = $this->modelName::find($request->merchant_id);
        $aIds = is_array($oObj->$sColumn) ? $oObj->$sColumn : [];
        if($request->status == 0){ // 关闭
            array_push($aIds, $request->id);
        }else{
            $iKey = array_search($request->id, $aIds);
            if($iKey !== false) unset($aIds[ $iKey ]);
        }
        sort($aIds);
        $oObj->$sColumn = $aIds;

        return $oObj->forceSave();
    }

    /**
     * 添加状态字段
     *
     * @param $oDatas        [彩种/玩法组/玩法/投注方式]数组
     * @param $aExistedArray 已关闭的[彩种/玩法组/玩法/投注方式]数组
     *
     * @return \Illuminate\Support\Collection collection 对象
     */
    protected function _setStatusAttribute($oDatas, $aExistedArray) {
        $aMerchantCloseStatus = baseOption('base.merchant.close_status');

        return $oDatas->each(function($item) use ($aExistedArray, $aMerchantCloseStatus) {
            if(is_array($aExistedArray) && in_array($item->id, $aExistedArray)){
                $item->setAttribute('status_text', $aMerchantCloseStatus[0]);
                $item->setAttribute('status', 1);
            }else{
                $item->setAttribute('status_text', $aMerchantCloseStatus[1]);
                $item->setAttribute('status', 0);
            }
        });
    }

    /**
     * 通用数据
     * @return mixed
     */
    protected function _baseSetting() {
        $this->view = 'merchant.closeDefault';
        $aColumnForList = [ 'id', 'name', 'status_text' ];
        $iMerchant_id = request('merchant_id');
        $sRoute = $this->resource.'.'.$this->action;
        $this->setVars(compact('aColumnForList', 'iMerchant_id', 'sRoute'));

        return $this->modelName::find($iMerchant_id);
    }

}