<?php
/**
 * Created by PhpStorm.
 * User: jasonding
 * 聊天核心服务器
 * Date: 6/29/17
 * Time: 12:16 PM
 */

/***
 * 警告：请误修改任何代码 避免出现事故
 */
$reqs=array();
//$ws = new swoole_websocket_server("103.243.180.232", 9505);
$ws = new swoole_websocket_server("172.16.6.72", 9504);


/* MySql 长连接
$db = new Swoole\MySQL;
$server = array(
    'host' => '127.0.0.1',
    'user' => 'root',
    'password' => 'sghwfnwxf520',
    'database' => 'test',
);
$db->connect($server, function ($db, $result) {
    $db->query("select * from Account", function (Swoole\MySQL $db, $result) {
        if ($result === false) {
            var_dump($db->error, $db->errno);
        } elseif ($result === true) {
            var_dump($db->affected_rows, $db->insert_id);
        } else {
            var_dump($result);
            $db->close();
        }
    });
});
*/


/*
$wstime = new swoole_websocket_server("0.0.0.0", 9503);

$wstime->on('open', function (swoole_websocket_server $server, $request) {
});

$wstime->on('message', function (swoole_websocket_server $server, $frame) {
});

$wstime->on('close', function ($ws, $fd) {
});

$wstime->start();


 $ws->table->set($request->fd, array('fd' => $request->fd));//获取客户端id插入table

foreach ($ws->table as $u) {
                $ws->push($u['fd'], $frame->data );//消息广播给所有客户端
        }

*/



$table = new swoole_table(1024);
$table->column('fd', swoole_table::TYPE_INT);
$table->create();



$ws->table = $table;;

// 设置配置
$ws->set(
    array(
        'daemonize' => false,      // 是否是守护进程
        'max_request' => 50000,    // 最大连接数量
        'max_conn' => 50000,     //最大允许的连接数,此参数用来设置Server最大允许维持多少个tcp连接。超过此数量后，新进入的连接将被拒绝。
        'dispatch_mode' => 2,
        /*
            1，轮循模式，收到会轮循分配给每一个worker进程
            2，固定模式，根据连接的文件描述符分配worker。这样可以保证同一个连接发来的数据只会被同一个worker处理
            3，抢占模式，主进程会根据Worker的忙闲状态选择投递，只会投递给处于闲置状态的Worker
            4，IP分配，根据客户端IP进行取模hash，分配给一个固定的worker进程。可以保证同一个来源IP的连接数据总会被分配到同一个worker进程。算法为 ip2long(ClientIP) % worker_num
            5，UID分配，需要用户代码中调用 $serv-> bind() 将一个连接绑定1个uid。然后swoole根据UID的值分配到不同的worker进程。算法为 UID % worker_num，如果需要使用字符串作为UID，可以使用crc32(UID_STRING)
         */
        'debug_mode'=> 1,
        // 心跳检测的设置，自动踢掉掉线的fd
        'heartbeat_check_interval' => 18000,//与heartbeat_check_interval配合使用。表示连接最大允许空闲的时间。如表示每60秒遍历一次，一个连接如果600秒内未向服务器发送任何数据，此连接将被强制关闭
        'heartbeat_idle_time' => 18000,//与heartbeat_check_interval配合使用。表示连接最大允许空闲的时间。如表示每60秒遍历一次，一个连接如果600秒内未向服务器发送任何数据，此连接将被强制关闭
        'reactor_num' => 10,//reactor线程数
        //'worker_num' => 100,
        //'task_worker_num' => 10 //MySQL连接的数量
        //'worker_num' => 8,//启动的worker进程数
        //'log_file' => '/data/log/swoole.log' //日志 需要配置守护进程使用
    )
);



function token() {
    $charid = strtoupper(md5(uniqid(mt_rand(), true)));
    $uuid = substr($charid, 0, 8)
        .substr($charid, 8, 4)
        .substr($charid,12, 4)
        .substr($charid,16, 4)
        .substr($charid,20,12);
    return $uuid;
}

$ws->on('open', function (swoole_websocket_server $server, $request) {
    //global $rds;
    //$rds->hset("Online",$request->fd,"null");
    //echo "-------------------------------------------------\n\n";
    //$sql="select * from Account";
    //$rs=mysql_query($sql,$mysql);
    //while($row=mysql_fetch_object($rs)){
    //}
    //global $reqs;
    //$reqs[]=$request->fd;
    global $reqs;
    $reqs[]=$request->fd;

    //echo "有用户连接：连接通道{{$request->fd}}\n";//$request->fd 是客户端id
    //var_dump(count($reqs));//输出长连接数
    //var_dump(count($reqs));//输出长连接数
});


