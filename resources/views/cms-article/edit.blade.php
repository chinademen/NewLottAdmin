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
                <form class="form-horizontal" method="post" action="{{ route($resource.'.edit', $aData->id) }}"
                      autocomplete="off" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <input type="hidden" name="_method" value="POST"/>
                    @include('cms-article.detailForm')
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-8">
                            <button type="reset" class="btn btn-default">{{ __('Reset') }}</button>
                            <button type="button" class="btn btn-success">{{ __('Submit') }}</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <pre id="console"></pre>
@stop
@section('end')
    @parent
    {!! UEditor::css() !!}
    {!! UEditor::js() !!}
    <script type="text/javascript">
        /**
         *初始化编辑器
         */
        var serverUrl = '{{route('file-processes.dispatch-server')}}'; //你的自定义上传路由
        var ue = UE.getEditor('ueditor', {'serverUrl': serverUrl}); //如果不使用默认路由，就需要在初始化就设定这个值
        ue.ready(function () {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
        });

        $(".btn-success").click(function () {

            $(".form-horizontal").submit()
        })
    </script>

@stop
