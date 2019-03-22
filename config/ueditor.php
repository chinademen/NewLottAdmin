<?php

return [

    /**
     *文件上传配置项
     */
    'upload' => [
        /* 上传图片配置项 */
        "imageActionName" => 'upload_image',        #执行上传图片的action名称
        "imageFieldName" => "file",                 #提交的图片表单名称
        "imageMaxSize" => 2048000,                  #上传大小限制，单位B
        "imageAllowFiles" => [                      #上传图片格式显示
            ".png",
            ".jpg",
            ".jpeg",
            ".gif",
            ".bmp"],
        "imageCompressEnable" => true,              #是否压缩图片,默认是true
        "imageCompressBorder" => 1600,              #图片压缩最长边限制
        "imageInsertAlign" => "none",               #插入的图片浮动方式
        "imageUrlPrefix" => ENV('STATIC_RES_URL'),  #图片访问路径前缀(域名)

        /* 涂鸦图片上传配置项 */
        "scrawlActionName" => "upload_scrawl",      #执行上传涂鸦的action名称
        "scrawlFieldName" => "file",                #提交的图片表单名称
        "scrawlPathFormat" => '/uploads',           #上传保存路径,可以自定义保存路径和文件名格式
        "scrawlMaxSize" => 2048000,                 #上传大小限制，单位B
        "scrawlUrlPrefix" =>  ENV('STATIC_RES_URL'),                    #图片访问路径前缀
        "scrawlInsertAlign" => "none",

        /* 截图工具上传 */
        "snapscreenActionName" => "upload_image",   #执行上传截图的action名称
        "snapscreenPathFormat" => '/uploads',      #上传保存路径,可以自定义保存路径和文件名格式
        "snapscreenUrlPrefix" =>  ENV('STATIC_RES_URL'),                #图片访问路径前缀
        "snapscreenInsertAlign" => "none",          #插入的图片浮动方式

        /* 抓取远程图片配置 */
        "catcherLocalDomain" => ["127.0.0.1", "localhost", "img.baidu.com"],
        "catcherActionName" => "catch_image",       #执行抓取远程图片的action名称
        "catcherFieldName" => "source",             #提交的图片列表表单名称
        "catcherPathFormat" => '/uploads',          #上传保存路径,可以自定义保存路径和文件名格式
        "catcherUrlPrefix" =>  ENV('STATIC_RES_URL'),                   #图片访问路径前缀
        "catcherMaxSize" => 2048000,                #上传大小限制，单位B
        "catcherAllowFiles" => [".png", ".jpg", ".jpeg", ".gif", ".bmp"], #抓取图片格式显示

        /* 上传视频配置 */
        "videoActionName" => "upload_video",    #执行上传视频的action名称
        "videoFieldName" => "file",             #提交的视频表单名称
        "videoPathFormat" => '/uploads',        #上传保存路径,可以自定义保存路径和文件名格式
        "videoUrlPrefix" =>  ENV('STATIC_RES_URL'),                 #视频访问路径前缀
        "videoMaxSize" => 102400000,            #上传大小限制，单位B，默认100MB
        "videoAllowFiles" => [                  #上传视频格式显示
            ".flv", ".swf", ".mkv", ".avi", ".rm", ".rmvb", ".mpeg", ".mpg",
            ".ogg", ".ogv", ".mov", ".wmv", ".mp4", ".webm", ".mp3", ".wav", ".mid"],


        /* 上传文件配置 */
        "fileActionName" => "upload_file",
        "fileFieldName" => "file",          #提交的文件表单名称
        "filePathFormat" => '/uploads',     #上传保存路径,可以自定义保存路径和文件名格式
        "fileUrlPrefix" =>  ENV('STATIC_RES_URL'),              #文件访问路径前缀
        "fileMaxSize" => 51200000,          #上传大小限制，单位B，默认50MB
        "fileAllowFiles" => [               #上传文件格式显示
            ".png", ".jpg", ".jpeg", ".gif", ".bmp",
            ".flv", ".swf", ".mkv", ".avi", ".rm", ".rmvb", ".mpeg", ".mpg",
            ".ogg", ".ogv", ".mov", ".wmv", ".mp4", ".webm", ".mp3", ".wav", ".mid",
            ".rar", ".zip", ".tar", ".gz", ".7z", ".bz2", ".cab", ".iso",
            ".doc", ".docx", ".xls", ".xlsx", ".ppt", ".pptx", ".pdf", ".txt", ".md", ".xml"
        ],

        /* 列出指定目录下的图片 */
        "imageManagerActionName" => "list_image",   #执行图片管理的action名称
        "imageManagerListPath" => "",               #指定要列出图片的目录
        "imageManagerListSize" => 20,               #每次列出文件数量
        "imageManagerUrlPrefix" => ENV('STATIC_RES_URL'),              #图片访问路径前缀
        "imageManagerInsertAlign" => "none",        #插入的图片浮动方式
        "imageManagerAllowFiles" => [               #列出的文件类型
            ".png",
            ".jpg",
            ".jpeg",
            ".gif",
            ".bmp"
        ],

        /* 列出指定目录下的文件 */
        "fileManagerActionName" => "list_file",     #执行文件管理的action名称
        "fileManagerListPath" => "/file/",         #指定要列出文件的目录
        "fileManagerUrlPrefix" =>  ENV('STATIC_RES_URL'),               #文件访问路径前缀
        "fileManagerListSize" => 20,                #每次列出文件数量
        /* 列出的文件类型 */
        "fileManagerAllowFiles" => [
            ".png", ".jpg", ".jpeg", ".gif", ".bmp",
            ".flv", ".swf", ".mkv", ".avi", ".rm", ".rmvb", ".mpeg", ".mpg",
            ".ogg", ".ogv", ".mov", ".wmv", ".mp4", ".webm", ".mp3", ".wav", ".mid",
            ".rar", ".zip", ".tar", ".gz", ".7z", ".bz2", ".cab", ".iso",
            ".doc", ".docx", ".xls", ".xlsx", ".ppt", ".pptx", ".pdf", ".txt", ".md", ".xml"
        ]
    ],


];
