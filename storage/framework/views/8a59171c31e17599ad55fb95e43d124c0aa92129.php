<?php $__env->startSection("title"); ?>
    <title><?php echo e(___("_trading_center.title_publish")); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
    <!--中间内容区-->
    <div class="content mt30 clearfix wrap1200">
        <div class="w-left">
            <dl class="menu">
                <dt><i class="icon iconfont icon-mairu"></i><span>我要买进</span></dt>
                <?php if($aDigitalMoney): ?>
                    <?php $__currentLoopData = $aDigitalMoney; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <dd>
                            <a class="item"
                               href="<?php echo e(route("trading-center.index", ["buy", $item["identifier"]])); ?>"><?php echo e($item["identifier"]); ?></a>
                        </dd>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <dt><i class="icon iconfont icon-maichu"></i><span>我要卖出</span></dt>
                <?php if($aDigitalMoney): ?>
                    <?php $__currentLoopData = $aDigitalMoney; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <dd>
                            <a class="item"
                               href="<?php echo e(route("trading-center.index", ["sell", $item["identifier"]])); ?>"><?php echo e($item["identifier"]); ?></a>
                        </dd>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <dt><i class="icon iconfont icon-fabu"></i><span>发布广告</span></dt>
                <dd class="btns">
                    <a class="yb-btn" href="<?php echo e(route("trading-center.publish")); ?>">我要发布买卖广告</a>
                </dd>
            </dl>
        </div>
        <div class="mn">
            <div class="w-right">
                <div class="pb-wrap">
                    <div class="tabs clearfix">
                        <a class="table-item active" data_type="buy" href="javascript:">我想买BTC</a>
                        <a class="table-item" data_type="sell" href="javascript:">我想卖BTC</a>
                    </div>
                    <div class="tabs-content">
                        <div class="pb-form">
                            <div class="pl140">
                                <div class="mb20">
                                    <label for="">*交易价格(BTC/CNY)：</label>
                                    <input class="yb-input w400" type="text" name="buy-price"
                                           placeholder="当前参考价格<?php echo e($oMarketQuotation->exchange_price); ?>">
                                </div>
                                <div class="mb20">
                                    <label for="">*单笔交易限额：</label>
                                    <input class="yb-input w170" type="text" name="buy-single-min"
                                           placeholder="最小限额(最低:<?php echo e($fSingleMinAmount); ?>)">
                                    &nbsp;&nbsp;~&nbsp;&nbsp;
                                    <input class="yb-input w170 mr5" type="text" name="buy-single-max"
                                           placeholder="最大限额">
                                    <span class="font-c666">CNY</span>
                                </div>
                                <div class="mb20">
                                    <label for="">*想买数量 BTC：</label>
                                    <input class="yb-input w400" type="text" name="buy-quantity"
                                           placeholder="请输入求购的数量，例如 0.000001">
                                </div>
                                <div class="mb20">
                                    <label for="">*交易金额 CNY：</label>
                                    <input class="yb-input w400" type="text" name="buy-amount" placeholder="请输入交易金额">
                                </div>
                                <div class="mb20" style="padding: 15px 0;">
                                    <label for="">*交易方式：</label>
                                    <?php if($aUserPaymentIdentifier): ?>
                                        <span>
                                        <?php $__currentLoopData = $aUserPaymentIdentifier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $identifier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class="yb-checkbox mr10">
                                            <input id="buy-chk<?php echo e($key); ?>" type="checkbox" name="buy-payment"
                                                   value="<?php echo e($identifier); ?>"
                                                   data-text="<?php echo e($aPaymentCategories[$identifier]); ?>">
                                            <label for="buy-chk<?php echo e($key); ?>">
                                                <i class="icon iconfont icon-gouxuan"></i>
                                            </label>
                                        </span>
                                                <span class="vm fs16 mr50"><?php echo e($aPaymentCategories[$identifier]); ?></span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </span>
                                    <?php else: ?>
                                        <span class="fs14 cRed">您还未设置交易方式，请前往个人中心设置后即可发布广告</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="btns">
                                <a class="yb-btn" href="javascript:" onclick="popup.sellOrBuyPop()">确定发布</a>
                            </div>
                        </div>
                        <div class="pb-form" style="display: none">
                            <div class="pl140">
                                <div class="mb20">
                                    <label for="">*交易价格(BTC/CNY)：</label>
                                    <input class="yb-input w400" type="text" name="sell-price"
                                           placeholder="当前参考价格<?php echo e($oMarketQuotation->exchange_price); ?>">
                                </div>
                                <div class="mb20">
                                    <label for="">*单笔交易限额：</label>
                                    <input class="yb-input w170" type="text" name="sell-single-min"
                                           placeholder="最小限额(最低:<?php echo e($fSingleMinAmount); ?>)">
                                    &nbsp;&nbsp;~&nbsp;&nbsp;
                                    <input class="yb-input w170 mr5" type="text" name="sell-single-max"
                                           placeholder="最大限额">
                                    <span class="font-c666">CNY</span>
                                </div>
                                <div class="mb20">
                                    <label for="">*想卖数量 BTC：</label>
                                    <input class="yb-input w400" type="text" max-quantity="0.00" name="sell-quantity"
                                           placeholder="请输入卖出的数量，例如 0.000001">
                                </div>
                                <div class="mb20">
                                    <label for="">*交易金额 CNY：</label>
                                    <input class="yb-input w400" type="text" name="sell-amount" placeholder="请输入交易金额">
                                </div>
                                <div class="mb20" style="padding: 15px 0;">
                                    <label for="">*交易方式：</label>
                                    <?php if($aUserPaymentIdentifier): ?>
                                        <span>
                                        <?php $__currentLoopData = $aUserPaymentIdentifier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $identifier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class="yb-checkbox mr10">
                                            <input id="sell-chk<?php echo e($key); ?>" type="checkbox" name="sell-payment"
                                                   value="<?php echo e($identifier); ?>"
                                                   data-text="<?php echo e($aPaymentCategories[$identifier]); ?>">
                                            <label for="sell-chk<?php echo e($key); ?>">
                                                <i class="icon iconfont icon-gouxuan"></i>
                                            </label>
                                        </span>
                                                <span class="vm fs16 mr50"><?php echo e($aPaymentCategories[$identifier]); ?></span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </span>
                                    <?php else: ?>
                                        <span class="fs14 cRed">您还未设置交易方式，请前往个人中心设置后即可发布广告</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="btns">
                                <a class="yb-btn" href="javascript:" onclick="popup.sellOrBuyPop()">确定发布</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("window"); ?>
    <!--确认弹窗-->
    <div class="popup sellpop">
        <div class="text">
            请确发布信息:<br/>
            交易价格(BTC/CNY): <span class="cRed" id="J_price"></span><br/>
            单笔交易限额: <span class="cRed" id="J_single_price_min"></span>~<span class="cRed"
                                                                             id="J_single_price_max"></span><br/>
            想卖数量 BTC: <span class="cRed" id="J_quantity"></span><br/>
            交易金额 CNY: <span class="cRed" id="J_amount"></span><br/>
            交易方式: <span class="cRed" id="J_payment"></span>
        </div>
        
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>
    <script type="application/javascript">
        var popup = popup || {}
        layui.use(['layer'], function () {
            var layer = layui.layer

            //获取用户可卖出余额
            $.ajax({
                url: "<?php echo e(route('trading-center.account-available',"BTC")); ?>",
                type: 'post',
                dataType: 'json',
                data: {
                    '_token': "<?php echo e(csrf_token()); ?>"
                },
                success: function (res) {
                    if (res.code == "0") {
                        var available = parseFloat(res.data.available)

                        $('input[name="sell-quantity"]').attr("max-quantity", available)
                    }

                },
                error: function (res) {
                    layer.msg("网络错误", {icon: 2, btn: ['明白了']})
                }
            });

            //判断单笔最小交易金额
            var fSingleMinAmount = <?php echo e($fSingleMinAmount); ?>

            $('input[name="sell-single-min"], input[name="buy-single-min"]').blur(function () {
                var fInputSingleMinAmount = parseFloat($(this).val())
                //保留两位小数
                if (!isNaN(fInputSingleMinAmount)) {
                    $(this).val(fInputSingleMinAmount.toFixed(2));
                }

                //超过系统设置的最小限额度
                if (!isNaN(fInputSingleMinAmount) && fInputSingleMinAmount < fSingleMinAmount) {
                    $(this).val(fSingleMinAmount);
                }
            })

            $('input[name="buy-single-max"], input[name="sell-single-max"]').blur(function () {
                var fInputSingleMaxAmount = parseFloat($(this).val())
                //保留两位小数
                if (!isNaN(fInputSingleMaxAmount)) {
                    $(this).val(fInputSingleMaxAmount.toFixed(2));
                }
            })


            //单价框失去焦点判断
            $('input[name="buy-price"], input[name="sell-price"]').blur(function () {
                //价格输入保留两位小数
                var fPrice = parseFloat($(this).val())
                if (!isNaN(fPrice)) {
                    $(this).val(fPrice.toFixed(2));
                }
            })

            //自动计算交易金额(买进)
            $('input[name="buy-price"], input[name="buy-quantity"]').blur(function () {
                //交易金额计算:价格*数量
                var fBuyPrice = parseFloat($('input[name="buy-price"]').val());
                var fBuyQuantity = parseFloat($('input[name="buy-quantity"]').val());
                if (!isNaN(fBuyPrice) && !isNaN(fBuyQuantity)) {
                    //计算交易金额
                    var fBuyAmount = fBuyPrice * fBuyQuantity;
                    fBuyAmount = fBuyAmount.toFixed(2)

                    //填充交易金额
                    $('input[name="buy-amount"]').val(fBuyAmount)

                    //判断单笔最大交易金额否大于交易金额
                    var sBuySingleMax = $('input[name="buy-single-max"]').val()
                    var fBuySingleMax = parseFloat(sBuySingleMax).toFixed(2)
                    if (isNaN(fBuySingleMax) || fBuySingleMax > fBuyAmount) {
                        $('input[name="buy-single-max"]').val(fBuyAmount.toFixed(2))
                    }


                }
            })

            //自动计算交易金额(卖出)
            $('input[name="sell-price"], input[name="sell-quantity"]').blur(function () {
                //交易金额计算:价格*数量
                var fSellPrice = parseFloat($('input[name="sell-price"]').val());
                var fSellQuantity = parseFloat($('input[name="sell-quantity"]').val());
                if (!isNaN(fSellPrice) && !isNaN(fSellQuantity)) {
                    //计算交易金额
                    var fSellAmount = fSellPrice * fSellQuantity;
                    fSellAmount = fSellAmount.toFixed(2)

                    //填充交易金额
                    $('input[name="sell-amount"]').val(fSellAmount)

                    //判断单笔交易金额是否大于交易金额
                    var sSellSingleMax = $('input[name="sell-single-max"]').val()
                    var fSellSingleMax = parseFloat(sSellSingleMax).toFixed(2)

                    if (isNaN(fSellSingleMax) || (fSellSingleMax > fSellAmount)) {
                        $('input[name="sell-single-max"]').val(fSellAmount)
                    }
                }

                //判断卖出时候的可卖出数量
                if (($(this).attr("name") == "sell-quantity") && !isNaN(fSellQuantity)) {

                    var fMaxQuantity = $(this).attr("max-quantity")

                    if (fMaxQuantity < fSellQuantity) {
                        layer.msg("卖出数量:" + fSellQuantity + "大于账户实际数量:" + fMaxQuantity + "！", {icon: 2, btn: ['明白了']})
                    }
                }

            })


            // 弹窗函数
            popup.sellOrBuyPop = function () {
                var flag = true;
                var sDataType = $(".table-item.active").attr("data_type")
                switch (sDataType) {
                    case "buy":
                        //验证必填参数
                        var fPrice = parseFloat($('input[name="buy-price"]').val());
                        var fSingleMin = parseFloat($('input[name="buy-single-min"]').val());
                        var fSingleMax = parseFloat($('input[name="buy-single-max"]').val());
                        var fQuantity = parseFloat($('input[name="buy-quantity"]').val());
                        var fAmount = parseFloat($('input[name="buy-amount"]').val());

                        var aPayment = new Array();
                        var aPaymentText = new Array();
                        $('input[name="buy-payment"]:checked').each(function () {
                            aPayment.push($(this).val());
                            aPaymentText.push($(this).attr("data-text"));
                        });
                        var sPayment = aPayment.join(",")
                        if (sPayment == '' ||
                            isNaN(fPrice) ||
                            isNaN(fSingleMin) ||
                            isNaN(fSingleMax) ||
                            isNaN(fQuantity) ||
                            isNaN(fAmount)
                        ) {
                            flag = false;
                        }
                        break;
                    case "sell":
                        //验证必填参数
                        var fPrice = parseFloat($('input[name="sell-price"]').val());
                        var fSingleMin = parseFloat($('input[name="sell-single-min"]').val());
                        var fSingleMax = parseFloat($('input[name="sell-single-max"]').val());
                        var fQuantity = parseFloat($('input[name="sell-quantity"]').val());
                        var fAmount = parseFloat($('input[name="sell-amount"]').val());

                        var aPayment = new Array();
                        var aPaymentText = new Array();
                        $('input[name="sell-payment"]:checked').each(function () {
                            aPayment.push($(this).val());
                            aPaymentText.push($(this).attr("data-text"));
                        });
                        var sPayment = aPayment.join(",")
                        if (sPayment == '' ||
                            isNaN(fPrice) ||
                            isNaN(fSingleMin) ||
                            isNaN(fSingleMax) ||
                            isNaN(fQuantity) ||
                            isNaN(fAmount)
                        ) {
                            flag = false;
                        }
                        break;
                }

                //参数有问题，终止执行
                if (!flag) {
                    layer.msg("请填写必要数据！", {icon: 2, btn: ['明白了']})
                    return false;
                }

                //对弹出框赋值
                $("#J_price").text(fPrice);
                $("#J_single_price_min").text(fSingleMin);
                $("#J_single_price_max").text(fSingleMax);
                $("#J_quantity").text(fQuantity);
                $("#J_amount").text(fAmount);
                $("#J_payment").text(aPaymentText.join(","));

                layer.open({
                    title: $(".table-item.active").text(),
                    type: 1,
                    area: '540px',
                    closeBtn: 1, //不显示关闭按钮
                    content: $('.sellpop'),
                    btn: ['我再想想', '确定'],
                    yes: function (index, layero) {
                        layer.close(index) // 关闭窗口
                    },
                    btn2: function (index, layero) {
                        $.ajax({
                            url: "<?php echo e(route('trading-center.publish')); ?>",
                            type: 'post',
                            dataType: 'json',
                            data: {
                                'type': sDataType,
                                'price': fPrice,
                                'single_min': fSingleMin,
                                'single_max': fSingleMax,
                                'quantity': fQuantity,
                                'amount': fAmount,
                                'payment': sPayment,
                                'identifier': 'BTC',
                                '_token': "<?php echo e(csrf_token()); ?>"
                            },
                            success: function (res) {
                                if (res.code != "0") {
                                    layer.msg(res.msg, {icon: 2, btn: ['明白了']})
                                } else {
                                    layer.msg(res.msg, {icon: 1, btn: ['明白了']})
                                }
                            },
                            error: function (res) {
                                //alert(res);
                            }
                        });
                    }
                })
            }
        })

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>