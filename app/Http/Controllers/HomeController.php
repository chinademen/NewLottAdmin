<?php

namespace App\Http\Controllers;

//use App\Models\Stock\StockAccount;
//use App\Models\Stock\UserStockAccount;
use App\Models\Transaction;
use Auth;
use Carbon\Carbon;
use Config;
use App\Models\Functionality;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Session;

// use BaseController;

class HomeController extends AdminBaseController {
    protected static $aCountType = [
        0 => 'default',
        1 => 'days',
        2 => 'weeks',
        3 => 'months',
    ];
    /*protected static $map1 = [ 'countDate' => '2018-07-20', 'bet' => [ 5.2, 8.0547 ], 'award' => [ 4.6, 8.9 ] ];
    protected static $map2 = [ 'countDate' => '2018-07-20', 'xAxis' => [ '2018-07-20' ], 'bet' => [ 5.8 ], 'award' => [ 6.5 ], 'load' => [ 8.4 ], 'withdraw' => [ 9.2 ] ];*/

    protected static $map1 = [ 'countDate' => '', 'bet' => [ 0, 0 ], 'award' => [ 0, 0 ] ];
    protected static $map2 = [ 'countDate' => '', 'xAxis' => [], 'bet' => [], 'award' => [], 'load' => [], 'withdraw' => [] ];

    public function getHome() {
        $aBaseInfo = $this->getBaseInfo();
        //        pr($this->aAvailableRealm);
        $aMenus = $this->getUserMenus();
        //        pr($aMenus);
        $aLoginUser = Auth::user();
        //        $oUserStockAccount = UserStockAccount::getObjectByParams(['user_id' => session('admin_user_id')]);
        // pr($this->aAvailableRealm);
        //         pr($oUserStockAccount);exit;
        // return $aLoginUser;

        $sMainUrl = '';
        if($sIntendEdUrl = $this->request->session()->get('url.intended')){
            $a = parse_url($sIntendEdUrl);
            if(isset($a['path']) && $a['path'] != '/'){
                $sMainUrl = $sIntendEdUrl;
            }
        }
        $this->request->session()->forget('url.intended');
        $sMainUrl or $sMainUrl = route('admin.dashboard');

        return view('l.home')->with(compact('aBaseInfo', 'aMenus', 'aLoginUser', 'sMainUrl'));
    }

    public function getDashboard() {
        $sMainUrl = '';
        if($sIntendEdUrl = $this->request->session()->get('url.intended')){
            $a = parse_url($sIntendEdUrl);
            if(isset($a['path']) && $a['path'] != '/'){
                $sMainUrl = $sIntendEdUrl;
            }
        }
        $this->request->session()->forget('url.intended');
        $sMainUrl or $sMainUrl = route('admin.dashboard');

        //dd($this->request->all());
        $sStartDate = $this->request->start_date ?? '';
        $sEndDate = $this->request->end_date ?? '';
        $merchant_id=session('merchant_id');
        $this->getCountTransactionData($sStartDate, $sEndDate,$merchant_id);

        $sData = json_encode([ 'map1' => static::$map1, 'map2' => static::$map2 ]);

        // dd(static::$map1,$sStartDate,$sEndDate);
        return view('dashboard')->with(compact('aSysInfo', 'sMainUrl', "sData",'merchant_id'));
    }

    public function getUserMenus() {
        $aColumns = [ 'id', 'functionality_id', 'title', 'controller', 'action', 'params', 'new_window', 'sequence' ];
        $rightIds = $this->getUserRights(3, true);
        $aMainMenus = Menu::whereNull('parent_id')->where('disabled', '=', 0)->orderBy('sequence', 'ASC')->get($aColumns);
        $menus = [];
        $aNeedRealm = Session::get('IsAdmin') ? [ Functionality::REALM_SYSTEM, Functionality::REALM_ADMIN ] : [ Functionality::REALM_ADMIN ];
        foreach($aMainMenus as $oMainMenu){
            $menus[ $oMainMenu->id ] = $oMainMenu->getAttributes();
            $menus[ $oMainMenu->id ]['children'] = [];
            $aSubMenus = Menu::where('parent_id', '=', $oMainMenu->id)
                ->whereIn('realm', $aNeedRealm)
                ->where('disabled', '=', 0)
                ->whereIn('functionality_id', $rightIds)
                ->orderBy('sequence', 'ASC')->get($aColumns);
            foreach($aSubMenus as $oMenu){
                $route_name = $oMenu->controller.'@'.$oMenu->action;
                if($route_name != '_main@_main')
                    $oMenu->route_name = $this->_getRouterName($route_name);
                $menus[ $oMainMenu->id ]['children'][] = $oMenu->getAttributes();
            }
        }
        unset($aSubMenus, $aMainMenus, $oMainMenu, $oMenu, $rightIds, $aColumns);
        return $menus;
    }

