<?php $__env->startSection("title"); ?>
    <title><?php echo e(___('_main.title.binding_email')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <div class="mt30 content wrap1200">
        <div class="yb-breadcrumb">
            <div class="bc-wrap">
                <a href="<?php echo e(route('user-center.safe')); ?>" mk=">">安全设置</a>
                <span>邮箱</span>
            </div>
        </div>
        <div class="form mt10">
            <div class="ss-form pt30" style="padding-left: 314px">
                <div class="mb20">
                    <label style="width: 86px">邮箱地址：</label><input type="text" class="yb-input w270 mr10"
                                                                   placeholder="请输入邮箱地址" id="email"><a
                            class="yb-btn blue ss-btn"
                            href="javascript:" id="Get-code">发送邮箱验证码</a>
                </div>
                <div>
                    <label style="width: 86px">邮箱验证码：</label><input type="text" class="yb-input w400" placeholder=""
                                                                    id="test_code">
                </div>
            </div>
            <div class="ss-btns">
                <a class="yb-btn" href="javascript:" id="J_submit">确定绑定</a>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("script"); ?>

    <script type="application/javascript">

        //表单提交
        $(function () {
            var objEmail = $("#email");
            var objTestCode = $("#test_code");
            var objClock = $("#Get-code");
            var timeLimit = "<?php echo e($iAuthCodeTimeLimit); ?>";
            var clickSignal = true;

            //短信时间等待getYzm
            objClock.click(function () {
                if (clickSignal === false) {
                    return false;
                }

                clickSignal = false;
                var Email = $.trim(objEmail.val());

                //过滤联系方式
                if (!/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/.test(Email)) {
                    layer.msg("<?php echo e(___('_register.email_error1')); ?>", {icon: 2});
                    return false;
                }

                //邮箱找回
                $.ajax({
                    type: 'post',
                    url: "<?php echo e(route('send-mail-msg')); ?>",
                    dataType: "json",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        "email": Email,
                        "type": 'binding_email'
                    },

                    success: function (d) {
                        switch (d.code) {
                            case 0:
                                layer.msg(d.msg, {icon: 2});
                                var time = timeLimit;
                                var clock;
                                clock = setInterval(function () {
                                    time--;
                                    objClock.text(time + "<?php echo e(___('_login.seconds_to_send')); ?>");
                                    if (time < 0) {
                                        i = window.clearInterval(clock);
                                        time = timeLimit;
                                        objClock.html("<?php echo e(___('_login.get_code')); ?>");
                                        clickSignal = true;
                                    }
                                }, 1000);
                                break;
                            default:
                                layer.msg(d.msg, {icon: 1});
                                break;
                        }
                        return false;

                    }
                });

            });

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
                Email = $.trim(objEmail.val());
                TestCode = $.trim(objTestCode.val());

                if (Email.length < 1) {
                    layer.tips("邮箱不能为空", objEmail);
                    return false;
                }

                if (TestCode.length < 1) {
                    layer.tips("<?php echo e(___('_login.pls_add_test_code')); ?>", objTestCode);
                    return false;
                }

                $.ajax({
                    type: 'post',
                    url: '/user-center/email',
                    dataType: "json",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        "email": Email,
                        "test_code": TestCode
                    },

                    success: function (d) {
                        switch (d.code) {
                            case 0:
                                layer.msg(d.msg, {icon: 1});
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>