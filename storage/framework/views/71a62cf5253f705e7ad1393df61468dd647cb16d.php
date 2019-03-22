<!--弹窗--释放图片验证码html-->
<style>
.sellpop .remark{
    position: static !important;
    height: auto !important;
}
</style>
<div class="popup sellpop captcha-window">
    <div class="mt15 login-wrap">
        <div class="lg-input-wrap">
            <div class="input-box">
                <input class="lg-input input-yzm" type="text" name="img_code" >
                <div class="yzm">
                    <img src="/captcha?" alt="<?php echo e(___('_login.test_code')); ?>" style="cursor: pointer" onclick="javascript:$(this).attr('src', '/captcha?' + ((Math.random() * 9 + 1) * 100000).toFixed(0));">
                </div>
                <div class="remark">
                    <i class="iconfont icon-gou cRed mr5" style="display: none"></i>
                    <span class="text cRed" id="img_code-msg" style="display: none"><?php echo e(___('_login.wrong_test_code')); ?>

                        ！</span>
                </div>
            </div>
        </div>

    </div>
</div>