<?php $__env->startSection("title"); ?>
    <title><?php echo e(___('_main.title.setting_cash_password')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <div class="login-bg">
        <div class="login-wrap">
            <h3 class="pt45"><?php echo e(___('_funds.setting_cash_password')); ?></h3>
            <div class="lg-form mt20">
                <div class="lg-input-wrap">
                    <label><?php echo e(___('_funds.cash_password')); ?></label>
                    <div class="input-box">
                        <input class="lg-input" type="password" name="cash_password" id="cash_password"
                               placeholder="<?php echo e(___('_funds.placeholder')); ?>">
                        <div class="remark">
                            <i class="iconfont   mr5 hide"></i>
                            <span class="text   hide">密码错误！</span>
                        </div>
                    </div>
                </div>
                <div class="lg-input-wrap">
                    <label><?php echo e(___('_funds.repeat_cash_password')); ?></label>
                    <div class="input-box">
                        <input class="lg-input" type="password" name="repeat_cash_password" id="repeat_cash_password">
                        <div class="remark">
                            <i class="iconfont  mr5 hide"></i>
                            <span class="text hide">重复密码错误！</span>
                        </div>
                    </div>
                </div>
                <div class="lg-btns mt20">
                    <a class="yb-btn" href="javascript:" id="J_submit"><?php echo e(___('_funds.confirm')); ?></a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("script"); ?>
    <script type="application/javascript">
        $(function () {

            //回车确认
            $(document).keypress(function (event) {
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if (keycode == '13') {
                    ajaxData();
                }
            });

            $("#J_submit").click(function () {
                ajaxData();
            });

            function ajaxData() {
                var objCashPassword = $("#cash_password");
                var objRepeatCashPassword = $("#repeat_cash_password");

                var cashPassword = objCashPassword.val();
                var repeatCashPassword = objRepeatCashPassword.val();
                cashPassword = $.trim(cashPassword);
                if (cashPassword.length < 8 || cashPassword.length > 16) {
                    yb.showTipsInfo(objCashPassword, "error", "<?php echo e(___('_funds.password_error1')); ?>");
                    return false;
                }
                if (/^\d+$/.test(cashPassword)) {
                    yb.showTipsInfo(objCashPassword, "error", "<?php echo e(___('_funds.password_error2')); ?>");
                    return false;
                }
                if (/^[a-z]+$/i.test(cashPassword)) {
                    yb.showTipsInfo(objCashPassword, "error", "<?php echo e(___('_funds.password_error3')); ?>");
                    return false;
                }
                if (!/^[A-Za-z0-9]+$/.test(cashPassword)) {
                    yb.showTipsInfo(objCashPassword, "error", "<?php echo e(___('_funds.password_error4')); ?>");
                    return false;
                }

                if (repeatCashPassword != cashPassword) {
                    yb.showTipsInfo(objRepeatCashPassword, "error", "<?php echo e(___('_funds.password_error5')); ?>");
                    return false;
                }
                $.ajax({
                    url: "<?php echo e(route('user-center.setting-cash-password')); ?>",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        'cash_password': cashPassword,
                        'repeat_cash_password': repeatCashPassword,
                        '_token': "<?php echo e(csrf_token()); ?>"
                    },
                    success: function (res) {
                        if (res.code != "0") {
                            layer.msg(res.msg, {icon: 2});
                        } else {
                            layer.msg(res.msg, {icon: 1});
                            //暂停3秒跳到登录页面
                            setTimeout(function () {
                                window.location.href = "<?php echo e(route('home')); ?>";
                            }, 3000);
                        }
                    },
                    error: function (res) {
                        //alert(res);
                    }
                });
            }
        })
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>