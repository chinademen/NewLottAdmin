@extends('l.base', ['active' => $resource])
@section('title')
@parent
{{ $sPageTitle }}
@stop
@section('container')
<div class="col-md-12">
<ol class="breadcrumb">
  <li><a href="{{ route('admin.dashboard') }}">首页</a></li>
  <li><a href="{{ route($resource.'.index') }}">{{ $resource }}</a></li>
  <li class="active">{{ $resource }}</li>
</ol>
  <div class="h2">建立新模型向导</div>

  @include('w.notification')


  <?php
    $oFormHelper->setErrorObject($errors);
//    $oFormHelper->setModel(new ManIssue);
?>
<div class="col-md-12 clearfix" style=" margin-bottom:20px;">
    <div class="h4">第一步：输入表名和模型名</div>
  <div class="col-md-6">
    {!! Form::open(array( 'class' => 'form-horizontal')) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="step" value="1" />
    <div class="form-group">
      <label for="table_name" class="col-sm-2 control-label">{{ ___('wizard.table') }}</label>
        <div class="col-sm-10">
            {!! $oFormHelper->input('table_name',null,['id' => 'table_name', 'type' => 'text', 'label' => false, 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
      <label for="model_name" class="col-sm-2 control-label">{{ ___('wizard.model_name') }}</label>
        <div class="col-sm-10">
            {!! $oFormHelper->input('model_name',null,['id' => 'model_name', 'type' => 'text', 'label' => false, 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
      <label for="model_note" class="col-sm-2 control-label">{{ ___('wizard.model_note') }}</label>
        <div class="col-sm-10">
            {!! $oFormHelper->input('model_note',null,['id' => 'model_note', 'type' => 'text', 'label' => false, 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
      <label for="model_note" class="col-sm-2 control-label">{{ ___('wizard.cache_level') }}</label>
        <div class="col-sm-10">
            {{--20180608 删除 memcache缓存选项--}}
            <?php $aCacheLevels = array_flip($aCacheLevels);
            unset($aCacheLevels['First']);
            $aCacheLevels = array_flip($aCacheLevels); ?>
            {!! $oFormHelper->input('cache_level',null,['id' => 'cache_level', 'type' => 'select', 'options' => $aCacheLevels, 'label' => false, 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-6">
            {!! Form::submit(___('Submit'), ['class' => 'btn btn-success']) !!}
        </div>
    </div>
  {!! Form::close() !!}
  </div>

  <div class="col-md-6" style="background:#f2f2f2;">
    <?php
      if (isset($aIssueRules)):
      foreach($aIssueRules as $aInfo):
    ?>
        <table class="table table-bordered" style="background: #fff;margin-top: 15px;">
            <tr>
                <td><?php echo ___('Begin Time') ?></td>
                <td><?php echo $aInfo->begin_time; ?></td>
                <td><?php echo ___('End Time') ?></td>
                <td><?php echo $aInfo->end_time; ?></td>
            </tr>
            <tr>
                <td><?php echo ___('Cycle') ?></td>
                <td><?php echo $aInfo->cycle ?></td>
                <td><?php echo ___('First Issue End Time') ?></td>
                <td><?php echo $aInfo->first_time; ?></td>
            </tr>
            <tr>
                <td><?php echo ___('Stop Adjst Time') ?></td>
                <td><?php echo $aInfo->stop_adjust_time; ?></td>
                <td><?php echo ___('Encode Time') ?></td>
                <td><?php echo $aInfo->encode_time; ?></td>
            </tr>
        </table>

    <?php
      endforeach;
    endif;
    ?>
  </div>


</div>

</div>

@stop


