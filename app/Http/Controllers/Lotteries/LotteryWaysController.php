<?php

/**
 * 彩种投注方式
 *
 * @author loren
 */

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\SeriesWay;
use App\Models\Lottery;
use App\Models\Terminal;
use App\Models\LotteryWays;
use App\Models\LotteryWayBlackList;

use Str;

class LotteryWaysController extends AdminBaseController {

    protected $modelName = 'App\Models\LotteryWays';
    protected $customViewPath = 'custom.lotteryWays';
    protected $customViews = [
        'index',
    ];

    protected function beforeRender() {
        parent::beforeRender();

        $this->setVars('aSeriesIds', Series::getSelectSearchArrays());
        $this->setVars('aSeriesWayIds', SeriesWay::getSelectSearchArrays());
        $this->setVars('aLotteryIds', Lottery::getSelectSearchArrays());
        $this->setVars('aTerminals', Terminal::getSelectSearchArrays());
    }

    /**
     * 加入到黑名单
     *
     * @param $id       彩种投注方式id
     * @param $terminal 终端id
     *
     * @return RedirectResponse
     */
    public function addBlackList($id, $terminal) {
        if (empty($id) || empty($terminal)) {
            return $this->goBack('error', ___('_basic.data-error'));
        }
        $oLotteryWay = LotteryWays::find($id);
        if (empty($oLotteryWay)) {
            return $this->goBack('error', ___('_basic.data-not-exists', ['data' => $this->langVars['resource']]));
        }
        $oLotteryWayBlackList = LotteryWayBlackList::doWhere(['lottery_way_id' => ['=', $id], 'terminal_id' => ['=', $terminal]])->first();
        if ($oLotteryWayBlackList) {
            return $this->goBack('error', ___('_lotteryways.data-in-black'));
        }
        $oLotteryWayBlackList = new LotteryWayBlackList();
        $oLotteryWayBlackList->lottery_id = $oLotteryWay->lottery_id;
        $oLotteryWayBlackList->series_way = $oLotteryWay->series_way_id;
        $oLotteryWayBlackList->lottery_way_id = $id;
        $oLotteryWayBlackList->terminal_id = $terminal;
        $bSucc = $oLotteryWayBlackList->save();
        //dd($bSucc,\DB::getQueryLog(),$oLotteryWayBlackList);
        if (!$bSucc) {
            return $this->goBack('error', ___('_lotteryways.add-black-failed'));
        }
        return $this->goBack('success', ___('_lotteryways.add-black-success'));
    }

    /**
     * 从黑名单移除
     *
     * @param $id       彩种投注方式id
     * @param $terminal 终端id
     *
     * @return RedirectResponse
     */
    public function removeBlackList($id, $terminal) {
        if (empty($id) || empty($terminal)) {
            return $this->goBack('error', ___('_basic.data-error'));
        }
        $oLotteryWay = LotteryWays::find($id);
        if (empty($oLotteryWay)) {
            return $this->goBack('error', ___('_basic.data-not-exists', ['data' => $this->langVars['resource']]));
        }
        $oLotteryWayBlackList = LotteryWayBlackList::doWhere(['lottery_way_id' => ['=', $id], 'terminal_id' => ['=', $terminal]])->first();
        if (empty($oLotteryWayBlackList)) {
            return $this->goBack('error', ___('_lotteryways.data-not-in-black'));
        }
        $bSucc = $oLotteryWayBlackList->delete();
        if (!$bSucc) {
            return $this->goBack('error', ___('_lotteryways.remove-black-failed'));
        }
        return $this->goBack('success', ___('_lotteryways.remove-black-success'));
    }


    /**
     * 清空该彩种的投注方式黑名单
     *
     * @param $lottery_id
     *
     * @return RedirectResponse
     */
    public function emptyBlackList($lottery_id) {
        $aConditions = [
            'lottery_id' => ['=', $lottery_id],
        ];
        $iCount = LotteryWayBlackList::doWhere($aConditions)->count();
        if(empty($iCount)){
            return $this->goBack('error', ___('_lotteryways.empty-black-listed'));
        }
        $bSucc = LotteryWayBlackList::doWhere($aConditions)->delete();
        if(!$bSucc){
            return $this->goBack('error', ___('_lotteryways.empty-black-list-failed'));
        }
        return $this->goBack('success', ___('_lotteryways.empty-black-list-success'));
    }

    /**
     * 更新彩种投注方式，根据系列投注方式更新
     *
     * @param $lottery_id
     *
     * @return RedirectResponse
     */
    public function updateLotteryWays($lottery_id) {
        set_time_limit(0);
        $oLottery = Lottery::find($lottery_id);
        if (empty($oLottery)) {
            $this->langVars['data'] = $this->langVars['resource'];
            return $this->goBack('error', ___('_basic.data-not-exists', $this->langVars));
        }
        $oSeries = Series::find($oLottery->series_id);
        if (empty($oSeries)) {
            $this->langVars['data'] = ___('_model.' . Str::slug($oSeries::$resourceName));
            return $this->goBack('error', ___('_basic.data-not-exists', $this->langVars));
        }
        $this->model->getConnection()->beginTransaction();
        $bSucc = LotteryWays::updateLotteryWays($oLottery, $oSeries, $aSeriesWayIds, $aLotteryWayIds);
        if (!$bSucc) {
            $this->model->getConnection()->rollback();
            return $this->goBack('error', ___('_lotteryways.update-lottery-ways-failed'));
        }
        $aSeriesWays = explode(',',$oLottery->series_ways);
        if(array_diff($aSeriesWays,$aSeriesWayIds)){
            $oLottery->series_ways = implode(',',$aSeriesWayIds);
            $bSucc = $oLottery->save();
            if(!$bSucc){
                $this->model->getConnection()->rollback();
                return $this->goBack('error', ___('_lotteryways.update-lottery-ways-failed').'：'.___('_lotteryways.update-lottery-failed'));
            }
        }
        if($aLotteryWayIds){
            $aConditions = [
                'lottery_id' => ['=', $lottery_id],
            ];
            $iCount = LotteryWayBlackList::doWhere($aConditions)->whereNotIn('lottery_way_id',$aLotteryWayIds)->count();
            if($iCount){
                $bSucc = LotteryWayBlackList::doWhere($aConditions)->whereNotIn('lottery_way_id',$aLotteryWayIds)->delete();
                if(!$bSucc){
                    $this->model->getConnection()->rollback();
                    return $this->goBack('error', ___('_lotteryways.update-lottery-ways-failed').'：'.___('_lotteryways.remove-black-failed'));
                }
            }
        }
        $this->model->getConnection()->commit();
        return $this->goBack('success', ___('_lotteryways.update-lottery-ways-success'));
    }


}