@extends('l.base', ['active' => $resource??[]])
@section('title')
    @parent
    {{--{{ $sPageTitle }}--}}
@stop
{{style('data-tables')}}
{!! script('/js/echarts.common.min.js') !!}
<style>
    .hide-d{display: none}#chart_box{height: 60%;}
</style>
<?php if(isset($aPublicSearchData)&&isset($aSearchData)){$aSearchData=array_merge($aSearchData,$aPublicSearchData);}?>
@section('container')
    <div class="col-md-12">
        {{--@include('w.breadcrumb')--}}
        {{--@include('w._function_title')--}}
        <div class="h3">
            {{___('_function.'.$sTitle)}}
            <small><a href="javascript:window.location.reload();" class="glyphicon glyphicon-repeat"></a></small>
        </div>
        @include('w.notification')
        <?php
        if (isset($aTotalColumns)) {
            $aTotals = array_fill(0, count($aColumnForList), null);
            $aTotalColumnMaps = array_flip($aColumnForList);
        } else {
            $aTotalColumns = $aTotalColumnMaps = [];
        }
        ?>
        @include('custom.report.search')

        <div class="time-top ">
            <i class="glyphicon glyphicon-time"></i>{{ __('_basic.data-time') . ':' . $sDataUpdatedTime }}
        </div>
        <div class="panel panel-default  J-tab-chart @if(!($aCharts['chart']??false)) hide-d @endif " id="chart_box">

        </div>
        <div class="panel panel-default  J-tab-chart @if(($aCharts['chart']??false)) hide-d @endif " id="table_box">
            <table id="myTable" class="table table-striped table-hover  table-condensed" style="text-align:center">
                <thead class="thead-mini  thead-inverse">
                <tr role="row"></tr>
                <tr>
                    @foreach( $aColumnForList as $sColumn )
                        <th class="text-center">
                             {{ (___('_report.' . $sColumn, null, 3)) }}
                        </th>
                        <?php
                        if ($aTotalColumns) {
                            in_array($sColumn, $aTotalColumns) or $aTotalColumnMaps[$sColumn] = null;
                        }
                        ?>
                    @endforeach
                        <th class="text-center">
                            操作
                        </th>
                </tr>
                </thead>

                <tbody class="sync-pagination">
                @if(!empty($aData))
                    @foreach ($aData as $data)
                        <tr>
                            @foreach($aColumnForList as $sColumn)
                                <?php
                                    if(isset($aSumTotal[$sColumn])){
                                        $aSumTotal[$sColumn]+= $data[$sColumn]??0;
                                    }
                                ?>

                                <td>
                                    @if(($merchant_id||!empty($search_merchant_id))&&$sColumn=='merchant_id')
                                        {{$aMerchant[$merchant_id??$search_merchant_id]}}
                                    @elseif($sColumn=='merchant_id')
                                        {{'ALL'}}
                                     @elseif(!empty($aSelectColumn) && isset($aSelectColumn[$sColumn]))
                                        <?php  $sData=$aSelectColumn[$sColumn];$id = $data[$sColumn] ?>
                                        {{$$sData[$id]??''}}
                                        @else
                                        {!! $data[$sColumn]??'' !!}
                                    @endif
                                    {{--@if($sColumn == 'total_items')
                                        {!!$data[$sColumn]!!}
                                    @else
                                        @if(isset($data[$sColumn]) )
                                          --}}{{--  {!! is_numeric($data[$sColumn]) ? number_format($data[$sColumn], 4): $data[$sColumn]!!}--}}{{--
                                            {!! $data[$sColumn] !!}
                                        @else
                                            {!! "0.00" !!}
                                        @endif
                                    @endif--}}
                                </td>
                            @endforeach
                            <td>
                                <?php
                                $aShowParams=[];
                                foreach($aShowBtn['params_key'] as $key){
                                    if(isset($data[$key])){
                                        $aShowParams[]=$data[$key];
                                    }
                                }
                                if($aRelationBtn){
                                    $aRelationParams=[];
                                    foreach($aRelationBtn['params_key'] as $key=>$dateKey){
                                        $aRelationParams[$key]=$data[$dateKey];
                                    }
                                }
                                ?>
                                <a href="{{route($aShowBtn['uri'],$aShowParams)}}" class="btn btn-default" target="_self">{{___('_report.show')}}</a>
                                @if($aRelationBtn)
                                <a href="{{route($aRelationBtn['uri'],$aRelationParams)}}" class="btn btn-default" target="_self">{{___('_function.'.$aRelationBtn['name'])}}</a>
                                    @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>

                <tfoot>

                <tr>
                    <td>{{ __('_basic.total-of-page') }}</td>
                    @for($i = 1; $i < count($aColumnForList); $i++)
                        <?php
                        $sColumn = $aColumnForList[$i];
                        $sClass = '';
                        ?>
                        <td class="{{ $sClass }}">
                            {{''}}
                        </td>

                    @endfor
                    <td class="" rowspan="1" colspan="1">

                    </td>
                </tr>
                <tr>

                    <?php //dd($aSumTotal);
                         $sTotalHtml = '';$arr=$aColumnForList;array_shift($arr);
                        foreach($arr as $c){
                        $sTotalHtml .= '<td class="' . $sClass . '">';
                            if(isset($aSumTotal[$c])){
                                $sTotalHtml .= number_format($aSumTotal[$c],2);
                            }else{
                                $sTotalHtml .= '';
                            }
                        $sTotalHtml .= '</td>';
                        }
                       // dd($sTotalHtml,$aColumnForList,$aSumTotal);
                    ?>
                    <td>{{ ___('_basic.total') }}</td>
                    {!! $sTotalHtml !!}
                    <td class="" rowspan="1" colspan="1">

                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@stop