    // 设置静态数据数组
    public function getCountTransactionData($sStartDate, $sEndDate,$merchant_id) {
        list($sCountType, $aDates) = $this->getCountType($sStartDate, $sEndDate);
        $sStartDate = $this->getCacheStartDateAndSetMapCountDate($sCountType,$aDates,$sStartDate,$sEndDate);

        if($merchant_id){ // 商户管理员登录
            $aCountData =  $this->merchantUserData($sStartDate,$sEndDate,$merchant_id);
            return $this->setCountTransactionData($sCountType, $aDates, $aCountData);
        }

        if(!$sDatas = Redis::get(Transaction::$sCountKey)){
            $aCountData = Transaction::setCountTransactionDataBToCache($sStartDate,$sEndDate);
            return $this->setCountTransactionData($sCountType, $aDates, $aCountData);
        };
        $aDatas = @unserialize($sDatas);
        // 缓存的时间>查询时间.查询DB    || 默认前7天 的数据也没有存入缓存
        if(array_keys($aDatas)[0] > $sStartDate || ($sCountType=='default' && $aDates['map2'][0] < array_keys($aDatas)[0])){
            $aCountData = Transaction::setCountTransactionDataBToCache($sStartDate,$sEndDate);
            return $this->setCountTransactionData($sCountType, $aDates, $aCountData);
        }

        $this->setCountTransactionData($sCountType, $aDates, $aDatas);
    }

    /**
     * 获取统计的类型
     *
     * @param $sStartDate   开始时间  (选择日期 >今天|null , 默认为今天)
     * @param $sEndDate     结束时间(选择日期 >今天|null , 默认为今天)
     *
     * @return array default [default,[map1=>[today],map2=>[week-day,...,weekend-day]]] 默认map1 当天,map2最近7天
     *               days[days,[dayDate1,....dayDateN]]
     *               weeks[weeks,[[dateDay,....],[dateDay....]
     *               months[months,[iStartMonths,....iEndMonths]
     */
    public function getCountType(&$sStartDate, &$sEndDate) {
        $todayDate = Carbon::today();
        if($sStartDate == '' && $sEndDate == ''){ // 默认
            $sStartDate = $sEndDate = $todayDate->toDateString();
            $sCountType = static::$aCountType[0];
            $aData['map1'] = [ $todayDate->toDateString() ];
            $aData['map2'] = [];
            for($i = 0; $i < 7; $i++){
                array_push($aData['map2'], $todayDate->parse("-$i days")->toDateString());
            }
            sort($aData['map2']);

            return [ $sCountType, $aData ];
        }
        $sStartDate == '' && $sStartDate = $todayDate->toDateString();
        $sEndDate == '' && $sEndDate = $todayDate->toDateString();
        if($sEndDate < $sStartDate){ // 开始时间>结束时间,反转值
            $tmp = $sEndDate;
            $sEndDate = $sStartDate;
            $sStartDate = $tmp;
        }
        // 计算相差时间 days
        $iDiffDays = Carbon::parse($sEndDate)->diffInDays($sStartDate);
        $oStartDate = Carbon::parse($sStartDate);
        $oEndDate = Carbon::parse($sEndDate);
        if($iDiffDays == 0){// 开始时间=结束时间 统计一天
            return [ static::$aCountType[1], [ $sEndDate ] ];
        }
        $aDate = [];
        if($iDiffDays <= 7){// 选择日期小于一周 ,统计 天
            for($i = 0; $i <= $iDiffDays; $i++){
                array_push($aDate, Carbon::parse($sStartDate)->addDays($i)->toDateString());
            }
            sort($aDate);
            return [ static::$aCountType[1], $aDate ];
        }

        if($iDiffDays > 7 && $iDiffDays <= 30){// 周 单位
            $sStartWeek = $oStartDate->startOfWeek();
            $sEndWeek = $oEndDate->endOfWeek();
            $iRealDays = $sEndWeek->diffInDays($sStartWeek);
            for($i = 0; $i <= $iRealDays; $i++){
                array_push($aDate, Carbon::parse($sStartWeek)->addDays($i)->toDateString());
            }
            sort($aDate);
            $aDate = collect($aDate)->chunk(7)->toArray();

            return [ static::$aCountType[2], $aDate ];
        }

        if($iDiffDays > 30){ // 月 单位
            $aMonths = [];
            for($i = Carbon::parse($oStartDate)->month; $i <= Carbon::parse($oEndDate)->month; $i++){
                array_push($aMonths, $i);
            }

            return [ static::$aCountType[3], $aMonths ];
        }
    }

