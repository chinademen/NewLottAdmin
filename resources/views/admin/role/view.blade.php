@extends('l.base', array('active' => $resource))

@section('title')
@parent
{{ ___('View') . $resourceName }}
@stop


@section('container')
    @include('w.breadcrumb')
    @include('w.notification')

     <div class="row">
        <div class="col-xs-4">
            <div class="h1" style="line-height: 32px;">{{ ___('View') . $resourceName }} </div>
        </div>
        <div class="col-xs-8">
            <div class="pull-right">
                <a href="{{ route($resource.'.index') }}" class="btn btn-sm btn-default">
                    &laquo; {{ ___('Return') . $resourceName . ___('List') }}
                </a>
            </div>
        </div>
    </div>
    <hr>


   <div class="form-horizontal">
        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">*{{ ___('Role Name') }}</label>
            <div class="col-sm-5">
                <input class="form-control" type="text" value="{{ isset($data) ? $data->name : '' }}" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="rights" class="col-sm-3 control-label">*{{ ___('Rights') }}</label>
            <div class="col-sm-5">
                <input class="form-control" type="text" value="{{ isset($data) ? $data->rights : '' }}" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="description" class="col-sm-3 control-label">*{{ ___('Description') }}</label>
            <div class="col-sm-5">
                <input class="form-control" type="text" value="{{ isset($data) ? $data->description : '' }}" disabled>
            </div>
        </div>


        <div class="form-group">
            <label for="priority" class="col-sm-3 control-label">*{{ ___('Priority') }}</label>
            <div class="col-sm-5">
                <input class="form-control" type="text" value="{{ isset($data) ? $data->priority : '' }}" disabled>
        </div>
        </div>

        <div class="form-group">
            <label for="is_system" class="col-sm-3 control-label">* {{ ___('Is System') }}</label>
            <div class="col-sm-5">
               <input class="form-control" type="text" value="{{ ((isset($data) ? $data->is_system : 0 )) ? ___('Yes'): ___('No') }}" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="right_settable" class="col-sm-3 control-label">*{{ ___('Right Settable') }}</label>
            <div class="col-sm-5">
                <input class="form-control" type="text" value="{{ ((isset($data) ? $data->right_settable : 0 )) ? ___('Yes'): ___('No') }}" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="user_settable" class="col-sm-3 control-label">*{{ ___('User Settable') }}</label>
            <div class="col-sm-5">
                <input class="form-control" type="text" value="{{ ((isset($data) ? $data->user_settable : 0 )) ? ___('Yes'): ___('No') }}" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="disabled" class="col-sm-3 control-label">*{{ ___('Disabled') }}</label>
            <div class="col-sm-5">
                <input class="form-control" type="text" value="{{ ((isset($data) ? $data->disabled : 0 )) ? ___('Yes'): ___('No') }}" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="sequence" class="col-sm-3 control-label">{{ ___('Sequence') }}</label>
            <div class="col-sm-5">
                <input class="form-control" type="text" value="{{ isset($data) ? $data->sequence : 0 }}" disabled>
            </div>
        </div>

    </div>

@stop