/*
 * APIRecord 调用记录
 * AverageRecord 平均接待时长记录
 * Chat 聊天记录
 * CustMoersource   评分记录
 * LoginRecord 登录记录
 * ReceiveRecord    接待记录
 * ConnetRecord 连接记录
 */


//$MongoDB = new Mongo('127.0.0.1:27017');
$MongoDB = new Mongo("mongodb://admin:admin@127.0.0.1:27017/custmoer");


/***
 * @param $DataBase
 * @param array $InsertData
 * @return array|bool
 * 插入一条数据
 */
function MongoDBInsert($DataBase,$InsertData = array()){
    global $MongoDB;
    $db = $MongoDB->selectDB("custmoer");
    $LoginInsert = $db->$DataBase;//初始化数据库
    $ret = $LoginInsert->insert($InsertData);
    return $ret;
}

function MongoDBUpdate(){
    global $MongoDB;

}


function MongoDBDelete(){
    global $MongoDB;

}


/***
 * @param $DataBase
 * @param array $where
 * @return MongoCursor
 * 查询数据库并排序
 */
function MongoDBFindorder($DataBase,$where = array(),$sort = array()){
    global $MongoDB;
    $db = $MongoDB->selectDB("custmoer");
    $LoginInsert = $db->$DataBase;//初始化数据库
    $scan = $LoginInsert->find($where)->sort($sort);
    $array=array();
    foreach ($scan as $k=>$v){
        $array[]=$v;
    }
    return $array;
}

/***
 * @param $DataBase
 * @param array $where
 * @return MongoCursor
 * 查询数据库不排序
 */
function MongoDBFind($DataBase,$where = array()){
    global $MongoDB;
    $db = $MongoDB->selectDB("custmoer");
    $LoginInsert = $db->$DataBase;//初始化数据库
    $scan = $LoginInsert->find($where);
    $array=array();
    foreach ($scan as $k=>$v){
        $array[]=$v;
    }

    return $array;
}




function MongoDBFindcount($DataBase,$where = array()){
    global $MongoDB;
    $db = $MongoDB->selectDB("custmoer");
    $LoginInsert = $db->$DataBase;//初始化数据库
    $scan = $LoginInsert->find($where)->count();
    return $scan;
}




