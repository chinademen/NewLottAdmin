<?php $__env->startSection("title"); ?>
    <title><?php echo e(___('_main.title.trade_setting')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <div class="content mt30 clearfix wrap1200">
        
        <?php echo $__env->make('layout.user_center_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="mn">
            <div class="w-right">
                <div class="ts-wrap">
                    <div class="title"><b><?php echo e(___('_trade_setting.bind_trading_account')); ?></b><span
                                class="ml15 cRed fs14"><?php echo e(___('_trade_setting.set_your_payment_method')); ?></span></div>
                    <div class="cards clearfix">
                        <div class="item">
                            <h3><?php echo e(___('_trade_setting.bank_account')); ?></h3>
                            <?php if(!empty($aBank)): ?>
                                <div class='status'>
                                    <span><?php echo e(___('_trade_setting.yes_set')); ?></span><i class='iconfont icon-gou'></i>
                                </div>
                                <div class='btns'>
                                    <a class='item-btn'
                                       style='cursor: pointer'><?php echo e(___('_trade_setting.click_view')); ?></a>
                                </div>
                            <?php else: ?>
                                <div class='status'>
                                    <span><?php echo e(___('_trade_setting.no_set')); ?></span>
                                </div>
                                <div class='btns'>
                                    <a class='item-btn'
                                       style='cursor: pointer'><?php echo e(___('_trade_setting.click_edit')); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="item zfb">
                            <?php if(!empty($aAlipay)): ?>
                                <h3><span><?php echo e(___('_trade_setting.alipay_account')); ?></span><i class="wx-qr"><img
                                                src="<?php echo e(env("STATIC_RES_URL") . "/" .$aAlipay['pay_qrcode']); ?>"
                                                class="qr-big"></i></h3>
                                <div class='status'>
                                    <span><?php echo e(___('_trade_setting.yes_set')); ?></span><i class='iconfont icon-gou'></i>
                                </div>
                                <div class='btns'>
                                    <a class='item-btn'
                                       style='cursor: pointer'><?php echo e(___('_trade_setting.click_view')); ?></a>
                                </div>
                            <?php else: ?>
                                <h3><?php echo e(___('_trade_setting.alipay_account')); ?></h3>
                                <div class='status'>
                                    <span><?php echo e(___('_trade_setting.no_set')); ?></span>
                                </div>
                                <div class='btns'>
                                    <a class='item-btn'
                                       style='cursor: pointer'><?php echo e(___('_trade_setting.click_edit')); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="item wx">
                            <?php if(!empty($aWeChat)): ?>
                                <h3><span><?php echo e(___('_trade_setting.wechat_account')); ?></span><i class="wx-qr"><img
                                                src="<?php echo e(env("STATIC_RES_URL") . "/" .$aWeChat['pay_qrcode']); ?>"
                                                class="qr-big"></i></h3>
                                <div class='status'>
                                    <span><?php echo e(___('_trade_setting.yes_set')); ?></span><i class='iconfont icon-gou'></i>
                                </div>
                                <div class='btns'>
                                    <a class='item-btn'
                                       style='cursor: pointer'><?php echo e(___('_trade_setting.click_view')); ?></a>
                                </div>
                            <?php else: ?>
                                <h3><?php echo e(___('_trade_setting.wechat_account')); ?></h3>
                                <div class='status'>
                                    <span><?php echo e(___('_trade_setting.no_set')); ?></span>
                                </div>
                                <div class='btns'>
                                    <a class='item-btn'
                                       style='cursor: pointer'><?php echo e(___('_trade_setting.click_edit')); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-wrap">
                        
                        <div class="form active">
                            <i class="icon upArrow l"></i>
                            <div class="item">
                                <label class="font-c666 fs14"
                                       style="width: 76px"><?php echo e(___('_trade_setting.account_name')); ?>：</label>
                                <input type="text" class="yb-input w400" placeholder=""
                                       id="username_bank">
                            </div>
                            <div class="item">
                                <label class="font-c666 fs14" style="width: 76px"><?php echo e(___('_trade_setting.bank_name')); ?>

                                    ：</label>
                                <span class="yb-select">
                                <i class="iconfont icon-xiala"></i>
                                <input class="yb-input w400" readonly type="text" id="bank_name">
                                <span class="options">
                                    <span class="scroll">
                                        <?php $__currentLoopData = $oBanksAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a><?php echo e($value->name); ?></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </span>
                                    <!--<i class="iconfont icon-triangle-up"></i>-->
                                </span>
                            </span>
                            </div>
                            <div class="item">
                                <label class="font-c666 fs14"
                                       style="width: 76px"><?php echo e(___('_trade_setting.bank_address')); ?>：</label>
                                <input type="text" class="yb-input w400" placeholder="" id="bank_address">
                            </div>
                            <div class="item">
                                <label class="font-c666 fs14"
                                       style="width: 76px"><?php echo e(___('_trade_setting.bank_card_code')); ?>：</label>
                                <input type="text" class="yb-input w400" placeholder="" id="bank_code">
                            </div>
                            <div id="edit-need-bank" style="<?php if(!empty($oBank)): ?> display: none;<?php endif; ?>">
                                <div class="item" id="bank_code_repeat" style="display: none">
                                    <label class="font-c666 fs14"
                                           style="width: 76px"><?php echo e(___('_trade_setting.repeat_bank_card_code')); ?>

                                        ：</label>
                                    <input type="text" class="yb-input w400" placeholder="" id="bank_code_confirmation"
                                           value="">
                                </div>
                                <div class="item">
                                    <label class="font-c666 fs14"
                                           style="width: 76px"><?php echo e(___('_trade_setting.cash_password')); ?>：</label>
                                    <input type="password" class="yb-input w400" placeholder="" id="cash_password_bank">
                                </div>
                            </div>
                            <div class="btns">
                                <a class="yb-btn" href="javascript:"
                                   style="<?php if(!empty($aBank)): ?> display: none;<?php endif; ?>" id="bank_edit"></a>
                                <?php if(!empty($aBank)): ?>
                                    <i id="edit-btn-bank" class="iconfont icon-xiala" style="cursor: pointer"></i>
                                <?php endif; ?>
                            </div>
                        </div>

                        
                        <div class="form">
                            <i class="icon upArrow m"></i>
                            <div class="item">
                                <label class="font-c666 fs14"
                                       style="width: 76px"><?php echo e(___('_trade_setting.account_name')); ?>：</label>
                                <input type="text" class="yb-input w400" placeholder="" id="username_alipay">
                            </div>
                            <div class="item">
                                <label class="font-c666 fs14"
                                       style="width: 76px"><?php echo e(___('_trade_setting.alipay_account')); ?>：</label>
                                <input type="text" class="yb-input w400" placeholder="" id="alipay_code">
                            </div>
                            <div id="edit-need-alipay" style="<?php if(!empty($oAlipay)): ?> display: none;<?php endif; ?>">
                                <div class="item">
                                    <label class="font-c666 fs14"
                                           style="width: 76px"><?php echo e(___('_trade_setting.cash_password')); ?>：</label>
                                    <input type="password" class="yb-input w400" placeholder=""
                                           id="cash_password_alipay">
                                </div>
                                <div class="item">
                                    <label style="width: 76px"></label>
                                    <a class="upload" href="javascript:"><i
                                                class="iconfont icon-jiahao"></i></a>
                                </div>
                                <div class="item">
                                    <label style="width: 76px;"></label>
                                    <span class="mark cBlue tc"><?php echo e(___('_trade_setting.pls_upload_qrcode')); ?></span>
                                </div>
                            </div>
                            <div class="btns">
                                <a class="yb-btn" href="javascript:"
                                   style="<?php if(!empty($aAlipay)): ?> display: none;<?php endif; ?>"
                                   id="alipay_edit"></a>
                                <?php if(!empty($aAlipay)): ?>
                                    <i id="edit-btn-alipay" class="iconfont icon-xiala" style="cursor: pointer"></i>
                                <?php endif; ?>
                            </div>
                        </div>

                        
                        <div class="form">
                            <i class="icon upArrow r"></i>
                            <div class="item">
                                <label class="font-c666 fs14"
                                       style="width: 76px"><?php echo e(___('_trade_setting.account_name')); ?>：</label>
                                <input type="text" class="yb-input w400" placeholder="" id="username_wechat">
                            </div>
                            <div class="item">
                                <label class="font-c666 fs14"
                                       style="width: 76px"><?php echo e(___('_trade_setting.wechat_account')); ?>：</label>
                                <input type="text" class="yb-input w400" placeholder="" id="wechat_code">
                            </div>
                            <div id="edit-need-wechat" style="<?php if(!empty($oWeChat)): ?> display: none;<?php endif; ?>">
                                <div class="item">
                                    <label class="font-c666 fs14"
                                           style="width: 76px"><?php echo e(___('_trade_setting.cash_password')); ?>：</label>
                                    <input type="password" class="yb-input w400" placeholder=""
                                           id="cash_password_wechat">
                                </div>
                                <div class="item">
                                    <label style="width: 76px"></label>
                                    <a class="upload" href="javascript:"><i
                                                class="iconfont icon-jiahao"></i></a>
                                </div>
                                <div class="item">
                                    <label style="width: 76px;"></label>
                                    <span class="mark cBlue tc"><?php echo e(___('_trade_setting.pls_upload_qrcode')); ?></span>
                                </div>
                            </div>

                            <div class="btns">
                                <a class="yb-btn"
                                   style="<?php if(!empty($aWeChat)): ?> display: none;<?php endif; ?>"
                                   id="wechat_edit"></a>
                                <?php if(!empty($aWeChat)): ?>
                                    <i id="edit-btn-wechat" class="iconfont icon-xiala" style="cursor: pointer"></i>
                                <?php endif; ?>
                            </div>

                        </div>
                        <input type="hidden" id="qrcode_alipay">
                        <input type="hidden" id="qrcode_wechat">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("script"); ?>

    <script type="application/javascript">

        //全局状态
        var style = 0;
        $(".item-btn").eq(0).click(function () {
            style = 0;
        });

        $(".item-btn").eq(1).click(function () {
            style = 1;
        });

        $(".item-btn").eq(2).click(function () {
            style = 2;
        });

        //银行卡框改变马上修改样式
        var bankSingal = 10;
        $("#bank_code").change(function () {
            bankSingal = 20;
            $("#bank_code_repeat").show();
            $("#edit-btn-bank").hide();
            $("#bank_edit").show();
            $("#edit-need-bank").show();
        });

        //编辑和查看显示
        <?php if(!empty($aBank)): ?>
        $("#bank_edit").text("修改");
        $("#username_bank").val("<?php echo e($aBank['account_name']); ?>");
        $("#bank_name").val("<?php echo e($aBank['bank_code']); ?>");
        $("#bank_address").val("<?php echo e($aBank['bank_address']); ?>");
        $("#bank_code").val("<?php echo e($aBank['account_number']); ?>");
        <?php else: ?>
        $("#bank_edit").text("创建");
        <?php endif; ?>

        <?php if(!empty($aAlipay)): ?>
        $("#alipay_edit").text("修改");
        $("#username_alipay").val("<?php echo e($aAlipay['account_name']); ?>");
        $("#alipay_code").val("<?php echo e($aAlipay['account_number']); ?>");
        $("#qrcode_alipay").val("<?php echo e($aAlipay['pay_qrcode']); ?>");
        <?php else: ?>
        $("#alipay_edit").text("创建");
        <?php endif; ?>

        <?php if(!empty($aWeChat)): ?>
        $("#wechat_edit").text("修改");
        $("#username_wechat").val("<?php echo e($aWeChat['account_name']); ?>");
        $("#wechat_code").val("<?php echo e($aWeChat['account_number']); ?>");
        $("#qrcode_wechat").val("<?php echo e($aWeChat['pay_qrcode']); ?>");
        <?php else: ?>
        $("#wechat_edit").text("创建");
        <?php endif; ?>

        //高光
        $("dd").eq(1).addClass("active");

        //密码
        $("#password").attr("type", "password");

        //样式
        $("#edit-btn-bank").click(function () {
            $(this).hide();
            $("#bank_edit").show();
            $("#edit-need-bank").show();
        });

        $("#edit-btn-alipay").click(function () {
            $(this).hide();
            $("#alipay_edit").show();
            $("#edit-need-alipay").show();
        });

        $("#edit-btn-wechat").click(function () {
            $(this).hide();
            $("#wechat_edit").show();
            $("#edit-need-wechat").show();
        });

        //文本框禁用复制粘贴
        $('#bank_code').bind("cut copy paste", function (e) {
            layer.tips("<?php echo e(___('_trade_setting.pls_enter_manually')); ?>", $(this));
            e.preventDefault();
        });

        //文件上传
        layui.use('upload', function () {

            var upload = layui.upload;
            var uploadUrl = "qrcode";

            //执行实例
            var uploadInst = upload.render({
                elem: '.upload',  //绑定元素
                url: "/file-processes/upload/" + uploadUrl,
                method: 'post',
                field: 'file',    //默认是file
                data: {"_token": "<?php echo e(csrf_token()); ?>"},
                accept: 'images', //允许上传的文件类型
                acceptMime: 'image/', //规定打开文件选择框时，筛选出的文件类型，值为用逗号隔开的,当前只显示图片文件
                exts: 'jpg|png|gif|bmp|jpeg', //允许文件上传的格式
                size: "<?php echo e($iUploadImgSizeLimit); ?>", 　　　　//最大允许上传的文件大小
                auto: true, 　　　//是否自动上传
                drag: true, 　　　　//支持拖拽

                //选择文件时调用
//                choose: function (upload) {
//                },

                //执行上传请求前回调
//                before: function (upload) {
//                    layer.load();
//                },

                //执行上传后上传完毕的回调
                done: function (res) {
                    if (style === 1) {
                        $("#qrcode_alipay").val(res.url);
                    } else if (style === 2) {
                        $("#qrcode_wechat").val(res.url);
                    }

                    layer.msg("上传成功");

                },

                //执行上传请求出现异常的回调
                error: function (upload) {
                    layer.msg("上传异常");
                }

            });
        });


        //表单提交
        $(function () {
            //修改成功后，延迟刷新页面的时间 3000 = 3秒
            var reloadTime = 3000;


            $(".yb-btn").click(function () {
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
                switch (style) {

                    //银行卡支付
                    case 0:
                        var objUsernameForBank = $("#username_bank");
                        var objBankname = $("#bank_name");
                        var objBankAddress = $("#bank_address");
                        var objBankCode = $("#bank_code");
                        var objRepeatBankCode = $("#bank_code_confirmation");
                        var objCashPassword = $("#cash_password_bank");

                        UsernameForBank = $.trim(objUsernameForBank.val());
                        Bankname = $.trim(objBankname.val());
                        BankAddress = $.trim(objBankAddress.val());
                        BankCode = $.trim(objBankCode.val());
                        RepeatBankCode = $.trim(objRepeatBankCode.val());
                        CashPassword = $.trim(objCashPassword.val());

                        if (UsernameForBank.length < 1) {
                            layer.tips("<?php echo e(___('_trade_setting.account_name_require')); ?>", objUsernameForBank);
                            return false;
                        }

                        if (Bankname.length < 1) {
                            layer.tips("<?php echo e(___('_trade_setting.pls_add_correct_bank')); ?>", objBankname);
                            return false;
                        }

                        if (BankAddress.length < 1) {
                            layer.tips("<?php echo e(___('_trade_setting.pls_add_correct_bank_address')); ?>", objBankAddress);
                            return false;
                        }

                        if (BankCode.length < 16 || BankCode.length > 20) {
                            layer.tips("<?php echo e(___('_trade_setting.pls_add_correct_bank_code')); ?>", objBankCode);
                            return false;
                        }

                        //当卡号改变时
                        if (bankSingal === 20) {
                            if (RepeatBankCode != BankCode) {
                                layer.tips("<?php echo e(___('_trade_setting.twice_bank_code_not_same')); ?>", objRepeatBankCode);
                                return false;
                            }
                        } else {

                            //没有改变就直接赋值
                            RepeatBankCode = BankCode;
                        }

                        if (CashPassword.length < 1) {
                            layer.tips("<?php echo e(___('_trade_setting.cash_password_require')); ?>", objCashPassword);
                            return false;
                        }

                        $.ajax({
                            type: 'post',
                            url: "<?php echo e(route('user-center.trade-setting')); ?>",
                            dataType: "json",
                            data: {
                                "_token": "<?php echo e(csrf_token()); ?>",
                                "bank_username": UsernameForBank,
                                "bank_name": Bankname,
                                "bank_address": BankAddress,
                                "bank_code": BankCode,
                                "bank_code_repeat": RepeatBankCode,
                                "cash_password": CashPassword,
                                "style": style
                            },

                            success: function (d) {
                                switch (d.code) {
                                    case 703:
                                        layer.tips(d.msg, objUsernameForBank);
                                        break;
                                    case 704:
                                        layer.tips(d.msg, objBankname);
                                        break;
                                    case 705:
                                        layer.tips(d.msg, objBankAddress);
                                        break;
                                    case 706:
                                        layer.tips(d.msg, objBankCode);
                                        break;
                                    case 707:
                                        layer.tips(d.msg, objRepeatBankCode);
                                        break;
                                    default:
                                        layer.msg(d.msg);
                                        yb.reloadPage(reloadTime);
                                        break;
                                }
                                return false;

                            }
                        });
                        break;

                    //支付宝支付
                    case 1:
                        var objUsernameForAlipay = $("#username_alipay");
                        var objAlipayCode = $("#alipay_code");
                        var objCashPassword = $("#cash_password_alipay");
                        var objQrcode = $("#qrcode_alipay");

                        Qrcode = $.trim(objQrcode.val());
                        UsernameForAlipay = $.trim(objUsernameForAlipay.val());
                        AlipayCode = $.trim(objAlipayCode.val());
                        CashPassword = $.trim(objCashPassword.val());


                        if (UsernameForAlipay.length < 1) {
                            layer.tips("<?php echo e(___('_trade_setting.account_name_require')); ?>", objUsernameForAlipay);
                            return false;
                        }

                        if (AlipayCode.length < 1) {
                            layer.tips("<?php echo e(___('_trade_setting.pls_add_correct_alipay')); ?>", objAlipayCode);
                            return false;
                        }

                        if (CashPassword.length < 1) {
                            layer.tips("<?php echo e(___('_trade_setting.cash_password_require')); ?>", objCashPassword);
                            return false;
                        }

                        if (Qrcode.length < 1) {
                            layer.msg("<?php echo e(___('_trade_setting.must_upload_qrcode')); ?>");
                            return false;
                        }

                        $.ajax({
                            type: 'post',
                            url: "<?php echo e(route('user-center.trade-setting')); ?>",
                            dataType: "json",
                            data: {
                                "_token": "<?php echo e(csrf_token()); ?>",
                                "username_alipay": UsernameForAlipay,
                                "alipay_code": AlipayCode,
                                "cash_password": CashPassword,
                                "qrcode": Qrcode,
                                "style": style
                            },

                            success: function (d) {
                                switch (d.code) {
                                    case 710:
                                        layer.tips(d.msg, objUsernameForAlipay);
                                        break;
                                    case 711:
                                        layer.tips(d.msg, objAlipayCode);
                                        break;
                                    case 712:
                                        layer.tips(d.msg, objQrcode);
                                        break;
                                    default:
                                        layer.msg(d.msg);
                                        yb.reloadPage(reloadTime);
                                        break;
                                }
                                return false;

                            }
                        });
                        break;

                    //微信支付
                    case 2:

                        var objUsernameForWechat = $("#username_wechat");
                        var objWechatCode = $("#wechat_code");
                        var objCashPassword = $("#cash_password_wechat");
                        var objQrcode = $("#qrcode_wechat");

                        UsernameForWechat = $.trim(objUsernameForWechat.val());
                        WechatCode = $.trim(objWechatCode.val());
                        CashPassword = $.trim(objCashPassword.val());
                        Qrcode = $.trim(objQrcode.val());


                        if (objUsernameForWechat.length < 1) {
                            layer.tips("<?php echo e(___('_trade_setting.account_name_require')); ?>", objUsernameForWechat);
                            return false;
                        }

                        if (WechatCode.length < 1) {
                            layer.tips("<?php echo e(___('_trade_setting.pls_add_correct_wechat')); ?>", objWechatCode);
                            return false;
                        }

                        if (CashPassword.length < 1) {
                            layer.tips("<?php echo e(___('_trade_setting.cash_password_require')); ?>", objCashPassword);
                            return false;
                        }

                        if (Qrcode.length < 1) {
                            layer.msg("<?php echo e(___('_trade_setting.must_upload_qrcode')); ?>");
                            return false;
                        }

                        $.ajax({
                            type: 'post',
                            url: "<?php echo e(route('user-center.trade-setting')); ?>",
                            dataType: "json",
                            data: {
                                "_token": "<?php echo e(csrf_token()); ?>",
                                "username_wechat": UsernameForWechat,
                                "wechat_code": WechatCode,
                                "cash_password": CashPassword,
                                "qrcode": Qrcode,
                                "style": style
                            },

                            success: function (d) {
                                switch (d.code) {
                                    case 714:
                                        layer.tips(d.msg, objUsernameForWechat);
                                        break;
                                    case 715:
                                        layer.tips(d.msg, objWechatCode);
                                        break;
                                    case 716:
                                        layer.tips(d.msg, objQrcode);
                                        break;
                                    default:
                                        layer.msg(d.msg);
                                        yb.reloadPage(reloadTime);
                                        break;
                                }
                                return false;

                            }
                        });
                        break;
                }

            }
        });

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>