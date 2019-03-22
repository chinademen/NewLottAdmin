<!DOCTYPE html>
<html>
<head>
    <title>
        <?php $__env->startSection('title'); ?>
        <?php echo $__env->yieldSection(); ?>
    </title>
    <?php if(isset($iRefreshTime) && $iRefreshTime): ?>
        <meta http-equiv="refresh" content="<?php echo e($iRefreshTime); ?>">
    <?php else: ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $__env->yieldContent('description'); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('keywords'); ?>"/> 
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script>
        (function (H) {
            H.className = H.className.replace(/\bno-js\b/, 'js')
        })(document.documentElement)
    </script>
    <?php $__env->startSection('styles'); ?>
        <?php echo style('ui' ); ?>

        <?php echo style('ui-new' ); ?>

        <?php echo $__env->yieldSection(); ?>

</head>
<body>
<?php echo $__env->yieldContent('container'); ?>

<?php $__env->startSection('javascripts'); ?>
    <?php echo script('jquery'); ?>

    <?php echo script('bootstrap'); ?>

<?php echo $__env->yieldSection(); ?>

<?php $__env->startSection('js-code'); ?>
    <?php echo script('datepicker'); ?>

    <?php echo script('switch'); ?>

<?php echo $__env->yieldSection(); ?>

<?php $__env->startSection('end'); ?>
<?php echo $__env->yieldSection(); ?>
</body>
</html>