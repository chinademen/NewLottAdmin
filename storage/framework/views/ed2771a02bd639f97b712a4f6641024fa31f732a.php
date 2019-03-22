<?php $__env->startSection('title'); ?>
    <?php echo e(___('_basic.login')); ?>

    ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('container'); ?>
    <link rel="stylesheet" href="/css/login.css">
    <div class="login_form">

        <form id="logindata" name="signinForm" method="post" target="_top">
        <?php echo csrf_field(); ?>

            <h4 class="nomargin" style="color: #5a5a5a;" >用户登录</h4>
            <p class="mt5 mb20" style="color: #5a5a5a;" >请输入您的账号</p>

            <input name="username" id="login-name"  value="<?php echo e(old('username')); ?>" type="text" class="form-control  login-field user_name" placeholder="<?php echo e(___('_user.username')); ?>" required autofocus>

            <input class="form-control login-field user_password"  name="" id="login-pass" type="password" placeholder="<?php echo e(___('_user.password')); ?>" required />
            <input name="password" id="login-pass-real" type="hidden" required />

            <?php if($bCaptcha): ?>
                <div class="input-group mb15">
                    <input type="text" class="form-control" name="captcha" placeholder="<?php echo e(___('_basic.captcha')); ?>">
                    <span class="input-group-addon">
                        <a href="javascript:;" class="login-captcha login-field" title="<?php echo e(___('_basic.captcha')); ?>"><?php echo Captcha::img(); ?></a>
                    </span>
                </div>
            <?php endif; ?>

            <button id="loginButton"  class="form-control btn btn-info btn-large btn-block login-btn login_now" type="button">
                <i class="fa  fa-lock"></i> <?php echo e(___('_basic.login')); ?>

            </button>


            <div class="login_line">  </div>


        </form>


        <div class="alert alert-danger <?php echo e(Session::get('error') ? '' : 'hidden'); ?>">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>登录错误!</strong>用户名密码错误！
        </div>


        <p> © 2017. All Rights Reserved . Glod Apple Development </p>
        <p> Created By:Gold Apple Development </p>

    </div>

    <?php $__env->stopSection(); ?>



<?php $__env->startSection('javascripts'); ?>
    ##parent-placeholder-416e86142ff411d25a9fe191a1f3cfbbdd47564b##
    <?php echo script('md5'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('end'); ?>
    <script>

        $('.login-captcha img').click(function(){
            var src = <?php echo '"'.URL::to('captcha?').'"'; ?> + ((Math.random()*9 +1)*100000).toFixed(0);
            $(this).attr('src', src);
        });

        $('#loginButton').click(function (e) {
//            var form = new FormData(document.getElementById("logindata"));
//            $.ajax({
//                url:"/auth/login",
//                type:"get",
//                dataType:"json",
//                data:form,
//                processData:false,
//                contentType:false,
//                async: false,
//                timeout: 2000,
//                success:function(data){
//                    console.log(data);
//                },
//                error:function(e){
//                    console.log(e)
//                    //alert("错误！！");
//                    //window.clearInterval(timer);
//                }
//            });

            var pwd = $('#login-pass').val();
            var username = ($('#login-name').val()).toLowerCase();
//            $(this).text("<?php echo e(___('_basic.login')); ?>...");
//            alert(username);
//            alert(pwd);
            $('#login-pass-real').val(md5(md5(md5(username + pwd))));
//            $('#login-pass-real').val(pwd);
//            alert($('#login-pass-real').val());
            $('form[name=signinForm]').submit();

        });
        $('form[name=signinForm]').keydown(function(event) {
            if (event.keyCode == 13) $('#loginButton').click();
        });
    </script>
    ##parent-placeholder-7a92f3d26362d6557d5701de77a63a01df61e57f##
<?php $__env->stopSection(); ?>
<?php echo $__env->make('l.base', array('active' => 'signin'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>