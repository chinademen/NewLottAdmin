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
      {!!  Form::open(['id' => 'create-1', 'class' => 'form-horizontal']) !!}

        {!! Form::hidden('step',1) !!}
        <div class="form-group">
            {!! $oFormHelper->makeLabel('series_id', __('_series.series'), false, 'col-sm-2 control-label') !!}
            <div class="col-sm-6">
                {!! Form::select('series_id', $aSeries,$iSeriesId,['class' => 'form-control']) !!}
             </div>
            <div class="col-sm-4"></div>
        </div>

    <div class="form-group">
        {!! $oFormHelper->makeLabel('name', __('_series.name'), false, 'col-sm-2 control-label') !!}
        <div class="col-sm-6">
        {!! Form::input('text','name',null,['class' => 'form-control']) !!}
         </div>
        <div class="col-sm-4">
       </div>
    </div>
    <div class="form-group">
        {!! $oFormHelper->makeLabel('identifier', __('_series.identifier'), false, 'col-sm-2 control-label') !!}
        <div class="col-sm-6">
        {!! Form::input('text','identifier',null,['class' => 'form-control']) !!}
         </div>
        <div class="col-sm-4">
       </div>
    </div>

    <div class="form-group">
        {!! $oFormHelper->makeLabel('is_instant', __('_lottery.is_instant'), false, 'col-sm-2 control-label') !!}
        <div class="col-sm-6">
        {!! Form::select('is_instant', [0 => 'No', 1 => 'Yes'],null,['class' => 'form-control']) !!}
         </div>
        <div class="col-sm-4">
       </div>
    </div>
    <div class="form-group">
        {!! $oFormHelper->makeLabel('is_self', __('_lottery.is_self'), false, 'col-sm-2 control-label') !!}
        <div class="col-sm-6">
        {!! Form::select('is_self', [0 => 'No', 1 => 'Yes'],null,['class' => 'form-control']) !!}
         </div>
        <div class="col-sm-4">
       </div>
    </div>
    <div class="form-group">
        {!! $oFormHelper->makeLabel('frequency', __('_lottery.high_frequency'), false, 'col-sm-2 control-label') !!}
        <div class="col-sm-6">
        {!! Form::select('frequency', [1=>'High',2=>'Low'],1,['class' => 'form-control']) !!}
         </div>
        <div class="col-sm-4">
       </div>
    </div>
        <div class="form-group">
            {!! $oFormHelper->makeLabel('issue_format', __('_lottery.issue_format'), false, 'col-sm-2 control-label') !!}
            <div class="col-sm-6">
            {!! Form::input('text','issue_format',null,['class' => 'form-control']) !!}
          </div>
          <div class="col-sm-4"></div>
        </div>
        <div class="form-group">
            {!! $oFormHelper->makeLabel('issue_config', __('_model.issuerule'), false, 'col-sm-2 control-label') !!}
            <div class="col-sm-6">
                {!! Form::input('text','issue_rule',null,['class' => 'form-control']) !!}
            </div>
            <div class="col-sm-4"></div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <a class="btn btn-default" href="javascript:window.history.back()">{{__('Back')}}</a>
            {!! Form::submit(__('Submit'), ['class' => 'btn btn-success']) !!}
          </div>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

@stop
