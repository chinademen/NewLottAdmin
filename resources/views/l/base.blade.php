<!DOCTYPE html>
<html>
<head>
    <title>
        @section('title')
        @show
    </title>
    @if (isset($iRefreshTime) && $iRefreshTime)
        <meta http-equiv="refresh" content="{{ $iRefreshTime }}">
    @else
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description')">{{-- 页面描述 --}}
    <meta name="keywords" content="@yield('keywords')"/> {{-- 页面关键词 --}}
    <meta name="_token" content="{{ csrf_token() }}"/>
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    @section ('styles')
        {!! style('ui' ) !!}
        {!! style('ui-new' ) !!}
        @show
    <script>
        var ServerHttpHost = 'http://{{$_SERVER['HTTP_HOST']}}';

        (function (H) {
            H.className = H.className.replace(/\bno-js\b/, 'js')
        })(document.documentElement)
    </script>
</head>
<body>
@yield('container')

@section('javascripts')
    {!! script('jquery') !!}
    {!! script('bootstrap') !!}
@show

@section('js-code')
    {!! script('datepicker') !!}
    {!! script('switch') !!}
    {!! script('upload-files') !!}
@show

@section('end')
@show
</body>
</html>