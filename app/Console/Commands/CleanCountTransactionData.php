<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class CleanCountTransactionData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:countTransactionData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean Count Transaction Data';


    public function doCommand(){
        //数据保存时间,3个月
        $sExpiryTime = Carbon::today()->parse('-3 months')->toDateString();
        if($sCountTransaction = Redis::get('lm:count:transaction')){
            $aCountTransaction = @unserialize($sCountTransaction);
            // 删除过期时间前的数据
            foreach($aCountTransaction as $date=>$data){
                if($date<$sExpiryTime){
                    unset($aCountTransaction[$date]);
                }
            }
            Redis::set('lm:count:transaction',@serialize($aCountTransaction));
        }
    }
}
