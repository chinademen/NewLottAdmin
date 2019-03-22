@extends('l.admin', array('active' => $resource))

@section('title')
    @parent
    {{--    {{ $sPageTitle }}--}}
@stop

@section('container')
    <div class="col-md-12">
        @include('w.breadcrumb')
        @include('w._function_title')
        @include('w.notification')

        <div class="panel panel-default">
            <div class=" panel-body">
                <form class="form-horizontal" method="post" enctype="multipart/form-data" action=""  autocomplete="off">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="_method" value="PUT" />
                    @include('dictionaries.editForm')
                    {{--detailForm.blade.php--}}

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <a class="btn btn-default" href="">{{ ___('Reset') }}</a>
                            <button type="submit" class="btn btn-success">{{ ___('Submit') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        $modalData['modal'] = array(
                'id'      => 'myModal',
                'title'   => '系统提示',
                'message' => '确认删除此'.$resourceName.'？',
                'footer'  =>
                        Form::open(['id' => 'real-delete', 'method' => 'delete']).
                        '<button class="btn btn-sm btn-default" type="submit">确认上传</button>'.
                        '<button type="submit" class="btn btn-sm btn-danger">取消</button>'.
                        Form::close(),
        );
        ?>

    </div>

@stop

@section('javascripts')
    @parent
    {{ script('ueditor.config') }}
    {{ script('ueditor.min') }}
    {{ script('zh-cn') }}
@stop

@section('end')
    @parent

    <script type="text/javascript" language="JavaScript">
        var lastIndex,lastValue;
        // 取得终端相关的信息
        function changePostId(val) {
            if(document.getElementById("open").checked) {
                document.getElementById("tmp").style.visibility = "hidden";
                document.getElementById("tmp1").style.visibility = "hidden";
            } else {
                document.getElementById("tmp").style.visibility = "visible";
                document.getElementById("tmp1").style.visibility = "visible";
            }
        }
    </script>

    <script>
        function modal(href)
        {
            $('#real-delete').attr('action', href);
            $('#myModal').modal();
        };
        UE.getEditor('editor');
    </script>
@stop
