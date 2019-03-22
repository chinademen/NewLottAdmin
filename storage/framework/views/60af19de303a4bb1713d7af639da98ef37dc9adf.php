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
            <div class="lg-tab-head mt20 left">
                <a class="left" id="left">手机注册</a><a class="right" id="right">邮箱注册</a>
                <div class="line"></div>
            </div>
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
                    <a class="yb-btn" href="javascript:" id="J_submit">下一步</a>
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
        var style = 0;
        var sUrl = "<?php echo e(route('send-sms-msg')); ?>";

        //基础样式
        $("#left").click(function () {
            $("#tel-box").show();
            $("#email-box").hide();
            style = 0;
            sUrl = "<?php echo e(route('send-sms-msg')); ?>";

        });

        $("#right").click(function () {
            $("#tel-box").hide();
            $("#email-box").show();
            style = 1;
            sUrl = "<?php echo e(route('send-mail-msg')); ?>";
        });

        var objUsername = $("#username");
        var objTestCode = $("#test_code");
        var objClock = $("#getYzm");

        //短信时间等待getYzm
        objClock.click(function () {

            Username = $.trim(objUsername.val());
            if (Username.length < 1) {
                layer.msg("请填写有效的联系方式");
            }

            //过滤联系方式
            if (style === 0) {
                if (!/^1[34578]\d{9}$/.test(Username)) {
                    yb.showTipsInfo(objUsername, "error", "<?php echo e(___('_register.tel_error1')); ?>");
                    return false;
                }
            } else if (style === 1) {
                if (!/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/.test(Username)) {
                    yb.showTipsInfo(objUsername, "error", "<?php echo e(___('_register.email_error1')); ?>");
                    return false;
                }
            }

            //手机找回
            $.ajax({
                type: 'post',
                url: sUrl,
                dataType: "json",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "email": Username,
                    "type": 'single',
                    "temp": 'password',
                    "country_id": '37' //默认中国
                },

                success: function (d) {
                    yb.showTipsInfo(objTestCode, "error", d.msg);
                    switch (d.code) {
                        case 0:
                            var time = 60;
                            var clock;
                            clock = setInterval(function () {
                                time--;
                                objClock.text(time + "<?php echo e(___('_login.seconds_to_send')); ?>");
                                if (time < 0) {
                                    i = window.clearInterval(clock);
                                    time = 60;
                                    objClock.html("<?php echo e(___('_login.get_code')); ?>");
                                    window.location.href = "<?php echo e(route('get-back-pwd')); ?>";
                                }
                            }, 1000);
                            break;
                    }
                    return false;

                }
            });
        });

        //表单提交
        $(function () {

            //点击按钮
            $("#J_submit").click(function () {
                ajaxData();
            });

            //回车确认
            $(document).keypress(function (event) {
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if (keycode == '13') {
                    ajaxData();
                }
            });

        });

        function ajaxData() {
            var username = objUsername.val();
            var testcode = objTestCode.val();

            Username = $.trim(username);
            TestCode = $.trim(testcode);

            if (Username.length < 1) {
                yb.showTipsInfo(objUsername, "error", "<?php echo e(___('_getbackpwd.username_require')); ?>");
                return false;
            }

            if (TestCode.length < 1) {
                yb.showTipsInfo(objTestCode, "error", "<?php echo e(___('_login.pls_add_test_code')); ?>");
                return false;
            }

            $.ajax({
                type: 'post',
                url: "<?php echo e(route('get-back-pwd')); ?>",
                dataType: "json",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "username": Username,
                    "test_code": TestCode
                },

                success: function (d) {
                    switch (d.code) {
                        case 501:
                        case 503:
                            yb.showTipsInfo(objUsername, "error", d.msg);
                            break;
                        case 502:
                            yb.showTipsInfo(objTestCode, "error", d.msg);
                            break;
                        case 0:
                            <?php if(!empty(session("auth-user-id"))&&!empty(session("test-code"))): ?>
                                window.location.href = "/auth/reset-pwd?auth_code=" + d.data;
                            <?php else: ?>
                            yb.showTipsInfo(objUsername, "error", "信息有误");
                            <?php endif; ?>
                                break;
                    }

                    return false;

                }
            });
        }

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>