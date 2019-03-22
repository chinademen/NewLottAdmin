<!DOCTYPE html>
<html class="g-box">
<head>
    <title>{{ env('APP_ENV') . __('_basic.app-title') }} </title>
    @section ('styles')
        {!! style('ui' ) !!}
    @show
</head>
<body class="g-box">
<div class="g-box">
    <div class="g-l" id="menuContainer">
        <div class="logo" miniLogo='{{ $aBaseInfo['mini-logo'] }}' logo="{{ $aBaseInfo['logo'] }}"
             title="{{ $aBaseInfo['app-title'] }}">
            {{ $aBaseInfo['logo'] }}
        </div>
        <div class="side-menu" id="J-side-box">
            @foreach ($aMenus as $key => $aMenu)
                <?php if (!isset($aMenu['children']) || !count($aMenu['children'])) continue; ?>
                <div class="side-li-box">
                    <div class="side-li-name">
                        <div class="li-name">
                            <i class="glyphicon glyphicon-book"></i>
                            <font>{{ ___('_function.' . $aMenu['title']) }} </font>
                        </div>
                    </div>

                    <div class="side-box">
                        @foreach ($aMenu['children'] as $aSubMenu)
                            <?php
                            if (isset($aSubMenu['route_name']) && $aSubMenu['route_name']) {
                                $sUrl = route($aSubMenu['route_name']);
                                !$aSubMenu['params'] or $sUrl .= '?' . $aSubMenu['params'];
                            } else {
                                $sUrl = 'javascript:void(0);';
                            }
                            $sTarget = $aSubMenu['new_window'] ? '_blank' : 'main';
                            ?>
                            <div class="side-li">
                                <a target="{{ $sTarget }}"
                                   href="{{ $sUrl }}">{{ ___( '_function.' . $aSubMenu['title']) }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="g-c">
        <div class="heard-top" id="headerContainer">
            <div class="pull-left">
                <span class="menu-btn" id="J-side-tog-btn"></span>
                <div class="alarm">
                    <span class="alarm-title glyphicon glyphicon-volume-up" aria-hidden="true"></span>
                    <div class="alarm-body">
                        <div class="alarm-group">

                        </div>
                    </div>

                </div>
            </div>


            <div class="pull-right">

                {{--<span title="" class="glyphicon glyphicon-stats"></span>--}}
                <a target="main" href="<?=route('admin-users.change-password')?>"
                   class="btn btn-link">{{ $aLoginUser['username'] }}</a>
                <span class="exit-box">
                            <a target="_parent" href="/auth/logout" title="{{___('_basic.logout')}}"
                               class="btn btn-link">
                                <span class="glyphicon glyphicon-off"></span>
                            </a>
                         </span>
            </div>
        </div>
        <iframe name="main" id="contentContainer" src="{{ $sMainUrl }}" style="border:0;"></iframe>
    </div>
</div>

@section('javascripts')
    {!! script('jquery') !!}
    {!! script('bootstrap') !!}
    {!! script('menu') !!}
    <script>
        $(function () {
            var alarmFun = function () {
                var oAlarm = $('.alarm').first();
                var oAlarmGroup = oAlarm.find('.alarm-group').first();
                //ajax 轮询请求时间
                var ajaxSpeed = 60 * 1000;
                //滚动 一行的移动时间，其余时间停止不动
                var moveSpeed = 500;
                //滚动 轮询换行时间时间,有语音的时候会根据语音长度+1秒轮询
                var scrollSpeed = 2000;
                //滚动 定时任务
                var timeScrollMove;
                //当前滚动行数
                var scrollTimes = -1;
                //语音播放剩余时长
                var restSpeakTime = 0;
                //是否暂停滚动
                var stopScroll = false;
                //请求实时通知数据
                var getAlarmData = function () {
                    $.ajax({
                        type: "get",
                        url: '<?=route('alarms.get-alarm-data')?>',
                        dataType: "json",
                        success: function (json) {
                            if (json.status == 200) {
                                var liStr = '';
                                $.each(json.data, function (i, v) {
                                    if (v.url != '') {
                                        liStr += '<a target="main" href="' + v.url + '"';
                                    } else {
                                        liStr += '<a href="javascript;void();"';
                                    }
                                    liStr += ' data-keyword="' + v.keyword + '" data-is_audio="' + v.is_audio + '" data-audio_url="' + v.audio_url + '" data-audio_length="' + v.audio_length + '" class="alarm-list">' + v.content + '</a>';
                                });
                                oAlarmGroup.html(liStr);
                            } else {
                                oAlarmGroup.find('a').remove();
                            }

                            if (!timeScrollMove) {
                                scrollMove();
                                timeScrollMove = setInterval(scrollMove, scrollSpeed);
                            }

                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            oAlarmGroup.find('a').remove();
                        }
                    });
                }
                getAlarmData();
                setInterval(getAlarmData, ajaxSpeed);
                //函数 滚动
                var scrollMove = function () {
                    //如果没有数据就不移动,并且隐藏通知提示框
                    if (oAlarmGroup.find('a').size() == 0) {
                        oAlarm.hide();
                        return false;
                    }
                    //减少休息时间，等小于等于0后继续下一次轮询（下面if判断）
                    restSpeakTime = restSpeakTime - scrollSpeed;
                    //暂停滚动 或者 在休息
                    if (stopScroll || restSpeakTime > 0) {
                        return false;
                    }
                    //如果是隐藏的,显示并且停留一次
                    if (oAlarm.css('display') == 'none') {
                        console.log('0');
                        playVideo(0);
                        oAlarm.css('display', 'inline-block');
                        return false;
                    }
                    //初始化当前滚动高度
                    var bodyScrollTop = 0;
                    //如果有临时数据就删除
                    if (oAlarmGroup.find('a[data-temp="true"]').size()) oAlarmGroup.find('a[data-temp="true"]').remove();
                    //数据总数
                    var allSize = oAlarmGroup.find('a').size();
                    //当前需要滚动的行数大于等于总数 ，说明数据量变少了，重新回到第一行滚动
                    if (scrollTimes == -1 || scrollTimes >= allSize) {
                        scrollTimes = 0;
                        oAlarmGroup.css('top', 0);
                    }
                    //滚动到最后一行需要把第一行添加到最后，无缝衔接
                    if (scrollTimes + 1 == allSize) {
                        oAlarmGroup.append(oAlarmGroup.find('a:first').clone().attr('data-temp', 'true'));
                    }
                    //计算当前目的行位于div中高度，用于计算本次向上偏移量
                    oAlarmGroup.find('a:lt(' + scrollTimes + ')').each(function (i, v) {
                        bodyScrollTop += $(this).height();
                    });
                    //本次应该向上偏移多少
                    bodyScrollTop = bodyScrollTop + oAlarmGroup.find('a:eq(' + (scrollTimes + 1) + ')').height();
                    //播放音频文件
                    playVideo(scrollTimes + 1);
                    //向上移动动画
                    oAlarmGroup.animate({top: '-' + bodyScrollTop + 'px'}, moveSpeed, function () {
                        scrollTimes++;
                    });

                }
                //函数 播放音频 ，并且判断轮询时间，如果由音频文件，音频时长+1为轮询时间
                var playVideo = function (times) {
                    var obj = oAlarmGroup.find('a:eq(' + (times) + ')');
                    if (obj.attr('data-is_audio') == '1' && obj.attr('data-audio_url')) {
                        if (restSpeakTime <= 0) {
                            oAlarmGroup.find('a[data-keyword="' + obj.attr('data-keyword') + '"]').attr('data-is_audio', '0');
                            restSpeakTime = parseInt(obj.attr('data-audio_length')) * 1000;
                            speckUrl(obj.attr('data-audio_url'));
                        }
                    } else {
                        restSpeakTime = scrollSpeed;
                    }
                }
                //鼠标停留暂停轮询
                oAlarm.hover(function () {
                    stopScroll = true;
                }, function () {
                    stopScroll = false;
                });
            }
            alarmFun();
        })

        function speckUrl(url) {
            var audio = new Audio(url);
            audio.play();
        }
    </script>
@show
</body>
</html>