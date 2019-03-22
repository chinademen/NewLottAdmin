/**
 * 文件上传
 *
 * @param upload_btn
 */
function upload_file(upload_btn,upload_url) {
    var settings = {
        browse_button: upload_btn,
        url: ServerHttpHost + '/file-processes/upload/'+upload_url,
        flash_swf_url: ServerHttpHost + '/js/plupload-2.3.6/Moxie.swf',
        silverlight_xap_url: ServerHttpHost + '/js/plupload-2.3.6/Moxie.xap',
        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
        filters: {
            max_file_size: '0.5mb',
            mime_types: [
                {title: "Image files", extensions: "jpg,gif,png"},
                {title: "Zip files", extensions: "zip"}
            ]
        },
    }
    var uploader = new plupload.Uploader(settings);

    //绑定文件添加进队列事件
    uploader.bind('FilesAdded', function (uploader, files) {
        uploader.start(); //开始上传
    });

    //绑定文件添加进队列事件
    uploader.bind('UploadProgress', function (uploader, files) {
        $("#" + uploader.settings.browse_button[0]['id']).siblings('.tips').html('上传中...');
    });

    //绑定文件上传完成事件
    uploader.bind('FileUploaded', function (uploader, files, serverData) {
        //解析返回数据为JSON
        var returnData = JSON.parse(serverData.response);
        //更新同辈input
        if (returnData.state == "SUCCESS") {
            $("#" + uploader.settings.browse_button[0]['id']).siblings('input[type="text"]').val(returnData.url);
            $("#" + uploader.settings.browse_button[0]['id']).siblings('.tips').addClass('text-success').html(returnData.state);
        }else{
            $("#" + uploader.settings.browse_button[0]['id']).siblings('.tips').addClass('text-danger').html('Upload Failed:'+returnData.state);
        }

    });
    //初始化
    uploader.init();
}