@extends('l.base', array('active' => $resource))

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
            <div class="panel-body">

                <div class="alert alert-danger" role="alert">
                @foreach($aErrorMessage as $key => $error_message)

                    <b>{{$error_message}}</b>
                    <br>
                @endforeach
                </div>


            </div>
        </div>
    </div>
@stop

