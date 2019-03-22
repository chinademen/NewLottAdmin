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
    <div class="h4">第四步：配置功能信息</div>
    <p class="control-label text-danger">此配置页标题、上级、菜单位置、排序字段是必填项，请谨慎操作</p>
  <div class="col-md-12">
    {!! Form::open(array( 'class' => 'form-horizontal')) !!}
    <input type="hidden" name="step" value="4" />
    <input type="hidden" name="table_name" value="{{ $sTableName }}" />
    <input type="hidden" name="model_name" value="{{ $model_name }}" />
    <input type="hidden" name="model_note" value="{{ $model_note }}" />
    <input type="hidden" name="cache_level" value="{{ $cache_level }}" />
    <input type="hidden" name="controller" value="{{ $controller }}" />
    <input type="hidden" name="title_column" value="{{ $title_column }}" />
    <input type="hidden" name="requiredColumns" value="{{ implode(',',$requiredColumns) }}" />
    @foreach($minValues as $sColumn => $sValue)
    <input type="hidden" name="minValues[{{ $sColumn }}]" value="{{ $sValue }}" />
    @endforeach
    @foreach($maxValues as $sColumn => $sValue)
    <input type="hidden" name="maxValues[{{ $sColumn }}]" value="{{ $sValue }}" />
    @endforeach
    @foreach($listValues as $sColumn => $sValue)
    <input type="hidden" name="listValues[{{ $sColumn }}]" value="{{ $sValue }}" />
    @endforeach
    <input type="hidden" name="displayForLists" value="{{ implode(',',$displayForLists) }}" />
    <input type="hidden" name="displayForEdits" value="{{ implode(',',$displayForEdits) }}" />
    <input type="hidden" name="displayForViews" value="{{ implode(',',$displayForViews) }}" />
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
    <div class="form-group">
      <label for="title_column" class="col-sm-1 control-label">{{ ___('wizard.title-column') }}</label>
      <label class="control-label text-danger">{{ $title_column }}</label>
    </div>
    <div class="form-group">
      <label class="col-sm-1 control-label">{{ ___('wizard.title') }}</label>
      {!! $oFormHelper->input('function_title',null,['id' => 'function_title', 'type' => 'text', 'label' => false, 'class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      <label class="col-sm-1 control-label">{{ ___('wizard.parent_function') }}</label>
      {!! $oFormHelper->input('parent_function',null,['id' => 'parent_function', 'type' => 'select', 'label' => false,
                  'class' => 'form-control', 'options' => $aFunctionalities, 'empty' => true]) !!}
    </div>
    <div class="form-group">
      <label class="col-sm-1 control-label">{{ ___('wizard.parent-menu') }}</label>
      {!! $oFormHelper->input('parent_menu',null,['id' => 'parent_menu', 'type' => 'select', 'label' => false,
                    'class' => 'form-control', 'options' => $aMenus, 'empty' => true]) !!}
    </div>
    <div class="form-group">
      <label class="col-sm-1 control-label">{{ ___('wizard.func-settings') }}</label>
        <div class="panel panel-default J-tab-chart col-sm-3">
            <table class="table table-striped table-hover">
                <thead class="thead-mini  thead-inverse">
                    <tr>
                        <th>方法</th>
                        <th>需要</th>
                    </tr>
                </thead>
                @foreach($aAvailableActions as $sAction)
                <tr>
                    <td>{{ $sAction }}</td>
                    <td>
                       <input type="checkbox" name="actions[]" value="{{ $sAction }}" checked />
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="form-group">
      <label class="col-sm-1 control-label">{{ ___('wizard.search-settings') }}</label>
        <div class="panel panel-default J-tab-chart col-sm-11">
            <table class="table table-striped table-hover">
                <thead class="thead-mini  thead-inverse">
                    <tr>
                        <th rowspan="2">列</th>
                        <th rowspan="2">数据类型</th>
                        <th rowspan="2">宽度</th>
                        <th colspan="7">搜索配置</th>
                        <th colspan="4">参数配置</th>
                    </tr>
                    <tr>
                        <th>搜索</th>
                        <th>标签</th>
                        <th>类型</th>
                        <th>默认值</th>
                        <th>允许值列表</th>
                        <th>匹配规则</th>
                        <th>顺序</th>
                        <th>参数</th>
                        <th>默认值</th>
                        <th>是否绑定空值</th>
                        <th>顺序</th>
                    </tr>
                </thead>
                @foreach($aColumns as $sColumn => $aConfig)
                <?php
                if ($sColumn == 'id'){
                    continue;
                }
                $bRequired = !in_array($sColumn, $aNonRequiredColumns);
                $sChecked = $bRequired ? 'checked' : '';
                switch($aConfig['type']){
                    case 'int':
                    case 'bigint':
                    case 'mediumint':
                    case 'tinyint':
                    case 'smallint':
                        $sType = 'int';
                        break;
                    case 'date':
                        $sType = 'date';
                        break;
                    case 'datetime':
                        $sType = 'datetime';
                        break;
                    default:
                        $sType = 'string';
                };
                $sMatchRule = '$model.$field = $$field';
                ?>
                <tr>
                    <td>{{ $sColumn }}</td>
                    <td>{{ $aConfig['full_type'] }}</td>
                    <td>{{ $aConfig['width'] }}</td>
                    <td><input type="checkbox" name="searchItems[]" value="{{ $sColumn }}" /></td>
                    <td>{!! Form::text("searchLabels[$sColumn]",$sColumn,['class' => 'form-control input-xs','style' => 'width:100px;']) !!}</td>
                    <td>{!! $oFormHelper->input("searchTypes[$sColumn]",$sType,['id' => "searchTypes[$sColumn]",
                                'type' => 'select', 'label' => false, 'class' => 'form-control',
                                'options' => $aSearchItemValidTypes, 'empty' => true,
                                'style' => 'width:100px;text-align:right']) !!}</td>
                    <td>{!! Form::text("searchDefaults[$sColumn]",null,['class' => 'form-control input-xs','style' => 'width:100px;']) !!}</td>
                    <td>{!! Form::text("searchListValues[$sColumn]",null,['class' => 'form-control input-xs','style' => 'width:200px;']) !!}</td>
                    <td>{!! Form::text("searchMatchRules[$sColumn]",$sMatchRule,['class' => 'form-control input-xs','style' => 'width:200px;']) !!}</td>
                    <td>{!! Form::text("searchSequences[$sColumn]",null,['class' => 'form-control input-xs text-right','style' => 'width:50px;']) !!}</td>
                    <td><input type="checkbox" name="params[]" value="{{ $sColumn }}" /></td>
                    <td>{!! Form::text("paramDefaults[$sColumn]",null,['class' => 'form-control input-xs','style' => 'width:100px;']) !!}</td>
                    <td><input type="checkbox" name="paramBindNulls[]" value="{{ $sColumn }}" /></td>
                    <td>{!! Form::text("paramSequences[$sColumn]",null,['class' => 'form-control input-xs text-right','style' => 'width:50px;']) !!}</td>
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


