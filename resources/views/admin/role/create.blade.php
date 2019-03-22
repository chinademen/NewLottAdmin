@extends('l.base', array('active' => $resource))

@section('title')
@parent
{{ ___('Create') . $resourceName }}
@stop


@section('container')
<div class="col-md-12">

    <div class="h2">{{ ___('Create') . $resourceName }}
        <div class=" pull-right" role="toolbar" >
            <a href="{{ route($resource.'.index') }}" class="btn btn-sm btn-default">
                {{ ___('Return') . $resourceName . ___('List') }}
            </a>
        </div>
    </div>

    @include('w.breadcrumb')
    @include('w.notification')

    <form class="form-horizontal" method="post" action="{{ route($resource.'.create') }}" autocomplete="off">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        @include('admin.role.detailForm')

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
              <a class="btn btn-default" href="{{ route($resource.'.create') }}">{{ ___('Reset') }}</a>
              <button type="submit" class="btn btn-success">{{ ___('Submit') }}</button>
            </div>
        </div>

    </form>
</div>
@stop

