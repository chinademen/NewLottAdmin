<style type="text/css">
	/* 半透明的遮罩层 */
	#overlay {
		background: #000;
		filter: alpha(opacity=50); /* IE的透明度 */
		opacity: 0.5; /* 透明度 */
		display: none;
		position: absolute;
		top: 0px;
		left: 0px;
		width: 100%;
		height: 100%;
		z-index: 100; /* 此处的图层要大于页面 */
		display: none;
	}

	#blocked_box {
		z-index: 500;
		position: absolute;
		left: 30%;
		top: 30%;
		width: 40%;
		display: none;
	}
</style>
<?php
$aClass = [
    1 => 'btn-default',
    2 => 'btn-success',
    3 => 'btn-danger',
];
$aTranslateKeys = [];
foreach ($buttons['itemButtons'] as $element){
if(!$aConfig = $element->compileItemButtonHref($data)){
    continue;
}
extract($aConfig);
$onclick or $aTranslateKeys[ $element->button_onclick ] = $element->confirm_msg_key;
$sClass = 'btn '.$aClass[ $element->button_type ];
$sOnclick = $onclick ? "onclick=\"$onclick\"" : '';
?>

@if($element->id == 32924) {{--冻结--}}
@if($data->blocked == 0)
	<a href="{{ $href }}" class="{{ $sClass }}" target="{{ $element->target }}" onclick="showTable({{$data->id}})">{{
         ___('_users.blocked') }}</a>
@else
	<a href="{{ $href }}" class="btn btn-success" target="{{ $element->target }}" onclick="showTable({{$data->id}})">{{ ___('_users.unblocked') }}</a>
@endif
@else
	<a href="{{ $href }}" class="{{ $sClass }}" target="{{ $element->target }}" {!! $sOnclick !!}>{{ ___( $element->label) }}</a>
@endif

<?php
}
?>{{--遮罩层--}}
<div id="overlay" onclick="closeLay()"></div>

{{--冻结表单--}}
<div id="blocked_box" class="blocked_box{{$data->id}} class_box">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title" id="myModalLabel">{{$data->username}} -- @if($data->blocked == 0) {{___('_users.blocked')}} @else {{___('_users.unblocked')}} @endif</h4>
		</div>
		<form method="POST" action="{{route('users.blocked-user',['id'=>$data->id])}}" accept-charset="UTF-8" id="block-user" class="form-horizontal">
			{{csrf_field()}}
			<div class="modal-body">
				@if($data->blocked == 0)
					<div class="form-group">
						<label for="blocked" class="col-sm-5 control-label">{{___('_users.blocked_type')}}</label>
						<div class="col-sm-5">
							<select class="form-control" name="blocked" id="blocked">
								@foreach($aBlockedTypes as $key => $val)
									@if($key!==0)
										<option value="{{$key}}">{{$val}}</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>
				@endif
				<div class="form-group">
					<label for="comment" class="col-sm-5 control-label">{{___('_users.comment')}}</label>
					<div class="col-sm-5"><textarea name="comment" cols="30" rows="2"></textarea></div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-default" data-dismiss="modal" onclick="closeLay()">{{___('_users.cancel')}}</button>
				<button type="submit" class="btn btn-sm btn-danger">{{___('_users.ok')}}</button>
			</div>
		</form>
	</div>
</div>
