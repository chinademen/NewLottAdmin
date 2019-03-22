@extends('l.base', ['active' => $resource])

@section('title')
@parent
{{ $sPageTitle }}
@stop
@section('container')
<div class="col-md-12">
    @include('w.breadcrumb')
    @include('w._function_title')
    @include('w.notification')


    @foreach($aWidgets as $sWidget)
        @include($sWidget)
    @endforeach

    <div class="panel panel-default">
        <table class="table table-striped table-hover">
            <thead class="thead-mini thead-inverse">
                <tr>
                @foreach( $aColumnForList as $sColumn )
                    <th>{{ (___($sLangPrev . $sColumn, null, 3)) }}
                        @if (!in_array($sColumn, $aNoOrderByColumns))
                        {{ ViewHelper::orderBy($sColumn) }}
                        @endif
                    </th>
                @endforeach
                    <th>{{ ___('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                <tr>
                    <?php
                    foreach ($aColumnForList as $sColumn){
                        if (isset($aColumnSettings[$sColumn]['type'])){
                            $sDisplayValue = $sColumn . $aColumnSettings[$sColumn]['type'];
                            switch($aColumnSettings[$sColumn]['type']){
                                case 'bool':
                                    $sDisplayValue = $data->$sColumn ? ___('Yes') : ___('No');
                                    break;
                                case 'select':
                                    $sDisplayValue = $data->$sColumn ? ${$aColumnSettings[$sColumn]['options']}[$data->$sColumn] : null;
                                    break;
                                default:
                                    $sDisplayValue = $data->$sColumn;
                            }
                        }
                        else{
                            $sDisplayValue = $data->$sColumn;
                        }
                        echo "<td>$sDisplayValue</td>";
                    }
                    ?>
                    <td>
                        @include('w.item_link')
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ pagination($datas->appends(Input::except('page')), 'p.slider-3') }}
</div>

<?php
$modalData['modal'] = array(
    'id'      => 'myModal',
    'title'   => '系统提示',
    'message' => '确认删除此'.$resourceName.'？',
    'footer'  =>
    Form::open(['id' => 'real-delete', 'method' => 'DELETE']).'
        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">取消</button>
        <button type="submit" class="btn btn-sm btn-danger">确认删除</button>'.
    Form::close(),
);
?>
@include('popup.modal', $modalData)

@stop

@section('end')
    @parent
    <script>
        function modal(href)
        {
            $('#real-delete').attr('action', href);
            $('#myModal').modal();
        }
    </script>
@stop

