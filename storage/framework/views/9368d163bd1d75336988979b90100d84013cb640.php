<?php $__env->startSection("title"); ?>
    <title><?php echo e(___('_main.title.safe_setting')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <div class="content mt30 clearfix wrap1200">
        
        <?php echo $__env->make('layout.user_center_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="mn">
            <div class="w-right">
                <div class="ss-r-wrap">
                    <div class="ss-personalCentral clearfix">
                        <div class="left">
                            <!--uploaded 表示已上传-->
                            <a class="head-set uploaded" href="javascript:">
                                <img class="head"
                                     src="<?php echo e(empty($oUser->avatar)?env("DEFAULT_AVATAR"):env("STATIC_RES_URL") . "/" . $oUser->avatar); ?>"
                                     alt="">
                                <span class="mask">
                                    <?php if(empty($oUser->avatar)): ?>
                                        <i class="text-upload"><?php echo e(___('_safe_setting.click_upload_img')); ?></i>
                                    <?php else: ?>
                                        <i class="text-modify"><?php echo e(___('_safe_setting.click_edit_img')); ?></i>
                                    <?php endif; ?>
                            </span>
                            </a>
                            <span class="head-inf">
                            <?php echo e($oUser->nickname); ?><br>
                            <i class="font-c666 fs12"><?php echo e(___('_safe_setting.register_time')); ?>：<?php echo e($oUser->sign_at); ?></i>
                        </span>
                        </div>
                        <div class="right clearfix">
                            <div class="item fl">
                                <p><?php echo e(___('_safe_setting.trade_num')); ?></p>
                                <div class="num">
                                <span class="cRed">
                                    <?php echo e($oUserExtInfo->total_number); ?>

                                    <i>次</i>
                                </span>
                                </div>
                            </div>
                            <div class="item fr">
                                <p><?php echo e(___('_safe_setting.trust_num')); ?></p>
                                <div class="num">
                                <span class="cRed">
                                    <?php echo e($iTrustNum); ?>

                                    <i>人</i>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="ss-list">
                        <li class="clearfix">
                            <div class="left">
                                <i class="iconfont icon-icon-p_xinfeng mr20" id="email"></i>
                                <span><?php echo e(___('_safe_setting.email')); ?></span>
                            </div>
                            <div class="right">
                                <?php if(!$oUser->bind_email): ?>
                                    <a class="yb-btn red mr20"
                                       href="<?php echo e(route('user-center.email')); ?>"><?php echo e(___('_safe_setting.pls_binding_email')); ?></a>
                                    <span class="mr16"><?php echo e(___('_safe_setting.no_binding')); ?></span>
                                    <i class="iconfont icon-gantanhao cRed"></i>
                                <?php else: ?>
                                    <span class="mr16 cGreen"><?php echo e(___('_safe_setting.yes_binding')); ?></span>
                                    <i class="iconfont icon-gou cGreen"></i>
                                <?php endif; ?>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="left">
                                <i class="iconfont icon-shouji mr20"></i>
                                <span><?php echo e(___('_safe_setting.phone')); ?></span>
                            </div>
                            <div class="right">
                                <?php if(!$oUser->bind_tel): ?>
                                    <a class="yb-btn red mr20"
                                       href="<?php echo e(route('user-center.phone')); ?>"><?php echo e(___('_safe_setting.pls_binding_phone')); ?></a>
                                    <span class="mr16"><?php echo e(___('_safe_setting.no_binding')); ?></span>
                                    <i class="iconfont icon-gantanhao cRed"></i>
                                <?php else: ?>
                                    <span class="mr16 cGreen"><?php echo e(___('_safe_setting.yes_binding')); ?></span>
                                    <i class="iconfont icon-gou cGreen"></i>
                                <?php endif; ?>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="left">
                                <i class="iconfont icon-denglumima mr20"></i>
                                <span><?php echo e(___('_safe_setting.login_password')); ?></span>
                            </div>
                            <div class="right">
                                <?php if(Auth::check()): ?>
                                    <a class="yb-btn gray c999 mr20"
                                       href="<?php echo e(route("user-center.reset-password")); ?>"><?php echo e(___('_safe_setting.click_to_edit')); ?></a>
                                    <span class="mr16 cGreen"><?php echo e(___('_safe_setting.yes_set')); ?></span>
                                    <i class="iconfont icon-gou cGreen"></i>
                                <?php else: ?>
                                    <a class="yb-btn gray c999 mr20"
                                       href="<?php echo e(route('register')); ?>"><?php echo e(___('_safe_setting.click_to_set')); ?></a>
                                    <span class="mr16 cRed"><?php echo e(___('_safe_setting.no_set')); ?></span>
                                    <i class="iconfont icon-gantanhao cRed"></i>
                                <?php endif; ?>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="left">
                                <i class="iconfont icon-zijinmima mr20"></i>
                                <span><?php echo e(___('_safe_setting.cash_password')); ?></span>
                            </div>
                            <div class="right">
                                <?php if(Auth::check() && !empty($oUser->cash_password)): ?>
                                    <a class="yb-btn gray c999 mr20"
                                       href="<?php echo e(route('user-center.reset-cash-password')); ?>"><?php echo e(___('_safe_setting.click_to_edit')); ?></a>
                                    <span class="mr16 cGreen"><?php echo e(___('_safe_setting.yes_set')); ?></span>
                                    <i class="iconfont icon-gou cGreen"></i>
                                <?php endif; ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("script"); ?>

    <script type="application/javascript">

        $(document).ready(function () {
            var icolor = "#999";
            $("i").mouseenter(function () {
                icolor = $(this).css("color");
                $(this).css("color", "#30b06f");
            });

            $("i").mouseleave(function () {
                $(this).css("color", icolor);
            });

            //列表选择器
            $("dd").click(function () {
                $(this).addClass("active");
                $(this).siblings().removeClass("active");
            });

            <?php if(!empty(session('msg'))): ?>
            layer.msg("<?php echo e(session('msg')); ?>");
            <?php endif; ?>

        });

        //文件上传
        layui.use('upload', function () {
            var upload = layui.upload;
            var uploadUrl = "photo";
            var static = "<?php echo e(env('STATIC_RES_URL') . '/'); ?>";

            //执行实例
            var uploadInst = upload.render({
                elem: '.head-set',  //绑定元素
                url: "/file-processes/upload/" + uploadUrl,
                method: 'post',
                field: 'file',    //默认是file
                data: {"_token": "<?php echo e(csrf_token()); ?>"},
                accept: 'images', //允许上传的文件类型
                acceptMime: 'image/', //规定打开文件选择框时，筛选出的文件类型，值为用逗号隔开的,当前只显示图片文件
                size: "<?php echo e($iUploadImgSizeLimit); ?>", 　　　　//最大允许上传的文件大小
                auto: true, 　　　//是否自动上传
                drag: true, 　　　　//支持拖拽

                //选择文件时调用
//                choose: function (upload) {
//                    var item = this.item;
//                },

                //执行上传请求前回调
//                before: function (upload) {
//                    layer.load();
//                },

                //执行上传后上传完毕的回调
                done: function (res) {

                    //上传成功,传递图片路径给用户信息保存
                    $(".head-set img").attr("src", static + res.url);

                    //访问接口并保存数据
                    window.location.href = "/user-center/head-img/?path=" + res.url;

                }

                //执行上传请求出现异常的回调
//                error: function (upload) {
//                }

            });
        });

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>