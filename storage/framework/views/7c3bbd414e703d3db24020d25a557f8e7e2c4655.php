<?php $__env->startSection("title"); ?>
    <title>申诉中心</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <div class="ap-title"></div>

    <div class="content wrap1200">
        <div class="ap-wrap clearfix">
            <!--聊天-->
            <div class="chat fl">
                <div class="chat-top clearfix">
                    <h3 class="chat-title">
                        客服 小美
                    </h3>
                </div>
                <div class="chat-content ap">
                    <div>
                        <div class="chat-wrap">
                            <div class="chats h380">
                                <div class="scroll">
                                    <div class="text">
                                        <span class="cBlue">======等待接入亚服系统=======</span>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="chat-input">
                                <div class="tools">
                                    <a class="icon iconfont icon-icons01 upload" href="javascript:"><input type="file"></a>
                                </div>
                                <div class="input clearfix">
                                    <textarea placeholder="说点什么吧"></textarea>
                                </div>
                                <div class="btns">
                                    <a class="yb-btn" href="javascript:">发送</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="questions fr">
                <h3 class="qs-title pb10"><i class="iconfont icon-qipaowenhao mr15"></i><b class="vm">常见问题</b></h3>
                <dl class="list dropList mt10">
                    <dt><i class="iconfont icon-xialaanniu"></i><span>1.如何出售数字资产</span></dt>
                    <dd>对方有按不正常流程香味对方有按不正常流程香味对方有按不正常流程香味。对方有按不正常流程香味。一定是欺诈行为。</dd>
                    <dt><i class="iconfont icon-xialaanniu"></i><span>2.数字资产是怎么托管的？</span></dt>
                    <dd>对方有按不正常流程香味对方有按不正常流程香味对方有按不正常流程香味。对方有按不正常流程香味。一定是欺诈行为。</dd>
                    <dt><i class="iconfont icon-xialaanniu"></i><span>3.怎样的是欺诈行为？</span></dt>
                    <dd>对方有按不正常流程香味对方有按不正常流程香味对方有按不正常流程香味。对方有按不正常流程香味。一定是欺诈行为。</dd>
                    <dt><i class="iconfont icon-xialaanniu"></i><span>4.怎样识别欺诈行为？</span></dt>
                    <dd>对方有按不正常流程香味对方有按不正常流程香味对方有按不正常流程香味。对方有按不正常流程香味。一定是欺诈行为。</dd>
                    <dt><i class="iconfont icon-xialaanniu"></i><span>5.买家太慢或者无响应怎么办？</span></dt>
                    <dd>对方有按不正常流程香味对方有按不正常流程香味对方有按不正常流程香味。对方有按不正常流程香味。一定是欺诈行为。</dd>
                </dl>
            </div>
        </div>
    </div>

    <!--弹窗--申诉弹窗内容-->
    <div class="popup sellpop">
        <p class="desc">请先填写以下信息，完成后亚币客服将介入申诉</p>
        <div class="form-list">
            <div class="mb20">
                <label>订单号：</label>
                <input type="hidden" id="order_id" value="<?php echo e($id); ?>">
                <input class="yb-input" type="text" readonly
                       value="<?php echo e(isset($oUserOrder->order_number) ? $oUserOrder->order_number : '0'); ?>" id="order_number">
            </div>
            <div class="mb20">
                <label>申诉原因：</label>
                <span class="yb-select">
                <i class="iconfont icon-xiala"></i>
                <input class="yb-input w400" readonly type="text" id="appeal_reason">
                <span class="options">
                    <span class="scroll">
                        <?php $__currentLoopData = $aOrderAppealReason; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$sOrderAppealReason): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="javascript:"><?php echo e($sOrderAppealReason); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </span>
                    <!--<i class="iconfont icon-triangle-up"></i>-->
                </span>
            </span>
            </div>
            <div>
                <label>资金密码：</label>
                <input class="yb-input" type="password" id="password">
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("script"); ?>
    <script>
        var popup = popup || {}
        layui.use(['layer'], function () {
            var layer = layui.layer
            layer.open({
                skin: 'yb-class',
                title: '    ',
                type: 1,
                area: '460px',
                // skin: 'layui-layer-demo', //样式类名
                closeBtn: 1, //不显示关闭按钮
                // shadeClose: true, //开启遮罩关闭
                content: $('.sellpop'),
                btn: '确定',
                yes: function (index, layero) {

                    var objOrderId = $('#order_id');
                    var objOrderNumber = $("#order_number");//订单号
                    var objAppealReason = $("#appeal_reason");//申诉原因
                    var objPassWord = $("#password");//资金密码

                    OrderId = $.trim(objOrderId.val());
                    OrderNumber = $.trim(objOrderNumber.val());
                    AppealReason = $.trim(objAppealReason.val());
                    PassWord = $.trim(objPassWord.val());

                    if (OrderNumber.length < 1) {
                        layer.tips("订单号不能为空", objOrderNumber);
                        return false;
                    }

                    if (AppealReason.length < 1) {
                        layer.tips("申诉原因不能为空", objAppealReason);
                        return false;
                    }

                    if (PassWord.length < 1) {
                        layer.tips("资金密码不能为空", objPassWord);
                        return false;
                    }
                    $.ajax({
                        type: 'post',
                        url: "<?php echo e(route('order.do-appeal')); ?>",
                        dataType: "json",
                        data: {
                            "_token": "<?php echo e(csrf_token()); ?>",
                            "order_id": OrderId,
                            "order_number": OrderNumber,
                            "appeal_reason": AppealReason,
                            "cash_password": PassWord,
                        },

                        success: function (d) {
                            console.log(d);
                            switch (d.code) {
                                case 1://参数错误!
                                    layer.msg(d.msg);
                                    layer.close(index) // 关闭弹窗
                                    break;
                                case 2://订单状态错误
                                    layer.msg(d.msg);
                                    layer.close(index) // 关闭弹窗
                                    break;
                                case 3://非法访问!
                                    layer.msg(d.msg);
                                    layer.close(index) // 关闭弹窗
                                    break;
                                case 4://买方信息错误
                                    layer.msg(d.msg);
                                    layer.close(index) // 关闭弹窗
                                    break;
                                case 5://卖方信息错误
                                    layer.msg(d.msg);
                                    layer.close(index) // 关闭弹窗
                                    break;
                                case 802://资金密码错误
                                    layer.tips(d.msg, objPassWord);
                                    break;
                                default:
                                    layer.msg(d.msg);
                                    layer.close(index) // 关闭弹窗
                                    break;
                            }
                            return false;

                        }
                    });

                }
            })
        })

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>