$ws->on('message', function (swoole_websocket_server $server, $frame) {
    writelog("▧▧▧▧▧▧▧▧▧▧▧▧▧▧▧▧▧ 服务器消息接收的通知◆ 开始◆▧▧▧▧▧▧▧▧▧▧▧▧▧▧▧▧▧▧▧▧▧▧\n");

    $sqlserver = "172.16.100.152";
    $rds = new \Redis();
    $rds->connect("127.0.0.1", 6379);
    $OnlineTIME = date('Y-m-d H:i:s', time());


    //echo "----------------------------------------\n";
    //$rt = MongoDBInsert("sys_connet_record",array('Date'=>$OnlineTIME,'fd'=>$frame->fd,'data'=>json_decode($frame->data)));
    //echo "----------------------------------------\n";

    $arr = json_decode($frame->data);
    //echo "--解析---------------\n";
    //print_r($arr);
    //echo "\n";
    //echo "--解析完成---------------\n";



    if ($arr->ConnetcType == "Connetc"){//连接服务器  获取活动信息

        //$user = $rds->hSet("Event",$frame->fd,$frame->data);

        if ($arr->EventType == "RedGags"){//活动类型=红包雨

            $mysql = new MMysql($sqlserver,"3306","dev","dev123","gapple");

            $sql = "SELECT
                    event_conditions.target_value,
                    event_conditions.`level`,
                    event_prizes.gift_value,
                    event_prizes.trigger_date,
                    `events`.title,
                    `events`.start_time,
                    `events`.end_time
                    FROM
                    event_conditions
                    INNER JOIN event_prizes ON event_conditions.`level` = event_prizes.`level` 
                    AND event_conditions.event_id = event_prizes.event_id
                    INNER JOIN `events` ON `events`.id = event_conditions.event_id
                where event_conditions.event_id='".$arr->EventID ."'";

            $cou = $mysql->doSql($sql);

            MongoDBInsert("EventInfo",array('ID'=>token(),'Event'=>$cou));
            writelog("查看活动数据[".$arr->EventID."]数据内容：".json_encode($cou));

            $arrdata = array();
            foreach ($cou as $k=>$v){
                $arrdata[$k] = array(
                    'target_value'=>$v['target_value'],
                    'level'=>$v['level'],
                    'gift_value'=>$v['gift_value'],
                    //'title'=>$v['title'],
                    //'start_time'=>$v['start_time'],
                    //'end_time'=>$v['end_time'],
                    'trigger_date'=>date('H:i:s', strtotime($v['trigger_date']))
                );
            }
            $stime = date('Y年m月d日',strtotime($cou[0]['start_time']));
            $etime = date('Y年m月d日',strtotime($cou[0]['end_time']));

            $todaytime = date('Y-m-d',time());

            $sql2 = "SELECT
                    user_turnovers.user_id,
                    sum(user_turnovers.turnover) as sumuser
                    FROM
                    user_turnovers where user_id='".$arr->UserID."' and DATE_FORMAT(created_at,'%Y-%m-%d') ='".$todaytime."'";

            $sumuser_turnovers = $mysql->doSql($sql2);
            writelog("查看用户[".$arr->UserID."]当日[".$todaytime."]消耗流水:".json_encode($sumuser_turnovers));
            MongoDBInsert("EventInfo",array('ID'=>token(),'Event'=>$sumuser_turnovers));


            $eventinfo = array(
                'title' => $cou[0]['title'],
                'start_time' => $stime,
                'end_time' => $etime,
                'userturn'=>round($sumuser_turnovers[0]['sumuser'],2)
            );

            $mysql->close();
            $server->push($frame->fd, json_encode(array('static'=>'Content','Data'=>$arrdata,'eventinfo'=>$eventinfo)));//发送通道-自己




        }else if ($arr->EventType == "xAdventures"){



            $mysql = new MMysql("172.16.100.152","3306","dev","dev123","xl");

            $sql = "SELECT
                    `events`.title,
                    `events`.end_time,
                    `events`.start_time,
                    event_prizes.`id`,
                    event_prizes.`level`,
                    event_prizes.gift_value
                    FROM
                    `events`
                    INNER JOIN event_prizes ON `events`.id = event_prizes.event_id
                    where events.id=13";
            $cou = $mysql->doSql($sql);

            /*
             * 奖项数组
             * 是一个二维数组，记录了所有本次抽奖的奖项信息，
             * 其中id表示中奖等级，prize表示奖品，v表示中奖概率。
             * 注意其中的v必须为整数，你可以将对应的 奖项的v设置成0，即意味着该奖项抽中的几率是0，
             * 数组中v的总和（基数），基数越大越能体现概率的准确性。
             * 本例中v的总和为100，那么平板电脑对应的 中奖概率就是1%，
             * 如果v的总和是10000，那中奖概率就是万分之一了。
             *
             */

            $prize_arr = array();
            foreach ($cou as $k=>$v){
                $round = rand(10,100);
                $prize_arr[$k] = array('id'=>$v['id'],'prize'=>$v['gift_value'],'v'=>$round);
            }
            shuffle($prize_arr);

            $arr1 = array();
            $arr2 = array();
            $arr3 = array();
            $arr4 = array();
            $arr5 = array();
            foreach ($prize_arr as $K=>$V){
                if ($K <= 5){
                    $arr1[$K] = $V;
                }else if ($K >5 && $K<=7){
                    $arr2[$K] = $V;
                }else if ($K >7 && $K<=9){
                    $arr3[$K] = $V;
                }
                else if ($K >9 && $K<=11){
                    $arr4[$K] = $V;
                }
                else if ($K >11 && $K<=17){
                    $arr5[$K] = $V;
                }

            }

            $dal = array('arr1'=>$arr1,'arr2'=>$arr2,'arr3'=>$arr3,'arr4'=>$arr4,'arr5'=>$arr5);

            $server->push($frame->fd, json_encode(array('static'=>'Content','List'=>$dal)));


            if ($arr->Status == "test"){

                /*
                 * 每次前端页面的请求，PHP循环奖项设置数组，
                 * 通过概率计算函数get_rand获取抽中的奖项id。
                 * 将中奖奖品保存在数组$res['yes']中，
                 * 而剩下的未中奖的信息保存在$res['no']中，
                 * 最后输出json个数数据给前端页面。
                 */
                $arr = array();
                foreach ($prize_arr as $key => $val) {
                    $arr[$val['id']] = $val['v'];
                }

                $rid = get_rand1($arr); //根据概率获取奖项id

            }


        }else if ($arr->EventType == "wAdventures"){

            $wangcai = new MMysql("172.16.100.152","3306","dev","dev123","wangcai");

            $sql = "SELECT
                    `events`.title,
                    `events`.end_time,
                    `events`.start_time,
                    event_prizes.`id`,
                    event_prizes.`level`,
                    event_prizes.gift_value
                    FROM
                    `events`
                    INNER JOIN event_prizes ON `events`.id = event_prizes.event_id
                    where events.id=5";
            $cou = $wangcai->doSql($sql);

            shuffle($cou);


            $aar = array();

            $data = "";
            foreach ($cou as $k => $v){

                array_push($aar,$v['gift_value']."元");

                //$value =$v['gift_value']."元";

                //$data .= "$value," ;
            }



            $datas = substr($data,0,strlen($data)-1);


            $server->push($frame->fd, json_encode(array('static'=>'Content','Data'=>$datas)));

        }


    }else if ($arr->ConnetcType == "GetTime"){//客户端获取倒计时


        if ($arr->EventName == "xAdventures"){

            $mysql = new MMysql("172.16.100.152","3306","dev","dev123","xl");

            $OnlineTIME = date('Y-m-d H:i:s', time());
            $today = date('Y-m-d', time());

            $getusertur = "SELECT
                    user_turnovers.user_id,
                    sum(user_turnovers.turnover) as sumuser
                    FROM
                    user_turnovers where user_id='".$arr->UserID."' and DATE_FORMAT(created_at,'%Y-%m-%d') ='".$today."'";
            $sumuser_turnovers = $mysql->doSql($getusertur);
            MongoDBInsert("UserStatus",array('ID'=>token(),'Event'=>$arr->EventID,'UserInfo'=>$sumuser_turnovers));
            writelog("每秒用户消耗信息[".$arr->UserID."]数据内容：".json_encode($sumuser_turnovers));


            $server->push($frame->fd, json_encode(array('static'=>'UserData','UserData'=>$sumuser_turnovers)));//发送通道-自己




        }else if ($arr->EventName == "RedGags"){

            $mysql = new MMysql($sqlserver,"3306","dev","dev123","gapple");
            $OnlineTIME = date('Y-m-d H:i:s', time());
            $today = date('Y-m-d', time());
            $sql = "SELECT
                event_conditions.target_value,
                event_conditions.`level`,
                event_prizes.gift_value,
                DATE_FORMAT(event_prizes.trigger_date, '$today %H:%i:%s') as trigger_date
                FROM
                event_conditions
                INNER JOIN event_prizes ON event_conditions.`level` = event_prizes.`level` AND event_conditions.event_id = event_prizes.event_id
                where event_conditions.event_id='". $arr->EventID ."' and DATE_FORMAT(event_prizes.trigger_date, '$today %H:%i:%s')>='". $OnlineTIME ."'";
            $cou = $mysql->doSql($sql);
            MongoDBInsert("UserStatus",array('ID'=>token(),'Event'=>$arr->EventID,'UserInfo'=>$cou));
            writelog("每秒活动信息[".$arr->EventID."]数据内容：".json_encode($cou));


            $todaytime = date('Y-m-d',time());
            $getusertur = "SELECT
                    user_turnovers.user_id,
                    sum(user_turnovers.turnover) as sumuser
                    FROM
                    user_turnovers where user_id='".$arr->UserID."' and DATE_FORMAT(created_at,'%Y-%m-%d') ='".$todaytime."'";
            $sumuser_turnovers = $mysql->doSql($getusertur);
            MongoDBInsert("UserStatus",array('ID'=>token(),'Event'=>$arr->EventID,'UserInfo'=>$sumuser_turnovers));
            writelog("每秒用户消耗信息[".$arr->UserID."]数据内容：".json_encode($sumuser_turnovers));

            $events = "SELECT
                        `events`.start_time,
                        `events`.end_time
                        FROM
                        `events` where id='".$arr->EventID."'";
            $eventdate = $mysql->doSql($events);
            $redboxstartdate = $eventdate[0]['start_time'];
            $redboxendtime = $eventdate[0]['end_time'];

            $getusercash = "SELECT
                        user_cash_package.prize_id,
                        sum(user_cash_package.consume) as consume,
                        sum(user_cash_package.amount) as amount,
                        user_cash_package.`status`,
                        user_cash_package.created_at
                        FROM user_cash_package 
                        where event_id='".$arr->EventID."' and user_id='".$arr->UserID."' 
                        and created_at>='".$redboxstartdate."' and created_at<='".$redboxendtime."'";
            $sumuser_cash = $mysql->doSql($getusercash);
            MongoDBInsert("UserStatus",array('ID'=>token(),'Event'=>$arr->EventID,'UserInfo'=>$sumuser_cash));
            writelog("用户获得红包信息[".$arr->UserID."]数据内容：".json_encode($sumuser_cash));




            $sumuser_cash_arr = array(
                'consume' => $sumuser_turnovers[0]['sumuser'] - $sumuser_cash[0]['consume'],
                'amount' => $sumuser_cash[0]['amount'],
            );
            if ($cou != null && $cou !=''){
                $t1_date =  time();
                $t2_date = strtotime($cou[0]['trigger_date']);
                $times = $t2_date - $t1_date;
                if ($t1_date == $t2_date){
                    $server->push($frame->fd, json_encode(array('static'=>'Start')));//发送通道-自己
                }else{
                    if ($times <=0){
                        $ttt="00:00:00";
                        $server->push($frame->fd, json_encode(array('static'=>'Time','Time'=>$ttt,'level'=>$cou[0]['level'],'sumuser_cash'=>$sumuser_cash_arr,'UserInfo'=>round($sumuser_turnovers[0]['sumuser'],2))));//发送通道-自己
                    }else{
                        $ttt = get_timediff($t2_date,$t1_date);
                        $server->push($frame->fd, json_encode(array('static'=>'Time','Time'=>$ttt,'level'=>$cou[0]['level'],'sumuser_cash'=>$sumuser_cash_arr,'UserInfo'=>round($sumuser_turnovers[0]['sumuser'],2))));//发送通道-自己
                    }
                }
            }else{
                $t1_date = time();
                $t2_date = time();
                $times = get_timediff($t2_date,$t1_date);
                $server->push($frame->fd, json_encode(array('static'=>'Time','Time'=>$times)));//发送通道-自己
            }




        }



    }else if ($arr->ConnetcType == "GetServerTime") {//连接服务器 获得服务器时间
        if ($arr->TimeType == "Time"){
            $ServerDateTime = date('Y-m-d H:i:s', time());
            $ServerDate = date('Y-m-d', time());
            $ServerTime = date('H:i:s', time());
            $ServerTimestamp = time();
            $server->push($frame->fd, json_encode(
                array(
                    'static'=>'Time',
                    'DateTime'=>$ServerDateTime,
                    'Date'=>$ServerDate,
                    'Time'=>$ServerTime,
                    'Timestamp'=>$ServerTimestamp
                )
              )
            );//发送通道-自己
        }
    }

    writelog("▧▧▧▧▧▧▧▧▧▧▧▧▧▧▧▧▧ 服务器消息接收的通知◆ 结束◆▧▧▧▧▧▧▧▧▧▧▧▧▧▧▧▧▧▧▧▧▧▧\n");
    $rds->close();
});


