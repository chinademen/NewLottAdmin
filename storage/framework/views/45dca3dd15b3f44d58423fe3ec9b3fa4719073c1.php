<?php $__env->startSection("title"); ?>
    <title><?php echo e(___('_main.title.my_trust_list')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <div class="content mt30 clearfix wrap1200">
        
        <?php echo $__env->make('layout.user_center_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="mn">
            <div class="w-right">
                <div class="tb-wrap pt10">
                    <table>
                        <thead>
                        <tr>
                            <th width="110"><?php echo e(___('_trust_list.nickname')); ?></th>
                            <th width="200"><?php echo e(___('_trust_list.trade_first_time')); ?></th>
                            <th><?php echo e(___('_trust_list.trade_first_quantity')); ?></th>
                            <th><?php echo e(___('_trust_list.trade_first_price')); ?></th>
                            <th width="" class="opt"><?php echo e(___('_trust_list.operations')); ?></th>
                        </tr>
                        </thead>
                        <tbody class="om">

                        <?php if($oTrustlists->count() > 0): ?>
                            <?php $__currentLoopData = $oTrustlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($value->nickname); ?></td>
                                    <td><?php echo e($value->first_trade_time?$value->first_trade_time:___('_trust_list.none')); ?></td>
                                    <td><?php echo e($value->first_trade_quantity?$value->first_trade_quantity:___('_trust_list.none')); ?></td>
                                    <td><?php echo e($value->first_trade_amount?$value->first_trade_amount:___('_trust_list.none')); ?></td>
                                    <td class="opt">
                                        <a href="<?php echo e(route('user-center.user-info',[$value->trust_user_id])); ?>"
                                           class="yb-btn blue mr10"><?php echo e(___('_trust_list.check')); ?></a>
                                        <a href="javascript:" class="yb-btn blue" id="Del-trust-user"
                                           onclick="Delete('/user-center/del-trust-user/<?php echo e($value->trust_user_id); ?>')"><?php echo e(___('_trust_list.delete')); ?></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" style="text-align: center;"><?php echo e(___('_trust_list.none_data')); ?></td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>

                    <?php echo $__env->make('pagination.default', ['paginator' => $oTrustlists], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("script"); ?>

    <script type="application/javascript">
        $("dd").eq(4).addClass("active");

        function Delete(url) {

            //确认弹窗
            layer.open({
                title: [
                    "<?php echo e(___('_trust_list.tips')); ?>",
                    'background-color:#8DCE16; color:#fff;'
                ],
                anim: 'up',
                content: "<?php echo e(___('_trust_list.be_sure_to_del')); ?>",
                btn: ["<?php echo e(___('_trust_list.confirm')); ?>", "<?php echo e(___('_trust_list.cancel')); ?>"],
                yes: function (index) {
                    window.location.href = url;
                    layer.close(index)
                }
            });
        }

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>