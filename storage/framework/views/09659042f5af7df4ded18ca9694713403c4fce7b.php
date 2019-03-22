<!--copyrights-->
<div class="copyrights">
    <div class="wrap1200 clearfix">
        <img src="/img/logo.png" alt="">
        <div class="right-wrap">
            <div class="links">
                <a href="javascript:"><?php echo e(___('_main.footer.trade_rules')); ?></a><i>|</i><a
                        href="javascript:"><?php echo e(___('_main.footer.use_protocol')); ?></a><i>|</i><a
                        href="javascript:"><?php echo e(___('_main.footer.tariff_description')); ?></a><i>|</i><a
                        href="javascript:"><?php echo e(___('_main.footer.contact_us')); ?></a>
            </div>
            <p>©2010-<?php echo e(date("Y-m-d")); ?> GOLDEN ASIA . ALL RIGHT RESERVED</p>
        </div>
    </div>
</div>

<?php echo $__env->yieldContent("window"); ?>

<?php echo e(script('jquery')); ?>

<?php echo e(script('layui')); ?>

<?php echo e(script('swiper')); ?>

<?php echo e(script('main')); ?>


<script type="application/javascript">
    layui.use(['layer'], function () {
        var layer = layui.layer

        //页面提示
        <?php if($message = Session::get('success')): ?>
        layer.msg("<?php echo e($message); ?>", {icon: 1})
        <?php endif; ?>

        <?php if($message = Session::get('error')): ?>
        layer.msg("<?php echo e($message); ?>", {icon: 2})
        <?php endif; ?>

        <?php if($message = Session::get('warning')): ?>
        layer.msg("<?php echo e($message); ?>", {icon: 3})
        <?php endif; ?>

        <?php if($message = Session::get('info')): ?>
        layer.msg("<?php echo e($message); ?>", {icon: 4})
        <?php endif; ?>
    })
</script>


