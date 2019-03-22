<?php echo script('/js/echarts.common.min.js'); ?>

<?php $__env->startSection('container'); ?>
	<div class="col-md-12" style="z-index: 100;">

		


		<?php echo $__env->make('w.notification', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<div class="row laydate_body" >
			<div class="panel panel-default">
				<div class=" panel-body">
					<form method="get" class="form-inline">

						<label for="created_at_form"><?php echo e(___('_basic.date_from')); ?></label>
						<div class="form-group">
							<input type="text" class="form-control boot-day input-group date form_date input-xs" name="start_date" value="" id="start_date">
						</div>
						<label for="created_at_to"><?php echo e(___('_basic.date_to')); ?> </label>
						<div class="form-group">
							<input type="text" class="form-control boot-day input-group date form_date input-xs" name="end_date" value="" id="end_date">
						</div>
						<div class="form-group pull-right">
							<button type="submit" class="btn btn-success btn-xs"><?php echo e(___('_basic.search')); ?></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div id="chart" class="row" style="height:400px;margin: 20px;padding-bottom: 50px;margin-top: 0px;"></div>
    <hr/>
	<div id="map2" class="row" style="height:400px;margin:20px ;"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('end'); ?>

	<script>
        var aData = <?php echo $sData??''; ?>;
        var map1 = aData['map1'];
        var map2 = aData['map2'];
        console.log(map1,map2);
        var echart_map1=echarts.init(document.getElementById('chart'),'light');
        option = {
            toolbox: {
                show : true,
                feature : {
                    mark : {show: true},
                    dataView : {show: true, readOnly: false},
                    magicType: {show: true, type: ['line', 'bar']},
                    restore : {show: true},
                    saveAsImage : {show: true}
                }
            },
            title: {
                text: '官彩/自主彩统计',
                subtext: '统计时间:'+map1['countDate']
            },
            tooltip: {
                trigger: 'axis',
                axisPointer: {
                    type: 'shadow'
                }
            },
            legend: {
                data: ['投注', '派奖']
            },
            grid: {
                top:'25%',
                left: '3%',
                right: '4%',
                bottom: '30%',
                containLabel: true
            },
            xAxis: {
                name : '单位/元',
                type: 'value',
            },
            yAxis: {
                name : '官彩/自主彩',
                type: 'category',
                data: ['自主彩','官彩']
            },
            series: [
                {
                    name: '投注',
                    type: 'bar',
                    data: map1['bet']
                },
                {
                    name: '派奖',
                    type: 'bar',
                    data: map1['award']
                }
            ]
        };
        //每次窗口大小改变的时候都会触发onresize事件，这个时候我们将echarts对象的尺寸赋值给窗口的大小这个属性，从而实现图表对象与窗口对象的尺寸一致的情况
        window.onresize = echart_map1.resize;
        echart_map1.setOption(option);
	</script>
	<script>
        var myChart=echarts.init(document.getElementById('map2'),'light');
            myChart.hideLoading();
            window.onresize = myChart.resize;
            option_map2 = {
                tooltip : {
                    trigger: 'axis',
                    axisPointer: {
                        type: 'shadow',
                        label: {
                            show: true
                        }
                    }
                },
                toolbox: {
                    show : true,
                    feature : {
                        mark : {show: true},
                        dataView : {show: true, readOnly: false},
                        magicType: {show: true, type: ['line', 'bar']},
                        restore : {show: true},
                        saveAsImage : {show: true}
                    }
                },
                calculable : true,
                title: {
                    text: '净投注/净派奖/净入款/净出款',
                    subtext: '统计时间:'+map2['countDate']
                },
                legend: {
                    data:[
                        {name:'投注'},
                        {name:'派奖'},
                        {name:'充值'},
                        {name:'提现'},
                    ],
                    /*itemGap: 5*/
                },
                grid: {
                    top: '25%',
                    left: '4%',
                    right: '3%',
                    containLabel: true
                },
                xAxis: [
                    {
                        name : '时间',
                        type : 'category',
                        data : map2['xAxis']
                    }
                ],
                yAxis: [
                    {
                        type : 'value',
                        name : '单位/元',
                        axisLabel: {
                            /*formatter: function (a) {
                                a = +a;
                                return isFinite(a)
                                    ? echarts.format.addCommas(+a / 1000)
                                    : '';
                            }*/
                        }
                    }
                ],
                /*dataZoom: [ // 底部 和右侧滑块
                    {
                        show: true,
                        start: 94,
                        end: 100
                    },
                    {
                        type: 'inside',
                        start: 10,
                        end: 100
                    },
                    {
                        show: true,
                        yAxisIndex: 0,
                        filterMode: 'empty',
                        width: 30,
                        height: '80%',
                        showDataShadow: false,
                        left: '93%'
                    }
                ],*/
                series : [
                    {
                        name: '投注',
                        type: 'line',
                        data: map2['bet']
                    },
                    {
                        name: '派奖',
                        type: 'line',
                        data:  map2['award']
                    },
                    {
                        name: '充值',
                        type: 'line',
                        data:  map2['load']
                    },
                    {
                        name: '提现',
                        type: 'line',
                        data:  map2['withdraw']
                    }
                ]
            };

            myChart.setOption(option_map2);

	</script>
<?php $__env->stopSection(); ?>






<?php echo $__env->make('l.base', array('active' => 'dashboard'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>