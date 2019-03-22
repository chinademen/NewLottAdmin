<!--copyrights-->
<div class="copyrights">
    <div class="wrap1200 clearfix">
        <img src="/img/logo.png" alt="">
        <div class="right-wrap">
            <div class="links">
                <a href="javascript:"><?php echo e(___('_main.trade rules')); ?></a><i>|</i><a
                        href="javascript:"><?php echo e(___('_main.use protocol')); ?></a><i>|</i><a
                        href="javascript:"><?php echo e(___('_main.tariff description')); ?></a><i>|</i><a
                        href="javascript:"><?php echo e(___('_main.contact us')); ?></a>
            </div>
            <p>©2010-2018 GOLDEN ASIA . ALL RIGHT RESERVED</p>
        </div>
    </div>
</div>

<?php echo $__env->yieldContent("window"); ?>

<script src="/js/jquery-1.10.1.min.js"></script>
<script src="/js/layui/layui.js"></script>
<script src="/js/swiper.min.js"></script>
<script src="/js/main.js"></script>

<script>
    var popup = popup || {}
    layui.use(['layer'], function () {
        var layer = layui.layer

        // 弹窗函数
        popup.loginPop = function () {
            layer.open({
                title: $("#title-top").html(),
                type: 1,
                area: '540px',
                // skin: 'layui-layer-demo', //样式类名
                closeBtn: 1, //不显示关闭按钮
                // shadeClose: true, //开启遮罩关闭
                content: $('.sellpop'),
                btn: 'confirm',
                yes: function (index, layero) {
                    layer.close(index) // 关闭窗口
                }
            })
        }
    })
</script>