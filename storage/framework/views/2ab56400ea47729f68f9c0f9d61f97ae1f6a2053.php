<?php $__env->startSection("title"); ?>
    <title><?php echo e(___('_main.title.binding_phone')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <div class="mt30 content wrap1200">
        <div class="yb-breadcrumb">
            <div class="bc-wrap">
                <a href="<?php echo e(route('user-center.safe')); ?>" mk=">"><?php echo e(___('_binding_phone.safe_setting')); ?></a>
                <span><?php echo e(___('_binding_phone.phone')); ?></span>
            </div>
        </div>
        <div class="form mt10">
            <div class="ss-form pt30" style="padding-left: 314px">
                <?php echo e(csrf_field()); ?>

                <div class="mb20">
                    <label style="width: 86px"><?php echo e(___('_binding_phone.phone_number')); ?>：</label><input type="text"
                                                                                                     class="yb-input w270 mr10"
                                                                                                     placeholder="<?php echo e(___('_binding_phone.send_code_to_phone')); ?>"
                                                                                                     id="phone"><a
                            class="yb-btn blue ss-btn"
                            href="javascript:" id="Get-code"><?php echo e(___('_binding_phone.send_code_to_phone')); ?></a>
                </div>
                <div>
                    <label style="width: 86px"><?php echo e(___('_binding_phone.phone_auth_code')); ?>：</label><input type="text"
                                                                                                        class="yb-input w400"
                                                                                                        placeholder=""
                                                                                                        id="test_code">
                </div>
            </div>
            <div class="ss-btns">
                <a class="yb-btn" href="javascript:" id="J_submit"><?php echo e(___('_binding_phone.confirm_binding')); ?></a>
            </div>
        </div>
    </div>
    <?php echo $__env->make("layout.captcha_window", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("script"); ?>

    <script type="application/javascript">
        var objPhone = $("#phone");
        var objTestCode = $("#test_code");
        var smsTimeLimit = "<?php echo e($iAuthCodeTimeLimit); ?>";
        var clickSmsCode = true;
        var smsTimeStorageKey = 'binding_sms_send_time_';
        //表单提交
        $(function () {


            //短信时间等待getYzm
            $("#Get-code").click(function () {
                sendSmsCodeBefore(this);
            });


            function sendSmsCodeBefore(obj){
                if (clickSmsCode === false) {
                    return false;
                }
                Tel = $.trim(objPhone.val());
                if (Tel.length == 0){
                    layer.msg("<?php echo e(___('_binding_phone.phone_number_require')); ?>", {icon: 2});
                    return false;
                }
                if(!/^1[34578]\d{9}$/.test(Tel)) {
                    layer.msg("<?php echo e(___('_login.pls_add_correct_phone')); ?>", {icon: 2});
                    return false;
                }
                yb.captchaWindow(obj,Tel,sendSmsCode);
            }

            //发送短信验证码
            function sendSmsCode(obj){
                var $objText = $(obj);
                var imgCode = '';
                if(arguments.length >= 2){
                    imgCode = arguments[1];
                }

                Tel = $.trim(objPhone.val());
                $.ajax({
                    type: 'post',
                    url: '/auth/send-sms-msg',
                    dataType: "json",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        "mobile": Tel,
                        "imgcode": imgCode,
                        "type": 'single',
                        "temp": 'binding_phone',
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
                                //layer.msg(d.msg, {icon: 1});
                                break;
                            case 1001:
                                var smsTimeStorageVal = window.localStorage.getItem(smsTimeStorageKey+Tel);
                                var nowTime = Date.parse(new Date())/1000;
                                if(smsTimeStorageVal && Number(smsTimeStorageVal) + Number(smsTimeLimit) > nowTime){
                                    setEmailcodeTime(obj,Number(smsTimeStorageVal) + Number(smsTimeLimit) - nowTime)
                                }else{
                                    layer.msg(d.msg, {icon: 2});
                                    $objText.html("<?php echo e(___('_binding_phone.send_code_to_phone')); ?>");
                                    clickSmsCode = true;
                                }
                                break;
                            case 603:
                                if (d.data.hasOwnProperty("type")) {
                                    layer.msg(d.data["type"], {icon: 2});
                                }else if (d.data.hasOwnProperty("mobile")) {
                                    layer.msg(d.data["mobile"], {icon: 2});
                                }else if (d.data.hasOwnProperty("country_id")) {
                                    layer.msg(d.data["country_id"], {icon: 2});
                                }
                                $objText.html("<?php echo e(___('_binding_phone.send_code_to_phone')); ?>");
                                clickSmsCode = true;
                                break;
                            default:
                                layer.msg(d.msg, {icon: 2});
                                $objText.html("<?php echo e(___('_binding_phone.send_code_to_phone')); ?>");
                                clickSmsCode = true;
                                break;
                        }

                        return false;
                    },
                    error: function () {
                        $objText.html("<?php echo e(___('_binding_phone.send_code_to_phone')); ?>");
                        clickSmsCode = true;
                        layer.msg("<?php echo e(___('_base.error_system')); ?>", {icon: 2});
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
                        //time = timeLimit;
                        $objText.html("<?php echo e(___('_binding_phone.send_code_to_phone')); ?>");
                        clickSmsCode = true;
                    }
                }, 1000);
            }



            //传递数据到控制器
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

            function ajaxData() {
                Phone = $.trim(objPhone.val());
                TestCode = $.trim(objTestCode.val());

                if (Phone.length < 1) {
                    layer.tips("<?php echo e(___('_binding_phone.phone_number_require')); ?>", objPhone);
                    return false;
                }

                if (TestCode.length < 1) {
                    layer.tips("<?php echo e(___('_login.pls_add_test_code')); ?>", objTestCode);
                    return false;
                }

                $.ajax({
                    type: 'post',
                    url: "<?php echo e(route('user-center.phone')); ?>",
                    dataType: "json",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        "phone": Phone,
                        "test_code": TestCode
                    },

                    success: function (d) {
                        switch (d.code) {
                            case 0:
                                layer.msg(d.msg, {icon: 1});
                                //暂停3秒跳到登录页面
                                setTimeout(function () {
                                    window.location.href = "<?php echo e(route('user-center.safe')); ?>"
                                }, 3000);
                                break;
                            default :
                                layer.msg(d.msg, {icon: 2});
                                break;
                        }
                        return false;
                    }
                });
            }
        });

    </script>
    <script src="/js/trade.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>