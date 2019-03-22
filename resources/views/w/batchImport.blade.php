@extends('l.admin', array('active' => $resource))

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
        <div class=" panel-body">
        {!! Form::open(['route' => (Route::currentRouteName()), 'method' => 'post', 'files' => true, 'class' => 'form-horizontal']) !!}
            <div class="pic-box">
                <div class="form-group ">
                    <label class="col-sm-2 control-label">{{ ___('_basic.excel_file') }}</label>
                    <div class="col-sm-6">
                        <input name="import_file" type="file" class="form-control" style="padding:5px;">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="sequence" class="col-sm-2 control-label">批量导入{{___('_model.'.$resourceName)}}模板</label>
                <div class="col-sm-6">
                    <a href="/import_themes/{{$resource}}.xlsx">批量导入{{___('_model.'.$resourceName)}}模板.xlsx</a>
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-9">
                    <a class="btn btn-default" href="{{ route(Route::currentRouteName())}}">{{ ___('Reset') }}</a>
                    <button type="submit" class="btn btn-success">{{ ___('Submit') }}</button>
                </div>
            </div>
        {!! Form::close() !!}
        </div>
    </div>
</div>
@stop

