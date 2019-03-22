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
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action=""  autocomplete="off">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="_method" value="PUT" />
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">{{ __('_seriesway.series_id') }}</label>
                    <div class="col-sm-6">
                        {{ $series }}
                    </div>
                    <div class="col-sm-4"></div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">*{{ __('_seriesway.name') }}</label>
                    <div class="col-sm-6">
                        {{ $data->name }}
                    </div>
                    <div class="col-sm-4"></div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">*{{ __('_seriesway.bet_note') }}</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" rows="3" name='bet_note'>{{ $data->bet_note }}</textarea>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">*{{ __('_seriesway.bonus_note') }}</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" rows="3" name='bonus_note'>{{ $data->bonus_note }}</textarea>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <a class="btn btn-default" href="{{--   --}}">{{ __('Reset') }}</a>
                      <button type="submit" class="btn btn-success">{{ __('Submit') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
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