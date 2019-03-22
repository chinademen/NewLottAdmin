<div class="panel panel-default">
      <div class=" panel-body">
{!! Form::open(array('method' => 'get', 'class' => 'form-inline','id'=>'transaction_search_form')) !!}
          <input id="download_flag" name="download_flag"  value="" type="hidden" />
<table style="width:100%"><tr>
        <td style="width:150px;">
            <label for="controller" class="text-right">{{___('_transaction.transaction_type')}}：</label>
            <div class="form-group">
                <select name="type_id[]" size="5" multiple="multiple" class="form-control " style=" height: auto; width:120px;-webkit-appearance:inherit;">
                    <option value  @if(!isset($aSearchFields['type_id']) ||empty($aSearchFields['type_id'][0]))selected='selected' @endif>{{___('_transaction.all_transaction_types')}}..</option>
                    @foreach ($aTransactionTypes as $id=>$name)
                    <option value="{{$id}}" @if(@in_array($id,$aSearchFields['type_id']))selected='selected' @endif>{{$name}}</option>
                    @endforeach
                </select>
            </div>
        </td>
        <td style="width:980px">
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

                    <td style="width:100px" class="text-right">{{___('_transaction.serial_number')}}：</td>
                    <td style="width:150px"><input style="width: 100%" class="form-control input-xs" type="text" name="serial_number" value="{{@$aSearchFields['serial_number']}}"></td>

                    <td style="width:100px" class="text-right">{{___('_transaction.admin_user_id')}}：</td>
                    <td style="width:150px"><select name="admin_user_id" style="width:100%" class="form-control input-xs"><option value>{{___('_transaction.all')}}</option>@foreach($aAdminUsers as $id => $name)<option value="{{$id}}" @if(@$aSearchFields['admin_user_id']==$id)selected='selected' @endif>{{$name}}</option>@endforeach</select></td>
                </tr>
                <tr>
                    <td class="text-right">{{___('_transaction.created_at')}}：</td>
                    <td ><input class="form-control input-xs boot-time" type="text" name="created_at[]" value="{{@$aSearchFields['created_at'][0]}}" ></td>

                    <td class="text-right">{{___('_transaction.to')}}：</td>
                    <td ><input class="form-control input-xs boot-time" type="text" name="created_at[]" value="{{@$aSearchFields['created_at'][1]}}"  ></td>

                    <td class="text-right">{{___('_transaction.amount')}}：</td>
                    <td >
                        <input class="form-control input-xs" type="text" style="width:60px;" name="amount[]" value="{{@$aSearchFields['amount'][0]}}">
                        {{___('_transaction.to')}}
                        <input class="form-control input-xs" type="text" style="width:60px;" name="amount[]" value="{{@$aSearchFields['amount'][1]}}">
                    </td>
                </tr>
                <tr>
                    <td class="text-right">{{___('_transaction.ip')}}：</td>
                    <td><input class="form-control input-xs" type="text" name="ip" value="{{@$aSearchFields['ip']}}"></td>

                    <td class="text-right">{{___('_transaction.username')}}：</td>
                    <td><input class="form-control input-xs" type="text" name="serial_number" name="username" value="{{@$aSearchFields['username']}}"></td>

                    <td class="text-right">测试用户：</td>
                    <td>
                        <select name="is_tester" style="width:100%" class="form-control input-xs">
                            <option value>不限</option>
                            <option value="1" {{ @$aSearchFields['is_tester'] === '1' ? 'selected' : '' }}>是</option>
                            <option value="0" {{ @$aSearchFields['is_tester'] === '0' ? 'selected' : '' }}>否</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="text-right">{{___('_transaction.game-transaction')}}：</td>
                    <td>
                        <select name="lottery_id" style="width:100%" class="form-control input-xs"> <option value>{{___('_transaction.all')}}</option> <option value='NULL' @if(@$aSearchFields['lottery_id']=='NULL')selected='selected' @endif>{{___('_transaction.not-game-transaction')}}</option>@foreach($aLotteries as $id =>$name) <option value="{{$id}}"@if(@$aSearchFields['lottery_id']==$id)selected='selected' @endif> {{$name.___('_model.transaction')}}</option> @endforeach</select>
                    </td>

                    <td class="text-right">{{___('_transaction.coefficient')}}：</td>
                    <td >
                        <select name="coefficient" style="width:100%" class="form-control input-xs"><option value>{{___('_transaction.all')}}</option>@foreach($aCoefficients as $id=>$value)<option value="{{$id}}" @if(@$aSearchFields['coefficient']==$id)selected='selected' @endif>{{$value}}</option>@endforeach</select>
                    </td>

                    <td  class="text-right">{{___('_transaction.pagesize')}}：</td>
                    <td><select name="pagesize" style="width:100%" class="form-control input-xs"><option value="15" @if(@$aSearchFields['pagesize']==15)selected='selected' @endif>15</option><option value="30"@if(@$aSearchFields['pagesize']==30)selected='selected' @endif>30</option><option value="50"@if(@$aSearchFields['pagesize']==50)selected='selected' @endif>50</option><option value="100"@if(@$aSearchFields['pagesize']==100)selected='selected' @endif>100</option></select></td>

                </tr>
            </table>
        </td>
        <td class="text-right">
            <a class="btn btn-success"  id="submit_transaction">{{___('_transaction.search')}}</a>
            <a class="btn btn-default"  id="download_transaction">下载数据报表</a>
        </td>
    </tr></table>
<?php
echo Form::hidden('is_search');
echo Form::close();
?>
</div></div>
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

        $('#download_transaction').click(function () {
            $('#transaction_search_form').attr('action','/transactions/download');
            $('#transaction_search_form').submit();
        });

        $('#submit_transaction').click(function () {
            $('#transaction_search_form').attr('action','/transactions');
            $('#transaction_search_form').submit();
        });

    });
</script>

@stop