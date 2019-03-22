<div class="panel panel-default">
    <div class=" panel-body">
        <?php
        echo Form::open(array('method' => 'get', 'class' => 'form-inline', 'id' => 'user_search_form'))
        ?>
        <table style="width:100%">
            <tr>
                <td>
                    <table>
                        <tr>
                            <td class="text-right">岗位名称：</td>
                            <td>
                                <select name="post_id" style="width:100%" class="form-control input-xs j-select">
                                    <option value>不限</option>
                                    @foreach($aPosts as $id =>$name)
                                        <option value="{{$id}}"
                                                @if(isset($aSearchFields['post_id']) && @$aSearchFields['post_id']==$id)
                                                selected='selected'
                                                @endif>
                                            {{$name}}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="text-right">部门名称：</td>
                            <td>
                                <select name="organization_id" style="width:100%"
                                        class="form-control input-xs j-select">
                                    <option value>不限</option>
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
                            <td class="text-right">职位名称：</td>
                            <td>
                                <select name="officeposition_id" style="width:100%"
                                        class="form-control input-xs j-select">
                                    <option value>不限</option>
                                    @foreach($aOfficePosition as $id =>$name)
                                        <option value="{{$id}}"
                                                @if(isset($aSearchFields['officeposition_id']) && @$aSearchFields['officeposition_id']==$id)
                                                selected='selected'
                                                @endif>
                                            {{$name}}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="text-right">岗位状态：</td>
                            <td>
                                <select name="post_type" style="width:100%" class="form-control input-xs j-select">
                                    <option value>不限</option>
                                    @foreach($aPostTypes as $id =>$name)
                                        <option value="{{$id}}"
                                                @if(isset($aSearchFields['post_type']) && @$aSearchFields['post_type']==$id)
                                                selected='selected'
                                                @endif>
                                            {{$name}}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="text-right">员工姓名：</td>
                            <td>
                                <input class="form-control input-xs" type="text" name="username"
                                       value="{{@$aSearchFields['username']}}">
                            </td>
                        </tr>
                    </table>
                </td>
                <td class="text-right">
                    <input class="btn btn-success unLoding" type="submit" id="submitForm" value="搜索"/>
                    {{--<a class="btn btn-default" id="download">下载数据报表</a>--}}
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
                $('#user_search_form').attr('action', '/users/download');
                $('#user_search_form').submit();
            });
            $('#submitForm').click(function (event) {
                $('#user_search_form').attr({'action': '/users', 'target': '_self'});
                $('#user_search_form').submit();
            });
        });
    </script>
@stop