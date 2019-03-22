<?php $__currentLoopData = $aPopupData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $func => $aPopup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->make('popup.formModal', $aPopup, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <script>
        function <?php echo e($func); ?>(href, id, self)
        {
            title =  $(self).html()+"操作确认";
            $('#<?php echo e($func); ?>-form').attr('action', href);
            $('#<?php echo e($func); ?>-data-id').html(id);
            $('#<?php echo e($func); ?>').find('#myModalLabel').html(title);
            $('#<?php echo e($func); ?>').modal();
        }
    </script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>