    /**
     * 从缓存设置 图表数据
     * @param $sCountType   统计类型
     * @param $aDates   显示时间类型
     * @param $aDatas  缓存数据
     */
    public function setCountTransactionData($sCountType, $aDates, $aDatas) {
        $this->setStaticMap($sCountType,$aDates);
        foreach($aDatas as $dayDate => $aData){
            switch($sCountType){
                case 'default':
                    if($dayDate == $aDates['map1'][0]){
                        static::$map1['bet'][1] += $aData[ Transaction::$sCountOfficialBet ];
                        static::$map1['award'][1] += $aData[ Transaction::$sCountOfficialAward ];
                        static::$map1['bet'][0] += $aData[ Transaction::$sCountSelfBet ];
                        static::$map1['award'][0] += $aData[ Transaction::$sCountSelfAward ];

                    }
                    foreach($aDates['map2'] as $days){
                        if($days == $dayDate){
                            static::$map2['bet'][ $days ] += $aData[ Transaction::$sCountTotalBet ];
                            static::$map2['award'][ $days ] += $aData[ Transaction::$sCountTotalAward ];
                            static::$map2['load'][ $days ] += $aData[ Transaction::$sCountTotalLoad ];
                            static::$map2['withdraw'][ $days ] += $aData[ Transaction::$sCountTotalWithdraw ];
                        }
                    }
                    break;
                /*case 'days': 已优化至 default
                    foreach($aDates as $days){
                        if($days == $dayDate){
                            static::$map1['bet'][1] += $aData[ Transaction::$sCountOfficialBet ];
                            static::$map1['award'][1] += $aData[ Transaction::$sCountOfficialAward ];
                            static::$map1['bet'][0] += $aData[ Transaction::$sCountSelfBet ];
                            static::$map1['award'][0] += $aData[ Transaction::$sCountSelfAward ];
                            static::$map2['bet'][ $days ] += $aData[ Transaction::$sCountTotalBet ];
                            static::$map2['award'][ $days ] += $aData[ Transaction::$sCountTotalAward ];
                            static::$map2['load'][ $days ] += $aData[ Transaction::$sCountTotalLoad ];
                            static::$map2['withdraw'][ $days ] += $aData[ Transaction::$sCountTotalWithdraw ];
                        }
                    }
                    break;*/
                case 'weeks':
                    foreach($aDates as $key => $v){
                        foreach($v as $days){
                            if($days == $dayDate){
                                static::$map1['bet'][1] += $aData[ Transaction::$sCountOfficialBet ];
                                static::$map1['award'][1] += $aData[ Transaction::$sCountOfficialAward ];
                                static::$map1['bet'][0] += $aData[ Transaction::$sCountSelfBet ];
                                static::$map1['award'][0] += $aData[ Transaction::$sCountSelfAward ];

                                static::$map2['bet'][ $key ] += $aData[ Transaction::$sCountTotalBet ];
                                static::$map2['award'][ $key ] += $aData[ Transaction::$sCountTotalAward ];
                                static::$map2['load'][ $key ] += $aData[ Transaction::$sCountTotalLoad ];
                                static::$map2['withdraw'][ $key ] += $aData[ Transaction::$sCountTotalWithdraw ];
                            }
                        }
                    }
                    break;
                /*case 'months': 已优化至 default
                    foreach($aDates as $month){ //[6,7,8]
                        $iMonth = explode('-', $dayDate)[1];
                        if($iMonth == $month){
                            static::$map1['bet'][1] += $aData[ Transaction::$sCountOfficialBet ];
                            static::$map1['award'][1] += $aData[ Transaction::$sCountOfficialAward ];
                            static::$map1['bet'][0] += $aData[ Transaction::$sCountSelfBet ];
                            static::$map1['award'][0] += $aData[ Transaction::$sCountSelfAward ];
                            static::$map2['bet'][ $month ] += $aData[ Transaction::$sCountTotalBet ];
                            static::$map2['award'][ $month ] += $aData[ Transaction::$sCountTotalAward ];
                            static::$map2['load'][ $month ] += $aData[ Transaction::$sCountTotalLoad ];
                            static::$map2['withdraw'][ $month ] += $aData[ Transaction::$sCountTotalWithdraw ];
                        }
                    }
                    break;*/
                default:
                    foreach($aDates as $k => $v){
                        $l = ( $sCountType == 'months' ) ? explode('-', $dayDate)[1] : $dayDate;
                        if($l == $v){
                            static::$map1['bet'][1] += $aData[ Transaction::$sCountOfficialBet ];
                            static::$map1['award'][1] += $aData[ Transaction::$sCountOfficialAward ];
                            static::$map1['bet'][0] += $aData[ Transaction::$sCountSelfBet ];
                            static::$map1['award'][0] += $aData[ Transaction::$sCountSelfAward ];
                            static::$map2['bet'][ $v ] += $aData[ Transaction::$sCountTotalBet ];
                            static::$map2['award'][ $v ] += $aData[ Transaction::$sCountTotalAward ];
                            static::$map2['load'][ $v ] += $aData[ Transaction::$sCountTotalLoad ];
                            static::$map2['withdraw'][ $v ] += $aData[ Transaction::$sCountTotalWithdraw ];
                        }
                    }
                    break;
            }
        }
        array_values(static::$map1);
        static::$map2 = collect(static::$map2)->map(function($item) {
            if(is_array($item)){
                return array_values($item);
            }
            return $item;
        })->all();
    }



