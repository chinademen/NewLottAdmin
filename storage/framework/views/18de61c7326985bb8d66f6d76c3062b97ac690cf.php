<?php $__env->startSection("title"); ?>
    <title>帐变详情</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <!--中间内容-->
    <div class="content wrap1200 mt30">
        <div class="yb-breadcrumb">
            <div class="bc-wrap">
                <a href="<?php echo e(route('cash-manage.index')); ?>" mk=">">资产管理</a>
                <span>帐变详情</span>
            </div>
        </div>

        <div class="orderDetail mt10">
            <div class="od-title clearfix">
                <h3>账变编号</h3>
                <p class="num"><b><?php echo e($oUserTransactions->serial_number); ?></b></p>
                
            </div>
            <div class="table-info">
                <table class="sm">
                    <tr>
                        <td colspan="3"><label
                                    class="font-c666">帐变时间：</label><span><?php echo e($oUserTransactions->updated_at); ?></span></td>
                    </tr>
                    <tr>
                        <td colspan="3"><label class="font-c666">账变类型：</label>
                            <?php echo e(isset($aType[$oUserTransactions->type]) ? $aType[$oUserTransactions->type] : ''); ?>

                        </td>
                    </tr>
                    <tr>
                        <td><label class="font-c666">账变金额：</label><b class="cRed"><?php echo e($oUserTransactions->amount); ?></b>
                        </td>
                        <td><label class="font-c666">账变前资产：</label><b
                                    class="cRed"><?php echo e($oUserTransactions->previous_available); ?></b></td>
                        <td><label class="font-c666">账变后资产：</label><b class="cRed"><?php echo e($oUserTransactions->available); ?></b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><label class="font-c666">转出地址：</label><b
                                    class="fs18"><?php echo e($oUserTransactions->entry_address); ?></b></td>
                    </tr>
                    <tr>
                        <td colspan="3"><label class="font-c666">Tx ID：</label><a class="link"
                                                                                  href="javascript:"><?php echo e($oUserTransactions->tx_id); ?></a>
                        </td>
                    </tr>
                    <tr>
                        
                            
                        
                    </tr>
                    <tr>
                        <td colspan="3"><label class="font-c666">预计成交：</label><b class="cRed"></b></td>
                    </tr>
                </table>
            </div>
        </div>


    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>