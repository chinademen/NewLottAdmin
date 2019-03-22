<?php $__env->startSection("title"); ?>
    <title><?php echo e(___('_main.title.advertise_detail')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <div class="content wrap1200 mt30">

        <div class="yb-breadcrumb">
            <div class="bc-wrap">
                <a href="<?php echo e(route('user-center.my-advertise')); ?>" mk=">">我的广告</a>
                <span>广告详情</span>
            </div>
        </div>

        <div class="orderDetail mt10">
            <div class="od-title clearfix">
                <h3><?php echo e($oAdvertisingList->type == 1?___('_advertise_detail.buy'):___('_my_advertise.sell')); ?></h3>
                <p class="num"><b><?php echo e(___('_advertise_detail.advertise_number')); ?>＃<?php echo e($oAdvertisingList->id); ?></b></p>
                <p class="time"><?php echo e(___('_advertise_detail.status')); ?>：
                    <?php if($oAdvertisingList->status == 0): ?>
                        <b><?php echo e(___('_advertise_detail.normal_display')); ?></b>
                    <?php elseif($oAdvertisingList->status == 1): ?>
                        <b><?php echo e(___('_advertise_detail.user_removed')); ?></b>
                    <?php elseif($oAdvertisingList->status == 2): ?>
                        <b><?php echo e(___('_advertise_detail.system_removed')); ?></b>
                    <?php endif; ?>
                </p>
            </div>
            <div class="table-info">
                <table class="sm review-info">
                    <tr>
                        <td><label class="font-c666"><?php echo e(___('_advertise_detail.trade_amount')); ?>：</label><span
                                    class="cRed"><?php echo e($oAdvertisingList->amount); ?></span>
                            <span><?php echo e(___('_advertise_detail.yuan')); ?></span></td>
                        <td><label class="font-c666 w98"><?php echo e(___('_advertise_detail.created_at')); ?>

                                ：</label><span><?php echo e($oAdvertisingList->created_at); ?></span>
                        </td>
                        <td rowspan="3">
                            <label class="font-c666 vm"><?php echo e(___('_advertise_detail.payment_method')); ?>：</label>
                            <span id="trade-way"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="font-c666"><?php echo e(___('_advertise_detail.quantity')); ?>

                                ：</label><span><?php echo e($oAdvertisingList->quantity); ?></span>
                            <span>BTC</span></td>
                        <td><label class="font-c666 w98"><?php echo e(___('_advertise_detail.single_trade_money')); ?>

                                ：</label><span><?php echo e($oAdvertisingList->single_min); ?>

                                ~ <?php echo e($oAdvertisingList->single_max); ?></span></td>
                    </tr>
                    <tr>
                        <td class="pr0"><label class="font-c666"><?php echo e(___('_advertise_detail.price')); ?>：</label><span
                                    class="cRed"><?php echo e($oAdvertisingList->price); ?></span> <span>CNY/BTC</span>
                        </td>
                        <td><label class="font-c666 w98"><?php echo e(___('_advertise_detail.remain_quantity')); ?>：</label><span><?php echo e($oAdvertisingList->last_quantity); ?>

                                BTC</span></td>
                    </tr>
                </table>
            </div>
            <div class="tc pt20 review-btns" style="display: none">
                <a class="yb-btn h38 w148 mr20 okBtn" href="javascript:"
                   id="J_submit"><?php echo e(___('_advertise_detail.finish')); ?></a>
                <a class="yb-btn h38 w148 blue" href="javascript:"
                   id="cancelBtn"><?php echo e(___('_advertise_detail.cancel')); ?></a>
            </div>
            <div class="tc pt20 edit-btns">
                <a class="yb-btn h38 w148 blue" href="javascript:"
                   onclick="popup.CancelAdvertise('<?php echo e($oAdvertisingList->id); ?>')"><?php echo e(___('_advertise_detail.remove')); ?></a>
            </div>
            <div class="instructions pt20">
                <p><?php echo e(___('_advertise_detail.tips1')); ?></p>
                <p><?php echo e(___('_advertise_detail.tips2')); ?></p>
                <p><?php echo e(___('_advertise_detail.tips3')); ?></p>
            </div>
        </div>
    </div>

    <?php echo $__env->make('layout.drop_advertise_window', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("script"); ?>
    <script type="application/javascript">
        var tradeWay = "";
        <?php $__currentLoopData = $aMethod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($value == "Alipay"): ?>
            tradeWay += "<?php echo e(___('_advertise_detail.Alipay')); ?>,";
        $('#chk02').attr("checked", "checked");
        <?php elseif($value == "Wechat"): ?>
        $('#chk03').attr("checked", "checked");
        tradeWay += "<?php echo e(___('_advertise_detail.Wechat')); ?>,";
        <?php elseif($value == "Bank"): ?>
        $('#chk01').attr("checked", "checked");
        tradeWay += "<?php echo e(___('_advertise_detail.Bank')); ?>,";
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        $('#trade-way').html(tradeWay.slice(0, -1));

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

        });

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
                    "cash_password": sPassword
                },

                success: function (d) {
                    if (d.code === 0) {

                        //下架成功后三秒刷新页面
                        setTimeout(
                            function () {
                                window.location.href = "<?php echo e(route('user-center.my-advertise')); ?>";
                            },
                            300);
                        layer.msg(d.msg, {icon: 1});
                    } else {
                        layer.msg(d.msg, {icon: 2});
                    }


                }
            });
        }

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>