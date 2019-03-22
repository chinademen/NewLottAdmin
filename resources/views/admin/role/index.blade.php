@extends('l.base', array('active' => $resource))

@section('title')
@parent
{{ ___('Admin') . $resourceName . ___('Management') }}
@stop

@section('container')

<div class="col-md-12">

    <div class="h2">{{ ___('Admin') . $resourceName . ___('Management') }}
        <div class=" pull-right" role="toolbar" >
            {!! Form::open(array('method' => 'get', 'class' => 'form-inline pull-right')) !!}
            <div class="form-group">
                {!!
                    Form::select(
                        'target',
                        array('name' => ___('Role Name'), 'description' => ___('Description')),
                        Input::get('target', 'name'),
                        array('class' => 'form-control')
                    )
                !!}
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="like" placeholder="请输入搜索条件" value="{{ Input::get('like') }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn  btn-primary"><i class="glyphicon glyphicon-search"></i>{{ ___('Search') }}</button>
            </div>
             @foreach ($buttons['pageButtons'] as $element)
            <div class="form-group">
               <a  href="{{ $element->route_name ? route($element->route_name) : 'javascript:void(0);' }}" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i> {{ ___($element->label) }}</a>
            </div>
            @endforeach
        {!! Form::close() !!}
        </div>
    </div>

    @include('w.breadcrumb')
    @include('w.notification')

    <div class="panel panel-default">
        <table class="table table-striped table-hover">
            <thead class="thead-mini  thead-inverse">
                <tr>
                    <th>{{ ___('Role Name') }} {{ ViewHelper::orderBy('name') }}</th>
                    <th>{{ ___('Description') }} {{ ViewHelper::orderBy('description') }}</th>
                    <th>{{ ___('Priority') }} {{ ViewHelper::orderBy('priority') }}</th>
                    <th>{{ ___('Is System') }} {{ ViewHelper::orderBy('is_system') }}</th>
                    <th>{{ ___('Right Settable') }} {{ ViewHelper::orderBy('right_settable') }}</th>
                    <th>{{ ___('User Settable') }} {{ ViewHelper::orderBy('user_settable') }}</th>
                    <th>{{ ___('Disabled') }} {{ ViewHelper::orderBy('disabled') }}</th>
                    <th>{{ ___('Sequence') }} {{ ViewHelper::orderBy('sequence', 'asc') }}</th>
                    <th>{{ ___('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                <tr>
                    <td>{{ $data->name }}</td>
                    <td>{{ ___( $data->description) }}</td>
                    <td>{{ $data->priority }}</td>
                    <td>{{ yes_no($data->is_system) }}</td>
                    <td>{{ yes_no($data->right_settable) }}</td>
                    <td>{{ yes_no($data->user_settable) }}</td>
                    <td>{{ yes_no($data->disabled) }}</td>
                    <td>{{ $data->sequence }}</td>
                    <td>
                        @foreach ($buttons['itemButtons'] as $element)
                            @if ($element->btn_type == 1)
                            <a href="javascript:void(0)" class="btn btn-xs btn-embossed btn-danger"
                             onclick="modal('{{ $element->route_name ? route($element->route_name, $data->id) : 'javascript:void(0);' }}')">{{ ___( $element->label) }}</a>
                            @elseif ($element->btn_type == 2)
                            <a href="{{ $element->route_name ? route($element->route_name, $data->id) : 'javascript:void(0);' }}" class="btn btn-xs btn-embossed btn-success">{{ ___( $element->label) }}</a>
                            @else
                            <a  href="{{ $element->route_name ? route($element->route_name, str_contains($element->route_name, 'index') ? ['id' => $data->id] : $data->id) : 'javascript:void(0);' }}" class="btn btn-xs btn-embossed btn-default" > {{ ___( $element->label) }}</a>
                            @endif
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {!! $datas->appends(Input::except('page'))->render() !!}
</div>

<?php
$modalData['modal'] = array(
    'id'      => 'myModal',
    'title'   => '系统提示',
    'message' => '确认删除此'.$resourceName.'？',
    'footer'  =>
        Form::open(array('id' => 'real-delete', 'method' => 'delete')).'
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">取消</button>
            <button type="submit" class="btn btn-sm btn-danger">确认删除</button>'.
        Form::close(),
);
?>
    @include('popup.modal', $modalData)

@stop

@section('end')
    @parent
    <script>
        function modal(href)
        {
            $('#real-delete').attr('action', href);
            $('#myModal').modal();
        }
    </script>
@stop

