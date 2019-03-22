<div class="w-left">
    <dl class="menu">
        <dt><i class="iconfont icon-gerenzhongxin"></i><span>个人中心</span></dt>
        <dd <?php if($sPageTag == "safe"): ?> class="active" <?php endif; ?>>
            <a class="item" href="<?php echo e(route("user-center.safe")); ?>">安全设置</a>
        </dd>
        <dd <?php if($sPageTag == "trade-setting"): ?> class="active" <?php endif; ?>>
            <a class="item" href="<?php echo e(route('user-center.trade-setting')); ?>">交易设置</a>
        </dd>
        <dd <?php if($sPageTag == "wallet"): ?> class="active" <?php endif; ?>>
            <a class="item" href="<?php echo e(route("user-center.wallet")); ?>">个人钱包</a>
        </dd>
        <dd <?php if($sPageTag == "advertise"): ?> class="active" <?php endif; ?>>
            <a class="item" href="<?php echo e(route("user-center.my-advertise")); ?>">我的广告</a>
        </dd>
        <dd <?php if($sPageTag == "trust"): ?> class="active" <?php endif; ?>>
            <a class="item" href="<?php echo e(route("user-center.trust-list")); ?>">我的信任列表</a>
        </dd>
        <dd <?php if($sPageTag == "messagelist"): ?> class="active" <?php endif; ?>>
            <a class="item" href="<?php echo e(route("user-center.messagelist")); ?>">我的消息</a>
        </dd>
    </dl>
</div>
