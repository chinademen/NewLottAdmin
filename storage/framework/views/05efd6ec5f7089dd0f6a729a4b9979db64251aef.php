<?php $__env->startSection("title"); ?>
    <title><?php echo e(___('_main.title.register')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("style"); ?>
    <style>
        .pt45 {
            padding-top: 15px;
        }

        .mt20 {
            margin-top: 10px;
        }

        .login-wrap .lg-input-wrap {
            padding-bottom: 5px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <div class="login-bg">
        <div class="login-wrap">
            <h3 class="pt45"><?php echo e(___('_register.wclcome_register')); ?></h3>
            <div class="lg-tab-head mt20 left">
                <a class="left" href="javascript:" id="left"><?php echo e(___('_register.phone_register')); ?></a><a class="right"
                                                                                                         href="javascript:"
                                                                                                         id="right"><?php echo e(___('_register.email_register')); ?></a>
                <div class="line"></div>
            </div>

            <div class="lg-form mt20">
                <form method="post" class="form-horizontal" action="">
                    <?php echo e(csrf_field()); ?>

                    <div class="lg-input-wrap">
                        <label><?php echo e(___('_register.nickname')); ?></label>
                        <div class="input-box">
                            <input class="lg-input" type="text" name="nickname" id="nickname">
                            <div class="remark">
                                <i class="iconfont icon-gou cRed mr5" style="display: none"></i>
                                <span class="text cRed" id="nickname-msg" style="display: none"></span>
                            </div>
                        </div>
                    </div>
                    <div class="lg-input-wrap tel-box" id="tel-box" style="display: block">
                        <label><?php echo e(___('_register.phone')); ?></label>
                        <div class="input-box">
                            <input class="lg-input" type="text" name="tel" id="tel">
                            <div class="remark">
                                <i class="iconfont icon-gantanhao cRed mr5" style="display: none"></i>
                                <span class="text cRed" id="tel-msg" style="display: none"></span>
                            </div>
                        </div>
                    </div>
                    <div class="lg-input-wrap email-box" id="email-box" style="display: none">
                        <label><?php echo e(___('_register.email')); ?></label>
                        <div class="input-box">
                            <input class="lg-input" type="text" name="email" id="email">
                            <div class="remark">
                                <i class="iconfont icon-gantanhao cRed mr5" style="display: none"></i>
                                <span class="text cRed" id="tel-msg" style="display: none"></span>
                            </div>
                        </div>
                    </div>
                    <div class="lg-input-wrap" style="display: none;">
                        <label><?php echo e(___('_register.country')); ?></label>
                        <div class="input-box">
                            <select class="lg-input" name="country_id" id="country_id" style="cursor: pointer">
                                <?php $__currentLoopData = $aCountryCodeAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>"
                                            <?php if($value->english_name == 'China'): ?> selected <?php endif; ?> ><?php echo e($value->chinese_name."(+".$value->phone_code.")"); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="remark">
                                <i class="iconfont icon-gantanhao cRed mr5" style="display: none"></i>
                                <span class="text cRed" id="country_id-msg" style="display: none"></span>
                            </div>
                        </div>
                    </div>
                    <div class="lg-input-wrap">
                        <label><?php echo e(___('_register.password')); ?></label>
                        <div class="input-box">
                            <input class="lg-input" type="password" name="password" id="password">
                            <div class="remark">
                                <i class="iconfont icon-gantanhao cRed mr5" style="display: none"></i>
                                <span class="text cRed" id="password-msg" style="display: none"></span>
                            </div>
                        </div>
                    </div>
                    <div class="lg-input-wrap">
                        <label><?php echo e(___('_register.repeat_password')); ?></label>
                        <div class="input-box">
                            <input class="lg-input" type="password" name="password_confirmation"
                                   id="password_confirmation">
                            <div class="remark">
                                <i class="iconfont icon-gantanhao cRed mr5" style="display: none"></i>
                            </div>
                        </div>
                    </div>
                    <div class="lg-input-wrap tel-box" style="display: block;">
                        <label><?php echo e(___('_register.sms')); ?></label>
                        <div class="input-box">
                            <input class="lg-input input-yzm" type="text" name="sms_code" id="input-sms-code">
                            <div class="yzm">
                                <a class="getYzm" id='a-sms-code' href="javascript:"><?php echo e(___('_register.get_sms')); ?></a>
                            </div>
                            <div class="remark">
                                <i class="iconfont icon-gantanhao cRed mr5" style="display: none"></i>
                                <span class="text cRed" id="sms-code-msg" style="display: none"></span>
                            </div>
                        </div>
                    </div>

                    <div class="lg-input-wrap email-box" style="display: none;">
                        <label><?php echo e(___('_register.email_code')); ?></label>
                        <div class="input-box">
                            <input class="lg-input input-yzm" type="text" name="email_code" id="input-email-code">
                            <div class="yzm">
                                <a class="getYzm" id='a-email-code'
                                   href="javascript:"><?php echo e(___('_register.get_email_code')); ?></a>
                            </div>
                            <div class="remark">
                                <i class="iconfont icon-gantanhao cRed mr5" style="display: none"></i>
                                <span class="text cRed" id="email-code-msg" style="display: none"></span>
                            </div>
                        </div>
                    </div>


                    <div class="terms mt25">
                        <input class="vm mr10" type="checkbox" name="rules" id="rules">
                        <span class="vm"><?php echo e(___('_login.accept_the_rules')); ?><a
                                    class="cBlue" href="javascript:"><?php echo e(___('_login.rules')); ?></a></span>
                    </div>
                    <div class="lg-btns mt20">
                        <a class="yb-btn" href="javascript:" id="J_submit"><?php echo e(___('_register.register')); ?></a>
                    </div>
                    <div class="reg mt20">
                        <?php echo e(___('_register.has_account')); ?> <a class="cBlue"
                                                              href="<?php echo e(route('login')); ?>"><?php echo e(___('_register.go_login')); ?></a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php echo $__env->make("layout.captcha_window", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection("script"); ?>

    <script type="application/javascript">
        var objPassword = $("#password");
        var objRepeatPassword = $("#password_confirmation");
        var objNickName = $("#nickname");
        var objTel = $("#tel");
        var objEmail = $("#email");
        var objCountryId = $("#country_id");
        var objSmsCode = $("#input-sms-code");
        var objEmailCode = $("#input-email-code");
        var objClock = $(".getYzm");
        var objRule = $("#rules");
        var smsTimeLimit = "<?php echo e($iAuthCodeTimeLimit+1); ?>";
        var emailTimeLimit = "<?php echo e($iEmailCodeTimeLimit+1); ?>";
        var smsTimeStorageKey = 'register_sms_send_time_';
        var emailTimeStorageKey = 'register_email_send_time_';
        //注册类型0-手机;1-邮箱
        var style = 0;

        //基础样式
        objPassword.attr("type", "password");
        objRule.attr('checked', true);

        $("#left").click(function () {
            $(".tel-box").show();
            $(".email-box").hide();
            style = 0;
        });

        $("#right").click(function () {
            $(".tel-box").hide();
            $(".email-box").show();
            style = 1;
        });

        var e = document.getElementById('Login-btn');
        var w = document.getElementById('Register-btn');
        if (e) {
            e.className = "yb-btn blue";
            w.className = "yb-btn";
        }

        //点击信号
        clickSmsCode = true;
        clickEmailCode = true;

        //发送验证码
        objClock.click(function () {
            switch (style) {
                case 0:
                    sendSmsCodeBefore(this);
                    break;
                case 1:
                    sendEmailCodeBefore(this);
                    break;
                default:
                    layer.msg("<?php echo e(___('_register.pls_add_contact_number')); ?>");
                    break;
            }
        });

        function sendSmsCodeBefore(obj) {
            if (clickSmsCode === false) {
                return false;
            }
            var $objText = $(obj);
            Tel = $.trim(objTel.val());
            if (Tel.length == 0 || !/^1[34578]\d{9}$/.test(Tel)) {
                yb.showTipsInfo(objTel, "error", "<?php echo e(___('_register.tel_error1')); ?>");
                return false;
            }
            yb.captchaWindow(obj, Tel, sendSmsCode);
            //sendSmsCode(obj);
        }

        //发送短信验证码
        function sendSmsCode(obj) {
            var $objText = $(obj);
            var imgCode = '';
            if (arguments.length >= 2) {
                imgCode = arguments[1];
            }

            Tel = $.trim(objTel.val());
            $.ajax({
                type: 'post',
                url: '/auth/send-sms-msg',
                dataType: "json",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "mobile": Tel,
                    "imgcode": imgCode,
                    "type": 'single',
                    "temp": 'register',
                    "country_id": objCountryId.val()
                },
                beforeSend() {
                    $objText.html("<?php echo e(___('_register.sending')); ?>");
                    clickSmsCode = false;
                },
                success: function (d) {
                    switch (d.code) {
                        case 0:
                            window.localStorage.setItem(smsTimeStorageKey + Tel, Date.parse(new Date()) / 1000);
                            setSmscodeTime(obj, smsTimeLimit);
                            yb.showTipsInfo(objSmsCode, "error", d.msg);
                            break;
                        case 1001:
                            var smsTimeStorageVal = window.localStorage.getItem(smsTimeStorageKey + Tel);
                            var nowTime = Date.parse(new Date()) / 1000;
                            if (smsTimeStorageVal && Number(smsTimeStorageVal) + Number(smsTimeLimit) > nowTime) {
                                setEmailcodeTime(obj, Number(smsTimeStorageVal) + Number(smsTimeLimit) - nowTime)
                            } else {
                                yb.showTipsInfo(objSmsCode, "error", d.msg);
                                $objText.html("<?php echo e(___('_register.get_sms')); ?>");
                                clickSmsCode = true;
                            }
                            break;
                        case 603:
                            if (d.data.hasOwnProperty("type")) {
                                yb.showTipsInfo(objSmsCode, "error", d.data["type"]);
                            }

                            if (d.data.hasOwnProperty("mobile")) {
                                yb.showTipsInfo(objTel, "error", d.data["mobile"]);
                            }

                            if (d.data.hasOwnProperty("country_id")) {
                                yb.showTipsInfo(objCountryId, "error", d.data["country_id"]);
                            }
                            $objText.html("<?php echo e(___('_register.get_sms')); ?>");
                            clickSmsCode = true;
                            break;
                        default:
                            yb.showTipsInfo(objSmsCode, "error", d.msg);
                            $objText.html("<?php echo e(___('_register.get_sms')); ?>");
                            clickSmsCode = true;
                            break;
                    }

                    return false;
                },
                error: function () {
                    $objText.html("<?php echo e(___('_register.get_sms')); ?>");
                    clickSmsCode = true;
                    yb.showTipsInfo(objSmsCode, "error", "<?php echo e(___('_base.error_system')); ?>");
                    return false;
                }
            });
            return false;
        }

        function setSmscodeTime(obj, time) {
            clickSmsCode = false;
            var $objText = $(obj);
            var clock;
            clock = setInterval(function () {
                time--;
                $objText.text(time + "<?php echo e(___('_login.seconds_to_send')); ?>");
                if (time <= 0) {
                    window.clearInterval(clock);
                    //time = timeLimit;
                    $objText.html("<?php echo e(___('_register.get_sms')); ?>");
                    clickSmsCode = true;
                }
            }, 1000);
        }

        function sendEmailCodeBefore(obj) {
            if (clickEmailCode === false) {
                return false;
            }
            var $objText = $(obj);
            Email = $.trim(objEmail.val());
            if (Email.length < 1 || !/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/.test(Email)) {
                yb.showTipsInfo(objEmail, "error", "<?php echo e(___('_register.email_error1')); ?>");
                return false;
            }
            //yb.captchaWindow(obj,Email,sendEmailCode);
            sendEmailCode(obj);
        }

        function sendEmailCode(obj) {
            var $objText = $(obj);
            Email = $.trim(objEmail.val());
            $.ajax({
                type: 'post',
                url: "<?php echo e(route('send-mail-msg')); ?>",
                dataType: "json",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "email": Email,
                    "type": 'register'
                },

                beforeSend() {
                    $objText.html("<?php echo e(___('_register.sending')); ?>");
                    clickEmailCode = false;
                },
                success: function (d) {
                    switch (d.code) {
                        case 0:
                            window.localStorage.setItem(emailTimeStorageKey + Email, Date.parse(new Date()) / 1000);
                            setEmailcodeTime(obj, emailTimeLimit);
                            yb.showTipsInfo(objEmailCode, "error", d.msg);
                            break;
                        case 1005:
                            var emailTimeStorageVal = window.localStorage.getItem(emailTimeStorageKey + Email);
                            var nowTime = Date.parse(new Date()) / 1000;
                            if (emailTimeStorageVal && Number(emailTimeStorageVal) + Number(emailTimeLimit) > nowTime) {
                                setEmailcodeTime(obj, Number(emailTimeStorageVal) + Number(emailTimeLimit) - nowTime)
                            } else {
                                yb.showTipsInfo(objEmailCode, "error", d.msg);
                                $objText.html("<?php echo e(___('_register.get_email_code')); ?>");
                                clickEmailCode = true;
                            }
                            break;
                        case 603:
                            if (d.data.hasOwnProperty("type")) {
                                yb.showTipsInfo(objEmailCode, "error", d.data["type"]);
                            }

                            if (d.data.hasOwnProperty("email")) {
                                yb.showTipsInfo(objEmail, "error", d.data["email"]);
                            }

                            $objText.html("<?php echo e(___('_register.get_email_code')); ?>");
                            clickEmailCode = true;
                            break;
                        default:
                            yb.showTipsInfo(objEmailCode, "error", d.msg);
                            $objText.html("<?php echo e(___('_register.get_email_code')); ?>");
                            clickEmailCode = true;
                            break;
                    }
                    return false;
                },
                error: function () {
                    $objText.html("<?php echo e(___('_register.get_email_code')); ?>");
                    clickEmailCode = true;
                    yb.showTipsInfo(objEmailCode, "error", "<?php echo e(___('_base.error_system')); ?>");
                    return false;
                }
            });
            return false;
        }

        function setEmailcodeTime(obj, time) {
            clickEmailCode = false;
            var $objText = $(obj);
            var clock;
            clock = setInterval(function () {
                time--;
                $objText.text(time + "<?php echo e(___('_login.seconds_to_send')); ?>");
                if (time <= 0) {
                    i = window.clearInterval(clock);
                    //time = timeLimit;
                    $objText.html("<?php echo e(___('_register.get_email_code')); ?>");
                    clickEmailCode = true;
                }
            }, 1000);
        }

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
            var password = objPassword.val();
            var repeatPassword = objRepeatPassword.val();
            var nickname = objNickName.val();
            var tel = objTel.val();
            var email = objEmail.val();
            var testcode = style === 0 ? objSmsCode.val() : objEmailCode.val();

            Password = $.trim(password);
            RepeatPassword = $.trim(repeatPassword);
            NickName = $.trim(nickname);
            Tel = $.trim(tel);
            Email = $.trim(email);
            TestCode = $.trim(testcode);

            if (NickName.length < 5) {
                yb.showTipsInfo(objNickName, "error", "<?php echo e(___('_register.nickname_error1')); ?>");
                return false;
            }

            if (Email.length < 1 && style === 1) {
                yb.showTipsInfo(objEmail, "error", "<?php echo e(___('_register.email_require')); ?>");
                return false;
            }

            if (Tel.length < 1 && style === 0) {
                yb.showTipsInfo(objTel, "error", "<?php echo e(___('_register.tel_require')); ?>");
                return false;
            }

            if (Password.length < 8 || Password.length > 16) {
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

            //预定义字符过滤
            if (!/^[\u0391-\uFFE5A-Za-z0-9-\s]+$/.test(Password)) {
                yb.showTipsInfo(objPassword, "error", "密码不能存有特殊字符");
                return false;
            }

            if (Password != RepeatPassword) {
                yb.showTipsInfo(objRepeatPassword, "error", "<?php echo e(___('_register.password_error5')); ?>");
                return false;
            }

            if (!objRule.is(":checked")) {
                layer.msg("<?php echo e(___('_register.accept_the_rules')); ?>");
                return false;
            }

            if (style === 0) {
                if (!/^1[34578]\d{9}$/.test(Tel)) {
                    yb.showTipsInfo(objTel, "error", "<?php echo e(___('_register.tel_error1')); ?>");
                    return false;
                }
            } else {
                if (!/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/.test(Email)) {
                    yb.showTipsInfo(objEmail, "error", "<?php echo e(___('_register.email_error1')); ?>");
                    return false;
                }
            }

            $.ajax({
                type: 'post',
                url: "<?php echo e(route('register')); ?>",
                dataType: "json",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "nickname": NickName,
                    "telephone": Tel,
                    "email": Email,
                    "country_id": $("#country_id").val(),
                    "password": Password,
                    "password_confirmation": RepeatPassword,
                    "test_code": TestCode,
                    "rules": objRule.is(':checked'),
                    "style": style
                },

                success: function (d) {
                    switch (d.code) {
                        case 601:
                            layer.msg(d.msg);
                            break;
                        case 604:
                        case 605:
                        case 606:
                            yb.showTipsInfo(objNickName, "error", d.msg);
                            break;

                        case 602:
                            yb.showTipsInfo(objTestCode, "error", d.msg);
                            break;
                        case 603:
                            if (d.data.hasOwnProperty("nickname")) {
                                yb.showTipsInfo(objNickName, "error", d.data["nickname"]);
                            }

                            if (d.data.hasOwnProperty("telephone")) {
                                yb.showTipsInfo(objTel, "error", d.data["telephone"]);
                            }

                            if (d.data.hasOwnProperty("email")) {
                                yb.showTipsInfo(objEmail, "error", d.data["email"]);
                            }

                            if (d.data.hasOwnProperty("password")) {
                                yb.showTipsInfo(objPassword, "error", d.data["password"]);
                            }

                            break;
                        case 0:
                            yb.showTipsInfo(objNickName, "error", d.msg);
                            setTimeout(
                                window.location.href = "<?php echo e(route('login')); ?>",
                                300);
                            break;
                    }

                    return false;

                }
            });
        }

    </script>
    <script src="/js/trade.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>