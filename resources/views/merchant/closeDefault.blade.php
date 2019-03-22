@extends('l.base', ['active' => $resource])
@section('title')
	@parent
	{{ $sPageTitle }}
@stop
@section('container')
	<div class="container">
		@include('w.breadcrumb')
		@include('w._function_title')
		@include('w.notification')
		<div class=" time-top">
			<i class="glyphicon glyphicon-time"></i>{{ ___('_basic.data-time') . ':' . $sDataUpdatedTime }}
		</div>
		<div class="panel panel-default  J-tab-chart">
			<table id="data_list">
				<thead>
				<tr>
					@foreach( $aColumnForList as $sColumn )

						<th class="text-center">
							{{ (___($sLangPrev . $sColumn, null, 3)) }}
						</th>
					@endforeach
					<th class=" text-center">{{ ___('_basic.actions') }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach ($datas as $data)
					<tr>
						{!! ViewHelper::displayForIndex($data, $aColumnForList, $aViewSettings, $aArrayVars, [], [], $aTotals) !!}
						<td>
							@if($data->status == 1)
								<a href="javascript:;" class="btn btn-success" onclick="btn({{$data->id}},1,{{$iMerchant_id}})"  target="_self">{{baseOption('base.merchant.close_status')[1]}}</a>
							@else
								<a href="javascript:;" class="btn btn-danger" onclick="btn({{$data->id}},0,{{$iMerchant_id}})" target="_self">{{baseOption('base.merchant.close_status')[0]}}</a>
							@endif
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>

	</div>
	<script type="text/javascript">
		var flag = true;
        function btn(id,status,merchant_id){
            if(flag){
                flag = false;
				$.ajax({
					'type':'get',
					'dataType':'json',
					'data':{id:id,status:status,merchant_id:merchant_id},
					'url':'{{route($sRoute)}}',
					'success':function(){
						window.location.reload();
					},
					'error':function(){
                        flag = true;
					}
				})
            }
		}
	</script>
@stop