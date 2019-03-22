<?php $__env->startSection('title'); ?>
##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php echo e($sPageTitle); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>
<div class="col-md-12">
    <?php echo $__env->make('w.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('w._function_title', ['id' => $data->id , 'parent_id' => $data->parent_id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('w.notification', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="panel panel-default">
        <div class=" panel-body">
            <table class="table table-bordered table-striped">
                <tbody>
                    <?php
                    $aColumns = array_keys($aColumnSettings);
                    ViewHelper::displayForView($data, $aColumns, $aViewSettings, $aArrayVars, 2);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

 <!-- Modal for destory Start -->
 <!--未来修改配置, 从输出取得-->
<div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">确认删除</h4>
            </div>
            <form method="GET" action="http://laravel.oa.com/posts" accept-charset="UTF-8" id="deleteConfirm-form" class="form-horizontal" target="_self">
                
                <div class="modal-body">
                    <div class="form-group"><label for="comment" class="col-sm-2 control-label"></label><label for="comment" class="col-sm-2 control-label"></label><div class="">确认删除吗？</div></div>
                </div>
                
                    
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">取消</button><button type="submit" class="btn btn-sm btn-danger">确认</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal for destory End -->

<?php $__env->stopSection(); ?>


<?php $__env->startSection('end'); ?>
    ##parent-placeholder-7a92f3d26362d6557d5701de77a63a01df61e57f##
    <script>

        function modal(href) {

            $('#deleteConfirm-form').attr('action', href);
            $('#deleteConfirm-data-id').html("");
            $('#deleteConfirm').modal();
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('l.base', ['active' => $resource], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>