<ol class="breadcrumb">
  <li><a href="<?php echo e(route('admin.dashboard')); ?>">首页</a></li>
  <li><a href=" <?php if(isset($sAction) && $sAction): ?> <?php echo e(route($resource . '.' . $sAction)); ?> <?php else: ?> <?php echo e(route($resource . '.index')); ?> <?php endif; ?> "><?php echo e(___('_model.'.$resourceName)); ?>管理</a></li>
  <li class="active"><?php echo e(___('_model.'.$resourceName)); ?></li>
</ol>
