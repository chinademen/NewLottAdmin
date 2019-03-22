@extends('l.base', array('active' => $resource))

@section('title')
@parent
{{ $sPageTitle }}
@stop

<style>
    .j-switch .j-switch-container{
        height: 28px;}
</style>
@section('container')
    <div class="col-md-12">
        @include('w.breadcrumb')
        @include('w._function_title')
        @include('w.notification')

        <div class="panel panel-default">
            <div class="panel-body">
                @include('custom.bulletin.detailForm')
            </div>
        </div>
    </div>
@stop

@section('javascripts')
    @parent
    {{ script('ueditor.config') }}
    {{ script('ueditor.min') }}
    {{ script('zh-cn') }}
@stop
@section('end')
    <script type="text/javascript">
        function showReceiverList (source) {
            if (! source.files) {
                alert("请使用chrome或firefox最新版本的浏览器");
                return false;
            }
            var file = source.files[0];
            // alert(file.type);
            if (!/text\/\w+/.test(file.type)){
                alert("请确保文件为txt类型");
                return false;
            }
            if (file.size / 1024 > 200) {
                alert("文件大小不能超过200k");
                return false;
            }
            if (window.FileReader) {
                var fr = new FileReader();
                fr.onloadend = function (e) {
                    if (!e.target.result) {
                        alert('读取名单失败，请尝试手动填写！');
                    } else {
                        $('#receiver').val(e.target.result);
                    }
                }
                fr.readAsText(file);
            } else {

            }
        }
        UE.getEditor('content');
    </script>
    @parent

@stop

