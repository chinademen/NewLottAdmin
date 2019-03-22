<?php

/**
 * 警报/实时通知
 *
 * @author loren
 */

namespace App\Http\Controllers;


use App\Models\Alarm;
use App\Models\Issue;
use App\Models\IssueWarnings;
use App\Models\Lottery;
use App\Models\RiskProjects;

use Mp3File;

class AlarmController extends AdminBaseController {

    protected $modelName = 'App\Models\Alarm';

    protected function beforeRender() {
        parent::beforeRender();
    }

    public function getAlarmData(){
        $data = [
            'status' => 200,
            'data' => []
        ];
        $aAlarm = Alarm::getLists(['is_closed'=>['=','0']])->toArray();
        foreach($aAlarm as $alarm){
            $tempAlarm = [];
            $tempAlarm['keyword'] = $alarm['keyword'];
            $tempAlarm['content'] = $alarm['content'];
            $tempAlarm['audio_length'] = $alarm['audio_length'];
            $tempAlarm['url'] = '';
            $tempAlarm['is_audio'] = $alarm['is_audio'];
            $tempAlarm['audio_url'] = $alarm['audio_url'];

            switch ($alarm['keyword']){
                case 'risk_project':
                    if(RiskProjects::getAlarmCount()){
                        $tempAlarm['url'] = $alarm['is_url'] ? route('risk-projects.index',['status'=>RiskProjects::STATUS_NORMAL]) : '';
                        $tempAlarm['audio_url'] = $alarm['audio_url'] && is_file($alarm['audio_url']) ? $alarm['audio_url'] : '';
                        $data['data'][$tempAlarm['keyword']] = $tempAlarm;
                    }
                    break;
                case 'encode_issue':
                    if(IssueWarnings::getAlarmCount()){
                        $tempAlarm['url'] = $alarm['is_url'] ? route('issue-warnings.index') : '';
                        $tempAlarm['audio_url'] = $alarm['audio_url'] && is_file($alarm['audio_url']) ? $alarm['audio_url'] : '';
                        $data['data'][$tempAlarm['keyword']] = $tempAlarm;
                    }
                    break;
                case 'not_enough_issue':
                    $aIssueLotteryIds = Issue::getNotAlarmLotterys();
                    $aLotteryNames = Lottery::getSelectSearchArrays(['id','name'],['status'=>Lottery::STATUS_AVAILABLE]);
                    foreach ($aLotteryNames as $k=>$v){
                        if(in_array($k,$aIssueLotteryIds)) continue;
                        $tempAlarm['keyword'] = $alarm['keyword'] . '_' . $k;
                        $tempAlarm['content'] = str_replace(':lottery',$v,$alarm['content']);
                        $tempAlarm['url'] = $alarm['is_url'] ? route('issues.index',['lottery_id'=>$k]) : '';
                        $tempAlarm['audio_url'] = str_replace(':lottery',$k,$alarm['audio_url']);
                        $tempAlarm['audio_url'] = $tempAlarm['audio_url'] && is_file($tempAlarm['audio_url']) ? $tempAlarm['audio_url'] : '';
                        $data['data'][$tempAlarm['keyword']] = $tempAlarm;
                    }
                    break;
                default:
                    break;
            }
        }
        echo json_encode($data);
        exit;
    }

    public function updateAlarmAudio($id = null){
        $aWhere = [];
        if($id) $aWhere['id'] = ['=',$id];
        $aAlarm = Alarm::getLists($aWhere);
        if(empty($aAlarm)){
            return $this->goBack('error', ___('_alarm.update-alarm-audio-fail-no-alarm'));
        }
        foreach($aAlarm as $alarm){
            switch ($alarm->keyword){
                case 'risk_project':
                case 'encode_issue':
                    $content = file_get_contents("http://tts.baidu.com/text2audio?lan=zh&spd=5&ie=UTF-8&text=".urlencode($alarm->content));
                    if(empty($content)){
                        return $this->goBack('error', ___('_alarm.update-alarm-audio-fail-get-audio-fail'));
                    }
                    $isSuc = file_put_contents($alarm->audio_url,$content);
                    if(empty($isSuc)){
                        return $this->goBack('error', ___('_alarm.update-alarm-audio-fail-put-audio-fail'));
                    }
                    $audioTime = $this->getAudioTime($alarm->audio_url);
                    if($audioTime != $alarm->audio_length){
                        $alarm->audio_length = $audioTime;
                        $isSuc = $alarm->save();
                        if(empty($isSuc)){
                            return $this->goBack('error', ___('_alarm.update-alarm-audio-fail-put-audio-fail'));
                        }
                    }
                    break;
                case 'not_enough_issue':
                    $audioTime = 0;
                    $aLotteryNames = Lottery::getSelectSearchArrays(['id','name'],['status'=>Lottery::STATUS_AVAILABLE]);
                    foreach ($aLotteryNames as $k=>$v){
                        $content = file_get_contents("http://tts.baidu.com/text2audio?lan=zh&spd=5&ie=UTF-8&text=".urlencode(str_replace(':lottery',$v,$alarm->content)));
                        if(empty($content)){
                            return $this->goBack('error', ___('_alarm.update-alarm-audio-fail-get-audio-fail'));
                        }
                        $isSuc = file_put_contents(str_replace(':lottery',$k,$alarm->audio_url),$content);
                        if(empty($isSuc)){
                            return $this->goBack('error', ___('_alarm.update-alarm-audio-fail-put-audio-fail'));
                        }
                        $audioTime = max($audioTime,$this->getAudioTime(str_replace(':lottery',$k,$alarm->audio_url)));
                    }
                    if($audioTime != $alarm->audio_length){
                        $alarm->audio_length = $audioTime;
                        $isSuc = $alarm->save();
                        if(empty($isSuc)){
                            return $this->goBack('error', ___('_alarm.update-alarm-audio-fail-put-audio-fail'));
                        }
                    }
                    break;
                default:
                    break;
            }
        }
        return $this->goBackToIndex('success', ___('_alarm.update-alarm-audio-success'));
    }

    private function getAudioTime($url){
        $mp3 = new Mp3File($url);
        return $mp3->getDurationEstimate();
    }

}