@section('end')
    @parent

    {{script('data-tables')}}
    <script type="text/javascript">
        var total_num = parseInt('<?php echo count($aColumnForList) ?>') - 1;

        $(document).ready(function () {
            $('#myTable').dataTable({
                bPaginate: true,
                bFilter: true,
                bSort: true,
                bInfo: true,
                oLanguage: {
                    "sProcessing": "处理中...",
                    "sLengthMenu": "显示 _MENU_ 项结果",
                    "sZeroRecords": "没有匹配结果",
                    "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                    "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
                    "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
                    "sInfoPostFix": "",
                    "sSearch": "过滤:",
                    "sUrl": "",
                    "sEmptyTable": "表中数据为空",
                    "sLoadingRecords": "载入中...",
                    "sInfoThousands": ",",
                    "oPaginate": {
                        "sFirst": "首页",
                        "sPrevious": "上页",
                        "sNext": "下页",
                        "sLast": "末页"
                    },
                    "oAria": {
                        "sSortAscending": ": 以升序排列此列",
                        "sSortDescending": ": 以降序排列此列"
                    }
                },
                /*columnDefs:[{
                    'targets' : [0,1,2,3,4,7,8],    //定义不排序 除第六，第七两列外，都默认不排序
                    'orderable' : false
                }],*/

                "order": [[ 1, "asc" ]], //定义默认排序
                sPaginationType: "full_numbers",
                aLengthMenu: [20, 40, 60],
                fnFooterCallback: function (row, data, start, end, display) {
                    //console.log(row,data,start,end,display);
                    var api = this.api(), data;
                    // Remove the formatting to get integer data for summation
                    var intVal = function (i) {
                        return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                                typeof i === 'number' ?
                                        i : 0;
                    }; var acolumns =<?php echo json_encode($aColumnForList) ?>;
                    // Total over this page
                    var index;
                    for (index = 1; index <= total_num; index++) {

                        pageTotal = api
                                .column(index, {page: 'current'})
                                .data()
                                .reduce(function (a, b){
                                    if(acolumns[index]=='prize_group'){
                                        return '';
                                    }
                                    if (isNaN(intVal(a)) || isNaN(intVal(b))) {
                                        return "";
                                    }
                                    return intVal(a) + intVal(b);
                                }, 0);

                        if (pageTotal != "") {
                            pageTotal = pageTotal.toFixed(2);
                        }

                        // Update footer
                        $(api.column(index).footer()).html(
                                this.fnSettings().fnFormatNumber(pageTotal)
                        );
                    }

                }

            });

        });

    </script>


    <script>
        var map2 = {!! json_encode($aCharts['data']??[]) !!};
        var myChart=echarts.init(document.getElementById('chart_box'),'light');
        myChart.hideLoading();
        window.onresize = myChart.resize;
        option_map2 = {
            tooltip : {
                trigger: 'axis',
                axisPointer: {
                    type: 'shadow',
                    label: {
                        show: true
                    }
                }
            },
            toolbox: {
                show : true,
                feature : {
                    mark : {show: true},
                    dataView : {show: true, readOnly: false},
                    magicType: {show: true, type: ['line', 'bar']},
                    restore : {show: true},
                    saveAsImage : {show: true}
                }
            },
            calculable : true,
            title: {
                text: "{!! ___('_function.'.$sTitle) !!}",
                subtext: '统计时间:'+map2['countDate']
            },
            legend: {
                data:[
                    {name:'注单数'},
                    {name:'投注额'},
                    {name:'奖金'},
                    {name:'活跃用户'},
                ],
                /*itemGap: 5*/
            },
            grid: {
                top: '25%',
                left: '4%',
                right: '3%',
                containLabel: true
            },
            xAxis: [
                {
                    name : '时间',
                    type : 'category',
                    data : map2['date']
                }
            ],
            yAxis: [
                {
                    type : 'value',
                    name : '单位/元',
                    axisLabel: {
                        /*formatter: function (a) {
							a = +a;
							return isFinite(a)
								? echarts.format.addCommas(+a / 1000)
								: '';
						}*/
                    }
                }
            ],
            /*dataZoom: [ // 底部 和右侧滑块
				{
					show: true,
					start: 94,
					end: 100
				},
				{
					type: 'inside',
					start: 10,
					end: 100
				},
				{
					show: true,
					yAxisIndex: 0,
					filterMode: 'empty',
					width: 30,
					height: '80%',
					showDataShadow: false,
					left: '93%'
				}
			],*/
            series : [
                {
                    name: '注单数',
                    type: "{{$aCharts['magicType']??'line'}}",
                    data: map2['BetNumber']
                },
                {
                    name: '投注额',
                    type: "{{$aCharts['magicType']??'line'}}",
                    data:  map2['BetMoney']
                },
                {
                    name: '奖金',
                    type: "{{$aCharts['magicType']??'line'}}",
                    data:  map2['BonusMoney']
                },
                {
                    name: '活跃用户',
                    type: "{{$aCharts['magicType']??'line'}}",
                    data:  map2['BetUserNumber']
                }
            ]
        };

        myChart.setOption(option_map2);

        function change_show(dom){
            var text= $(dom).html();
            if(text=='表格显示'){
                $('#table_box').show();
                $('#chart_box').hide();
                $(dom).html('图形显示');
            }else{
                $('#table_box').hide();
                $('#chart_box').show();
                $(dom).html('表格显示');
            }
        }
    </script>
@stop