    /**
     * 动态设置 数据长度
     * @param $sCountType
     * @param $aDates
     */
    public function setStaticMap($sCountType,$aDates){
        $aInitMaps = ( $sCountType == 'default' ) ?  $aDates['map2'] :  $aDates;
        foreach($aInitMaps as $key => $val){
            switch($sCountType){
                case 'weeks':
                    array_push(static::$map2['xAxis'], '第'.( $key + 1 ).'周');
                    static::$map2['bet'][ $key ] = 0;
                    static::$map2['award'][ $key ] = 0;
                    static::$map2['load'][ $key ] = 0;
                    static::$map2['withdraw'][ $key ] = 0;
                    break;
                default:
                    if($sCountType == 'months'){
                        array_push(static::$map2['xAxis'], $val.'月');
                    }else{
                        array_push(static::$map2['xAxis'], $val);
                    }
                    static::$map2['bet'][ $val ] = 0;
                    static::$map2['award'][ $val ] = 0;
                    static::$map2['load'][ $val ] = 0;
                    static::$map2['withdraw'][ $val ] = 0;
                    break;
            }
        }
        /*    switch($sCountType){ // 已优化 :↑↑↑↑↑↑↑↑↑
                case 'default':
                    foreach($aDates['map2'] as $day){
                        array_push(static::$map2['xAxis'],$day);
                        static::$map2['bet'][$day]=0;
                        static::$map2['award'][$day]=0;
                        static::$map2['load'][$day]=0;
                        static::$map2['withdraw'][$day]=0;
                    }
                    break;
                case 'days':
                    foreach($aDates as $day){
                        array_push(static::$map2['xAxis'],$day);
                        static::$map2['bet'][$day]=0;
                        static::$map2['award'][$day]=0;
                        static::$map2['load'][$day]=0;
                        static::$map2['withdraw'][$day]=0;
                    }
                    break;
                case 'weeks':
                    foreach($aDates as $key=>$day){
                        array_push(static::$map2['xAxis'],'第'.($key+1).'周');
                        static::$map2['bet'][$key]=0;
                        static::$map2['award'][$key]=0;
                        static::$map2['load'][$key]=0;
                        static::$map2['withdraw'][$key]=0;
                    }
                    break;
                case 'months':
                    foreach($aDates as $month){
                        array_push(static::$map2['xAxis'],$month.'月');
                        static::$map2['bet'][$month]=0;
                        static::$map2['award'][$month]=0;
                        static::$map2['load'][$month]=0;
                        static::$map2['withdraw'][$month]=0;
                    }
                    break;
            }*/
    }

    // 计算缓存实际开始时间, 并设置统计时间:标题
    public function getCacheStartDateAndSetMapCountDate($sCountType,$aDates,$sStartDate,$sEndDate){
        switch($sCountType){
            case 'default':
                static::$map1['countDate'] = $sStartDate.___('date_to').$sEndDate;
                static::$map2['countDate'] = reset($aDates['map2']).___('date_to').end($aDates['map2']);
                return $aDates['map2'][0];
            case 'days':
                static::$map1['countDate']=static::$map2['countDate'] = $sStartDate.___('date_to').$sEndDate;
                return $aDates[0];
            case 'weeks':
                static::$map1['countDate']=static::$map2['countDate'] = $sStartDate.___('date_to').$sEndDate;
                return $aDates[0][0];
            case 'months':
                static::$map1['countDate']=static::$map2['countDate'] = $aDates[0].___('month') .' '.___('date_to').' '.end($aDates).___('month');
                return $sStartDate;
        }
    }

    // 统计当前商户报表
    public function merchantUserData($sStartDate,$sEndDate,$merchant_id){
        $iDiff = Carbon::parse($sStartDate)->diffInDays($sEndDate);
        $aCountDates = [];
        for($i=0;$i<=$iDiff;$i++){
            array_push($aCountDates,Carbon::parse($sStartDate)->addDays($i)->toDateString());
        }
        $aAllData =[];
        foreach($aCountDates as $date){
            $aAllData[$date] = Transaction::getTransactionByDate($date,$merchant_id);
        }
        return $aAllData;
    }

}
