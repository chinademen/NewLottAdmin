<?php
/**
 * Created by PhpStorm.
 * User: lawrence
 * Date: 6/25/18
 * Time: 2:22 PM
 * 基础选项配置 -- en
 */;

return [
    'isTester'    => [ // 是否测试账号
        0 => 'No',
        1 => 'Yes',
    ],
    'isTrue'      => [ // 0 =否 1=是
        0 => 'No',
        1 => 'Yes',
    ],
    'projects'    => [ // 注单
        'status'      => [ // 状态
            '0' => 'Waiting',    //正常
            '1' => 'Revoked',   //已撤销
            '2' => 'Not Winning',   //未中奖
            '3' => 'Already Winning',   //已中奖
            '4' => 'Already Sent',   //已派奖
            '5' => 'Revoked By System',  //系统撤销 通过redis和帐变表去重复
        ],
    ],
    'traces' => [
        'status' => [
            0 => 'Running',         //进行中
            1 => 'Finished',        //已完成
            2 => 'User Stoped',     //用户终止
            3 => 'Admin Stoped',    //管理员中止
            4 => 'System Stoped',   //系统终止
        ],
    ],
    'trace_details' => [
        'status' => [
            0 => 'Running',             //进行中
            1 => 'Finished',            //已完成
            2 => 'User Canceled',       //用户终止
            3 => 'Admin Canceled',      //管理员中止
            4 => 'System Canceled',     //系统终止
            5 => 'Droped'               //注单已撤销
        ],
    ],
    'risk_projects' => [
        'status' => [
            0 => 'Status Waiting',  //待审核
            1 => 'Status Audited',  //审核通过
            2 => 'Status Risked',   //审核未通过
        ],
    ],
    'issues'      => [   // 奖期表
        'status' => [ //  奖期状态
            '1'  => 'Waiting For Draw', //等待开奖
            '2'  => 'Number Entered,Waiting For Audit', //已输入号码,等待审核
            '4'  => 'Number Already Audited',    //号码已审核
            '8'  => 'Number Already Canceled Draw',  //号码已取消开奖
            '32' => 'Advance draw A, the time to get the lottery number is earlier than the official theoretical draw time',    //提前开奖A，获取到开奖号码的时间早于官方理论开奖时间
            '64' => 'Early draw B, the time to obtain the lottery number is earlier than the sales deadline', //提前开奖B，获取到开奖号码的时间早于销售截止时间
        ],
        'group_type'=>[ //返点类型
            1 => 'Group',   //奖金组返点
            2 => 'Percent', //百分比返点
        ],
        'operate_type' => [
            1   => 'revise',    //修改开奖号码
            2   => 'cancel',    //取消开奖号码
            3   => 'advanced',  //提前开奖
        ],
    ],
    'issue_warnings' => [
        'status' => [
            0 => 'Not Resolved',    //未处理
            1 => 'Resolved',        //已处理
        ],
    ],
    'terminal'    => [ // 终端
        'status' => [ // 状态
            0 => 'Closed',  //关闭
            1 => 'Test',
            2 => 'Formal',
        ],
    ],
    'terminal_lottery' => [
        'status' => [ // 状态
            0   => 'Status Closed',     //关闭
            1   => 'Status Testing',    //测试
            3   => 'Status Available',  //可用
        ],
    ],
    'lottery'     => [  // 彩种
        'type' => [   // 类型
            1 => 'Digital', //数字型
            2 => 'Lotto',   //乐透型
            3 => 'Sport',   //体育型
            4 => 'Live Casino', //真人娱乐型
            5 => 'Ga Game', //Ga Game
        ],
        'status'=>[
            0 => 'Status Closed',   //关闭
            1 => 'Status For Tester',   //测试账户可用
            //2 => 'Available',   //正式账户可用 废弃
            3 => 'Status Available',    //正常销售
            4 => 'Status Dev',  //开发中
            8 => 'Status Closed Forever'    //永久关闭
        ],
        'lotto_type'=>[
            1 => 'Single',  //单区乐透
            2 => 'Double',  //双区乐透
        ],
    ],
    'rest_settings' => [
        'periodic' => [
            0 => 'Once',        //一次
            1 => 'Repeat'       //重复
        ],
    ],
    'method_type' => [ // 玩法类型表
        'attribute_code' => [ // 特征码
            'A' => 'Interval',  //区间
            'S' => 'Large Small Single Pair',  //大小单双
            'C' => 'Unfixed',   //不定位
            'I' => 'Interesting',    //趣味
            'O' => 'Original',    //原始
        ],
    ],
    'merchant'    => [ // 商户
        'status'       => [ // 状态
            0 => 'Not Active', //未激活
            1 => 'Already Activated',   //激活
        ],
        'is_tester'    => [ // 是否测试商户
            0 => 'No',
            1 => 'Yes',
        ],
        'profit_type'  => [ // 计费方式
            1 => 'Negative Profit Model',//负盈利模式 不计算限额，只是从负盈利报表中
            2 => 'Credit Deduction',//信用额度减扣 每次投注从信用额度中扣除信用额度
        ],
        'close_status' => [
            0 => 'closed',
            1 => 'opened',
        ],
    ],
    'series'      => [ // 系列
        'lotto_type' => [ // 乐透类型
            1 => 'Single',
            2 => 'Double',
        ],
        'group_type' => [ // 返点类型
            1 => 'group',
            2 => 'percent',
        ],

    ],
    'fund'        => [
        'transfer_info_type' => [
            1 => 'in',
            2 => 'out',
        ],
    ],
    'fund_flow' => [
        'action' => [
            0   => 'Fixedly',
            1   => 'Plus',
            -1  => 'Minus',
        ],
    ],
    'user'        => [
        'blocked' => [
            0 => '正常',
            1 => '冻结',
        ],
        'blocked_type'=>[ // 冻结类型
            0=>'unblock', // 解除冻结
            1=>'block-login', // 禁止登录
            2=>'block-bet',     // 禁止投注
            3=>'block-fund',       // 禁止资金操作
        ]
    ],
    'audit'=>[
        'status'=>[
            0=>'审核中',
            1=>'审核通过',
            2=>'审核拒绝',
        ]
    ]
];