/*
 * 经典的概率算法，
 * $proArr是一个预先设置的数组，
 * 假设数组为：array(100,200,300，400)，
 * 开始是从1,1000 这个概率范围内筛选第一个数是否在他的出现概率范围之内，
 * 如果不在，则将概率空间，也就是k的值减去刚刚的那个数字的概率空间，
 * 在本例当中就是减去100，也就是说第二个数是在1，900这个范围内筛选的。
 * 这样 筛选到最终，总会有一个数满足要求。
 * 就相当于去一个箱子里摸东西，
 * 第一个不是，第二个不是，第三个还不是，那最后一个一定是。
 * 这个算法简单，而且效率非常 高，
 * 关键是这个算法已在我们以前的项目中有应用，尤其是大数据量的项目中效率非常棒。
 */
function get_rand($proArr) {
    $result = '';
    //概率数组的总概率精度
    $proSum = array_sum($proArr);
    //概率数组循环
    foreach ($proArr as $key => $proCur) {
        $randNum = mt_rand(1, $proSum);
        if ($randNum <= $proCur) {
            $result = $key;
            break;
        } else {
            $proSum -= $proCur;
        }
    }
    unset ($proArr);
    return $result;
}


/*
 * 不同概率的抽奖原理就是把0到*（比重总数）的区间分块
 * 分块的依据是物品占整个的比重，再根据随机数种子来产生0-* 中的某个数
 * 判断这个数是落在哪个区间上，区间对应的就是抽到的那个物品。
 * 随机数理论上是概率均等的，那么相应的区间所含数的多少就体现了抽奖物品概率的不同。
 */
