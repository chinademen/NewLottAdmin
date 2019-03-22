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

    {!! Form::open(array( 'id' => 'create-2', 'class' => 'form-horizontal')) !!}

    {{--<input id="step" type="hidden" name="step" value="2">
    <input id="series_id" type="hidden" name="series_id" value="{{ $iSeriesId }}">
    <input id="is_instant" type="hidden" name="is_instant" value="{{ $bInstant }}">
    <input id="frequency" type="hidden" name="frequency" value="{{ $iFrequency }}">
    <input id="is_self" type="hidden" name="is_self" value="{{ $bSelf }}">
    <input id="name" type="hidden" name="name" value="{{ $sName }}>
    <input id="identifier" type="hidden" name="identifier" value="{{ $sIdentifier }}">
    <input id="issue_format" type="hidden" name="issue_format" value="{{ $sIssueFormat }}">
    <input id="issue_rule" type="hidden" name="issue_rule" value="{{ $sIssueRule }}">--}}

    <input id="step" type="hidden" name="step" value="2">
    {!! Form::hidden('series_id',$iSeriesId) !!}
    {!! Form::hidden('is_instant',$bInstant) !!}
    {!! Form::hidden('frequency',$iFrequency) !!}
    {!! Form::hidden('is_self',$bSelf) !!}
    {!! Form::hidden('name',$sName) !!}
    {!! Form::hidden('identifier',$sIdentifier) !!}
    {!! Form::hidden('issue_format',$sIssueFormat) !!}
    {!! Form::hidden('issue_rule',$sIssueRule) !!}


<div class="panel panel-default">
    <table class="table table-bordered table-striped">
        <tbody>
         <tr>
            <th  class="text-right col-xs-2">Series:</th>
            <td> {{ $sSeries }}</td>
        </tr>
 <tr>
            <th  class="text-right col-xs-2">Name:</th>
            <td>{{ $sName }}</td>
        </tr>
 <tr>
            <th  class="text-right col-xs-2">Identifier:</th>
            <td> {{ $sIdentifier }}</td>
        </tr>

 <tr>
            <th  class="text-right col-xs-2">Instant:</th>
            <td>{{ $bInstant }}</td>
        </tr>
 <tr>
            <th  class="text-right col-xs-2">Self:</th>
            <td>{{ $bSelf }}</td>
        </tr>
 <tr>
            <th  class="text-right col-xs-2">Frequency:</th>
            <td>{{ $iFrequency }}</td>
        </tr>
 <tr>
            <th  class="text-right col-xs-2">Issue Format:</th>
            <td> {{ $sIssueFormat }}</td>
        </tr>
        <tr>
            <th  class="text-right col-xs-2">Issue Rule:</th>
            <td>
                <?php
                $aIssueRules = json_decode($sIssueRule, 1);
                echo "<pre>";
                print(var_export($aIssueRules, 1));
                echo "</pre>";

                ?>
            </td>
        </tr>

        <tr>
            <th  class="text-right col-xs-2">&nbsp;</th>
            <td>
      <a class="btn btn-default" href="javascript:window.history.back()">{{__('Back')}}</a>
      {!! Form::submit(__('Submit'), ['class' => 'btn btn-success']) !!}
    </td>
        </tr>
            </tbody>
    </table>


    {!! Form::close() !!}
    </div>
</div>

@stop
