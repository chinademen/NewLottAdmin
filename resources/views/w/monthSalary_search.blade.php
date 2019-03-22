<div class="panel panel-default">
    <div class=" panel-body">
        <?php
            echo Form::open(array('method' => 'get', 'class' => 'form-inline', 'id'=>'user_search_form'))
        ?>
            <table style="width:100%">
            <tr>
                <td >
                    <table>
                        <tr>
                            <td class="text-right">部门名称：</td>
                            <td>
                                <select name="organization_id" style="width:100%" class="form-control input-xs j-select"><option value>不限</option>
                                    @foreach($aOrganizations as $id =>$name)
                                        <option value="{{$id}}"
                                                @if(isset($aSearchFields['organization_id']) && @$aSearchFields['organization_id']==$id)
                                                selected='selected'
                                                @endif>
                                            {{$name}}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="text-right">员工姓名：</td>
                            <td>
                                <input class="form-control input-xs" type="text" name="username" value="{{@$aSearchFields['username']}}" >
                            </td>
                            <td class="text-right">计算年月：</td>
                            <td>
                                <select name="payed_at" style="width:100%" class="form-control input-xs"><option value>不限</option>
                                    @foreach($aDate as $id =>$name) <option value="{{$id}}" @if(isset($aSearchFields['payed_at']) && @$aSearchFields['payed_at']==$id.'')selected='selected' @endif>{{$name}}</option> @endforeach</select>
                            </td>
{{--                            <td  class="text-right">每页条数：</td>
                            <td>
                                <select name="pagesize" style="width:100%" class="form-control input-xs">
                                    <option value="15"  {{ @$aSearchFields['pagesize'] == 15 ?  'selected' : '' }}>15</option>
                                    <option value="30"  {{ @$aSearchFields['pagesize'] == 30 ?  'selected' : '' }}>30</option>
                                    <option value="50"  {{ @$aSearchFields['pagesize'] == 50 ?  'selected' : '' }}>50</option>
                                    <option value="100" {{ @$aSearchFields['pagesize'] == 100 ? 'selected' : '' }}>100</option>
                                </select>
                            </td>--}}
                        </tr>
{{--
                        <tr>

                            <td class="text-right">&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>--}}
                    </table>
                </td>
                <td class="text-right">
                    <input class="btn btn-success unLoding" type="submit" id="submitForm" value="搜索"/>
                    <a class="btn btn-default"  id="download">下载数据报表</a>
                </td>
            </tr>
        </table>
        <?php
        echo Form::hidden('is_search');
        echo Form::close();
        ?>
    </div>
</div>

@section('end')
@parent
<script type="text/javascript">
    $(function () {
        //切换
        $('.j-select').change(function () {
            if ($(this).val() == 1) {
                $('.j-none').hide().eq('0').show();
            } else {
                $('.j-none').hide().eq('1').show();
            }
        });

        $('#download').click(function () {
            $('#user_search_form').attr('action','/month-salary-results/download');
            $('#user_search_form').submit();
        });
        $('#submitForm').click(function(event) {
            $('#user_search_form').attr({'action':'/month-salary-results','target':'_self'});
            $('#user_search_form').submit();
        });
    });
</script>
@stop