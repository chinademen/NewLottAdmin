<div class="panel panel-default">
    <div class=" panel-body">
        @if($aCharts['chart']??false)
        <div class="form-group pull-left">
            <button type="submit" class="btn btn-default btn-xs" onclick="change_show(this)">表格显示</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        @endif
        <form method="get" class="form-inline">
            <input type="hidden" name="is_search">
            @if($aSearchCon['like']??false)
                @foreach($aSearchCon['like'] as $search)
                    <?php if($merchant_id&&$search['name']=='merchant'){continue;} ?>

                    <div class="form-group">
                        <label for="{{$search['name']}}">{{___('_report.'.$search['name'])}}</label>
                        <input type="text" name="{{$search['name']}}"
                               id="{{$search['name']}}" value="{{$aSearchData[$search['key']]??''}}" placeholder="{{$search['tip']??''}}"/>
                    </div>

                @endforeach
            @endif

            @if($aSearchCon['select_column']??false)
                @foreach($aSearchCon['select_column'] as $k=>$v)
                <div class="form-group">
                    <label for="{{$v['key']}}">{{___('_report.'.$v['name'])}}</label>
                    <select id="{{$v['key']}}" class="form-control input-xs" name="{{$v['key']}}">
                        <?php $dataStr = $v['data']?>

                        <option value="" selected="selected"></option>

                        @foreach( $$dataStr as $r=>$n )
                            <option value="{{$r}}"
                            @if((isset($aSearchData[$v['key']]) && $aSearchData[$v['key']]==$r))
                                selected
                            @endif
                                >{{$n}} </option>
                        @endforeach
                    </select>
                </div>
                @endforeach
            @endif
           {{-- <div class="form-group">
                <label for="agent_name">代理商</label>
                <input type="text" name="agent_name"
                       id="agent_name" value="{{$sAgentname??''}}"/>
            </div>--}}
            @if($aSearchCon['s_range']??false)
                <div class="form-group">
                    <label for="s_range">{{___('_report.'.$aSearchCon['s_range']['key'].' start')}}</label>
                    <input type="text" class="form-control  input-group  input-xs" name="s_range"
                           id="s_range" value="{{$aSearchData[$aSearchCon['s_range']['data_key']]??''}}"/>
                </div>
            @endif
            @if($aSearchCon['e_range']??false)
                <div class="form-group">
                    <label for="e_range">{{___('_report.'.$aSearchCon['e_range']['key'].' to')}}</label>
                    <input type="text" class="form-control  input-group  input-xs" name="e_range"
                           id="e_range" value="{{$aSearchData[$aSearchCon['e_range']['data_key']]??''}}"/>
                </div>
            @endif

            @if($aSearchCon['s_date']??false)
            <div class="form-group">
                <label for="s_date">{{___('_report.start date')}}</label>
                <input type="text" class="form-control {{$aSearchCon['s_date']['date_type']}} input-group date form_date input-xs" name="s_date" id="s_date" value="{{$aSearchData['s_date']??''}}"/>
            </div>
            @endif

            @if($aSearchCon['e_date']??false)
            <div class="form-group">
                <label for="e_date">{{___('_report.end date')}}</label>
                <input type="text" class="form-control {{$aSearchCon['s_date']['date_type']}} input-group date form_date input-xs" name="e_date" id="e_date" value="{{$aSearchData['e_date']??''}}"/>
            </div>
            @endif
            <div class="form-group pull-right">
                <button type="submit" class="btn btn-success btn-xs">{{ ___('_basic.search',null,1) }}</button>
            </div>
        </form>
    </div>
</div>
@section('end')
    @parent

@stop