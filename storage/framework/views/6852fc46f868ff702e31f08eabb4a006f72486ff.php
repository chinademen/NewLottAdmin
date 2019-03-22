<?php $__env->startSection("title"); ?>
    <title><?php echo e(___('_main.login')); ?></title>
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
                    <label><?php echo e(___('_getbackpwd.account')); ?></label>
                    <div class="input-box">
                        <input class="lg-input" type="account" placeholder="<?php echo e(___('_getbackpwd.pls_insert_account')); ?>"
                               id="username">
                        <div class="remark">
                            <i class="iconfont icon-gantanhao cRed mr5" style="display: none"></i>
                            <span class="text cRed" style="display: none"></span>
                        </div>
                    </div>
                </div>
                <div class="lg-input-wrap">
                    <label>密码</label>
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

                <div class="lg-input-wrap">
                    <label><?php echo e(___('_register.sms')); ?></label>
                    <div class="input-box">
                        <input class="lg-input input-yzm" type="text" name="test_code" id="test_code">
                        <div class="yzm">
                            <a class="getYzm" id='getYzm' href="javascript:"><?php echo e(___('_register.get_sms')); ?></a>
                        </div>
                        <div class="remark">
                            <i class="iconfont icon-gantanhao cRed mr5" style="display: none"></i>
                            <span class="text cRed" id="test-code-msg" style="display: none"></span>
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

        //短信时间等待getYzm
        $(".yzm").click(function () {

            var time = 120;
            var clock;
            clock = setInterval(function () {
                time--;
                $("#getYzm").text(time + "<?php echo e(___('_login.seconds_to_send')); ?>");
                if (time < 0) {
                    i = window.clearInterval(clock);
                    time = 120;
                    $("#getYzm").html("<?php echo e(___('_login.get_code')); ?>");
                }
            }, 1000);
        });

        //表单提交
        $(function () {
            $("#password").attr("type", "password");
            $("#J_submit").click(function (style) {

                var objUsername = $("#username");
                var objPassword = $("#password");
                var objTestCode = $("#test_code");
                var objRepeatPassword = $("#password_confirmation");

                var password = objPassword.val();
                var username = objUsername.val();
                var testcode = objTestCode.val();
                var repeatpassword = objRepeatPassword.val();

                Password = $.trim(password);
                Username = $.trim(username);
                TestCode = $.trim(testcode);
                RepeatPassword = $.trim(repeatpassword);

                if (Username.length < 1) {
                    showTipsInfo(objUsername, "error", "<?php echo e(___('_getbackpwd.username_require')); ?>");
                    return false;
                }

                if (Password.length < 6 || Password.length > 10) {
                    showTipsInfo(objPassword, "error", "<?php echo e(___('_register.password_error1')); ?>");
                    return false;
                }

                if (/^\d+$/.test(Password)) {
                    showTipsInfo(objPassword, "error", "<?php echo e(___('_register.password_error2')); ?>");
                    return false;
                }

                if (/^[a-z]+$/i.test(Password)) {
                    showTipsInfo(objPassword, "error", "<?php echo e(___('_register.password_error3')); ?>");
                    return false;
                }
                if (!/^[A-Za-z0-9]+$/.test(Password)) {
                    showTipsInfo(objPassword, "error", "<?php echo e(___('_register.password_error4')); ?>");
                    return false;
                }

                if (Password != RepeatPassword) {
                    showTipsInfo(objRepeatPassword, "error", "<?php echo e(___('_register.password_error5')); ?>");
                    return false;
                }

                if (TestCode.length < 1) {
                    showTipsInfo(objTestCode, "error", "<?php echo e(___('_login.pls_add_test_code')); ?>");
                    return false;
                }

                $.ajax({
                    type: 'post',
                    url: '/auth/getBackPWD',
                    dataType: "json",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        "username": Username,
                        "password": Password,
                        "password_confirmation": RepeatPassword,
                        "test_code": TestCode
                    },

                    success: function (d) {
                        switch (d.code) {
                            case 501:
                            case 504:
                                showTipsInfo(objUsername, "error", d.msg);
                                break;
                            case 502:
                                showTipsInfo(objTestCode, "error", d.msg);
                                break;
                            case 503:
                                if (d.data.hasOwnProperty("username")) {
                                    showTipsInfo(objUsername, "error", d.data["username"]);
                                }

                                if (d.data.hasOwnProperty("password")) {
                                    showTipsInfo(objPassword, "error", d.data["password"]);
                                }
                            case 0:
                                window.location.href = "<?php echo e(route('login')); ?>";
                                break;
                        }

                        return false;

                    }
                });
            });


        });

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>