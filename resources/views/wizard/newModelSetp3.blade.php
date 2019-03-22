@extends('l.base', ['active' => $resource])
@section('title')
@parent
{{ $sPageTitle }}
@stop
@section('container')
    {{--加大td input大小! 20180619lawrence --}}
    <style type="text/css">td input{width:20px;height: 20px;}</style>
<div class="col-md-12">
  <div class="h2">{{ $resource }}</div>
<ol class="breadcrumb">
  <li><a href="{{ route('admin.dashboard') }}">首页</a></li>
  <li><a href="{{ route($resource.'.index') }}">{{ $resource }}</a></li>
  <li class="active">{{ $resource }}</li>
</ol>

  @include('w.notification')


  <?php
    $oFormHelper->setErrorObject($errors);
    $aNonRequiredColumns = ['id','created_at','updated_at'];
//    $oFormHelper->setModel(new ManIssue);
?>
<div class="col-md-12 clearfix" style=" margin-bottom:20px;">
    <div class="h4">第三步：配置模型信息</div>
  <div class="col-md-12">
    {!! Form::open(array( 'class' => 'form-horizontal')) !!}
    <input type="hidden" name="step" value="3" />
    <input type="hidden" name="table_name" value="{{ $sTableName }}" />
    <input type="hidden" name="model_name" value="{{ $model_name }}" />
    <input type="hidden" name="model_note" value="{{ $model_note }}" />
    <input type="hidden" name="cache_level" value="{{ $cache_level }}" />
    <input type="hidden" name="controller" value="{{ $sController }}" />
    <div class="form-group">
      <label for="table_name" class="col-sm-1 control-label">{{ ___('wizard.table') }}</label>
      <label class="control-label text-danger">{{ $sTableName }}</label>
    </div>
    <div class="form-group">
      <label for="model_name" class="col-sm-1 control-label">{{ ___('wizard.model_name') }}</label>
      <label class="control-label text-danger">{{ $model_name }}</label>
    </div>
    <div class="form-group">
      <label for="model_note" class="col-sm-1 control-label">{{ ___('wizard.model_note') }}</label>
      <label class="control-label text-danger">{{ $model_note }}</label>
    </div>
    <div class="form-group">
      <label for="cache_level" class="col-sm-1 control-label">{{ ___('wizard.cache_level') }}</label>
      <label class="control-label text-danger">{{ $aCacheLevels[$cache_level] }}</label>
    </div>
    <div class="form-group">
      <label for="controller" class="col-sm-1 control-label">{{ ___('wizard.controller') }}</label>
      <label class="control-label text-danger">{{ $sController }}</label>
    </div>
    <?php
    $aAllColumns = array_keys($aColumns);
    $aColumnNames = array_combine($aAllColumns, $aAllColumns);
    ?>
    <div class="form-group">
      <label for="title_column" class="col-sm-1 control-label">{{ ___('wizard.title-column') }}</label>
      {!! $oFormHelper->input('title_column',null,['id' => 'title_column', 'type' => 'select', 'label' => false,
                  'class' => 'form-control', 'options' => $aColumnNames, 'empty' => true]) !!}
    </div>
    <div class="form-group">
      <label class="col-sm-1 control-label">{{ ___('wizard.columns') }}</label>
        <div class="panel panel-default J-tab-chart col-sm-10">
            <table class="table table-striped table-hover">
                <thead class="thead-mini  thead-inverse">
                    <tr>
                        <th rowspan="2">列</th>
                        <th rowspan="2">数据类型</th>
                        <th rowspan="2">宽度</th>
                        <th colspan="4">检验规则</th>
                        <th colspan="3">显示的视图</th>
                    </tr>
                    <tr>
                        <th>必须</th>
                        <th>最小</th>
                        <th>最大</th>
                        <th>允许值列表</th>
                        <th>在列表视图中显示</th>
                        <th>在编辑视图中显示</th>
                        <th>在查看视图中显示</th>
                    </tr>
                </thead>
                @foreach($aColumns as $sColumn => $aConfig)
                <?php
                $bRequired = !in_array($sColumn, $aNonRequiredColumns);
                $sChecked = $bRequired ? 'checked' : '';
//                if ($sColumn == 'id'){
//                    $iMin = '';
//                }
//                else{
                    $iMin = ($sColumn == 'id' || strpos($aConfig['full_type'], 'unsigned') === false) ? '' : 0;
//                }
                ?>
                <tr>
                    <td class="text-weight">{{ $sColumn }}</td>
                    <td>{{ $aConfig['full_type'] }}</td>
                    <td>{{ $aConfig['width'] }}</td>
                    <td><input type="checkbox" name="requiredColumns[]" value="{{ $sColumn }}" {{ $sChecked }} /></td>
                    <td>{!! Form::text("minValues[$sColumn]",$iMin,['class' => 'form-control input-xs','style' => 'width:50px;text-align:right']) !!}</td>
                    <td>{!! Form::text("maxValues[$sColumn]",$aConfig['width'],['class' => 'form-control input-xs','style' => 'width:50px;text-align:right']) !!}</td>
                    <td>{!! Form::text("listValues[$sColumn]",null,['class' => 'form-control input-xs','style' => 'width:100px;']) !!}</td>
                    <td><input type="checkbox" name="displayForLists[]" value="{{ $sColumn }}" checked /></td>
                    <td><input type="checkbox" name="displayForEdits[]" value="{{ $sColumn }}" checked /></td>
                    <td><input type="checkbox" name="displayForViews[]" value="{{ $sColumn }}" checked /></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-6">
            {!! Form::button(___('back'), ['class' => 'btn btn-default', 'onclick' => 'history.back()']) !!}
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


