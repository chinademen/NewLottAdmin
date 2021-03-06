@extends('l.base', array('active' => $resource))

@section('title')
@parent
{{ ___('Admin User Binding') }}
@stop



@section('container')

<div class="col-md-12">

    <div class="h2">{{ ___('Admin User Binding') }}
        <div class=" pull-right" role="toolbar" >
            <a href="{{ route($resource.'.index') }}" class="btn btn-sm btn-default">
                {{ ___('Return') . $resourceName . ___('List') }}
            </a>
        </div>
    </div>

    @include('w.breadcrumb')
    @include('w.notification')

    {!! Form::open(array('method' => 'GET', 'class' => 'form-inline')) !!}
        <input type="hidden" name="is_search_form" value="1">
        {!! Form::label('role_id', 'Role Type') !!}
        <div class="form-group">
            <select name="role_id" id="role_id" class="form-control">
                <option value="" >All</option>
                @foreach ($aRoles as $key => $sRoleName)
                <option value="{{ $key }}" {{ (isset($role_id) ? $role_id : Input::get('role_id')) == $key ? 'selected' : '' }}>{{ $sRoleName }}</option>
                @endforeach
            </select>
        </div>
        {!! Form::label('is_agent', 'User Type') !!}
        <div class="form-group">
            <select name="is_agent" id="is_agent" class="form-control">
                <option value="" >All</option>
                <option value="0" {{ Input::get('is_agent') == '0' }}>Player</option>
                <option value="1" {{ Input::get('is_agent') == 1 }}>Agent</option>
            </select>
        </div>
        {!! Form::label('username', ('User Name')) !!}
        <div class="form-group">

            {!! Form::text('username', Input::get('username'), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <button type="submit" class="btn  btn-primary"><i class="glyphicon glyphicon-search"></i>{{ ___('Search') }}</button>
        </div>
         @foreach ($buttons['pageButtons'] as $element)
        <div class="form-group">
           <a  href="{{ $element->route_name ? route($element->route_name) : 'javascript:void(0);' }}" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i> {{ ___($element->label) }}</a>
        </div>
        @endforeach
    {!! Form::close() !!}
    <hr>
    @if (isset($datas))
    <div class="col-xs-12">
        <form name="userBindingForm" method="post" action="{{ route($resource . '.bind-user', isset($role_id) && $role_id ? $role_id : null) }}" autocomplete="off">

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="removedFromCheckedUsers" value="" />
            <input type="hidden" name="newUsers" value="" />
            <div class="col-xs-12">
                @foreach ($datas as $data)
                <div class="col-md-3">
                    <label class="checkbox"  for="{{ 'User_' . ($data->id) }}">

                    <input type="checkbox" data-toggle="checkbox" name="user_id[]" id="{{  'User_' . ($data->id) }}" value="{{ $data->id }}" />
                    {{ $data->username }}
                    </label>

                </div>
                @endforeach
            </div>
            {!! $datas->appends(Input::except('page'))->render() !!}
            <hr>
            <div class="clearfix">
                <a href="" class="btn btn-default">{{ ___('Reset') }}</a>
                <button type="submit" class="btn btn-success">{{ ___('Submit') }}</button>
            </div>
            <div class="clearfix visible-xs"></div>
        </form>
    </div>
    @endif
</div>
@stop
