
<div class="form-group">
    <label for="title" class="col-sm-2 control-label">*{{ ___('_sys_dictionaries.name') }}</label>
    <div class="col-sm-6">
        <input id="name" class="form-control" name="name" type="text" value="{{ $data->name }}"></div>
</div>
<div class="form-group  portrait">
    <label class="col-sm-2 control-label" for="portrait">是否父级</label>
    <div class="col-sm-6">
        <input type="checkbox" id="open" name="functionality_id[]" nameval="员工异常处理" onchange="changePostId()" >
    </div>
</div>


<div class="form-group" id="tmp">
    <label for="view_type" class="col-sm-2 control-label">系统类别</label>
    <div class="col-sm-6">
        <select id="type" class="form-control " name="type">
            <option value = "">请选择</option>
            @foreach($oTypeList as $oType)
                <option @if($data->type==$oType->id) selected @endif value = "{{$oType->id }}">{{ $oType->name }}</option>
            @endforeach
        </select></div>
</div>


<div class="form-group" id="tmp1">
    <label for="title" class="col-sm-2 control-label">*{{ ___('_sys_dictionaries.uniqueid') }}</label>
    <div class="col-sm-6">
        <input id="uniqueid" class="form-control" name="uniqueid" type="text" value="{{ $data->uniqueid }}"></div>
</div>

<div class="form-group">
    <label for="view_type" class="col-sm-2 control-label">{{ ___('_sys_dictionaries.status') }}</label>
    <div class="col-sm-6">
        <select id="status" class="form-control " name="status">
            @foreach($aViewTypeList as $key => $val)
                <option @if($data->status==$key) selected @endif value = "{{$key }}">{{ $val }}</option>
            @endforeach
        </select></div>
</div>

<div class="form-group">
    <label for="description" class="col-sm-2 control-label">{{ ___('_sys_dictionaries.remk') }}</label>
    <div class="col-sm-6">
        <textarea class="form-control" name="remk" cols="30" rows="2">{{ $data->remk }}</textarea>
    </div>
</div>


{{--<div class="form-group">--}}
    {{--<label for="title" class="col-sm-2 control-label">*{{ ___('_sys_dictionaries.type') }}</label>--}}
    {{--<div class="col-sm-6">--}}
        {{--<input id="type" class="form-control" name="type" type="text" value="{{ $data->type }}"></div>--}}
{{--</div>--}}






{{--<div class="form-group  portrait">--}}
    {{--<label class="col-sm-2 control-label" for="portrait">{{ ___('_sys_dictionaries.picture') }}</label>--}}
    {{--<div class="col-sm-6">--}}
        {{--<input name="portrait[]" id="portrait" type="file" class="form-control" style="padding:5px;" value="">--}}
        {{--<img src="{{ $data->picture }}" width="200" height="200"/>--}}
    {{--</div>--}}
{{--</div>--}}

