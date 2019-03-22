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
        <div class=" panel-body">
            <form class="form-horizontal" method="post" action="<?php echo e(route($resource.'.change-password', $data->id)); ?>" autocomplete="off">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                <input type="hidden" name="_method" value="PUT" />
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo e(___('_adminuser.username')); ?></label>
                    <label class="col-sm-5"><span class="form-control"><?php echo e($data->username); ?></span></label>
                </div>
                <div class="form-group">
                    <label for="old_password"  class="col-sm-3 control-label">*<?php echo e(___('_adminuser.old-password')); ?></label>
                    <div class="col-sm-5">
                        <input class="form-control" type="password" name="old_password" id="old_password" value="" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="password"  class="col-sm-3 control-label">*<?php echo e(___('_adminuser.new-password')); ?></label>
                    <div class="col-sm-5">
                        <input class="form-control" type="password" name="password" id="password" value="" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation"  class="col-sm-3 control-label">*<?php echo e(___('_adminuser.new-password-confirm')); ?></label>
                    <div class="col-sm-5">
                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" value="" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="reset" class="btn btn-default" ><?php echo e(___('Reset')); ?></button>
                        <button type="submit" class="btn btn-success"><?php echo e(___('Submit')); ?></button>
                    </div>
                </div>
            </form>
        </div></div></div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('l.base', array('active' => $resource), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>