<?php
/**
 * Created by PhpStorm.
 * User: loren
 * Date: 8/6/18
 * Time: 3:52 PM
 */

namespace App\Http\Controllers;

use App\Models\Issue;

class MaintenanceController extends AdminBaseController {

    /**
     * 执行更新投注用奖期列表缓存命令
     */
    public function makeIssueListForBet() {
        set_time_limit(0);
        $this->outputMessage('Begin update issues cache for bet');
        //$this->outputMessage('Doing...');
        if(Issue::updateIssueCache()){
            $this->outputMessage('Updated');
        }else{
            $this->outputMessage('Update Fail');
        }
        //Artisan::call('issue:make_list', ['--quiet' => true]);
        die('done');
    }

    private function outputMessage($sMsg){
        echo "$sMsg<br />\n";
        ob_flush();
        flush();
    }
}
