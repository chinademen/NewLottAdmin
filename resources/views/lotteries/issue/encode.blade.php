@extends('l.base', ['active' => $resource])
@section('title')
@parent
{{ $sPageTitle }}
@stop
@section('container')
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
                            @include('w.item_link')
                            @if ($data->status == $data::ISSUE_CODE_STATUS_WAIT_CODE && !$data->wn_number && time() - $data->end_time > 90)
                                <a href="javascript:;" class="btn btn-xs btn-danger"  data-issue="{{$data->issue}}" data-betime="{{ date('Y-m-d H:i:s', $data->begin_time) . ' - ' .  date('Y-m-d H:i:s', $data->end_time) }}" data-fstatus="{{baseOption('base.issues.status')[$data->status]}}">录号</a>
                            @endif
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
        $('[data-issue]').click(function(event) {
            var dataId = $(this).attr('data-issue');
            $('td.issue-box').text(dataId);
            $('td.betime-box').text($(this).attr('data-betime'));
            $('td.fstatus-box').text($(this).attr('data-fstatus'));

            $('input[name="issue"]').val(dataId);
            $('.input-group-addon font').text(' '+dataId);
            $('input[name="wn_number"]').focus();

        });
    });
    </script>
@stop