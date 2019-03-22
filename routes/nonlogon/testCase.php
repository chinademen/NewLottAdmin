<?php

use App\Models\BaseTask;
use App\Models\Bet\Program;
use App\Models\Bet\Bill;
use App\Models\Basic\BusinessPartner;
use App\Models\Customer\Wallet;
use App\Models\Fund\Transaction;
use App\Models\Fund\TransactionType;
use App\Models\Func\SysConfig;

use App\Models\Fund\CommissionRecord;
use App\Models\Game\WayOdd;
//--queue=jcb2b-prize
use App\Models\Fund\Withdrawal;
use App\Models\Basic\League;
use App\Models\Game\Game;

Route::get('testCase', ['as' => 'test-case', 'uses' => function () {

    $oBill = Bill::find(350);
    $iFinishedGameNum = $oBill->games()->whereIn('games.status', [Game::STATUS_FINISHED, Game::STATUS_CANCELED])->count();
    dd($iFinishedGameNum);

    $oProgram = Program::find(1);
    $oBills = $oProgram->bills()->whereIn('bills.status', [Bill::STATUS_WIN, Bill::STATUS_LOSS, Bill::STATUS_AWARD])->get(['prize', 'tax', 'amount']);
    $iTotalPrize = $oBills->sum('prize');
    $iTotalTax = $oBills->sum('tax');
    $aData = [];

    //已经计奖的注单数
    $aData['bet_num_calculated'] = $oBills->count();
    $iTotalAmount = $oProgram->bills()->sum('amount');
    var_dump($iTotalAmount);

    dd();
    $oLeague = League::where('cn_name','济州联')->orWhere('cn_shortname','济州联')->where('gt_id', 1)->first();

    dd($oLeague->toArray());
    var_dump(SysConfig::readValue('is_auto_log'));
    var_dump(SysConfig::get('games_result_delay_check_time'));
    var_dump(SysConfig::readValue('few_minutes_before_start_sale_to_stop'));
    var_dump(SysConfig::readValue('max_multiple'));
    var_dump(SysConfig::readValue('print_ticket_delay_seconds'));
    var_dump(SysConfig::readValue('max_game_num'));


    dd();
    $oProgram = Program::find(63);
    $oProgram->bet_num_cancled = 1;
    $oProgram->save();

    if (Withdrawal::addWithdrawalTask(290)) {
        echo "成功添加任务~";
    }
    dd();
    $sGate = '9x2';

    var_dump(preg_match('#[1~8]x[\d]#', $sGate));
    dd();
    $a =null;
    var_dump(empty($a));
    dd();
    $aMerchantIds = [11];
    if(BaseTask::addTask('SendCommissionByStat', ['MerchantIds' => $aMerchantIds],  'commission', 0)){
          var_export($aMerchantIds, true);
    }

    dd();
    $aWayOddMap = WayOdd::getWayOddNameOrConnectNumByGameType(1);
    asort($aWayOddMap);
    dd($aWayOddMap);
    $oProgram = Program::find(1);
    $iTotalAmount = $oProgram->bills()->get(['amount'])->sum('amount');

    var_dump( $iTotalAmount);
    dd();
    /*$oCommissionRecords = &CommissionRecord::getUnSendCommissionStat(11);

    foreach ($oCommissionRecords as $oRecords){
        $r = $oRecords->setBatchSentStatus($oRecords->merchant_id);
        var_dump($r);
    }*/




    dd();
    pr(WayOdd::getWayOddNameOrConnectNumByGameType(1));
    //BaseTask::addTask('SendPrize', ['ProgramIds' => [6]], 'prize');

    /*$oCommissionRecords = CommissionRecord::doWhere(['id'=>['in', [3]]])->get();
    foreach ($oCommissionRecords as $oRecord){
        //添加返点统计数据
        $statData = [
            'type' => 'commission',
            'bp_id' => $oRecord->merchant_id,
            'amount' => $oRecord->amount,
            'date' => Carbon::now()->toDateString(),
        ];
        var_dump($statData);
        BaseTask::addTask('StatUpdateProfit', $statData, 'stat');
    }*/
    //添加返点统计数据
   /* $statData = [
        'type' => 'prize',
        'bp_id' => 11,
        'amount' =>  147.14,
        'date' => Carbon::now()->toDateString(),
    ];
    var_dump($statData);
    BaseTask::addTask('StatUpdateProfit', $statData, 'stat');
    dd();*/

    //BaseTask::addTask('SendCommission', ['RecordsIds' => [3,4,5,6]], 'commission', 0);

    //var_dump($date = Carbon::now()->toDateString());

    //$date = Carbon::parse('2012-01-04')->toDateString();
    //dd($date);
    //BaseTask::addTask('SendPrize', ['ProgramIds' => [2]], 'prize');

    /*$oPrograms = Program::getUnSentPrizePrograms([1]);

    if (!$iTotalCount = $oPrograms->count()) {
        $this->log = 'No Programs, Exiting';
        return self::TASK_SUCCESS;
    }
 
    $walletLocker = null;
    $iSuccCount = $iFailCount = 0;
    foreach ($oPrograms as $oProgram) {
        if ($oProgram->status_prize == Program::STATUS_PRIZE_FINISH) {
            return 1;
        }
        if (!$oProgram->lockForSendPrize()) {
            return Program::ERRNO_LOCK_FAILED;
        }

        $Customer = BusinessPartner::find($oProgram->bp_id);

        if (!$Wallet = Wallet::lock($Customer->wallet_id, $walletLocker)) {
            $oProgram->unlockForSendPrize();
            return Wallet::ERRNO_LOCK_FAILED;
        }

        $aExtraData = [
            'client_ip' => Tool::getClientIp(),
            'proxy_ip' => Tool::getProxyIp(),
            'coefficient' => 1.000,
            'bp_id' => $oProgram->bp_id,
            'bp_name' => $oProgram->bp_name,
            'gt_id' => $oProgram->gt_id,
            'way_id' => $oProgram->gate_type,
            'method_id' => $oProgram->method_id
        ];
        var_dump($aExtraData);
        DB::beginTransaction();

        $iReturn = Transaction::addTransaction($Customer, $Wallet, TransactionType::TYPE_SEND_PRIZE, $oProgram->prize, $aExtraData);
        if ($iReturn != Transaction::ERRNO_CREATE_SUCCESSFUL) {
            DB::rollback();
            $oProgram->unlockForSendPrize();
            return $iReturn;
        }

        if (($iReturn = $oProgram->setPrizeSentStatus()) !== true) {
            DB::rollback();
            $oProgram->unlockForSendPrize();
            return $iReturn;
        }

        DB::rollback();

        $oProgram->unlockForSendPrize();

        empty($walletLocker) or Wallet::unLock($Customer->wallet_id, $walletLocker, false);
    }*/


    /*$oCommissionRecords = &CommissionRecord::getUnSendCommission([1]);
    $iSuccCount = $iFailCount = 0;
    foreach ($oCommissionRecords as $oRecord) {


        if ($oRecord->status == CommissionRecord::STATUS_SEND) {
            return 1;
        }


        if (!$oRecord->lockForSend()) {
            return CommissionRecord::ERRNO_LOCK_FAILED;
        }

        $Customer = BusinessPartner::find($oRecord->merchant_id);

        if (!$Wallet = Wallet::lock($Customer->wallet_id, $walletLocker)) {
            $oRecord->unlockForSend();
            return Wallet::ERRNO_LOCK_FAILED;
        }

        $oProgram = Program::find($oRecord->program_id);
        $aExtraData = [
            'client_ip' => Tool::getClientIp(),
            'proxy_ip' => Tool::getProxyIp(),
            'coefficient' => 1.000,
            'bp_id' => $oRecord->merchant_id,
            'bp_name' => $oRecord->merchant,
            'gt_id' => $oProgram->gt_id,
            'way_id' => $oProgram->gate_type,
            'method_id' => $oProgram->method_id,
            'program_id' => $oProgram->id,
            'program_sn' => $oProgram->sn,
            'note' => '来自方案:[' . $oProgram->program_sn . '] 的佣金'
        ];

        DB::beginTransaction();

        $iReturn = Transaction::addTransaction($Customer, $Wallet, TransactionType::TYPE_SEND_COMMISSION, $oRecord->amount, $aExtraData);
        if ($iReturn != Transaction::ERRNO_CREATE_SUCCESSFUL) {
            DB::rollback();
            $oRecord->unlockForSend();
            return $iReturn;
        }

        if (($iReturn = $oRecord->setSentStatus()) !== true) {
            DB::rollback();
            $oRecord->unlockForSend();
            return $iReturn;
        }

        DB::rollback();

        //添加返点统计数据
        $statData = [
            'type' => 'commission',
            'bp_id' => $oRecord->merchant_id,
            'amount' => $oRecord->amount,
            'date' => $oRecord->sent_at ? $oRecord->sent_at : Carbon::now()->toDateString(),
        ];
        var_dump($statData);

        empty($walletLocker) or Wallet::unLock($Customer->wallet_id, $walletLocker, false);

        $iReturn === true or $oRecord->unlockForSend();
    }*/



    //BaseTask::addTask('SendCommission', ['RecordsIds' => [4,5,6]], 'commission', 0);

    //BaseTask::addTask('SendPrize', ['bills' => [26]], 'prize');
    exit();
    
   /* 0.326552——0.3266
12.73507——12.74
21.84502——21.85
12.64501——12.65
18.27509——18.28
38.305000001——38.31*/


    $iPrize =38.305000001;

    pr(floor($iPrize * 100) /100 );
    dd(exactRound($iPrize, 2));
    //var_dump(BaseTask::addTask('PrintTicket', ['program_id' => 5], 'ticket', 0));


    dd();
    $oProgram = Program::find(1);
    $aProgram = $oProgram->toArray();

    pr(json_decode($oProgram->bet_content, true));

    dd();
    pr(sprintf('%02d', rand(100, 1000)));
    pr(generateSerialNumber());
    dd();
    pr(exactRound(908.537,2));
    dd();
    pr( App\Models\Basic\GameType::filterStatus(false)->get());

    dd();
    var_dump(Config::get('custom-sysconfig.default-log-path') );
    dd();
    var_dump(Carbon::now()->toDateTimeString());
    dd();
    var_dump(String::humenlize("DFDFHJHJ"));
    dd();
    var_dump(env('APP_DEBUG'));
    dd();
    $sPacket = Str::studly('dgfgdfgdg');

    var_dump($sPacket);
    dd();
    $oToday = Carbon::now();
    $sEndMonth = $oToday->startOfMonth()->subDay()->toDateString();
    $sStartMonth = $oToday->startOfMonth()->toDateString();
    pr($sStartMonth);
    pr($sEndMonth);
    exit;
    $sStart = '2015-06';
    // $month = 6;
    $oDate = Carbon::createFromFormat('Y-m', $sStart);
    pr($oDate->startOfMonth());
    exit;
    pr(strtotime(Carbon::today()->subSecond(1)->toDateTimeString()));
    $aParams = ['identity' => 'JMG', 'counted_at_from' => 1467907200, 'counted_at_to' => 1467993599];
    ksort($aParams);
    $key = '22EbOsD3GmnLEw';
    $sSign = md5(http_build_query($aParams) . $key);
    pr($sSign);
    exit;
    $oProgram = Program::find(1);
    $aWonBillIds = $oProgram->bills()->where('bills.status', '=', Bill::STATUS_WIN)->lists('id')->toArray();
    pr($aWonBillIds);
    exit;
    // $aCustomSaleStopTimes = CustomSaleStopTime::getLatestSaleStopRules();
    // pr($aCustomSaleStopTimes);exit;

    // $oFinishedGame = Game::find(4631);
    // $oFinishedGame->won = 1;
    // $oFinishedGame->status = 5;
    // $oBill = Bill::find(140);
    // $iPrize = $oBill->calculateRankBillPrize($oFinishedGame);
    // pr($iPrize);
    // exit;

    // $data = "1-法国—德国-开售-11.50-18.51%-4.96%-3363281--336328-1|2-法国—西班牙-开售-6.50-8.99%-8.77%-3363282--336328-2|3-法国—英格兰-开售-13.00-4.71%-4.39%-3363283--336328-3|4-法国—比利时-开售-22.00-4.83%-2.59%-3363284--336328-4|5-法国—葡萄牙-开售-18.00-1.9%-3.17%-3363285--336328-5|6-法国—意大利-开售-25.00-3.06%-2.28%-3363286--336328-6|7-法国—克罗地亚-开售-35.00-1.21%-1.63%-3363287--336328-7|8-法国—俄罗斯-开售-60.00-0.82%-0.95%-3363288--336328-8|9-法国—奥地利-开售-60.00-0.68%-0.95%-3363289--336328-9|10-法国—瑞士-开售-32.00-0.62%-1.78%-33632810--336328-10|11-法国—乌克兰-开售-60.00-0.52%-0.95%-33632811--336328-11|12-法国—波兰-开售-65.00-0.8%-0.88%-33632812--336328-12|13-法国—瑞典-开售-75.00-0.54%-0.76%-33632813--336328-13|14-法国—土耳其-开售-125.0-0.83%-0.46%-33632814--336328-14|15-法国—罗马尼亚-开售-125.0-0.73%-0.46%-33632815--336328-15|16-德国—西班牙-开售-8.00-6.74%-7.13%-33632816--336328-16|17-德国—英格兰-开售-16.00-3.16%-3.56%-33632817--336328-17|18-德国—比利时-开售-25.00-3.77%-2.28%-33632818--336328-18|19-德国—葡萄牙-开售-24.00-1.62%-2.38%-33632819--336328-19|20-德国—意大利-开售-25.00-2.96%-2.28%-33632820--336328-20|21-德国—克罗地亚-开售-45.00-1.01%-1.27%-33632821--336328-21|22-德国—俄罗斯-开售-70.00-0.83%-0.81%-33632822--336328-22|23-德国—奥地利-开售-70.00-0.78%-0.81%-33632823--336328-23|24-德国—瑞士-开售-55.00-0.86%-1.04%-33632824--336328-24|25-德国—乌克兰-开售-67.00-1.23%-0.85%-33632825--336328-25|26-德国—波兰-开售-60.00-2.18%-0.95%-33632826--336328-26|27-德国—瑞典-开售-90.00-1.32%-0.63%-33632827--336328-27|28-西班牙—英格兰-开售-25.00-1.85%-2.28%-33632828--336328-28|29-西班牙—比利时-开售-27.00-2.01%-2.11%-33632829--336328-29|30-西班牙—葡萄牙-开售-35.00-1.02%-1.63%-33632830--336328-30|31-西班牙—意大利-开售-32.00-1.63%-1.78%-33632831--336328-31|32-西班牙—克罗地亚-开售-32.00-0.59%-1.78%-33632832--336328-32|33-西班牙—俄罗斯-开售-60.00-0.42%-0.95%-33632833--336328-33|34-西班牙—奥地利-开售-75.00-0.4%-0.76%-33632834--336328-34|35-西班牙—瑞士-开售-85.00-0.47%-0.67%-33632835--336328-35|36-西班牙—乌克兰-开售-100.0-0.44%-0.57%-33632836--336328-36|37-西班牙—波兰-开售-100.0-0.6%-0.57%-33632837--336328-37|38-比利时—英格兰-开售-45.00-1.49%-1.27%-33632838--336328-38|39-英格兰—葡萄牙-开售-60.00-0.84%-0.95%-33632839--336328-39|40-英格兰—意大利-开售-70.00-1.17%-0.81%-33632840--336328-40|41-英格兰—克罗地亚-开售-100.0-0.59%-0.57%-33632841--336328-41|42-英格兰—俄罗斯-开售-80.00-0.42%-0.71%-33632842--336328-42|43-英格兰—奥地利-开售-150.0-0.61%-0.38%-33632843--336328-43|44-英格兰—瑞士-开售-150.0-0.67%-0.38%-33632844--336328-44|45-比利时—葡萄牙-开售-70.00-1.04%-0.81%-33632845--336328-45|46-比利时—意大利-开售-50.00-1.27%-1.14%-33632846--336328-46|47-葡萄牙—意大利-开售-85.00-0.95%-0.67%-33632847--336328-47|48-葡萄牙—克罗地亚-开售-125.0-0.86%-0.46%-33632848--336328-48|49-葡萄牙—奥地利-开售-125.0-0.97%-0.46%-33632849--336328-49|50-其它—其它-开售-2.95-4.45%-19.33%-33632850--336328-50";
    // $data = explode('|', $data);
    // $result = [];
    // foreach ($data as $key => $value) {
    //     $aTeamData = explode('-', $value);
    //     $result[] = $aTeamData;
    // }
    // pr(json_encode($result));exit;

    // $sEndTime = '2016-07-10 00:00:00';
    // pr(intval(Carbon::now()->lt(Carbon::parse($sEndTime))));
    // exit;
    // pr(Way::getWayIdIdentityMap(1));exit;

    $data = json_decode('{"20160613YX009":["d_2.8300"],"20160613YX102":["d_4.0500"],"20160613YX103":["a_6.4000"]}', true);
    $aGameBns = array_keys($data);
    $oGames = Game::whereIn('bn', $aGameBns)->get();
    // pr($oGames);exit;
    // foreach ($oGames as $key => $oGame) {
        event(new CalculateBillEvent($oGames[2]));
    // }
    exit;

    Transaction::where('bill_id', '<', 16)->delete();
    PointJournal::where('bill_id', '<', 16)->delete();
    BillGame::where('bill_id', '<', 16)->delete();
    exit;
    $aFreeGateTypes = Method::getFreeGateTypes(1);
    pr($aFreeGateTypes);exit;
    $oGame = Game::find(4144);

    event(new CalculateBillEvent($oGame));
    exit;
    // $data = [
    //     "user_id" => "10",
    //     "bp_id"   => "1",
    //     "type"    => "turnover",
    //     "amount"  => "24.0000",
    //     "date"    => "2016-05-16"
    // ];
    // $sParam = var_export($data, true);
    // pr($sParam);
    // pr(md5($sParam));
    // exit;
    // $fAmount = 2000.99;
    // $sAmount = strval($fAmount);
    // pr(is_float($fAmount));
    // pr(number_format($fAmount, 2, '.', ''));
    // pr(intval(is_float($fAmount) && number_format($fAmount, 2, '.', '') != $fAmount));
    // // $sAmount = strval($fAmount);
    // // pr(intval(strrpos($sAmount, '.') > 0 && strlen(substr($sAmount, strrpos($sAmount, '.')+1))));
    // // pr(intval(strrpos(strval($fAmount), '.')));
    // // pr(substr(strval($fAmount), strrpos(strval($fAmount), '.')+1));
    // // pr(intval($fAmount > 1000.000000));
    // // $iLen = strlen(substr(strval($fAmount), strrpos(strval($fAmount), '.')+1));
    // // pr($iLen);
    // // pr(is_numeric($fAmount));
    // exit;
    // $sStartTime = Carbon::yesterday()->toDateTimeString();
    // $sEndTime = Carbon::today()->toDateTimeString();
    // pr($sStartTime);
    // pr($sEndTime);exit;

    // $fAmount = 1000.99;
    // pr(strlen(substr(strval($fAmount), strrpos(strval($fAmount), '.')+1)));
    // exit;
    // $oCustomer = BusinessPartner::getActivateBusinessParnter('JPG');
    // pr($oCustomer);exit;
    // $oBill = Bill::find(132);
    // $oFinishedGames = $oBill->games()->get();
    // pr($oBill->calculatePrize($oFinishedGames));
    // exit;

    $oGame = Game::find(1612);
    pr($oGame->calculateWonResults());
    exit;

    // pr(unserialize('a:5:{s:6:"_token";s:40:"ag3U6JzEKxFisPokVxnUDkCp5nrvjSEoJ5CInkuo";s:28:"curPage-App\Models\Game\Game";s:17:"http://jc.dcu.com";s:9:"_previous";a:1:{s:3:"url";s:17:"http://jc.dcu.com";}s:9:"_sf2_meta";a:3:{s:1:"u";i:1461652309;s:1:"c";i:1461652309;s:1:"l";s:1:"0";}s:5:"flash";a:2:{s:3:"old";a:0:{}s:3:"new";a:0:{}}}'));exit;
    // $iPage = 1;
    // $iPerPage = 10;
    // pr(Transaction::where('user_id', 10)->skip(($iPage - 1) * $iPerPage)->take($iPerPage)->get()->toArray());exit;

    // pr(Way::getAllWays());exit;
    // if (!$oWays = Cache::get('test-ways')) {
    //     pr(123);
    //     $oWays = Way::groupBy('gt_id', 1)->get();
    //     Cache::put('test-ways', $oWays, 60);
    // }
    // pr($oWays->toArray());
    // exit;
    // pr(Carbon::MONDAY);
    // pr(Carbon::TUESDAY);
    // pr(Carbon::WEDNESDAY);
    // pr(Carbon::THURSDAY);
    // pr(Carbon::FRIDAY);
    // pr(Carbon::SATURDAY);
    // pr(Carbon::SUNDAY);
    // exit;
    // set_time_limit(0);
    // $startTime = time();
    // $data = [
    //     ['a1', 'a2', 'a3', 'a4', 'a5'],
    //     // ['b1', 'b2', 'b3', 'b4', 'b5'],
    //     // ['c1', 'c2', 'c3', 'c4', 'c5'],
    //     // ['d1', 'd2', 'd3', 'd4', 'd5'],
    //     // ['e1', 'e2', 'e3', 'e4', 'e5'],
    //     // ['f1', 'f2', 'f3', 'f4', 'f5'],
    //     // ['g1', 'g2', 'g3', 'g4', 'g5'],
    //     // ['h1', 'h2', 'h3', 'h4', 'h5'],
    // ];
    // pr(descartes($data));exit;
    $aBillBetContent = [
        "20160405YX002" => ["h_2.4600"],
        // "20160405YX003" => ["h_1.4300","cd_3.5500"],
        // "20160405YX009" => ["d_3.9000"],
    ];
    $aOdds = [];
    foreach ($aBillBetContent as $key => $data) {
        foreach ($data as $key2 => $value) {
            $aOdds[] = $key . '|' . $value;
        }
    }
    pr($aOdds);
    $aSplitedOdds = descartes($aOdds);
    pr($aSplitedOdds);
    $aSplittedBetContent = [];
    foreach ($aSplitedOdds as $key => $aSplitedOdd) {
        $aOdd = [];
        foreach ($aSplitedOdd as $key2 => $value) {
            list($sGameBn, $sOdd) = explode('|', $value);
            $aSplittedBetContent[] = [$sGameBn => [$sOdd]];
        }
        // $aSplittedBetContent[] = $aOdd;
    }
    pr(json_encode($aSplittedBetContent));
    exit;
    $aBns = ['20160405YX002', '20160405YX003', '20160405YX009', '20160406YX001', '20160406YX011'];
    $oFinishedGames = Game::whereIn('bn', $aBns)->get();
    $oBill = new Bill;
    $oBill->bet_content = '{"max_gate":"4","gate":["2x1"],"games":{"20160405YX002":["h_2.4600", "d_3.4500","0000_12.0000","0101_6.5000"],"20160405YX003":["h_1.4300","cd_3.5500"],"20160405YX009":["d_3.9000","0202_19.0000","0101_7.5000"],"20160406YX001":["a_3.1600","0002_16.0000","0102_9.0000"],"20160406YX011":["d_3.2500","0000_9.0000","0101_6.5000"]},"bet_num":"14","multiple":"1000","amount":"28000","dan":[]}';
    $oBill->multiple = 999;
    $iPrize = $oBill->calculatePrize($oFinishedGames);
    pr($iPrize);
    exit;
    pr(Carbon::today()->hour(24)->toDateTimeString());
    pr(Carbon::today()->hour(25)->toDateTimeString());
    exit;
    $aParams = [
        'status' => Bill::STATUS_WIN,
        'status_prize' => ['<>', Bill::STATUS_PRIZE_FINISH]
    ];
    $oBills = Bill::complexWhere($aParams)->take(100)->pluck('id');
    pr($oBills);exit;

    $oBill = Bill::find(111);
    $statData = [
        'type'       => 'turnover',
        'user_id'    => $oBill->user_id,
        'bp_id'      => $oBill->bp_id,
        'amount'     => $oBill->amount,
        'date'       => $oBill->counted_at,
    ];
    BaseTask::addTask('StatUpdateProfit', $statData, 'stat');
    exit;
    $oUser = User::find(12);
    pr(getShortClassName($oUser));
    pr($oUser->account->id);
    exit;
    // $oBills = Bill::all();
    // foreach ($oBills as $oBill) {
    //     $oBill->update(['method_id' => implode(',', $oBill->method_ids)]);
    // }
    // exit;
    // $aGates = ['2x1', '3x1'];
    // $aMethodIds = Method::whereIn('identity', $aGates)->lists('id')->toArray();
    // pr($aMethodIds);
    // exit;
    $aWonBillIds = [38];
    $oBills = Bill::getUnSentPrizeBills($aWonBillIds);
    // pr($oBills[0]);
    // exit;
    $iReturn = SendPrize::sendPrize($oBills[0]);
    pr($iReturn);
    exit;
    BaseTask::addTask('SendPrize', ['bills' => $aWonBillIds], 'prize');
    exit;
    pr(Config::get('custom-sysconfig'));exit;
    $oGame = Game::find(1305);
    event(new CalculateBillEvent($oGame));
    exit;

    // $oBill = Bill::find(19);
    // pr($oBill->games()->toArray());
    // exit;
    // pr(Config::get('customConfig.custom-sysinfo'));exit;
    // $oAdmin = AdminUser::find(1);
    // $data = [
    //     'username' => 'system',
    //     'password' => 'jcadmin2016',
    //     'password_confirmation' => 'jcadmin2016'
    // ];
    // $aResults = $oAdmin->resetPassword($data);
    // pr($aResults);
    // exit;
    // $res = Curl::to('http://jc.dc.com/testCase')->post();
    // pr($res);
    // exit;

    // $url = 'http://jc.dc.com/data-gate/bills';
    // $aPostData = [
    //     'identity' => 'JMG',
    //     'game_type'=> 'football',
    //     'data' => [[
    //         'sn'                  => generateSerialNumber(),
    //         'gt_id'               => 1,
    //         'user_id'             => 2,
    //         'username'            => 'testplayer1',
    //         'is_tester'           => '1',
    //         'forefather_user_ids' => '1',
    //         'first_played_at'     => '2016-02-07 20:30:00',
    //         'first_game_bn'       => '20160207YX007',
    //         'multiple'            => '1',
    //         'bet_num'             => '16',
    //         'amount'              => '32.00',
    //         'bet_content'         => '{"gate": ["3x4"],"games": {"20160207YX007": ["h_1.40", "d_2.15"], "20160207YX008": ["hh_1.40", "0100_6.15"], "20160207YX009": ["ch_1.40", "s0_4.15"]},"dan": ["20160207YX007"],"bets_num": 16,"amount": 32.00,"multiple": 1,"max_gate": 4}',
    //         'coefficient'         => '1.000',
    //     ]]
    // ];
    // // pr(json_encode($aPostData));exit;
    // $response = Curl::to($url)->withData($aPostData)->post();
    // pr($response);exit;
    // $key = md5('App\Models\Admin\User') . '_64';
    // $cache = Cache::get($key);
    // pr($cache);exit;
    // for ($i=0; $i < 10; $i++) {
    //     // echo uniqid(rand(1, 100000));
    //     $year_code = array('A','B','C','D','E','F','G','H','I','J');
    //     $order_sn = $year_code[intval(date('Y'))-2016].
    //     strtoupper(dechex(date('m'))).date('d').
    //     substr(time(),-5).substr(microtime(),2,5).sprintf('%02d',rand(0,99));
    //     echo $order_sn; // date('ymd').substr(time(),-5).substr(microtime(),2,5);
    //     echo "</br>";
    // }
    // // $uid = uniqid(rand(1, 100000));
    // // pr($uid);
    // // $uid = sha1($uid);
    // // pr($uid);
    // exit;
    // $aData = FunctionalityRelation::all();
    // pr($aData->toArray());exit;

    // // $sRouter = 'App\Http\Controllers\HomeController@getHome';
    // $sRouter = 'App\\Http\\Controllers\\FunctionalityController@index';
    // // $sRouter = 'App\\Http\\Controllers\\UserController@index';
    // $oRouter = Route::getRoutes()->getByAction($sRouter);
    // // $sRouter = 'home';
    // // $oRouter = Route::getRoutes()->getByName($sRouter);

    // pr($oRouter->getName());exit;
    // // $aRoutes = Route::getRoutes();
    // // pr($aRoutes);exit;
    // // pr(Request::ip());
    // // pr('\n');
    // // pr(Request::ips());
    // // pr($_SERVER['REMOTE_ADDR']);
    // // pr(app()->setLocale('zh-CN'));
    // // pr(app()->getLocale());
    // // return Route::currentRouteAction();

    // // $aRights = & Role::getRights(1);
    // // pr($aRights);exit;
    // // $aSystemFuncs = Functionality::whereIn('realm',[Functionality::REALM_SYSTEM, Functionality::REALM_ADMIN])->lists('id');
    // // pr(count($aSystemFuncs->toArray()));exit;
    // // $oUser = User::find(51);
    // // $aRoles = $oUser->getUserRoles();
    // // return $aRoles;
    // // return view('welcome');

}]);