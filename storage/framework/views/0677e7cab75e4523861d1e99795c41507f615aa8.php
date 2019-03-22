<?php $__env->startSection("title"); ?>
    <title><?php echo e(___('_main.title.reset_password')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("style"); ?>
    <style>
        body .layui-layer-btn .layui-layer-btn0 {
            border-color: #4a7cd8;
            background-color: #4a7cd8;
            color: #fff;
        }

        body .layui-layer-btn .layui-layer-btn0:hover {
            border-color: #4e84e8;
            background-color: #4e84e8;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <div class="login-bg">
        <div class="login-wrap">
            <h3 class="pt45"><?php echo e(___('_getbackpwd.forget_password')); ?></h3>
            <div class="lg-form mt20">
                <div class="lg-input-wrap">
                    <label><?php echo e(___('_getbackpwd.password')); ?></label>
                    <div class="input-box">
                        <input class="lg-input" type="password"
                               placeholder="<?php echo e(___('_getbackpwd.pls_insert_password')); ?>" id="password">
                        <div class="remark">
                            <i class="iconfont icon-gantanhao cRed mr5" style="display: none"></i>
                            <span class="text cRed" style="display: none"></span>
                        </div>
                    </div>
                </div>
                <div class="lg-input-wrap">
                    <label><?php echo e(___('_getbackpwd.repeat_password')); ?></label>
                    <div class="input-box">
                        <input class="lg-input" type="password" id="password_confirmation">
                        <div class="remark">
                            <i class="iconfont icon-gantanhao cRed mr5" style="display: none"></i>
                            <span class="text cRed" style="display: none"></span>
                        </div>
                    </div>
                </div>
                <div class="lg-btns mt20">
                    <a class="yb-btn" id="J_submit" style="cursor: pointer"><?php echo e(___('_getbackpwd.reset_password')); ?></a>
                </div>
                <div class="reg mt20">
                    <?php echo e(___('_getbackpwd.has_password')); ?>? <a class="cBlue"
                                                            href="<?php echo e(route('login')); ?>"><?php echo e(___('_getbackpwd.go_login')); ?></a>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>

    <script type="application/javascript">
        $("#password").attr("type", "password");

        //表单提交
        $(function () {

            $("#J_submit").click(function () {
                ajaxData();
            });

            //回车确认
            $(document).keypress(function (event) {
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if (keycode == '13') {
                    ajaxData();
                } else if (keycode == '32') {
                    layer.msg("不允许输入空格");
                }
            });
        });

        function ajaxData() {
            var objPassword = $("#password");
            var objRepeatPassword = $("#password_confirmation");

            var password = objPassword.val();
            var repeatpassword = objRepeatPassword.val();

            Password = $.trim(password);
            RepeatPassword = $.trim(repeatpassword);


            if (Password.length < 6 || Password.length > 10) {
                yb.showTipsInfo(objPassword, "error", "<?php echo e(___('_register.password_error1')); ?>");
                return false;
            }

            if (/^\d+$/.test(Password)) {
                yb.showTipsInfo(objPassword, "error", "<?php echo e(___('_register.password_error2')); ?>");
                return false;
            }

            if (/^[a-z]+$/i.test(Password)) {
                yb.showTipsInfo(objPassword, "error", "<?php echo e(___('_register.password_error3')); ?>");
                return false;
            }
            if (!/^[A-Za-z0-9]+$/.test(Password)) {
                yb.showTipsInfo(objPassword, "error", "<?php echo e(___('_register.password_error4')); ?>");
                return false;
            }

            if (Password != RepeatPassword) {
                yb.showTipsInfo(objRepeatPassword, "error", "<?php echo e(___('_register.password_error5')); ?>");
                return false;
            }

            $.ajax({
                type: 'post',
                url: "<?php echo e(route('reset-pwd')); ?>",
                dataType: "json",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "auth_code": "<?php echo e($sAuthCode); ?>",
                    "password": Password,
                    "password_confirmation": RepeatPassword
                },

                success: function (d) {
                    switch (d.code) {
                        case 503:
                            yb.showTipsInfo(objPassword, "error", d.msg);
                        case 0:
                            yb.msg(d.msg + "<?php echo e(___('_register.go_to_login')); ?>");
                            var url = "<?php echo e(route('login')); ?>";
                            setTimeout(function () {
                                window.location.href = url;
                            }, 3000);
                            break;
                    }

                    return false;

                }
            });
        }

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>