function get_rand2($proArr)
{
    $result = array();
    foreach ($proArr as $key => $val) {
        $arr[$key] = $val['v'];
    }
    $proSum = array_sum($arr);      // 计算总权重
    $randNum = mt_rand(1, $proSum);
    $d1 = 0;
    $d2 = 0;
    for ($i=0; $i < count($arr); $i++)
    {
        $d2 += $arr[$i];
        if($i==0)
        {
            $d1 = 0;
        }
        else
        {
            $d1 += $arr[$i-1];
        }
        if($randNum >= $d1 && $randNum <= $d2)
        {
            $result = $proArr[$i];
        }
    }
    unset ($arr);
    return $result;
}


/*
* 使用较多的为这个方法
*/
function get_rand1($proArr) {
    $result = array();

    foreach ($proArr as $key => $val) {
        $arr[$key] = $val['v'];
    }

    // 概率数组的总概率
    $proSum = array_sum($arr);
    asort($arr);
    // 概率数组循环
    foreach ($arr as $k => $v) {
        $randNum = mt_rand(1, $proSum);
        if ($randNum <= $v) {
            $result = $proArr[$k];
            break;
        } else {
            $proSum -= $v;
        }
    }
    return $result;
}




function get_timediff($begin_time,$end_time)
{
    if($begin_time < $end_time){
        $starttime = $begin_time;
        $endtime = $end_time;
    }else{
        $starttime = $end_time;
        $endtime = $begin_time;
    }
    //计算天数
    $timediff = $endtime-$starttime;
    $days = intval($timediff/86400);
    //计算小时数
    $remain = $timediff%86400;
    $hours = intval($remain/3600);
    //计算分钟数
    $remain = $remain%3600;
    $mins = intval($remain/60);
    //计算秒数
    $secs = $remain%60;
    //$res = array("day" => $days,"hour" => $hours,"min" => $mins,"sec" => $secs);
    return "{$hours}:{$mins}:{$secs}";
}

