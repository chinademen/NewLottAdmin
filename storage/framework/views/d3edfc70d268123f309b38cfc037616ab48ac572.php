<?php $__env->startSection("title"); ?>
    <title><?php echo e(___('_main.title.reset_password')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <div class="mt30 content wrap1200">
        <div class="yb-breadcrumb">
            <div class="bc-wrap">
                <a href="<?php echo e(route('user-center.safe')); ?>" mk=">"><?php echo e(___('_binding_email.safe_setting')); ?></a>
                <span><?php echo e(___('_reset_password.reset_password')); ?></span>
            </div>
        </div>
        <div class="form mt10">
            <div class="ss-form pt30" style="padding-left: 314px">
                <div class="mb20">
                    <label style="width: 86px"><?php echo e(___('_reset_password.old_password')); ?>：</label><input type="text"
                                                                                                      class="yb-input w400"
                                                                                                      placeholder="<?php echo e(___('_reset_password.pls_add_old_password')); ?>"
                                                                                                      id="old-password">
                </div>
                <div class="mb20">
                    <label style="width: 86px"><?php echo e(___('_reset_password.new_password')); ?>：</label><input type="text"
                                                                                                      class="yb-input w400"
                                                                                                      placeholder="<?php echo e(___('_reset_password.pls_add_new_password')); ?>"
                                                                                                      id="password">
                </div>
                <div>
                    <label style="width: 86px"><?php echo e(___('_reset_password.repeat_password')); ?>：</label><input type="text"
                                                                                                         class="yb-input w400"
                                                                                                         placeholder="<?php echo e(___('_reset_password.pls_repeat_new_password')); ?>"
                                                                                                         id="password_confirmation">
                </div>
            </div>
            <div class="ss-btns">
                <a class="yb-btn" id="J_submit"><?php echo e(___('_reset_password.confirm_edit')); ?></a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("script"); ?>

    <script type="application/javascript">
        $("#old-password").attr("type", "password");
        $("#password").attr("type", "password");
        $("#password_confirmation").attr("type", "password");

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
                }
            });

            function ajaxData() {
                var objOldPassword = $("#old-password");
                var objPassword = $("#password");
                var objRepeatPassword = $("#password_confirmation");

                var oldpassword = objOldPassword.val();
                var password = objPassword.val();
                var repeatpassword = objRepeatPassword.val();

                OldPassword = $.trim(oldpassword);
                Password = $.trim(password);
                RepeatPassword = $.trim(repeatpassword);

                if (OldPassword.length < 1) {
                    layer.tips("<?php echo e(___('_reset_password.old_password_require')); ?>", objOldPassword);
                    return false;
                }

                if (Password.length < 1) {
                    layer.tips("<?php echo e(___('_reset_password.new_password_require')); ?>", objPassword);
                    return false;
                }

                if (RepeatPassword.length < 1) {
                    layer.tips("<?php echo e(___('_reset_password.pls_repeat_password')); ?>", objRepeatPassword);
                    return false;
                }

                if (Password.length < 6 || Password.length > 10) {
                    layer.tips("<?php echo e(___('_register.password_error1')); ?>", objPassword);
                    return false;
                }

                if (/^\d+$/.test(Password)) {
                    layer.tips("<?php echo e(___('_register.password_error2')); ?>", objPassword);
                    return false;
                }

                if (/^[a-z]+$/i.test(Password)) {
                    layer.tips("<?php echo e(___('_register.password_error3')); ?>", objPassword);
                    return false;
                }
                if (!/^[A-Za-z0-9]+$/.test(Password)) {
                    layer.tips("<?php echo e(___('_register.password_error4')); ?>", objPassword);
                    return false;
                }

                if (Password != RepeatPassword) {
                    layer.tips("<?php echo e(___('_register.password_error5')); ?>", objRepeatPassword);
                    return false;
                }

                if (Password === OldPassword) {
                    layer.tips("<?php echo e(___('_reset_cash_password.password_same')); ?>", objPassword);
                    return false;
                }

                $.ajax({
                    type: 'post',
                    url: '/user-center/reset-password',
                    dataType: "json",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        "old-password": OldPassword,
                        "password": Password,
                        "password_confirmation": RepeatPassword
                    },

                    success: function (d) {

                        switch (d.code) {
                            case 0:
                                layer.msg(d.msg, {icon: 1});

                                //暂停3秒跳到登录页面
                                setTimeout(function () {
                                    window.location.href = "<?php echo e(route('login')); ?>"
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>