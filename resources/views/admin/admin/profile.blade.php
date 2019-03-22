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
            <form class="form-horizontal" method="post" action="{{ route($resource.'.profile') }}" autocomplete="off">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="_method" value="PUT" />
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ ___('_adminuser.username') }}</label>
                    <label class="col-sm-5"><span class="form-control">{{ Session::get('admin_username') }}</span></label>
                </div>
                <div class="form-group">
                    <label for="name"  class="col-sm-3 control-label">*{{ ___('_adminuser.name') }}</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="text" name="name" id="name" value="{{ $data->name }}" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="email"  class="col-sm-3 control-label">*{{ ___('_adminuser.email') }}</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="text" name="email" id="email" value="{{ $data->email }}" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="language"  class="col-sm-3 control-label">*{{ ___('_adminuser.language') }}</label>
                    <div class="col-sm-5">
                        <select id='language' name='language' class="form-control">
                            @foreach($aLanguages as $value => $text)
                            <option value='{{ $value }}'>{{ $text }}</option>
                            @endforeach
                        </select>
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

