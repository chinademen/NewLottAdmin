<?php $__env->startSection("title"); ?>
    <title><?php echo e(___('_main.title.first_page')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <div class="mt30 content wrap1200">
        <div class="yb-breadcrumb">
            <div class="bc-wrap">
                <a href="/user-center/safe" mk=">">安全设置</a>
                <span>资金密码</span>
            </div>
        </div>
        <div class="form mt10">
            <div class="ss-form pt30" style="padding-left: 314px">
                <div class="mb20">
                    <label style="width: 86px">旧资金密码：</label><input type="text" class="yb-input w400"
                                                                    placeholder="请输入旧密码(8位~16位)" id="old-password">
                </div>
                <div class="mb20">
                    <label style="width: 86px">新资金密码：</label><input type="text" class="yb-input w400"
                                                                    placeholder="请输入新密码(8位~16位)" id="password">
                </div>
                <div>
                    <label style="width: 86px">重复密码：</label><input type="text" class="yb-input w400"
                                                                   placeholder="请再输入新密码(8位~16位)"
                                                                   id="password_confirmation">
                </div>
            </div>
            <div class="ss-btns">
                <a class="yb-btn" id="J_submit">确定修改</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("script"); ?>

    <script type="application/javascript">

        //表单提交
        $(function () {

            $("#J_submit").click(function () {

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
                    layer.msg("原密码不能为空", {icon: 2});
                    return false;
                }

                if (Password.length < 1) {
                    layer.msg("新密码不能为空", {icon: 2});
                    return false;
                }

                if (RepeatPassword.length < 1) {
                    layer.msg("请输入重复密码", {icon: 2});
                    return false;
                }

                if (Password.length < 6 || Password.length > 10) {
                    layer.msg("<?php echo e(___('_register.password_error1')); ?>", {icon: 2});
                    return false;
                }

                if (/^\d+$/.test(Password)) {
                    layer.msg("<?php echo e(___('_register.password_error2')); ?>", {icon: 2});
                    return false;
                }

                if (/^[a-z]+$/i.test(Password)) {
                    layer.msg("<?php echo e(___('_register.password_error3')); ?>", {icon: 2});
                    return false;
                }
                if (!/^[A-Za-z0-9]+$/.test(Password)) {
                    layer.msg("<?php echo e(___('_register.password_error4')); ?>", {icon: 2});
                    return false;
                }

                if (Password != RepeatPassword) {
                    layer.msg("<?php echo e(___('_register.password_error5')); ?>", {icon: 2});
                    return false;
                }

                $.ajax({
                    type: 'post',
                    url: '/user-center/reset-cash-password',
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

                                //暂停５秒跳到登录页面
                                setTimeout(
                                    window.location.href = "<?php echo e(route('login')); ?>",
                                    5000);
                                break;
                            default :
                                layer.msg(d.msg, {icon: 2});
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