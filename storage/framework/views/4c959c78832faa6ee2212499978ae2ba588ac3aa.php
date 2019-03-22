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
    <?php
    //        pr($aLangKeysForButtons);
    if (isset($aLangKeysForButtons['modal'])){
    $modalData['modal'] = array(
            'id'      => 'myModal',
            'title'   => '系统提示',
            'message' => ___($aLangKeysForButtons['modal'],$aLangVars),
            'footer'  =>
                    Form::open(['id' => 'real-delete', 'method' => 'delete']).'
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-sm btn-danger">确认删除</button>'.
                    Form::close(),
    );
    ?>
    <?php echo $__env->make('popup.modal', $modalData, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php
    }
    ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('end'); ?>

    ##parent-placeholder-7a92f3d26362d6557d5701de77a63a01df61e57f##

    <script>
        function modal(href)
        {
            $('#real-delete').attr('action', href);
            $('#myModal').modal();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('l.base', array('active' => $resource), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>