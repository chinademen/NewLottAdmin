<?php $__env->startSection("title"); ?>
    <title>资产管理</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <!--中间内容区-->
    <div class="mt30 content wrap1200">
        <div class="assetTitle clearfix">
            <div class="left">
                亚币交易账户
                <i class="iconfont icon-triangle-right"></i>
            </div>
            <div class="right clearfix">
                <p class="assetNum">
                    折合总资产：<b class="cRed fs18"><?php echo e($iAccountTotal); ?> BTC ≈ 0.00 CNY</b>
                </p>
                <p class="cRed">
                   <?php if($iStatus): ?>
                        您的账户已冻结，请联系亚币客服
                   <?php endif; ?>
                </p>
            </div>
        </div>

        <div class="tb-wrap mt10 pt10">
            <table>
                <thead>
                <tr>
                    <th class="opt">币种</th>
                    <th class="opt">余额</th>
                    <th class="opt">可用余额</th>
                    <th class="opt">冻结余额</th>
                    <th class="opt">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $oUserAccounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aUserAccounts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="opt"><?php echo e($aUserAccounts->money_identifier); ?></td>
                    <td class="opt"><?php echo e($aUserAccounts->balance); ?></td>
                    <td class="opt"><?php echo e($aUserAccounts->available); ?></td>
                    <td class="opt"><?php echo e($aUserAccounts->frozen); ?></td>
                    <td class="opt">
                        <a class="yb-btn blue mr16" href="<?php echo e(route('user-center.withdraw')); ?>">提现</a>
                        <a class="yb-btn" href="<?php echo e(route('user-center.recharge')); ?>">充值</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="tb-bottom-btns tc">
                <a class="yb-btn gray mr20" href="<?php echo e(route("order-manage.order-record")); ?>">查看交易记录</a>
                <a class="yb-btn gray" href="<?php echo e(route("transaction-record.index")); ?>">查看帐变记录</a>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>