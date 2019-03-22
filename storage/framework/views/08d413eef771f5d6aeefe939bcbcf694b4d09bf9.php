<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php echo $__env->yieldContent("title"); ?>
    <link rel="icon" href="/img/logo.png">
    <link rel="stylesheet" href="/css/swiper.min.css">
    <link rel="stylesheet" href="/css/font/iconfont.css">
    <link rel="stylesheet" href="/js/layui/css/layui.css">
    <link rel="stylesheet" href="/css/common.css">
    <link rel="stylesheet" href="/css/main.css">
    <?php echo $__env->yieldContent("style"); ?>
</head>
<body>
<?php echo $__env->make('web-base.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent("content"); ?>

<?php echo $__env->make('web-base.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent("script"); ?>

</body>
</html>




