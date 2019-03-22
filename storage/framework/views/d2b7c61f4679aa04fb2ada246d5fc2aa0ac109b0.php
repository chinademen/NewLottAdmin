<?php $__env->startSection("title"); ?>
    <title><?php echo e(___('_main.title.first_page')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <div class="mt30 content wrap1200">
        <div class="yb-breadcrumb">
            <div class="bc-wrap">
                <a href="/user-center/safe" mk=">">安全设置</a>
                <span>邮箱</span>
            </div>
        </div>
        <div id="Error"></div>
        <div class="form mt10">
            <div class="ss-form pt30" style="padding-left: 314px">
                <div class="mb20">
                    <label style="width: 86px">邮箱地址：</label><input type="text" class="yb-input w270 mr10"
                                                                   placeholder="请输入邮箱地址" id="email"><a
                            class="yb-btn blue ss-btn"
                            href="javascript:">发送邮箱验证码</a>
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

            $("#J_submit").click(function (style) {

                var objEmail = $("#email");
                var objTestCode = $("#test_code");

                var email = objEmail.val();
                var testcode = objTestCode.val();

                Email = $.trim(email);
                TestCode = $.trim(testcode);

                if (Email.length < 1) {
                    $("#Error").html("邮箱不能为空");
                    return false;
                }

                if (TestCode.length < 1) {
                    $("#Error").html("<?php echo e(___('_login.pls_add_test_code')); ?>");
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

                        $("#Error").html(d.msg);

                        return false;

                    }
                });
            });


        });

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>