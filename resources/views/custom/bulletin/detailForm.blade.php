
<?php
//pr($aColumnSettings);
//exit;
$aAttributes = $isEdit ? $data->getAttributes() : array_combine($aOriginalColumns, array_fill(0, count($aOriginalColumns), null));
if (!$isEdit) {
    foreach ($aInitAttributes as $sColumn => $mValue) {
        $data->$sColumn = $mValue;
    }
}
//pr($data->toArray());
$oFormHelper->setErrorObject($errors);
?>
<form method="post" class="form-horizontal" action="">
{{ csrf_field() }}
@if ($isEdit)
    <input type="hidden" name="_method" value="PUT" />
@endif
@foreach ($aAttributes as $sColumn => $sValue)
<?php
if ($sColumn == 'id' || !isset($aColumnSettings[$sColumn])) {
    continue;
}
$bReadOnly = $aColumnSettings[$sColumn]['readonly'];
switch ($aColumnSettings[$sColumn]['form_type']) {
    case 'text':
    case 'textarea':
        $options = ['id' => $sColumn, 'class' => 'form-control'];
        !$bReadOnly or $options['readonly'] = $bReadOnly;
        $sHtml = $oFormHelper->input($sColumn, null, $options);
        break;
    case 'bool':
        $options = ['id' => $sColumn];
        !$bReadOnly or $options['readonly'] = $bReadOnly;
        $sHtml = $oFormHelper->input($sColumn, null, $options);
        break;
    case 'select':
        $options = [
            'id' => $sColumn,
            'class' => 'form-control',
            'options' => ${$aColumnSettings[$sColumn]['options']},
            'empty' => true
        ];
        !$bReadOnly or $options['readonly'] = $bReadOnly;
        $sHtml = $oFormHelper->input($sColumn, null, $options);
        break;
    case 'ignore':
        continue 2;
    case 'date':
        $options = ['id' => $sColumn, 'type' => 'datetime'];
        !$bReadOnly or $options['readonly'] = $bReadOnly;
        $sHtml = $oFormHelper->input($sColumn, null, ['id' => $sColumn, 'type' => 'datetime']);
        break;
    default:
        $options = ['id' => $sColumn, 'class' => 'form-control'];
        !$bReadOnly or $options['readonly'] = $bReadOnly;
        $sHtml = Form::input('text', $sColumn, $sValue, $options);
}
?>

@if($aColumnSettings[$sColumn]['form_type']=='textarea')
        <div class="form-group">
            <label for="content" class="col-sm-3 control-label">{{ ___('_msgmessage.content') }}</label>
            <div class="col-sm-5">
                <script id="content" type="text/plain" name="content" style="width:100%;height:200px;">
                    {!! $sValue !!}
                    </script>
                </div>
                <div class="col-sm-4">
                        {{ $errors->first('content', '<label class="text-danger control-label">:message</label>') }}
                    </div>
                    </div>

    @else
        {!! $sHtml !!}
    @endif


@endforeach
<div class="form-group">
    <div class="col-sm-offset-3 col-sm-5">
        <!--【修正】编辑岗位重置操作不刷新页面-->
        <button type="reset" class="btn btn-default" >{{ ___('Reset') }}</button>
        <!--
        <a class="btn btn-default" href="{{ route($resource. ($isEdit ? '.edit' : '.create'), $data->id) }}">{{ ___('Reset') }}</a>
        -->
        {!! Form::submit(___('Submit'), ['class' => 'btn btn-success']) !!}
    </div>
</div>
{!! Form::close() !!}
