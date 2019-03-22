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

    <?php
        $oFormHelper->setErrorObject($errors);
    ?>
    <div class="panel panel-default">
        <div class=" panel-body">
            {!! Form::open(array( 'class' => 'form-horizontal')) !!}
            {!! Form::hidden('id', $data->id) !!}
            <div class="form-group">
                {!! $oFormHelper->makeLabel(null, ___('_sysconfig.item'), false, 'col-sm-2 control-label') !!}
                <div class="col-sm-6">
                    {!! $oFormHelper->makeLabel( null, $data->item ,false,'control-label text-success') !!}
                </div>
            </div>

            <div class="form-group">
                {!! $oFormHelper->makeLabel(null, ___('_sysconfig.title') ,false,'col-sm-2 control-label' ) !!}
                <div class="col-sm-6">
                    {!! $oFormHelper->makeLabel(null, $data->title, false,'control-label text-success') !!}
                </div>
            </div>

             <div class="form-group">
                {!! $oFormHelper->makeLabel(null, ___('_sysconfig.description') ,false,'col-sm-2 control-label' ) !!}
                <div class="col-sm-6">
                    {!! $oFormHelper->makeLabel(null, $data->description, false,'control-label text-success') !!}
                </div>
            </div>
            <div class="form-group">
                {!! $oFormHelper->makeLabel(null, ___('_sysconfig.default_value') ,false,'col-sm-2 control-label' ) !!}
                <div class="col-sm-6">
                    {!! $oFormHelper->makeLabel(null, $data->default_value, false,'control-label text-success') !!}
                </div>
            </div>
            <?php
                switch($data->form_face){
                    case 'none':
                    case 'text':
                        echo $oFormHelper->input('value', $data->value, ['type' => 'text']);
                        break;
                    case 'edit':
                        echo $oFormHelper->input('value', $data->value, ['type' => 'textarea']);
                        break;
                    case 'multi_select':
                        $options['multiple'] = true;
                    case 'select':
                        $options['options'] = $aDataSource;
                        $options['empty'] = true;
                        $options['type'] = 'select';
                        echo $oFormHelper->input('value',$data->value, $options);
                        break;
                    case 'radio':
                        echo $oFormHelper->makeRadio('value', $aDataSource);
                        break;
                    case 'checkbox':
                        if ($data->validation == 'bool'){
                            echo '<div class="form-group">';

                            echo $oFormHelper->makeLabel("Value",___('Yes'));
                            echo '<div class="col-sm-6">';
                            echo Form::hidden('validation',$data->validation);
                            echo Form::checkbox('value',1,$data->value);
                             echo '</div></div>';
                        }
                        else{
                            $aInitValue = explode(',',$data->value);
                            $i = 0;
                            foreach($aDataSource as $sValue => $sText){
                                $bCheck = in_array($sValue,$aInitValue);
                                echo Form::checkbox("value[$i]",$sValue,$bCheck);
                                echo $oFormHelper->makeLabel("value[$i]",$sText, false,'form-control');
                                $i++;
                            }
                        }
                    break;
                }
    	    ?>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                  <a class="btn btn-default" href="{{ route($resource.'.edit', $data->id) }}">{{ ___('Reset') }}</a>
                  {!! Form::submit(___('Submit'), ['class' => 'btn btn-success']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop
