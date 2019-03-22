<div class="form-group">
    <label class="col-sm-3 control-label">*{{___("_adlist.title")}}</label>
    <div class="col-sm-5">
        <input class="form-control" type="text" name="title" value="{{isset($data->title) ? $data->title : ''}}"
               placeholder="请填写{{___("_adlist.title")}}"/>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">*{{___("_adlist.content")}}</label>
    <div class="col-sm-5">
        <input class="form-control" type="text" name="content" value="{{isset($data->content) ? $data->content : ''}}"/>
        <span class="btn btn-info" id="J-upload-btn-content">文件上传</span>
        <span class="tips" role="alert"></span>
    </div>

</div>

<div class="form-group">
    <label class="col-sm-3 control-label">*{{___("_adlist.url")}}</label>
    <div class="col-sm-5">
        <input class="form-control" type="text" name="url" value="{{isset($data->url) ? $data->url : ''}}"
               placeholder="请填写{{___("_adlist.url")}}"/>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">{{___("_adlist.level")}}</label>
    <div class="col-sm-5">
        <select class="form-control" name="level">
            @foreach ($aLevel as $key=>$value)

                <option value="{{$key}}" {{$key == $data->level ? 'selected' : ''}}>{{$value}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">{{___("_adlist.type")}}</label>
    <div class="col-sm-5">
        <select class="form-control" name="type">
            @foreach ($aTypes as $key=>$value)
                <option value="{{$key}}" {{$key == $data->type ? 'selected' : ''}}>{{$value}}</option>
            @endforeach
        </select>
    </div>
</div>