<div class="form-inline pull-right">
<?php $__currentLoopData = $buttons['pageButtons']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="form-group">
    <?php
    if (!$url = $element->url){
        $url = 'javascript:void(0);';
        if ($element->route_name){
            $url = $element->para_name && isset(${$element->para_name}) ? route($element->route_name, ${$element->para_name}) : route($element->route_name);
        }
    }
    ?>
    <?php if($element->button_type == 3): ?>
    <a href="javascript:void(0)" class="btn   btn-danger" onclick="modal('<?php echo e($url); ?>')"><?php echo e(___( $element->label)); ?></a>
    <?php elseif($element->button_type == 2): ?>
    <a href="<?php echo e($url); ?>" class="btn   btn-success"><?php echo e(___( $element->label)); ?></a>
    <?php else: ?>
        <a  href="<?php echo e($url); ?>" class="btn   btn-default" > <?php echo e(___( $element->label)); ?></a>
    <?php endif; ?>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
