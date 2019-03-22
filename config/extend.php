<?php

/*
|--------------------------------------------------------------------------
| 拓展配置文件
|--------------------------------------------------------------------------
|
*/
$version = '?' . time();

return [

    /**
     * 网站静态资源文件别名配置
     */
    'webAssets' => [

        // 样式文件别名配置
        'cssAliases' => [
            'ui'                    => 'css/ui.css'. $version,
            'ui-new'                => 'css/ui-new.css' . $version,
            'ui-v2'                 => 'css/style.css'. $version,
            'ios-switch'            => 'js/ios-switch/switchery.css'. $version,
            'i-check'               => 'js/iCheck/skins/minimal/green.css'. $version,
            'layer'                 => 'js/layer/mobile/need/layer.css'. $version,
            'data-tables'            => 'js/advanced-datatable/css/jquery.dataTables.css'. $version,
        ],

        // 脚本文件别名配置
        'jsAliases'  => [
            // 框架
            'jquery'                => 'js/jquery.1.11.2.js'. $version,
            'bootstrap'             => 'js/bootstrap.min.js'. $version,
            'jquery-ui'             => 'js/jquery-ui-1.10.3.custom.min.js'. $version,
            // 工具
            'md5'                   => 'js/md5.js'. $version,
            'ZeroClipboard'         => 'js/ZeroClipboard.js'. $version,
            'numtochinese'          => 'js/numtochinese.js'. $version,
            'datepicker'            => 'js/datepicker.min.js'. $version,
            'switch'                => 'js/switch.js'. $version,
            'ios-switch'            => 'js/ios-switch/switchery.js'. $version,
            'ios-switch-init'       => 'js/ios-switch/ios-init.js'. $version,

            'i-check'               => 'js/iCheck/jquery.icheck.js'. $version,
            'i-check-init'          => 'js/icheck-init.js'. $version,
            'upload-files'          => 'js/plupload-2.3.6/plupload.full.min.js'. $version,

            //文本编辑器
            'ueditor.config'        => 'ueditor/ueditor.config.js'. $version,
            'ueditor.min'           => 'ueditor/ueditor.all.js'. $version,
            'zh-cn'                 => 'ueditor/lang/zh-CN/zh-CN.js'. $version,

            // 业务
            'menu'                  => 'js/menu.js'. $version,
            'file-upload'           => 'js/file-upload.js'. $version,
            'layer-js'              => 'js/layer/mobile/layer.js'. $version,
            'data-tables'           => 'js/data-tables/jquery.dataTables.js'. $version,
            'data-tables-bootstrap' => 'js/data-tables/dataTables.bootstrap.min.js'. $version,

        ],
    ],
];