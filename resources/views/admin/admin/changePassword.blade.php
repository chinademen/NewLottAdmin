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
        <div class=" panel-body">
            <form class="form-horizontal" method="post" action="{{ route($resource.'.change-password', $data->id) }}" autocomplete="off">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="_method" value="PUT" />
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ ___('_adminuser.username') }}</label>
                    <label class="col-sm-5"><span class="form-control">{{ $data->username }}</span></label>
                </div>
                <div class="form-group">
                    <label for="old_password"  class="col-sm-3 control-label">*{{ ___('_adminuser.old-password') }}</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="password" name="old_password" id="old_password" value="" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="password"  class="col-sm-3 control-label">*{{ ___('_adminuser.new-password') }}</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="password" name="password" id="password" value="" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation"  class="col-sm-3 control-label">*{{ ___('_adminuser.new-password-confirm') }}</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" value="" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="reset" class="btn btn-default" >{{ ___('Reset') }}</button>
                        <button type="submit" class="btn btn-success">{{ ___('Submit') }}</button>
                    </div>
                </div>
            </form>
        </div></div></div>
@stop

