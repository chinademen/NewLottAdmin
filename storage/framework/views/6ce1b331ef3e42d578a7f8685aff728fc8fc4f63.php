<?php $__env->startSection("title"); ?>
    <title><?php echo e(___('_main.title.user_info')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <div class="content mt30 clearfix wrap1200">

        <div class="yb-breadcrumb">
            <div class="bc-wrap">
                <a href="<?php echo e(route('user-center.wallet')); ?>" mk=">">信任列表</a>
                <span>用户详情</span>
            </div>
        </div>

        <div class="ss-r-wrap clearfix mt10">
            <div class="head-wrap">
                <img src="<?php echo e(empty($oUser->avatar)?env("DEFAULT_AVATAR"):env("STATIC_RES_URL"). "/" .$oUser->avatar); ?>"
                     alt="">
                <h3 class="pt10"><?php echo e($oUser->nickname); ?></h3>
                <p class="pt15"><?php echo e(___('_user_info.user_created_at')); ?>：<?php echo e($oUser->created_at); ?></p>
                <p class="pt5"><?php echo e(___('_user_info.first_time_trade')); ?>：<?php echo e($sFirstTimeToTrade); ?></p>
            </div>
            <div class="personal-wrap large">
                <div class="up">
                    <p class="title"><?php echo e(___('_user_info.all_amount')); ?>：</p>
                    <?php if($iIsTrust < 1): ?>
                        <a href="javascript:;" class="yb-btn blue w116" id="J_submit"
                           style="float: right"><?php echo e(___('_user_info.trust_this')); ?></a>
                    <?php endif; ?>
                    <div class="clearfix">
                        <p class="num cRed"><?php echo e($oUserExtInfo->total_quantity); ?></p>
                    </div>
                </div>
                <div class="down clearfix">
                    <div class="left mr300">
                        <p class="title"><?php echo e(___('_user_info.have_confirm_trade_num')); ?>：</p>
                        <p class="num"><?php echo e($oUserExtInfo->total_number); ?></p>
                    </div>
                    <div class="left">
                        <p class="title"><?php echo e(___('_user_info.trust_num')); ?>：</p>
                        <p class="num"><?php echo e($oUserExtInfo->trust_number); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="tb-wrap">
            <h3 class="smallTitle">
                <?php echo e(___('_user_info.his_in_progress')); ?>

            </h3>
            <table>
                <thead>
                <tr>
                    <th width=""><?php echo e(___('_user_info.number')); ?></th>
                    <th><?php echo e(___('_user_info.created_at')); ?></th>
                    <th><?php echo e(___('_user_info.type')); ?></th>
                    <th width=""><?php echo e(___('_user_info.quantity')); ?></th>
                    <th><?php echo e(___('_user_info.price')); ?></th>
                    <th width="" class="opt"><?php echo e(___('_user_info.operations')); ?></th>
                </tr>
                </thead>
                <tbody class="om">
                <?php $__currentLoopData = $oAdvertisingList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($value->id); ?></td>
                        <td><?php echo e($value->created_at); ?></td>
                        <td class="cGreen"><?php if($value->type == 1): ?><?php echo e(___('_user_info.buy')); ?><?php elseif($value->type == 2): ?><?php echo e(___('_user_info.sell')); ?><?php endif; ?></td>
                        <td><?php echo e($value->quantity); ?></td>
                        <td><?php echo e($value->amount); ?></td>
                        <td class="opt">
                            <a class="yb-btn <?php if($value->type == 1): ?> greenBg <?php endif; ?> w116" href="javascript:;"
                               <?php if($value->type == 1): ?> data-type="buy"
                               <?php else: ?> data-type="sell" <?php endif; ?>
                               amount-min="<?php echo e(number_format($value->single_min,2)); ?>"
                               amount-max="<?php echo e(number_format($value->single_max,2)); ?>"
                               quantity="<?php echo e(number_format($value->quantity,8)); ?>"
                               price="<?php echo e(number_format($value->price,2)); ?>"
                               amount="<?php echo e(number_format($value->amount,2)); ?>"
                               data-id="<?php echo e($value->id); ?>"
                               onclick="<?php if(Auth::check()): ?>yb.tradeWindow($(this),'<?php echo e($iOrderTimeLimit); ?>')<?php else: ?> yb.checkAuthWindow('/auth/login','/auth/register')<?php endif; ?>"><?php if($value->type == 1): ?>
                                    <?php echo e(___('_user_info.sell_to_him')); ?> <?php elseif($value->type == 2): ?><?php echo e(___('_user_info.buy_his')); ?> <?php endif; ?></a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="pb80"></div>
        </div>
    </div>

    <!--弹窗--申诉弹窗内容-->
    <div class="popup shensupop">
        <p><?php echo e(___('_user_info.this_user')); ?> <span
                    class="cBlue"><?php echo e($oUser->nickname); ?></span> <?php echo e(___('_user_info.trust_this_user')); ?> </p>
    </div>
    <?php echo $__env->make("layout.trade_window", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection("script"); ?>
    <?php echo e(script('trade')); ?>

    <script type="application/javascript">

        //表单提交
        $(function () {

            $("#J_submit").click(function () {
                var popup = popup || {};
                layui.use(['layer'], function () {
                    var layer = layui.layer;
                    layer.open({
                        title: '    ',
                        type: 1,
                        area: '460px',
                        // skin: 'layui-layer-demo', //样式类名
                        closeBtn: 1, //不显示关闭按钮
                        // shadeClose: true, //开启遮罩关闭
                        content: $('.shensupop'),
                        btn: ["<?php echo e(___('_user_info.confirm')); ?>", "<?php echo e(___('_user_info.close')); ?>"],
                        yes: function (index, layero) {
                            ajaxData();
                            layer.close(index);// 关闭窗口
                        },
                        btn2: function (index, layero) {
                            console.log("<?php echo e(___('_user_info.close')); ?>");
                            layer.close(index);// 关闭窗口
                        }
                    })
                })
            });

            function ajaxData() {

                $.ajax({
                    type: 'post',
                    url: "<?php echo e(route('user-center.add-trust-user')); ?>",
                    dataType: "json",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        "user_id": "<?php echo e($oUser->id); ?>"
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