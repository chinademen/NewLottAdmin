<?php $__env->startSection("title"); ?>
    <title><?php echo e(___('_main.title.login')); ?></title>
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
            <h3 class="pt45"><?php echo e(___('_login.welcome')); ?></h3>
            <div class="lg-tab-head mt20 left">
                <a class="left" id="left" href="javascript:"><?php echo e(___('_login.phone_login')); ?></a><a id="right"
                                                                                                   class="right"
                                                                                                   href="javascript:"><?php echo e(___('_login.email_login')); ?></a>
                <div class="line"></div>
            </div>
            <div class="lg-form mt20">
                <form method="post" class="form-horizontal" action="">
                    <?php echo e(csrf_field()); ?>

                    <div class="lg-input-wrap" id="tel-box">
                        <label><?php echo e(___('_login.tel')); ?></label>
                        <div class="input-box">
                            <input class="lg-input" type="text" name="tel" id="tel">
                            <div class="remark">
                                <i class="iconfont icon-gou cRed mr5" style="display: none"></i>
                                <span class="text cRed" id="tel-msg"
                                      style="display: none"></span>
                            </div>
                        </div>
                    </div>
                    <div class="lg-input-wrap" id="email-box" style="display: none">
                        <label><?php echo e(___('_login.email')); ?></label>
                        <div class="input-box">
                            <input class="lg-input" type="text" name="email" id="email">
                            <div class="remark">
                                <i class="iconfont icon-gou cRed mr5" style="display: none"></i>
                                <span class="text cRed" id="email-msg"
                                      style="display: none"></span>
                            </div>
                        </div>
                    </div>
                    <div class="lg-input-wrap">
                        <label><?php echo e(___('_login.password')); ?></label>
                        <div class="input-box">
                            <input class="lg-input" type="text" name="password" id="password">
                            <div class="remark">
                                <i class="iconfont icon-gantanhao cRed mr5" style="display: none"></i>
                                <span class="text cRed" id="password-msg"
                                      style="display: none"><?php echo e(___('_login.wrong_password')); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="lg-input-wrap">
                        <label><?php echo e(___('_login.test_code')); ?></label>
                        <div class="input-box">
                            <input class="lg-input input-yzm" type="text" name="test_code" id="test_code">
                            <div class="yzm">
                                <img src="/captcha?" alt="<?php echo e(___('_login.test_code')); ?>" style="cursor: pointer">

                            </div>
                            <div class="remark">
                                <i class="iconfont icon-gou cRed mr5" style="display: none"></i>
                                <span class="text cRed" id="test-msg" style="display: none"><?php echo e(___('_login.wrong_test_code')); ?>

                                    ！</span>
                            </div>
                        </div>
                    </div>
                    <div class="lg-btns mt20">
                        <a class="yb-btn" href="javascript:" id="J_submit"><?php echo e(___('_login.login')); ?></a>
                    </div>
                    <div class="reg mt20">
                        <?php echo e(___('_login.no_account')); ?> <a class="cBlue"
                                                          href="<?php echo e(route('register')); ?>"><?php echo e(___('_login.go_register')); ?></a>
                    </div>

                    <div class="reg mt20" id="Show_get_pwd">
                        <?php echo e(___('_register.forget_password')); ?> <a class="cBlue"
                                                                  href="<?php echo e(route('get-back-pwd')); ?>"><?php echo e(___('_register.get_back_password')); ?></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>
    <script type="application/javascript">
        layui.use(['layer'], function () {
            var layer = layui.layer

            var objPassword = $("#password");
            var objTel = $("#tel");
            var objEmail = $("#email");
            var objTestCode = $("#test_code");

            var style = 0;

            //基础样式
            objPassword.attr("type", "password");
            $("#left").click(function () {
                $("#tel-box").show();
                $("#email-box").hide();
                style = 0;
            });

            $("#right").click(function () {
                $("#tel-box").hide();
                $("#email-box").show();
                style = 1;
            });

            //验证码
            $('.yzm img').click(function () {
                var src = "/captcha?" + ((Math.random() * 9 + 1) * 100000).toFixed(0);
                $(this).attr('src', src);
            });

            var e = document.getElementById('Login-btn');
            var w = document.getElementById('Register-btn');
            if (e) {
                e.className = "yb-btn";
                w.className = "yb-btn blue";
            }

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
                    } else if (keycode == '32') {
                        layer.msg("不允许输入空格");
                    }
                });

            });


            function ajaxData() {

                var password = objPassword.val();
                var tel = objTel.val();
                var email = objEmail.val();
                var testcode = objTestCode.val();

                Password = $.trim(password);
                Tel = $.trim(tel);
                Email = $.trim(email);
                TestCode = $.trim(testcode);

                if (style === 0) {
                    if (Tel.length < 1) {
                        yb.showTipsInfo(objTel, "error", "<?php echo e(___('_login.pls_add_phone')); ?>");
                        return false;
                    }
                    if (!/^1[34578]\d{9}$/.test(Tel)) {
                        yb.showTipsInfo(objTel, "error", "<?php echo e(___('_login.pls_add_correct_phone')); ?>");
                        return false;
                    }
                }

                if (style === 1) {
                    if (Email.length < 1) {
                        yb.showTipsInfo(objEmail, "error", "<?php echo e(___('_login.pls_add_email')); ?>");
                        return false;
                    }
                    if (!/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/.test(Email)) {
                        yb.showTipsInfo(objEmail, "error", "<?php echo e(___('_login.pls_add_correct_email')); ?>");
                        return false;
                    }
                }

                if (Password.length < 1) {
                    yb.showTipsInfo(objPassword, "error", "<?php echo e(___('_login.password_require')); ?>");
                    return false;
                }

                if (TestCode.length < 1) {
                    yb.showTipsInfo(objTestCode, "error", "<?php echo e(___('_login.pls_add_test_code')); ?>");
                    return false;
                }

                $.ajax({
                    type: 'post',
                    url: '/auth/login',
                    dataType: "json",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        "telephone": Tel,
                        "email": Email,
                        "style": style,
                        "password": Password,
                        "test_code": TestCode
                    },

                    success: function (d) {
                        if (d.code == 401) {
                            yb.showTipsInfo(objTestCode, "error", d.msg);
                            $('.yzm img').attr('src', "/captcha?" + ((Math.random() * 9 + 1) * 100000).toFixed(0));
                        } else if (d.code == 0) {
                            window.location.href = "/";

                        } else {
                            $('.yzm img').attr('src', "/captcha?" + ((Math.random() * 9 + 1) * 100000).toFixed(0));
                            layer.msg(d.msg, {icon: 2})
                        }

                        return false;

                    }
                });
            }
        });
    </script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>