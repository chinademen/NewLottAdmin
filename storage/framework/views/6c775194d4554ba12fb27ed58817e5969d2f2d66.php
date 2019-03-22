<div class="top">
    <div class="wrap1200 clearfix">
        <img class="logo" src="/img/logo.png" alt="">
        <div class="top-left">
            <a href="<?php echo e(route("home")); ?>"><?php echo e(___('_main.title.first_page')); ?></a>
            <a href="<?php echo e(route("trading-center.index")); ?>"><?php echo e(___('_main.title.trade_center')); ?></a>
            <?php if(Auth::check()): ?>
                <a href="<?php echo e(route("order-manage.index")); ?>"><?php echo e(___('_main.title.order_manage')); ?></a>
                <a href="<?php echo e(route("cash-manage.index")); ?>"><?php echo e(___('_main.title.cash_manage')); ?></a>
                <a href="<?php echo e(route("user-center.safe")); ?>"><?php echo e(___('_main.title.personal_center')); ?></a>
            <?php endif; ?>
        </div>

        <?php if(!Auth::check()): ?>
            <div class="top-btns hide11">
                <a class="yb-btn " href="<?php echo e(route("login")); ?>" id="Login-btn"><?php echo e(___('_main.title.login')); ?></a>
                <a class="yb-btn blue" href="<?php echo e(route("register")); ?> "
                   id="Register-btn"><?php echo e(___('_main.title.register')); ?></a>
            </div>
        <?php else: ?>
            <div class="registered">
                <span class="mr10"><?php echo e(Auth::user()->nickname); ?></span><i class="iconfont icon-xiala"></i>
                <div class="sel-box">
                    <i class="iconfont icon-triangle-up"></i>
                    <ul>
                        <li>
                            <a href="<?php echo e(route("user-center.trade-setting")); ?>"><i
                                        class="iconfont icon-qianbao vm"></i><span
                                        class="vm"><?php echo e(___('_main.window.my_deal')); ?></span></a>
                        </li>
                        <li>
                            <a href="<?php echo e(route("user-center.wallet")); ?>"><i class="iconfont icon-ad vm"></i><span
                                        class="vm"><?php echo e(___('_main.window.personal_wallet')); ?></span></a>
                        </li>
                        <li>
                            <a href="<?php echo e(route("user-center.messagelist")); ?>"><i class="iconfont icon-ad vm"></i><span
                                        class="vm"><?php echo e(___('_main.window.personal_message')); ?></span><i class="mark" id="msg_num"></i></a>
                        </li>
                        <li>
                            <a href="<?php echo e(route("logout")); ?>" id="Out-line"><i class="iconfont icon-mairu vm"></i><span
                                        class="vm"><?php echo e(___('_main.window.log_out')); ?></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<script type="text/javascript">
    setInterval(function () {
        $.ajax({
            type: 'get',
            url: '/user-center/msgopt',
            dataType: "json",
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                "type": 'get_num',
            },
            success: function (d) {
                var msg_num=parseInt(d.msg_num);
                if(msg_num > 0){
                    $('#msg_num').html(msg_num);
                }
                return false;
            },
            error: function () {
                return false;
            }
        });
    },5000)
</script>