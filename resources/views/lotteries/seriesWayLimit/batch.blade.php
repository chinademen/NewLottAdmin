@extends('l.admin', array('active' => $resource))

@section('title')
	@parent
	{{ $sPageTitle }}
@stop

@section('container')
	<div class="col-md-12">
		@include('w.breadcrumb')
		@include('w._function_title')
		@include('w.notification')

		<div class="panel panel-default">
			<div class=" panel-body">
				{!!  Form::open(['id' => 'batchSeriesWayLimit', 'class' => 'form-horizontal']) !!}

				<div class="form-group">
					{!! $oFormHelper->makeLabel('merchant_id', ___('_serieswaylimit.merchant_id'), false, 'col-sm-2 control-label') !!}
					<div class="col-sm-6">
						{!! Form::select('merchant_id', $aMerchantIds,null,['class' => 'form-control']) !!}
					</div>
					<div class="col-sm-4"></div>
				</div>

				<div class="form-group">
					{!! $oFormHelper->makeLabel('series_id', ___('_serieswaylimit.series_id'), false, 'col-sm-2 control-label') !!}
					<div class="col-sm-6">
						{!! Form::select('series_id', $aSeries,null,['class' => 'form-control']) !!}
					</div>
					<div class="col-sm-4"></div>
				</div>

				<div class="form-group">
					{!! $oFormHelper->makeLabel('lottery_id', ___('_serieswaylimit.lottery_id'), false, 'col-sm-2 control-label') !!}
					<div class="col-sm-6">
						{!! Form::select('lottery_id', [],null,['class' => 'form-control']) !!}
					</div>
					<div class="col-sm-4">
					</div>
				</div>
				<div class="form-group">
					{!! $oFormHelper->makeLabel('group_id', ___('_serieswaylimit.group_id'), false, 'col-sm-2 control-label') !!}
					<div class="col-sm-6">
						{!! Form::select('group_id', [],null,['class' => 'form-control']) !!}
					</div>
					<div class="col-sm-4">
					</div>
				</div>

				<div class="form-group">
					{!! $oFormHelper->makeLabel('series_way_id', __('_serieswaylimit.series_way_id'), false, 'col-sm-2 control-label') !!}
					<div class="col-sm-6">
						{!! Form::select('series_way_id',  [],null,['class' => 'form-control']) !!}
					</div>
					<div class="col-sm-4">
					</div>
				</div>
				<div class="form-group">
					{!! $oFormHelper->makeLabel('is_del', __('_serieswaylimit.is_del'), false, 'col-sm-2 control-label') !!}
					<div class="col-sm-6">
						{!! Form::select('is_del', [0 => 'No', 1 => 'Yes'],null,['class' => 'form-control']) !!}
					</div>
					<div class="col-sm-4">
					</div>
				</div>
				<div class="form-group">
					{!! $oFormHelper->makeLabel('prize', __('_serieswaylimit.prize'), false, 'col-sm-2 control-label') !!}
					<div class="col-sm-6">
						{!! Form::input('text','prize',null,['class' => 'form-control']) !!}
					</div>
					<div class="col-sm-4">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						{!! Form::submit(__('Submit'), ['class' => 'btn btn-success']) !!}
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@stop
@section('end')
	@parent
    <?php $aLotteries = json_encode($aLotteries); $aGroups = json_encode($aGroups); $aGroupWays = json_encode($aGroupWays);  print("<script language=\"javascript\">var aLotteries = $aLotteries; aGroups = $aGroups; aGroupWays = $aGroupWays; </script>\n"); ?>
	<script>
		$(function () {
		    function nodatanote(type){
		        var message = '';
		        switch(type){
					case 'lottery_id':
                        message ='未获取到彩种';
                        break;
					case 'group_id':
                        message ='未获取到玩法组';
                        break;
					case 'series_way_id':
                        message ='未获取到系列投注方式';
					    break;
				}
                switch(type){
                    case 'lottery_id':
                        $('#lottery_id').css('color','red').find('option').remove();
                        $('#lottery_id').append('<option value="-1">'+message+'<\/option>');
                    case 'group_id':
                        $('#group_id').css('color','red').find('option').remove();
                        $('#group_id').append('<option value="-1">'+message+'<\/option>');
                    case 'series_way_id':
                        $('#series_way_id').css('color','red').find('option').remove();
                        $('#series_way_id').append('<option value="-1">'+message+'<\/option>');
                        break;
                }
			}

			$('#series_id').change(function () {
				var iSeriesId = $(this).val();
                if(aLotteries[iSeriesId] == undefined){
                    nodatanote('lottery_id');
                    return false;
				}
                $('#lottery_id').css('color','').find('option').remove();
				$.each(aLotteries[iSeriesId],function (i,v) {
                    $('#lottery_id').append('<option value="'+i+'">'+v+'<\/option>')
                });

                if(aGroups[iSeriesId] == undefined){
                    nodatanote('group_id');
                    return false;
                }
                $('#group_id').css('color','').find('option').remove();
                $.each(aGroups[iSeriesId],function (i,v) {
                    $('#group_id').append('<option value="'+i+'">'+v+'<\/option>')
                });
                $('#group_id').change();

            });

            $('#group_id').change(function () {
                var iSeriesId = $('#series_id').val();
                var iGroupId = $(this).val();
                if(aGroupWays[iSeriesId][iGroupId] == undefined){
                    nodatanote('series_way_id');
                    return false;
                }
                $('#series_way_id').css('color','').find('option').remove();
                $('#series_way_id').append('<option value="0">ALL<\/option>')
                $.each(aGroupWays[iSeriesId][iGroupId],function (i,v) {
                    $('#series_way_id').append('<option value="'+i+'">'+v+'<\/option>')
                });
            });

            $('#series_id').change();

            $('#is_del').change(function () {
				var iIsDel = $(this).val();
				if(iIsDel == 1){
				    $('#prize').closest('.form-group').hide();
				}else{
                    $('#prize').closest('.form-group').show();
				}
            });
        })
	</script>
@stop