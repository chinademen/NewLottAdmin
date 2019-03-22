@extends('l.base', ['active' => $resource])
@section('title')
@parent
{{ $sPageTitle }}
@stop


@section('container')
    {{--{!! style('layer') !!} {!! script('layer-js')  !!}--}}
<div id="container">
    @include('w.breadcrumb')
        @include('w._function_title')
        @include('w.notification')
        <?php
            if (isset($aTotalColumns)){
                $aTotals = array_fill(0, count($aColumnForList),null);
                $aTotalColumnMaps = array_flip($aColumnForList);
                if ($aTotalRateColumns){
                    foreach($aTotalRateColumns as $sRateColumn => $aRateColumnConfigs){
                        list($sNumerator, $sDenominator) = $aRateColumnConfigs;
                        $iPosOfRateColumn        = array_search($sRateColumn, $aColumnForList);
                        $iPosOfNumeratorColumn   = array_search($sNumerator, $aColumnForList);
                        $iPosOfDenominatorColumn = array_search($sDenominator, $aColumnForList);
                    }
                }
            //    pr($iPosOfRateColumn);
            //    pr($iPosOfNumeratorColumn);
            //    pr($iPosOfDenominatorColumn);
            //    exit;
            }
            else{
                $aTotalColumns = $aTotalColumnMaps = [];
            }
        ?>
        @foreach($aWidgets as $sWidget)
            @include($sWidget)
        @endforeach
        @if ($bSequencable)
            {!! Form::open(['url' => route($sSetOrderRoute) ]) !!}
        @endif
        <div class=" time-top">
            <i class="glyphicon glyphicon-time"></i>{{ ___('_basic.data-time') . ':' . $sDataUpdatedTime }}
        </div>

        <div class="panel panel-default  J-tab-chart">
            <table id="data_list">
                <thead>
                    <tr>
                        @if ($bCheckboxForBatch)
                            <th><input type="checkbox" id="allCheckbox" name="allCheckbox"></th>
                        @endif
                        @foreach( $aColumnForList as $sColumn )　
                            <th class="text-center">
                                {{ (___($sLangPrev . $sColumn, null, 3)) }}
                                @if (!in_array($sColumn, $aNoOrderByColumns))
                                    {!! ViewHelper::orderBy($sColumn) !!}
                                @endif
                            </th>
                            <?php
                            if ($aTotalColumns){
                                in_array($sColumn, $aTotalColumns) or $aTotalColumnMaps[$sColumn] = null;
                            }
                            ?>
                        @endforeach
                        <th class=" text-center">{{ ___('_basic.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                    <tr>
                        @if ($bCheckboxForBatch)
                            <td ><input type="checkbox" name="selectFlag" value="{{$data->id}}"></td>
                        @endif
                        {!! ViewHelper::displayForIndex($data, $aColumnForList, $aViewSettings, $aArrayVars, $aTotalColumns, $aTotalColumnMaps, $aTotals) !!}
                        <td>
                            @include('user.user_item_link')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                 @if ($aTotalColumns)
                <tfoot>
                    <tr>
                        <td>{{ ___('_basic.total-of-page') }}</td>
                        <?php
                        if ($aTotalRateColumns && $aTotals[$iPosOfDenominatorColumn]){
                            $aTotals[$iPosOfRateColumn] = $aTotals[$iPosOfNumeratorColumn] / $aTotals[$iPosOfDenominatorColumn];
                        }
                        ?>
                        @for($i = 1; $i < count($aColumnForList); $i++)
                            <?php
                                $sColumn = $aColumnForList[$i];
                                $sClass = '';
                                if (in_array($sColumn,$aWeightFields)){
                                    $sClass .= ' text-weight';
                                }
                                if (in_array($sColumn,$aClassGradeFields)){
                                    $sClass .= ' ' . ($aTotals[$i] >= 0 ? '' : 'text-red');
                                }
                                !is_numeric($aTotals[$i]) or $sClass .= ' text-right';
                            ?>
                            <td class="{{ $sClass }}">
                                <?php
                                    if (is_null($aTotals[$i])) {
                                        echo ' ';
                                    } else {
                                         if (array_key_exists($sColumn, $aTotalRateColumns)) {
                                             echo formatNumber($aTotals[$i] * 100, 2) . '%';
                                         } else {
                                            echo number_format($aTotals[$i], (array_key_exists($aColumnForList[$i], $aNumberColumns) ? $aNumberColumns[$aColumnForList[$i]] : 2));
                                         }
                                    }
                                ?>
                            </td>
                        @endfor
                        <td></td>
                    </tr>
                </tfoot>
                @endif
            </table>
        </div>

        <div class="pull-left">
            @if ($bSequencable)
                {!! Form::submit(___('_basic.set-order',null,2), ['class' => 'btn btn-success btn-b btn-xs']) !!}
            @endif
            @if ($bCheckboxForBatch)
                @include('w.page_batch_link')
            @endif
        </div>
        <div class="pull-right">
            <ul class="pagination pagination-sm">
            <li>
            <span>{{ ___('_basic.page') . ': ' . $datas->currentPage() }}, {{ ___('_basic.per-page') . ': ' . $datas->perPage() }}, {{ ___('_basic.total') . ': ' . $datas->total() }}</span>
            {!! $datas->appends(Input::except('page'))->render() !!}
            </li>
            </ul>
        </div>
            <br/><br/>
        @if ($bSequencable)
            {!! Form::close() !!}
        @endif
        <?php
        if ($bCheckboxForBatch) {
            if (isset($aLangKeysForButtons['beforeBatchDelete'])) {
                $modalData['beforeBatchDelete'] = array(
                    'id'      => 'beforeBatchDeleteModel',
                    'title'   => '系统提示',
                    'message' => ___($aLangKeysForButtons['beforeBatchDelete'], $aLangVars),
                    'footer'  =>
                        // '<form id="real-delete" method="delete">'
                        Form::open(['id' => 'real-delete', 'method' => 'DELETE'])
                        // . '<input type="hidden">'
                        . '<input type="hidden" name="id" id="beforeBatchDeleteId" value="">'
                        . '<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">取消</button>'
                        . '<button type="submit" class="btn btn-sm btn-danger">确认删除</button>'
                        // . '</form>',
                        . Form::close()
                );
            }
        }
        if ($aLangKeysForButtons) {
            $aPopupData = [];
            foreach($aLangKeysForButtons as $sFunc => $aPopupConfig){
                $aPopupData[$sFunc] = ViewHelper::compilePopupData($sFunc, $aLangVars, $aPopupConfig);
            }
        ?>
        @include('popup.makeModal', $aPopupData)
        <?php } ?>
    </div>
@stop

@section('end')
    @parent

    <script type="text/javascript">
    $(document).ready(function(){
        $('#data_list td').click(function(event) {
            var len = $(this).parent().find('td').length,
                islen = $(this).index() + 1;
            if(len > islen){
                $(this).parent().toggleClass('tr-bg');
                return false;
            }
        });
        $(document).on('click', function(e){
            var src = e.target;
            if(src.tagName && src.tagName ==="tr") {
                return false;
            } else {
                $('tr').removeClass('tr-bg');
            }
        });
    });
    </script>
    <script type="text/javascript">
        function showTable(row_id){
            showOverlay();
            var boxClass ='.blocked_box'+ row_id;
            $(boxClass).show();
        }
        // 关闭
        function closeLay(){
            hideOverlay();
            $('.class_box').hide();
        }
        /* 显示遮罩层 */
        function showOverlay() {
            $("#overlay").fadeTo(200, 0.5);
        }

        /* 隐藏覆盖层 */
        function hideOverlay() {
            $("#overlay").fadeOut(200);
        }

    </script>
@stop