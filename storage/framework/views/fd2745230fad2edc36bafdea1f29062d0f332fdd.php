<?php $__env->startSection("title"); ?>
    <title><?php echo e(___('_withdraw.withdraw')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <!--中间内容区-->

    <div class="content wrap1200 mt30">

        <div class="yb-breadcrumb">
            <div class="bc-wrap">
                <a href="<?php echo e(route('user-center.wallet')); ?>" mk=">">个人钱包</a>
                <span>提现</span>
            </div>
        </div>

        <div class="tabs tab-title clearfix mt10">
            <a class="left active" href="javascript:">BTC</a>
        </div>
        <div class="tabs-content">
            <div class="wallet-wrap">
                <div class="up">
                    <?php if(isset($oUserAccount->available)): ?>
                        <p class="inf font-c666"><?php echo e(___('_withdraw.remain_amount')); ?> : </p>
                        <p class="strong cRed"><?php echo e(isset($oUserAccount->available) ? number_format($oUserAccount->available, 8): 0.00); ?>

                            BTC</p>
                        <p class="font-c666">
                        <span class="mr35"><?php echo e(___('_withdraw.freeze_amount')); ?> : <i class="font-c333"><?php echo e(isset($oUserAccount->frozen) ? number_format($oUserAccount->frozen, 8) : 0.00); ?>

                                BTC</i></span>
                            <span class="mr40"><?php echo e(___('_withdraw.freeze_service_charge')); ?> : <i
                                        class="font-c333">0 BTC</i></span>
                            <span><?php echo e(___('_withdraw.whole_amount')); ?> : <i class="font-c333"><?php echo e(isset($oUserAccount->balance) ? number_format($oUserAccount->balance, 8): 0.00); ?>

                                    BTC</i></span></p>
                    <?php else: ?>
                        <p class="strong cRed">账户被冻结</p>
                    <?php endif; ?>
                </div>

                <div class="down">
                    <div class="form">
                        <div class="mb20">
                            <label class="font-c666"><?php echo e(___('_withdraw.to_address')); ?> ：</label>
                            <input type="text" class="yb-input" id="address" name="address"
                                   placeholder="<?php echo e(___('_withdraw.pls_add_correct_address')); ?>">
                        </div>
                        <div class="mb20">
                            <label class="font-c666"><?php echo e(___('_withdraw.quantity')); ?>：</label>
                            <input type="text" class="yb-input" id="quantity" name="quantity"
                                   placeholder="<?php echo e(___('_withdraw.max_to_send_amount')); ?><?php echo e(isset($oUserAccount->available) ? number_format($oUserAccount->available, 8): 0.00); ?>BTC">
                        </div>
                        <div class="mb20">
                            <label class="font-c666"><?php echo e(___('_withdraw.cash_password')); ?>：</label>
                            <input type="password" class="yb-input" id="cash-password" name="cash-password"
                                   placeholder="<?php echo e(___('_withdraw.pls_add_cash_password')); ?>">
                        </div>
                        <div class="mb30">
                            <label class="font-c666"><?php echo e(___('_withdraw.remark')); ?>：</label>
                            <input type="text" class="yb-input" id="note" name="note"
                                   placeholder="<?php echo e(___('_withdraw.pls_add_remark')); ?>">
                        </div>
                    </div>
                    <div class="tc mb25">
                        <a class="yb-btn publish" id="J_submit" href="javascript:;">确定</a>
                    </div>
                    <p class="pb5 font-c666">温馨提示：</p>
                    <div class="font-c999 fs12">
                        BTC 钱包只能向 BTC 地址发送资产，如果向非 BTC 地址发送资产将不可找回。在 BTC 网络发送 BTC，通常需要 10 分钟，BTC 网络转账费为
                        0.0015BTC，为保障转账速度，网络
                        转账费用会根据情况进行实时调整；亚币会先审核后再广播到 BTC 网络，正在处理中代表平台正在审核中，处理完毕的您可以在交易明细中查看到转账详情。
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("script"); ?>
    <script type="application/javascript">
        layui.use(['layer'], function () {
            var layer = layui.layer
            $("#J_submit").click(function () {
                var address = $('input[name="address"]').val();
                var fQuantity = parseFloat($('input[name="quantity"]').val());
                var cash_password = $('input[name="cash-password"]').val();
                var note = $('input[name="note"]').val();

                if (address == '') {
                    layer.tips("请填写转出地址", "#address");
                    return false;
                }
                if (isNaN(fQuantity) || fQuantity <= 0) {
                    layer.tips("请填写正确的转出数量", "#quantity");
                    return false;
                }
                if (cash_password == '') {
                    layer.tips("请填写资金密码", "#cash-password");
                    return false;
                }

                $.ajax({
                    url: "<?php echo e(route('user-center.withdraw')); ?>",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        'address': address,
                        'quantity': fQuantity,
                        'cash_password': cash_password,
                        'note': note,
                        '_token': "<?php echo e(csrf_token()); ?>"
                    },
                    success: function (res) {
                        if (res.code != "0") {
                            layer.msg(res.msg, {icon: 2, btn: ['ok']})
                        } else {
                            layer.msg(res.msg, {icon: 1, btn: ['ok']})
                        }
                    },
                    error: function (res) {
                        //alert(res);
                    }
                });
            });
        })


    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>