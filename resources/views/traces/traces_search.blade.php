<div class="panel panel-default">
    <div class="panel-body">
        {!! Form::open(array('method' => 'get', 'class' => 'form-inline', 'id'=>'project_search_form')) !!}
        <input id="download_flag" name="download_flag" value="" type="hidden"/>
        <table style="width:100%">
            <tr>
                <td>
                    <table>
                        <tr>
                            <td style="width:100px" class="text-right">商户：</td>
                            <td style="width:150px">
                                <select name="merchant_id" style="width:100%"  class="form-control input-xs">
                                    <option value=""></option>
                                    @foreach($aMerchantIds as $id => $value)
                                        <option value="{{ $id }}" {{ @$aSearchFields['merchant_id']['value'] == $id ? 'selected' : '' }} >{{ $value }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td style="width:100px" class="text-right">追号编号：</td>
                            <td style="width:150px">
                                <input class="form-control input-xs" type="text" name="serial_number"
                                       value="{{@$aSearchFields['serial_number']['value']}}">
                            </td>
                            <td style="width:100px" class="text-right">游戏时间：</td>
                            <td style="width:150px">
                                <input class="form-control input-xs boot-time" type="text" name="bought_at_from"
                                       value="{{@$aSearchFields['bought_at_from']['value']}}">
                            </td>
                            <td style="width:100px" class="text-right">至：</td>
                            <td style="width:150px">
                                <input class="form-control input-xs boot-time" type="text" name="bought_at_to"
                                       value="{{@$aSearchFields['bought_at_to']['value']}}">
                            </td>


                        </tr>

                        <tr>
                            <td class="text-right">用户搜索：</td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control input-xs" type="text" name="username"
                                           value="{{@$aSearchFields['username']['value']}}">
                                </div>
                            </td>
                            <td class="text-right">元角模式：</td>
                            <td>
                                <select name="coefficient" style="width:100%" class="form-control input-xs">
                                    <option value>不限</option>
                                    @foreach($aCoefficient as $id => $value)
                                        <option value="{{ $id }}" {{ @$aSearchFields['coefficient']['value'] == $id ? 'selected' : '' }} >{{ $value }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td style="width:80px" class="text-right">追号状态：</td>
                            <td style="width:180px">
                                <select name="status" style="width:100%" class="form-control input-xs">
                                    <option value>不限</option>
                                    @foreach ($aStatus as $key => $value)
                                        <option value="{{ $key }}" {{ @$aSearchFields['status']['value'] === (string)$key ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>&nbsp</td>
                            <td>&nbsp</td>
                        </tr>

                        <tr>
                            <td class="text-right">游戏名称：</td>
                            <td>
                                <select id="lottery_id" name="lottery_id" style="width:100%"
                                        class="form-control input-xs">
                                    <option value>所有游戏</option>
                                    @foreach($aLotteries as $id =>$name)
                                        <option value="{{ $id }}" {{ @$aSearchFields['lottery_id']['value'] == $id ? 'selected' : '' }} >{{ $name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="text-right">游戏玩法：</td>
                            <td>
                                <select id="way_id" name="way_id" style="width:100%" class="form-control input-xs">
                                    <option value>所有玩法</option>
                                    @if(isset($aWays))
                                        @foreach($aWays as $val)
                                            <option value="{{ $val['id'] }}" {{ $val['id'] == $aSearchFields['way_id']['value'] ? 'selected' : '' }} >{{ $val['name'] }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </td>
                            <td class="text-right">游戏奖期：</td>
                            <td>
                                <select id="issue" name="issue" style="width:100%" class="form-control input-xs">
                                    <option value>所有奖期</option>
                                    @if(isset($aIssues))
                                        <?php
                                        $aNetIssues = [];
                                        ?>
                                        @foreach($aIssues as $val)
                                            <option value="{{ $val['name'] }}" {{ $val['name'] == $aSearchFields['issue']['value'] ? 'selected' : '' }} >{{ $val['name'] }}</option>
                                            <?php
                                            $aNetIssues[] = $val['name'];
                                            ?>
                                        @endforeach
                                        @if(isset($aSearchFields['issue']['value']) && $aSearchFields['issue']['value'] && !in_array($aSearchFields['issue']['value'],$aNetIssues))
                                            <option value="{{ $aSearchFields['issue']['value'] }}"
                                                    selected>{{ $aSearchFields['issue']['value'] }}</option>
                                        @endif
                                    @endif
                                </select>
                            </td>
                            <td class="text-right">每页条数：</td>
                            <td>
                                @include('w.pagesize')
                            </td>
                        </tr>

                    </table>
                </td>
                <td class="text-right">
                    <input class="btn btn-success" type="submit" id="submitForm" value="搜索"/>
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
            function resetSelectForm(selectId, title) {
                var selectDom = $("#" + selectId);
                selectDom.html("<option value>" + title + "</option>");
            }

            function setDatatoSelectForm(selectId, title, data) {
                var selectDom = $("#" + selectId);
                resetSelectForm(selectId, title);
                var optstr = "";
                $(data).each(function () {
                    if (selectId == 'way_id') {
                        optstr += "<option value='" + this.id + "'>" + this.name + "</option>";
                    } else if (selectId == 'issue') {
                        optstr += "<option value='" + this.name + "'>" + this.name + "</option>";
                    }
                });
                selectDom.append(optstr);
            }

            $('#lottery_id').change(function () {
                var lottery_id = $("#lottery_id").val();
                if (lottery_id > 0) {
                    $.ajax({
                        url: '/projects/?action=ajax&lottery_id=' + lottery_id,
                        type: 'GET',
                    }).done(function (data) {
                        jsonObj = eval("(" + data + ")");
                        lotteryWays = jsonObj.lottery_ways;
                        setDatatoSelectForm('way_id', '所有玩法', lotteryWays);
                        issues = jsonObj.issues;
                        setDatatoSelectForm('issue', '所有奖期', issues);
                    }).fail(function (data) {
                        alert('Getl Data Failed!', 'Tip');
                    });
                } else {
                    resetSelectForm('way_id', '所有玩法');
                    resetSelectForm('issue', '所有奖期');
                }
            });
        });
    </script>

@stop