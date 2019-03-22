<?php $__env->startSection("title"); ?>
    <title>提现详情</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <!--中间内容-->
    <div class="content wrap1200 mt30">
        <div class="yb-breadcrumb">
            <div class="bc-wrap">
                <a href="<?php echo e(route('cash-manage.index')); ?>" mk=">">资产管理</a>
                <span>提现详情</span>
            </div>
        </div>

        <div class="orderDetail mt10">
            <div class="od-title clearfix">
                <h3>提现编号</h3>
                <p class="num"><b><?php echo e($oWithdraw->id); ?></b></p>
            </div>
            <div class="table-info">
                <table class="sm">
                    <tr>
                        <td colspan="3"><label
                                    class="font-c666">操作时间：</label><span><?php echo e($oWithdraw->updated_at); ?></span></td>
                    </tr>
                    <tr>
                        <td colspan="3"><label class="font-c666">状态：</label>
                            <?php echo e($sStatus); ?>

                        </td>
                    </tr>
                    <tr>
                        <td><label class="font-c666">变更额度：</label><b class="cRed"><?php echo e($oWithdraw->amount); ?></b>
                        </td>
                        <td><label class="font-c666">手续费用：</label><b
                                    class="cRed"><?php echo e($oWithdraw->fee_amount); ?></b></td>
                        <td><label class="font-c666">币种：</label><b class="cRed"><?php echo e($oWithdraw->money_identifier); ?></b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><label class="font-c666">去向地址：</label><b
                                    class="fs18"><?php echo e($oWithdraw->entry_address); ?></b></td>
                    </tr>
                    <tr>
                        <td colspan="3"><label class="font-c666">Tx ID：</label><a class="link"
                                                                                  href="javascript:"><?php echo e($oWithdraw->tx_id); ?></a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><label class="font-c666">用户备注：</label><b class="cRed"><?php echo e($oWithdraw->note); ?></b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><label class="font-c666">审核备注：</label><b class="cRed"><?php echo e($oWithdraw->remark); ?></b>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>