<?php
/**
 * Created by PhpStorm.
 * User: loren
 * Date: 7/16/18
 * Time: 4:54 PM
 */

return [
    'calculate_prize' => [
        'url' => env('NEWLOTT_API_HOST', 'http://127.0.0.1') . "/admin/calculate_prize.do",
        'type' => 'POST',
        'data' => [
            'admin_name' => 1,
            'lottery_id' => 1,    //0：非必填;  1:必填;  其他字符：固定值; 数组：调用方法 [方法名 ，自定义参数值：生成密钥用];
            'issue' => 1,
            'sign' => ['getNewlottApiSigin', ['admin_name', 'lottery_id', 'issue']],
        ],
        'datafun' => 'getNewlottApiPostData'
    ],
    'cancel_prize' => [
        'url' => env('NEWLOTT_API_HOST', 'http://127.0.0.1') . "/admin/cancel_prize.do",
        'type' => 'POST',
        'data' => [
            'admin_name' => 1,
            'lottery_id' => 1,
            'issue' => 1,
            'new_code' => 1,
            'code_center_id' => 0,
            'sign' => ['getNewlottApiSigin', ['admin_name', 'lottery_id', 'issue', 'new_code', 'code_center_id']],
        ],
        'datafun' => 'getNewlottApiPostData'
    ],
    'cancel_issue' => [
        'url' => env('NEWLOTT_API_HOST', 'http://127.0.0.1') . "/admin/cancel_issue.do",
        'type' => 'POST',
        'data' => [
            'admin_name' => 1,
            'lottery_id' => 1,    //0：非必填;  1:必填;  其他字符：固定值; 数组：调用方法 [方法名 ，自定义参数值：生成密钥用];
            'issue' => 1,
            'begin_time' => 0,
            'sign' => ['getNewlottApiSigin', ['admin_name', 'lottery_id', 'issue', 'begin_time']],
        ],
        'datafun' => 'getNewlottApiPostData'
    ],
    'cancel_project' => [
        'url' => env('NEWLOTT_API_HOST', 'http://127.0.0.1') . "/admin/cancel_project.do",
        'type' => 'POST',
        'data' => [
            'admin_name' => 1,
            'project_id' => 1,    //0：非必填;  1:必填;  其他字符：固定值; 数组：调用方法 [方法名 ，自定义参数值：生成密钥用];
            'sign' => ['getNewlottApiSigin', ['admin_name', 'project_id']],
        ],
        'datafun' => 'getNewlottApiPostData'
    ],
    'cancel_trace' => [
        'url' => env('NEWLOTT_API_HOST', 'http://127.0.0.1') . "/admin/cancel_trace.do",
        'type' => 'POST',
        'data' => [
            'admin_name' => 1,
            'trace_id' => 1,    //0：非必填;  1:必填;  其他字符：固定值; 数组：调用方法 [方法名 ，自定义参数值：生成密钥用];
            'sign' => ['getNewlottApiSigin', ['admin_name', 'trace_id']],
        ],
        'datafun' => 'getNewlottApiPostData'
    ],
    'make_issue_cache' => [
        'url' => env('NEWLOTT_API_HOST', 'http://127.0.0.1') . "/admin/make_issue_cache.do",
        'type' => 'POST',
        'data' => [
            'admin_name' => 1,
            'lottery_id' => 0,    //0：非必填;  1:必填;  其他字符：固定值; 数组：调用方法 [方法名 ，自定义参数值：生成密钥用];
            'sign' => ['getNewlottApiSigin', ['admin_name', 'lottery_id']],
        ],
        'datafun' => 'getNewlottApiPostData'
    ],
];
