<?php $__env->startSection("title"); ?>
    <title><?php echo e(___('_wallet.personal_wallet')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <!--中间内容区-->
    <div class="content mt30 clearfix wrap1200">
        
        <?php echo $__env->make('layout.user_center_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="mn">
            <div class="w-right">
                <div class="ss-r-wrap clearfix">
                    <div class="head-wrap">
                        <img src="<?php echo e($oUser->avatar ? env("STATIC_RES_URL") . "/" . $oUser->avatar : env("DEFAULT_AVATAR")); ?>"
                             alt="<?php echo e($oUser->nickname); ?>">
                        <h3 class="pt20"><?php echo e($oUser->nickname); ?></h3>
                        <p class="pt5"><?php echo e(___('_wallet.created_at')); ?>：<?php echo e($oUser->created_at); ?></p>
                    </div>
                    <div class="personal-wrap">
                        <div class="up">
                            <p class="title"><?php echo e(___('_wallet.available_btc')); ?>：</p>
                            <div class="clearfix">
                                <p class="num cRed"><?php echo e(isset($oUserAccount->available) ? number_format($oUserAccount->available, 8) : 0.00); ?></p>
                                <div class="btns">
                                    <a class="yb-btn mr15"
                                       href="<?php echo e(route("user-center.recharge")); ?>"><?php echo e(___('_wallet.deposit')); ?></a><a
                                            class="yb-btn blue "
                                            href="<?php echo e(route("user-center.withdraw")); ?>"><?php echo e(___('_wallet.withdraw')); ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="down clearfix">
                            <div class="left">
                                <p class="title"><?php echo e(___('_wallet.account_all_money')); ?>：</p>
                                <p class="num"><?php echo e(isset($oUserAccount->balance) ? number_format($oUserAccount->balance, 8) : 0.00); ?></p>
                            </div>
                            <div class="right">
                                <p class="title"><?php echo e(___('_wallet.freeze_money')); ?>：</p>
                                <p class="num"><?php echo e(isset($oUserAccount->frozen) ? number_format($oUserAccount->frozen, 8) : 0.00); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>