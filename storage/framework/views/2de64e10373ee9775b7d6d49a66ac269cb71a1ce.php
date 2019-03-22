<?php $__env->startSection("title"); ?>
    <title><?php echo e(___('_main.title.my_advertise')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>

    <div class="content mt30 clearfix wrap1200">
        
        <?php echo $__env->make('layout.user_center_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="content mt10 clearfix wrap1200">
            <div class="mn">
                <div class="w-right">
                    <div class="orderManage">
                        <div class="tabs tab-title clearfix">
                            <a class="left active"
                               href="<?php echo e(route("user-center.my-advertise", ["type"=>"normal"])); ?>"><?php echo e(___('_my_advertise.in_progress')); ?></a>
                            <a class="left"
                               href="<?php echo e(route("user-center.my-advertise", ["type"=>"drop-off"])); ?>"><?php echo e(___('_my_advertise.has_been_removed')); ?></a>
                        </div>
                        <div class="tabs-content mt10">
                            <div class="tb-wrap">
                                <table>
                                    <thead>
                                    <tr>
                                        <th width="100"><?php echo e(___('_my_advertise.number')); ?></th>
                                        <th width="198"><?php echo e(___('_my_advertise.created_at')); ?></th>
                                        <th><?php echo e(___('_my_advertise.type')); ?></th>
                                        <th width=""><?php echo e(___('_my_advertise.quantity')); ?></th>
                                        <th><?php echo e(___('_my_advertise.price')); ?></th>
                                        <th width="270" class="opt"><?php echo e(___('_my_advertise.operations')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody class="om">
                                    <?php if($oAdvertisingList->count() > 0): ?>
                                        <?php $__currentLoopData = $oAdvertisingList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($value->id); ?></td>
                                                <td><?php echo e($value->created_at); ?></td>
                                                <td><?php echo e($value->type == "1"?___('_my_advertise.buy'):___('_my_advertise.sell')); ?></td>
                                                <td><?php echo e($value->quantity); ?></td>
                                                <td><?php echo e($value->price); ?></td>
                                                <td class="opt">
                                                    <a href="<?php echo e(route('user-center.copy',$value->id)); ?>"
                                                       class="yb-btn blue mr10"><?php echo e(___('_my_advertise.copy')); ?></a><a
                                                            href="<?php echo e(route('user-center.detail',$value->id)); ?>"
                                                            class="yb-btn blue mr10"><?php echo e(___('_my_advertise.edit')); ?></a><a
                                                            href="javascript:" class="yb-btn blue"
                                                            onclick="popup.CancelAdvertise('<?php echo e($value->id); ?>')"><?php echo e(___('_my_advertise.remove')); ?></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6"
                                                style="text-align: center;"><?php echo e(___('_my_advertise.none_data')); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                                <?php echo $__env->make('pagination.default', ['paginator' => $oAdvertisingList], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php echo $__env->make('layout.drop_advertise_window', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("script"); ?>

    <script type="application/javascript">
        $("dd").eq(3).addClass("active");

        //选择框选中
        <?php if($sType == "normal"): ?>
        $(".left").eq(0).addClass("active");
        $(".left").eq(1).removeClass("active");
        <?php else: ?>
        $(".left").eq(1).addClass("active");
        $(".left").eq(0).removeClass("active");
                <?php endif; ?>

        var popup = popup || {};
        layui.use(['layer'], function () {
            var layer = layui.layer;

            // 弹窗函数
            popup.CancelAdvertise = function (id) {
                layer.open({
                    title: "<?php echo e(___('_my_advertise.tips')); ?>",
                    type: 1,
                    area: '540px',
                    // skin: 'layui-layer-demo', //样式类名
                    closeBtn: 1, //不显示关闭按钮
                    // shadeClose: true, //开启遮罩关闭
                    content: $('.sellpop'),
                    btn: ["<?php echo e(___('_my_advertise.confirm')); ?>", "<?php echo e(___('_my_advertise.think_again')); ?>"],
                    yes: function (index, layero) {
                        ajaxCancel(id);
                        layer.close(index);// 关闭窗口
                    }

                });
            };

            //下架广告
            function ajaxCancel(id) {

                var objPassword = $("#cash_password");
                sPassword = $.trim(objPassword.val());

                if (sPassword.length < 1) {
                    layer.msg("<?php echo e(___('_my_advertise.cash_password_require')); ?>");
                    return false;
                }

                $.ajax({
                    type: 'post',
                    url: '<?php echo e(route("user-center.drop-off")); ?>/' + id,
                    dataType: "json",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        "cash_password": sPassword,
                    },

                    success: function (d) {
                        if (d.code === 0) {
                            layer.msg(d.msg, {icon: 1});

                            //下架成功后三秒刷新页面
                            setTimeout(
                                function () {
                                    window.location.href = "<?php echo e(route('user-center.my-advertise')); ?>";
                                },
                                300);
                        } else {
                            layer.msg(d.msg, {icon: 2});
                        }


                    }
                });
            }
        });


    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>