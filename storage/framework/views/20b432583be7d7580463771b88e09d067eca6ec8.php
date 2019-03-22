<div class="h3"><?php echo e($sTitle); ?> <small><a href="javascript:window.location.reload();" class="glyphicon glyphicon-repeat"></a></small>
    <div class=" pull-right" role="toolbar" >
        <?php echo $__env->make('w.page_link', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>
