<?php $__env->startSection('title'); ?>
##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php echo e($sPageTitle); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>
    <div class="col-md-12">
        <?php echo $__env->make('w.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('w._function_title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('w.notification', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo $__env->make('default.detailForm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('l.base', array('active' => $resource), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>