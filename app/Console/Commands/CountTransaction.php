<?php

namespace App\Console\Commands;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;

class CountTransaction extends BaseCommand {

    protected $today = 0;
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'count:transaction ';

    /**
     * The console command description.
     * @var string
     */
    protected $description = 'count transaction for main';

    public function __construct() {
        parent::__construct();
        $this->today = Carbon::today()->toDateString();
    }

    /**
     * 统计帐变
     * [
     *      '2018-07-01'=>[官彩=>123,提现=>234,....],
     *      '2018-07-02'=>[官彩=>1232,提现=>2342,....],
     *      '2018-07-02'=>[官彩=>1232,提现=>2342,....],
     * ]
     */
    public function doCommand() {

        // 今天官方彩投注总额----------        -撤销总额
        $fCountOfficialBet = $this->sumTransactionAmount(7, 0) - $this->sumTransactionAmount(8, 0);

        // 今天自主彩投注总额----------  -撤销总额
        $fCountSelfBet = $this->sumTransactionAmount(7, 1) - $this->sumTransactionAmount(8, 1);

        // 官彩派奖总额 -   -官彩撤销派奖
        $fOfficialAwardTotal = $this->sumTransactionAmount(11, 0)-$this->sumTransactionAmount(12, 0);

        //自主派奖总额 -  自主彩撤销派奖
        $fSelfAwardTotal = $this->sumTransactionAmount(11, 1)-$this->sumTransactionAmount(12, 1);

        // 净投注总额--------
        $fBetTotal = $fCountOfficialBet + $fCountSelfBet;
        // 净派奖总额
        $fAwardTotal = $fOfficialAwardTotal + $fSelfAwardTotal;

        // 在线充值总额------
        $ftotalLoad = $this->sumTransactionAmount(1);
        // 提款总额
        $ftotalWithdraw = $this->sumTransactionAmount(2);

        $todayData = [
            Transaction::$sCountOfficialBet=>$fCountOfficialBet,
            Transaction::$sCountSelfBet=>$fCountSelfBet,
            Transaction::$sCountOfficialAward=>$fOfficialAwardTotal,
            Transaction::$sCountSelfAward=>$fSelfAwardTotal,
            Transaction::$sCountTotalBet=>$fBetTotal,
            Transaction::$sCountTotalAward=>$fAwardTotal,
            Transaction::$sCountTotalLoad=>$ftotalLoad,
            Transaction::$sCountTotalWithdraw=>$ftotalWithdraw
        ];

        // 将每天的数据缓存
        if(!$aCountTransaction = Redis::get('lm:count:transaction')){
            Redis::set('lm:count:transaction',@serialize([$this->today=>$todayData]));
        }else{
            $aCountTransaction = @unserialize($aCountTransaction);
            $aCountTransaction[$this->today] = $todayData;
            Redis::set('lm:count:transaction',@serialize($aCountTransaction));
        };
    }

    /**
     * @param      $iTypeId
     * @param      $iLotteryIsSelf
     *
     * @return float
     */
    private function sumTransactionAmount(int $iTypeId,int $iLotteryIsSelf = -1) :float{
        $transaction = Transaction::whereTypeId($iTypeId)
            ->whereDate('created_at', $this->today);
        // 不区分官彩和自主彩
        if($iLotteryIsSelf === -1){
            return (float)$transaction->sum('amount');
        }else{
            return (float)$transaction->with('lottery')
                ->whereHas('lottery', function($query) use ($iLotteryIsSelf) {
                    $query->whereIsSelf($iLotteryIsSelf);
                })->sum('amount');
        }
    }
}
