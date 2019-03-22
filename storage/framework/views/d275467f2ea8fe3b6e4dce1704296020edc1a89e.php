<?php $__env->startSection("title"); ?>
    <title><?php echo e(___('_main.title.advertise_detail')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <div class="content wrap1200 mt30">
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
                <table class="sm edit-info">
                    <tr>
                        <td><label class="font-c666"><?php echo e(___('_advertise_detail.trade_amount')); ?>：</label><input
                                    class="yb-input mr10 w180" type="text"
                                    value="<?php echo e($oAdvertisingList->amount); ?>"
                                    id="amount"><?php echo e(___('_advertise_detail.yuan')); ?>

                        </td>
                        <td><label class="font-c666 w98"><?php echo e(___('_advertise_detail.created_at')); ?>

                                ：</label><span><?php echo e($oAdvertisingList->created_at); ?></span>
                        </td>
                        <td rowspan="3">
                            <label class="font-c666 vm"><?php echo e(___('_advertise_detail.payment_method')); ?>：</label>
                            <span class="yb-checkbox mr5 vm">
                            <input id="chk01" type="checkbox">
                            <label for="chk01">
                                <i class="icon iconfont icon-gouxuan"></i>
                            </label>
                        </span>
                            <span class="mr10 vm"><?php echo e(___('_advertise_detail.bank')); ?></span>
                            <span class="yb-checkbox mr5 vm">
                            <input id="chk02" type="checkbox">
                            <label for="chk02">
                                <i class="icon iconfont icon-gouxuan"></i>
                            </label>
                        </span>
                            <span class="mr10 vm"><?php echo e(___('_advertise_detail.alipay')); ?></span>
                            <span class="yb-checkbox mr5 vm">
                            <input id="chk03" type="checkbox">
                            <label for="chk03">
                                <i class="icon iconfont icon-gouxuan"></i>
                            </label>
                        </span>
                            <span class="vm"><?php echo e(___('_advertise_detail.wechat')); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="font-c666"><?php echo e(___('_advertise_detail.quantity')); ?>：</label><input
                                    class="yb-input mr10 w180" type="text"
                                    value="<?php echo e($oAdvertisingList->quantity); ?>"
                                    id="quantity">BTC
                        </td>
                        <td><label class="font-c666 w98"><?php echo e(___('_advertise_detail.single_trade_money')); ?>

                                ：</label><input class="yb-input w95" type="text"
                                                value="<?php echo e($oAdvertisingList->single_min); ?>"
                                                id="single_min">
                            ~
                            <input class="yb-input w95 mr10" type="text" value="<?php echo e($oAdvertisingList->single_max); ?>"
                                   id="single_max"><?php echo e(___('_advertise_detail.yuan')); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pr0"><label class="font-c666"><?php echo e(___('_advertise_detail.price')); ?>：</label><input
                                    class="yb-input mr10 w180"
                                    type="text"
                                    value="<?php echo e($oAdvertisingList->price); ?>"
                                    id="price">CNY/BTC
                        </td>
                        <td><label class="font-c666 w98"><?php echo e(___('_advertise_detail.remain_quantity')); ?>：</label><span
                                    id="Last_quantity"><?php echo e($oAdvertisingList->last_quantity); ?>

                                BTC</span></td>
                    </tr>
                </table>
            </div>
            <div class="tc pt20 edit-btns">
                <a class="yb-btn h38 w148 mr20 editBtn" href="javascript:"
                   id="J_submit"><?php echo e(___('_advertise_detail.edit')); ?></a>
                <a class="yb-btn h38 w148 blue" href="javascript:"
                   onclick="javascript:history.go(-1)"><?php echo e(___('_advertise_detail.cancel')); ?></a>
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
        var objAmount = $("#amount");
        var objQuantity = $("#quantity");
        var objSingleMin = $("#single_min");
        var objSingleMax = $("#single_max");
        var objPrice = $("#price");
        var objLastQuantity = $('#Last_quantity');

        <?php $__currentLoopData = $aMethod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($value == "Alipay"): ?>
        $('#chk02').attr("checked", "checked");
        <?php elseif($value == "Wechat"): ?>
        $('#chk03').attr("checked", "checked");
        <?php elseif($value == "Bank"): ?>
        $('#chk01').attr("checked", "checked");
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        //回车确认
        $(document).keypress(function (event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                ajaxData();
            }
        });

        //跟踪计算
        objAmount.change(function () {
            objPrice.val($.trim(objAmount.val()) / $.trim(objQuantity.val()));
            objLastQuantity.html(objQuantity.val());
        });

        objQuantity.change(function () {
            objAmount.val($.trim(objQuantity.val()) * $.trim(objPrice.val()));
            objLastQuantity.html(objQuantity.val());
        });

        objPrice.change(function () {
            objAmount.val($.trim(objQuantity.val()) * $.trim(objPrice.val()));
            objLastQuantity.html(objQuantity.val());
        });


        //表单提交
        $(function () {

            $("#J_submit").click(function () {
                ajaxData();
            });

            function ajaxData() {

                Amount = $.trim(objAmount.val());
                Quantity = $.trim(objQuantity.val());
                SingleMin = $.trim(objSingleMin.val());
                SingleMax = $.trim(objSingleMax.val());
                Price = $.trim(objPrice.val());

                Bank = $("#chk01").is(':checked');
                Alipay = $("#chk02").is(':checked');
                Wechat = $("#chk03").is(':checked');

                if (Amount.length < 1 || Quantity.length < 1 || SingleMin.length < 1 || SingleMax.length < 1 || Price.length < 1) {
                    layer.msg("<?php echo e(___('_my_advertise.cannot_left_blank')); ?>");
                    return false;
                }

                if (Bank === false && Wechat === false && Alipay === false) {
                    layer.msg("<?php echo e(___('_my_advertise.enter_atleast_one_payment_method')); ?>");
                    return false;
                }

                if (Amount != Quantity * Price) {
                    layer.msg("输入的金额或者数量不对");
                    return false;
                }

                $.ajax({
                    type: 'post',
                    url: '<?php echo e(route("user-center.copy", [$oAdvertisingList->id])); ?>',
                    dataType: "json",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        "amount": Amount,
                        "type": "<?php echo e($oAdvertisingList->type == 1?'buy':'sell'); ?>",
                        "quantity": Quantity,
                        "single_min": SingleMin,
                        "single_max": SingleMax,
                        "price": Price,
                        "bank": Bank,
                        "wechat": Wechat,
                        "alipay": Alipay,
                        'identifier': 'BTC'
                    },

                    success: function (d) {
                        layer.msg(d.msg);
                        switch (d.code) {
                            case 0:
                                setTimeout(function () {
                                    window.location.href = "<?php echo e(route('user-center.my-advertise')); ?>";
                                }, 3000);
                                break;
                            default:
                                break;
                        }
                        return false;
                    }
                });
            }

        });

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>