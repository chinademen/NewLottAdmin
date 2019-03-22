@extends('l.base', array('active' => $resource))

@section('title')
    @parent
    {{ $sPageTitle }}
@stop

@section('container')
    <div class="col-md-12">
        @include('w.breadcrumb')
        @include('w._function_title')
        @include('w.notification')

        <div class="panel panel-default">
            <div class="panel-body">
                @include('default.detailForm')
            </div>
        </div>
    </div>
    <?php
    //        pr($aLangKeysForButtons);
    if (isset($aLangKeysForButtons['modal'])){
    $modalData['modal'] = array(
            'id'      => 'myModal',
            'title'   => '系统提示',
            'message' => ___($aLangKeysForButtons['modal'],$aLangVars),
            'footer'  =>
                    Form::open(['id' => 'real-delete', 'method' => 'delete']).'
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-sm btn-danger">确认删除</button>'.
                    Form::close(),
    );
    ?>
    @include('popup.modal', $modalData)
    <?php
    }
    ?>

@stop

@section('end')

    @parent

    <script>
        function modal(href)
        {
            $('#real-delete').attr('action', href);
            $('#myModal').modal();
        }
    </script>
@stop
