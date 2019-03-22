<?php
/**
 * Created by PhpStorm.
 * User: allen
 * Date: 9/29/17
 * Time: 11:52 AM
 */

return [

    //默认最大允许上传
    'maxSize' => [
        'pic' => 1024 * 350,  //200kb大小的图片
    ],

    //允许的文件类型
    'allowType' => [
        0 => 'image/png',
        1 => 'image/gif',
        2 => 'image/jpg',
        3 => 'image/jpeg',
        //4 => 'application/octet-stream'
    ],

];