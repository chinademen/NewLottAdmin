<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php echo $__env->yieldContent("title"); ?>
    <?php echo e(style('swiper')); ?>

    <?php echo e(style('iconfont')); ?>

    <?php echo e(style('layui')); ?>

    <?php echo e(style('common')); ?>

    <?php echo e(style('main')); ?>

    <?php echo $__env->yieldContent("style"); ?>
    <script type="application/javascript">
        var SysConst = {
            WEB_SOCKET_SERVER: "<?php echo e(env("CHAT_SERVER_PROTOCOL")); ?>://<?php echo e(env("CHAT_SERVER_HOST")); ?>:<?php echo e(env("CHAT_SERVER_PORT")); ?>",
            WEB_SOCKET_TOKEN: "<?php echo e(isset($sWebSocketToken) ? $sWebSocketToken : ''); ?>",
            STATIC_RES_URL: "<?php echo e(env("STATIC_RES_URL")); ?>",
            DEFAULT_AVATAR: "<?php echo e(env("DEFAULT_AVATAR")); ?>",
            TRADING_URL: "<?php echo e(route('trading-center.trading')); ?>",
            CSRF_TOKEN: "<?php echo e(csrf_token()); ?>",
        }

    </script>
</head>
<body class="bgColor">
<?php echo $__env->make('layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent("content"); ?>

<?php echo $__env->make('layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent("script"); ?>

</body>
</html>