$ws->on('close', function ($ws, $fd) {
    writelog("░░░░░░░░░░░░░░░░░服务器退出消息的通知◆ 开始◆░░░░░░░░░░░░░░░░░░░░░░\n");

    $rds = new \Redis();
    $conredis = $rds->connect("127.0.0.1", 6379);

    $getchannle = $rds->hgetall("Event");//获取当前服务器所有通道有客服人员信息

    //$rds->hDel("Event",$fd);

    //$rds->close();

    writelog("░░░░░░░░░░░░░░░░░服务器退出消息的通知◆ 结束◆░░░░░░░░░░░░░░░░░░░░░░\n");

    $ws->close($fd);
});



function guid() {
    $charid = strtoupper(md5(uniqid(mt_rand(), true)));
    $uuid =substr($charid, 0, 8)
        .substr($charid, 8, 4)
        .substr($charid,12, 4)
        .substr($charid,16, 4)
        .substr($charid,20,12);
    return $uuid;
}


/***
 * 计算队列中排队人数最少的客服人员
 * @param array $data
 * @return mixed
 */
function Calculation($data = array()){
    $ar = array();
    foreach ($data as $k=>$v){
        foreach ($v as $ke=>$vs){
            $ar[$ke] = $vs;
        }
    }
    ksort($ar);
    return current($ar);
}



//echo "----------------\n";

/***
 * @param $str
 * 日志记录
 */
function writelog($str)
{
    $Time = date('Y-m-d', time());
    $Times = date('Y-m-d H:i:s', time());
    $open=fopen("/data/logs/Event-".$Time.".log","a+" );
    fwrite($open,$Times ."|". $str);
    fwrite($open,"\n");
    fclose($open);
}



$ws->start();



function GetIPAddress($Ip){

    $url = "http://ip.taobao.com/service/getIpInfo.php?ip=$Ip";
    echo $url;
    $ch = curl_init();
    //设置选项，包括URL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    //执行并获取HTML文档内容
     $output = curl_exec($ch);
     //释放curl句柄
     curl_close($ch);
     //打印获得的数据
     return $output;
    //http://ip.taobao.com/service/getIpInfo.php?ip=202.98.192.67
}

?>



<?php
/**
 * Desc: php操作mysql的封装类
 * Author JasonDing
 * Date: 2017/07/03
 * 连接模式：PDO
 */

class MMysql {

    protected static $_dbh = null; //静态属性,所有数据库实例共用,避免重复连接数据库
    protected $_dbType = 'mysql';
    protected $_pconnect = true; //是否使用长连接
    protected $_host = 'localhost';
    protected $_port = 3306;
    protected $_user = 'root';
    protected $_pass = 'root';
    protected $_dbName = null; //数据库名
    protected $_sql = false; //最后一条sql语句
    protected $_where = '';
    protected $_order = '';
    protected $_limit = '';
    protected $_field = '*';
    protected $_clear = 0; //状态，0表示查询条件干净，1表示查询条件污染
    protected $_trans = 0; //事务指令数

    /**
     * 初始化类
     * @param array $conf 数据库配置
     */
    //public function __construct(array $conf) {
    public function __construct($host,$port,$user,$passwd,$dbname) {
        class_exists('PDO') or die("PDO: class not exists.");
        $this->_host = $host;
        $this->_port = $port;
        $this->_user = $user;
        $this->_pass = $passwd;
        $this->_dbName = $dbname;

        /*
         * $this->_host = $conf['host'];
         * $this->_port = $conf['port'];
         * $this->_user = $conf['user'];
         * $this->_pass = $conf['passwd'];
         * $this->_dbName = $conf['dbname'];
         */

        //连接数据库
        if ( is_null(self::$_dbh) ) {
            $this->_connect();
        }
    }

