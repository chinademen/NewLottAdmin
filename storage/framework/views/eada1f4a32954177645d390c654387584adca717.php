<?php $__env->startSection("title"); ?>
    <title>充值</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <!--中间内容区-->
    <div class="content wrap1200 mt30">

        <div class="yb-breadcrumb">
            <div class="bc-wrap">
                <a href="<?php echo e(route('user-center.wallet')); ?>" mk=">">个人钱包</a>
                <span>充值</span>
            </div>
        </div>

        <div class="tabs tab-title clearfix mt10">
            <a class="left active" href="javascript:">BTC</a>
        </div>

        <div class="tabs-content">
            <div class="wallet-wrap">
                <div class="up">
                    <?php if(isset($oUserAccount->available)): ?>
                        <p class="inf font-c666">钱包可用余额 : </p>
                        <p class="strong cRed"><?php echo e(number_format($oUserAccount->available, 8)); ?> BTC</p>
                        <p class="font-c666">
                        <span class="mr35">冻结资产 : <i class="font-c333"><?php echo e(number_format($oUserAccount->frozen, 8)); ?>

                                BTC</i></span>
                            <span class="mr40">冻结手续费 : <i class="font-c333">0 BTC</i></span>
                            <span>总资产 : <i class="font-c333"><?php echo e(number_format($oUserAccount->balance, 8)); ?> BTC</i></span>
                        </p>
                    <?php else: ?>
                        <p class="inf font-c666">账户被被冻结，不可用</p>

                    <?php endif; ?>

                </div>

                <div class="down">

                    <p class="ads-title font-c666">接收地址：</p>
                    <div class="ads">
                        <?php if(isset($oWalletAddress->address)): ?>
                            <b><?php echo e($oWalletAddress->address); ?></b>
                            <a href="javascript:;" id="copy-address"
                               data-clipboard-text="<?php echo e($oWalletAddress->address); ?>">复制</a>
                            <i class="iconfont icon-qr-code">
                        <span class="qr-big" id="J-address-qr-code">
                            <i></i>
                        </span>
                            </i>
                        <?php else: ?>
                            <b>地址不可用</b>
                        <?php endif; ?>
                    </div>
                    <p class="pb5 font-c666">温馨提示：</p>
                    <div class="font-c999 fs12">
                        BTC 地址只能充值 BTC 资产，任何充入 BTC 地址的非 BTC 资产将不可找回。在 BTC 网络接收 BTC 通常需要 10 分钟。我们会在收到 BTC 网络 1
                        个确认后给您入账。最低
                        存入金额为 0.01 BTC，我们不会处理少于该金额的 BTC 存入请求。
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>
    <?php echo e(script('qrcode')); ?>

    <?php echo e(script('clipboard')); ?>

    <script type="application/javascript">
        layui.use(['layer'], function () {
            var layer = layui.layer
            // 显示二维码
            var qrcode = new QRCode('J-address-qr-code', {
                text: '<?php echo e($oWalletAddress->address); ?>',
                width: 130,
                height: 130,
                colorDark: '#000000',
                colorLight: '#ffffff',
                correctLevel: QRCode.CorrectLevel.H
            });
            qrcode.clear();
            qrcode.makeCode("<?php echo e($oWalletAddress->address); ?>");

            // 复制地址信息
            var clipboard = new Clipboard('#copy-address');
            clipboard.on('success', function (e) {
                if (e.text == "暂无" || e.text == "") {
                    layer.msg("暂无推广链接", {icon: 2});
                }
                else {
                    layer.msg("复制成功", {icon: 1});
                }

            });

        });


    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>