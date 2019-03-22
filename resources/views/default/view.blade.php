@extends('l.base', ['active' => $resource])
@section('title')
@parent
{{ $sPageTitle }}
@stop

@section('container')
<div class="col-md-12">
    @include('w.breadcrumb')
    @include('w._function_title', ['id' => $data->id , 'parent_id' => $data->parent_id])

    @include('w.notification')

    <div class="panel panel-default">
        <div class=" panel-body">
            <table class="table table-bordered table-striped">
                <tbody>
                    <?php
                    $aColumns = array_keys($aColumnSettings);
                    ViewHelper::displayForView($data, $aColumns, $aViewSettings, $aArrayVars, 2);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

 <!-- Modal for destory Start -->
 <!--未来修改配置, 从输出取得-->
<div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">确认删除</h4>
            </div>
            <form method="GET" action="http://laravel.oa.com/posts" accept-charset="UTF-8" id="deleteConfirm-form" class="form-horizontal" target="_self">
                {{--【必要】删除部门的提示问题--}}
                <div class="modal-body">
                    <div class="form-group"><label for="comment" class="col-sm-2 control-label"></label><label for="comment" class="col-sm-2 control-label"></label><div class="">确认删除吗？</div></div>
                </div>
                {{--<div class="modal-body">--}}
                    {{--<div class="form-group"><label for="comment" class="col-sm-2 control-label"></label><div id="deleteConfirm-data-id">a</div><label for="comment" class="col-sm-2 control-label"></label><div class="">确认删除吗？</div></div>--}}
                {{--</div>--}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">取消</button><button type="submit" class="btn btn-sm btn-danger">确认</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal for destory End -->

@stop


@section('end')
    @parent
    <script>

        function modal(href) {

            $('#deleteConfirm-form').attr('action', href);
            $('#deleteConfirm-data-id').html("");
            $('#deleteConfirm').modal();
        }

    </script>
@stop
