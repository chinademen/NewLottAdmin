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
                            <td class="text-right">玩家名称：</td>
                            <td>
                                <input type="text" class="form-control  input-xs" id="username" name="username"
                                       value="{{ Input::old('username', isset($data) ? $data->username : '') }}"/>
                            </td>
                            <td class="text-right">用户组：</td>
                            <td>
                                <select name="user_group" style="width:100%" class="form-control input-xs">
                                    <option value>不限</option>
                                    <option value="0"{{ @$aSearchFields['user_group'] === '0' ? 'selected' : '' }} >玩家
                                    </option>
                                    <option value="1"{{ @$aSearchFields['user_group'] === '1' ? 'selected' : '' }} >代理
                                    </option>
                                    <option value="2" {{ @$aSearchFields['user_group'] === '2' ? 'selected' : '' }}>总代
                                    </option>
                                </select>
                            </td>
                            <td style="width:80px" class="text-right"> 测试帐号：</td>
                            <td>
                                <select name="is_tester" class="form-control input-xs">
                                    <option value>不限</option>
                                    <option value="1" {{ @$aSearchFields['is_tester'] === '1' ? 'selected' : '' }}>是
                                    </option>
                                    <option value="0" {{ @$aSearchFields['is_tester'] === '0' ? 'selected' : '' }}>否
                                    </option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td class="text-right"> 注册时间：</td>
                            <td>
                                <input type="text" class="form-control boot-time input-xs" id="created_at_from" name="created_at_from"
                                       value="{{ Input::old('created_at_from', isset($data) ? $data->created_at_from : '') }}"/>
                            </td>
                            <td class="text-right">到：</td>
                            <td>
                                <input type="text" class="form-control boot-time input-xs" id="created_at_to" name="created_at_to"
                                       value="{{ Input::old('created_at_to', isset($data) ? $data->created_at_to : '') }}"/>
                            </td>
                            <td class="text-right">每页条数：</td>
                            <td>
                                <select name="pagesize" style="width:100%" class="form-control input-xs">
                                    <option value="15" {{ @$aSearchFields['pagesize'] == 15 ?  'selected' : '' }}>15
                                    </option>
                                    <option value="30" {{ @$aSearchFields['pagesize'] == 30 ?  'selected' : '' }}>30
                                    </option>
                                    <option value="50" {{ @$aSearchFields['pagesize'] == 50 ?  'selected' : '' }}>50
                                    </option>
                                    <option value="100" {{ @$aSearchFields['pagesize'] == 100 ? 'selected' : '' }}>100
                                    </option>
                                </select>
                            </td>
                            <td class="text-right">&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </td>
                <td class="text-right">
                    <input class="btn btn-success unLoding" type="submit" id="submitForm" value="搜索"/>
                </td>
            </tr>
        </table>
        <?php
        echo Form::hidden('is_search');
        echo Form::close();
        ?>
    </div>
</div>
