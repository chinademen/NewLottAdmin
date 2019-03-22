<div class="form-group">
    <label class="col-sm-3 control-label">文章标题</label>
    <div class="col-sm-5">
        <input class="form-control" type="text" name="title" value="{{isset($aData['title']) ? $aData['title'] : ''}}"
               placeholder="请填写文章标题"/>
    </div>
</div>


<div class="form-group">
    <label class="col-sm-3 control-label">文章分类</label>
    <div class="col-sm-5">
        <select class="form-control" name="category">
            @if(isset($aCategory))
                @foreach($aCategory as $key => $value)
                    <option value="{{$value->id}}"
                            @if(isset($aData) && $aData['category'] == $value->id) selected="selected" @endif>{{$value->name}}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label">是否置顶</label>
    <div class="col-sm-5">
        <select class="form-control" name="is_top">
            <option value="0" {{isset($aData['is_top']) && $aData['is_top'] == 0 ? 'selected' : ''}}>否</option>
            <option value="1" {{isset($aData['is_top']) && $aData['is_top'] == 1 ? 'selected' : ''}}>是</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label">状态</label>
    <div class="col-sm-5">
        <select class="form-control" name="status">
            <option value="0" {{isset($aData['status']) && $aData['status'] == 0 ? 'selected' : ''}}>正常</option>
            <option value="1" {{isset($aData['status']) && $aData['status'] == 1 ? 'selected' : ''}}>下架</option>
        </select>
    </div>
</div>


<div class="form-group">
    <label class="col-sm-3 control-label">内容页</label>
    <div class="col-sm-9">
        {!!  UEditor::content(html_entity_decode( isset($aData['content']) ? $aData['content']: ''), ['name'=>'content']) !!}

    </div>
</div>