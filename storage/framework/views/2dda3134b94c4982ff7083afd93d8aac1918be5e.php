<?php $__env->startSection("title"); ?>
    <title><?php echo e(___('_main.title.get_back_password')); ?></title>
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
                <a class="left" id="left"><?php echo e(___('_register.phone_register')); ?></a><a class="right"
                                                                                      id="right"><?php echo e(___('_register.email_register')); ?></a>
                <div class="line"></div>
            </div>
            <div class="lg-form mt20">
                <?php echo e(csrf_field()); ?>

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
                            <a class="getYzm" id='a-email-code' href="javascript:"><?php echo e(___('_register.get_email_code')); ?></a>
                        </div>
                        <div class="remark">
                            <i class="iconfont icon-gantanhao cRed mr5" style="display: none"></i>
                            <span class="text cRed" id="email-code-msg" style="display: none"></span>
                        </div>
                    </div>
                </div>





                <div class="lg-btns mt20">
                    <a class="yb-btn" href="javascript:" id="J_submit"><?php echo e(___('_register.next_step')); ?></a>
                </div>
                <div class="reg mt20">
                    <?php echo e(___('_getbackpwd.has_password')); ?>? <a class="cBlue"
                                                            href="<?php echo e(route('login')); ?>"><?php echo e(___('_getbackpwd.go_login')); ?></a>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make("layout.captcha_window", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>

    <script type="application/javascript">
        var style = 0;
        var sUrl = "<?php echo e(route('send-sms-msg')); ?>";

        var objUsername = $("#username");
        var objSmsCode = $("#input-sms-code");
        var objEmailCode = $("#input-email-code");
        var objClock = $(".getYzm");
        var smsTimeLimit = "<?php echo e($iAuthCodeTimeLimit+1); ?>";
        var emailTimeLimit = "<?php echo e($iEmailCodeTimeLimit+1); ?>";
        var smsTimeStorageKey = 'password_sms_send_time_';
        var emailTimeStorageKey = 'password_email_send_time_';

        //基础样式
        $("#left").click(function () {
            $(".tel-box").show();
            $(".email-box").hide();
            style = 0;
            sUrl = "<?php echo e(route('send-sms-msg')); ?>";

        });

        $("#right").click(function () {
            $(".tel-box").hide();
            $(".email-box").show();
            style = 1;
            sUrl = "<?php echo e(route('send-mail-msg')); ?>";
        });


        //点击信号
        clickSmsCode = true;
        clickEmailCode = true;

        //发送验证码
        objClock.click(function () {
            Username = $.trim(objUsername.val());
            if (Username.length < 1) {
                layer.msg("<?php echo e(___('_register.pls_add_contact_number')); ?>");
            }
            switch (style){
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

        function sendSmsCodeBefore(obj){
            if (clickSmsCode === false) {
                return false;
            }
            var $objText = $(obj);
            Tel = $.trim(objUsername.val());
            if (Tel.length == 0 || !/^1[34578]\d{9}$/.test(Tel)) {
                yb.showTipsInfo(objUsername, "error", "<?php echo e(___('_register.tel_error1')); ?>");
                return false;
            }
            yb.captchaWindow(obj,Tel,sendSmsCode);
            //sendSmsCode(obj);
        }


        //发送短信验证码
        function sendSmsCode(obj){
            var $objText = $(obj);
            var imgCode = '';
            if(arguments.length >= 2){
                imgCode = arguments[1];
            }

            Tel = $.trim(objUsername.val());

            $.ajax({
                type: 'post',
                url: '/auth/send-sms-msg',
                dataType: "json",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "mobile": Tel,
                    "imgcode": imgCode,
                    "type": 'single',
                    "temp": 'password',
                    "country_id": "37"
                },
                beforeSend(){
                    $objText.html("<?php echo e(___('_register.sending')); ?>");
                    clickSmsCode = false;
                },
                success: function (d) {
                    switch (d.code) {
                        case 0:
                            window.localStorage.setItem(smsTimeStorageKey+Tel,Date.parse(new Date())/1000);
                            setSmscodeTime(obj,smsTimeLimit);
                            yb.showTipsInfo(objSmsCode, "error", d.msg);
                            break;
                        case 1001:
                            var smsTimeStorageVal = window.localStorage.getItem(smsTimeStorageKey+Tel);
                            var nowTime = Date.parse(new Date())/1000;
                            if(smsTimeStorageVal && Number(smsTimeStorageVal) + Number(smsTimeLimit) > nowTime){
                                setEmailcodeTime(obj,Number(smsTimeStorageVal) + Number(smsTimeLimit) - nowTime)
                            }else{
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
                                yb.showTipsInfo(objUsername, "error", d.data["mobile"]);
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

        function setSmscodeTime(obj,time) {
            clickSmsCode = false;
            var $objText = $(obj);
            var clock;
            clock = setInterval(function () {
                time--;
                $objText.text(time + "<?php echo e(___('_login.seconds_to_send')); ?>");
                if (time <= 0) {
                    window.clearInterval(clock);
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
            Email = $.trim(objUsername.val());

            if (Email.length < 1 || !/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/.test(Email)) {
                yb.showTipsInfo(objUsername, "error", "<?php echo e(___('_register.email_error1')); ?>");
                return false;
            }
            sendEmailCode(obj);
        }

        function sendEmailCode(obj){
            var $objText = $(obj);
            Email = $.trim(objUsername.val());

            $.ajax({
                type: 'post',
                url: "<?php echo e(route('send-mail-msg')); ?>",
                dataType: "json",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "email": Email,
                    "type": 'password'
                },

                beforeSend(){
                    $objText.html("<?php echo e(___('_register.sending')); ?>");
                    clickEmailCode = false;
                },
                success: function (d) {
                    switch (d.code) {
                        case 0:
                            window.localStorage.setItem(emailTimeStorageKey+Email,Date.parse(new Date())/1000);
                            setEmailcodeTime(obj,emailTimeLimit);
                            yb.showTipsInfo(objEmailCode, "error", d.msg);
                            break;
                        case 1005:
                            var emailTimeStorageVal = window.localStorage.getItem(emailTimeStorageKey+Email);
                            var nowTime = Date.parse(new Date())/1000;
                            if(emailTimeStorageVal && Number(emailTimeStorageVal) + Number(emailTimeLimit) > nowTime){
                                setEmailcodeTime(obj,Number(emailTimeStorageVal) + Number(emailTimeLimit) - nowTime)
                            }else{
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
                                yb.showTipsInfo(objUsername, "error", d.data["email"]);
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

        function setEmailcodeTime(obj,time) {
            clickEmailCode = false;
            var $objText = $(obj);
            var clock;
            clock = setInterval(function () {
                time--;
                $objText.text(time + "<?php echo e(___('_login.seconds_to_send')); ?>");
                if (time <= 0) {
                    i = window.clearInterval(clock);
                    $objText.html("<?php echo e(___('_register.get_email_code')); ?>");
                    clickEmailCode = true;
                }
            }, 1000);
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
                }
            });

        });

        function ajaxData() {
            var username = objUsername.val();
            var testcode = style === 0 ? objSmsCode.val() : objEmailCode.val();

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
                        case 0:
                            
                                window.location.href = "/auth/reset-pwd?auth_code=" + d.data;
                            
                            
                            
                                break;
                        default:
                            yb.showTipsInfo(style === 0 ? objSmsCode : objEmailCode, "error", d.msg);
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