    /**
     * 连接数据库的方法
     */
    protected function _connect() {
        $dsn = $this->_dbType.':host='.$this->_host.';port='.$this->_port.';dbname='.$this->_dbName;
        $options = $this->_pconnect ? array(PDO::ATTR_PERSISTENT=>true) : array();
        try {
            $dbh = new PDO($dsn, $this->_user, $this->_pass, $options);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //设置如果sql语句执行错误则抛出异常，事务会自动回滚
            $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //禁用prepared statements的仿真效果(防SQL注入)
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
        $dbh->exec('SET NAMES utf8');
        self::$_dbh = $dbh;
    }

    /**
     * 字段和表名添加 `符号
     * 保证指令中使用关键字不出错 针对mysql
     * @param string $value
     * @return string
     */
    protected function _addChar($value) {
        if ('*'==$value || false!==strpos($value,'(') || false!==strpos($value,'.') || false!==strpos($value,'`')) {
            //如果包含* 或者 使用了sql方法 则不作处理
        } elseif (false === strpos($value,'`') ) {
            $value = '`'.trim($value).'`';
        }
        return $value;
    }

    /**
     * 取得数据表的字段信息
     * @param string $tbName 表名
     * @return array
     */
    protected function _tbFields($tbName) {
        $sql = 'SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME="'.$tbName.'" AND TABLE_SCHEMA="'.$this->_dbName.'"';
        $stmt = self::$_dbh->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $ret = array();
        foreach ($result as $key=>$value) {
            $ret[$value['COLUMN_NAME']] = 1;
        }
        return $ret;
    }

    /**
     * 过滤并格式化数据表字段
     * @param string $tbName 数据表名
     * @param array $data POST提交数据
     * @return array $newdata
     */
    protected function _dataFormat($tbName,$data) {
        if (!is_array($data)) return array();
        $table_column = $this->_tbFields($tbName);
        $ret=array();
        foreach ($data as $key=>$val) {
            if (!is_scalar($val)) continue; //值不是标量则跳过
            if (array_key_exists($key,$table_column)) {
                $key = $this->_addChar($key);
                if (is_int($val)) {
                    $val = intval($val);
                } elseif (is_float($val)) {
                    $val = floatval($val);
                } elseif (preg_match('/^\(\w*(\+|\-|\*|\/)?\w*\)$/i', $val)) {
                    // 支持在字段的值里面直接使用其它字段 ,例如 (score+1) (name) 必须包含括号
                    $val = $val;
                } elseif (is_string($val)) {
                    $val = '"'.addslashes($val).'"';
                }
                $ret[$key] = $val;
            }
        }
        return $ret;
    }

    /**
     * 执行查询 主要针对 SELECT, SHOW 等指令
     * @param string $sql sql指令
     * @return mixed
     */
    protected function _doQuery($sql='') {
        $this->_sql = $sql;
        $pdostmt = self::$_dbh->prepare($this->_sql); //prepare或者query 返回一个PDOStatement
        $pdostmt->execute();
        $result = $pdostmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * 执行语句 针对 INSERT, UPDATE 以及DELETE,exec结果返回受影响的行数
     * @param string $sql sql指令
     * @return integer
     */
    protected function _doExec($sql='') {
        $this->_sql = $sql;
        return self::$_dbh->exec($this->_sql);
    }

    /**
     * 执行sql语句，自动判断进行查询或者执行操作
     * @param string $sql SQL指令
     * @return mixed
     */
    public function doSql($sql='') {
        $queryIps = 'INSERT|UPDATE|DELETE|REPLACE|CREATE|DROP|LOAD DATA|SELECT .* INTO|COPY|ALTER|GRANT|REVOKE|LOCK|UNLOCK';
        if (preg_match('/^\s*"?(' . $queryIps . ')\s+/i', $sql)) {
            return $this->_doExec($sql);
        }
        else {
            //查询操作
            return $this->_doQuery($sql);
        }
    }

    /**
     * 获取最近一次查询的sql语句
     * @return String 执行的SQL
     */
    public function getLastSql() {
        return $this->_sql;
    }

    /**
     * 插入方法
     * @param string $tbName 操作的数据表名
     * @param array $data 字段-值的一维数组
     * @return int 受影响的行数
     */
    public function insert($tbName,array $data){
        $data = $this->_dataFormat($tbName,$data);
        if (!$data) return;
        $sql = "insert into ".$tbName."(".implode(',',array_keys($data)).") values(".implode(',',array_values($data)).")";
        return $this->_doExec($sql);
    }

    /**
     * 删除方法
     * @param string $tbName 操作的数据表名
     * @return int 受影响的行数
     */
    public function delete($tbName) {
        //安全考虑,阻止全表删除
        if (!trim($this->_where)) return false;
        $sql = "delete from ".$tbName." ".$this->_where;
        $this->_clear = 1;
        $this->_clear();
        return $this->_doExec($sql);
    }

    /**
     * 更新函数
     * @param string $tbName 操作的数据表名
     * @param array $data 参数数组
     * @return int 受影响的行数
     */
    public function update($tbName,array $data) {
        //安全考虑,阻止全表更新
        if (!trim($this->_where)) return false;
        $data = $this->_dataFormat($tbName,$data);
        if (!$data) return;
        $valArr = '';
        foreach($data as $k=>$v){
            $valArr[] = $k.'='.$v;
        }
        $valStr = implode(',', $valArr);
        $sql = "update ".trim($tbName)." set ".trim($valStr)." ".trim($this->_where);
        return $this->_doExec($sql);
    }

    /**
     * 查询函数
     * @param string $tbName 操作的数据表名
     * @return array 结果集
     */
    public function select($tbName='') {
        $sql = "select ".trim($this->_field)." from ".$tbName." ".trim($this->_where)." ".trim($this->_order)." ".trim($this->_limit);
        $this->_clear = 1;
        $this->_clear();
        return $this->_doQuery(trim($sql));
    }

    /**
     * @param mixed $option 组合条件的二维数组，例：$option['field1'] = array(1,'=>','or')
     * @return $this
     */
    public function where($option) {
        if ($this->_clear>0) $this->_clear();
        $this->_where = ' where ';
        $logic = 'and';
        if (is_string($option)) {
            $this->_where .= $option;
        }
        elseif (is_array($option)) {
            foreach($option as $k=>$v) {
                if (is_array($v)) {
                    $relative = isset($v[1]) ? $v[1] : '=';
                    $logic    = isset($v[2]) ? $v[2] : 'and';
                    $condition = ' ('.$this->_addChar($k).' '.$relative.' '.$v[0].') ';
                }
                else {
                    $logic = 'and';
                    $condition = ' ('.$this->_addChar($k).'='.$v.') ';
                }
                $this->_where .= isset($mark) ? $logic.$condition : $condition;
                $mark = 1;
            }
        }
        return $this;
    }

    /**
     * 设置排序
     * @param mixed $option 排序条件数组 例:array('sort'=>'desc')
     * @return $this
     */
    public function order($option) {
        if ($this->_clear>0) $this->_clear();
        $this->_order = ' order by ';
        if (is_string($option)) {
            $this->_order .= $option;
        }
        elseif (is_array($option)) {
            foreach($option as $k=>$v){
                $order = $this->_addChar($k).' '.$v;
                $this->_order .= isset($mark) ? ','.$order : $order;
                $mark = 1;
            }
        }
        return $this;
    }

    /**
     * 设置查询行数及页数
     * @param int $page pageSize不为空时为页数，否则为行数
     * @param int $pageSize 为空则函数设定取出行数，不为空则设定取出行数及页数
     * @return $this
     */
    public function limit($page,$pageSize=null) {
        if ($this->_clear>0) $this->_clear();
        if ($pageSize===null) {
            $this->_limit = "limit ".$page;
        }
        else {
            $pageval = intval( ($page - 1) * $pageSize);
            $this->_limit = "limit ".$pageval.",".$pageSize;
        }
        return $this;
    }

    /**
     * 设置查询字段
     * @param mixed $field 字段数组
     * @return $this
     */
    public function field($field){
        if ($this->_clear>0) $this->_clear();
        if (is_string($field)) {
            $field = explode(',', $field);
        }
        $nField = array_map(array($this,'_addChar'), $field);
        $this->_field = implode(',', $nField);
        return $this;
    }

    /**
     * 清理标记函数
     */
    protected function _clear() {
        $this->_where = '';
        $this->_order = '';
        $this->_limit = '';
        $this->_field = '*';
        $this->_clear = 0;
    }

    /**
     * 手动清理标记
     * @return $this
     */
    public function clearKey() {
        $this->_clear();
        return $this;
    }

    /**
     * 启动事务
     * @return void
     */
    public function startTrans() {
        //数据rollback 支持
        if ($this->_trans==0) self::$_dbh->beginTransaction();
        $this->_trans++;
        return;
    }

    /**
     * 用于非自动提交状态下面的查询提交
     * @return boolen
     */
    public function commit() {
        $result = true;
        if ($this->_trans>0) {
            $result = self::$_dbh->commit();
            $this->_trans = 0;
        }
        return $result;
    }

    /**
     * 事务回滚
     * @return boolen
     */
    public function rollback() {
        $result = true;
        if ($this->_trans>0) {
            $result = self::$_dbh->rollback();
            $this->_trans = 0;
        }
        return $result;
    }

    /**
     * 关闭连接
     * PHP 在脚本结束时会自动关闭连接。
     */
    public function close() {
        if (!is_null(self::$_dbh)) self::$_dbh = null;
    }

}

?>
