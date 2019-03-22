<?php $__env->startSection("title"); ?>
    <title><?php echo e($sTitle); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
    <!--中间内容区-->
    <div class="content mt30 pb30 clearfix wrap1200">
        <div class="w-left">
            <dl class="menu">
                <dt><i class="icon iconfont icon-mairu"></i><span>我要买进</span></dt>
                <?php if($aDigitalMoney): ?>
                    <?php $__currentLoopData = $aDigitalMoney; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <dd <?php if($sType == "buy" && $sIdentifier == $item["identifier"]): ?> class="active" <?php endif; ?>>
                            <a class="item"
                               href="<?php echo e(route("trading-center.index", ["buy", $item["identifier"]])); ?>"><?php echo e($item["identifier"]); ?></a>
                        </dd>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <dt><i class="icon iconfont icon-maichu"></i><span>我要卖出</span></dt>
                <?php if($aDigitalMoney): ?>
                    <?php $__currentLoopData = $aDigitalMoney; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <dd <?php if($sType == "sell" && $sIdentifier == $item["identifier"]): ?> class="active" <?php endif; ?>>
                            <a class="item"
                               href="<?php echo e(route("trading-center.index", ["sell", $item["identifier"]])); ?>"><?php echo e($item["identifier"]); ?></a>
                        </dd>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <dt><i class="icon iconfont icon-fabu"></i><span>发布广告</span></dt>
                <dd class="btns">
                    <a class="yb-btn" href="<?php echo e(route("trading-center.publish")); ?>">我要发布买卖广告</a>
                </dd>
            </dl>
        </div>
        <div class="mn">
            <div class="w-right">
                <div class="table-wrap">
                    <div class="tools clearfix">
                        <div class="left">
                            <a <?php if($sOrder == "all"): ?>class="active"
                               <?php endif; ?> href="<?php echo e(route("trading-center.index", [$sType, $item["identifier"]])); ?>">综合排序</a>
                            <a <?php if($sOrder == "new"): ?>class="active"
                               <?php endif; ?> href="<?php echo e(route("trading-center.index", [$sType, $item["identifier"], "new"])); ?>">最新发布</a>
                            <a <?php if($sOrder == "price_up"): ?>class="active"
                               <?php endif; ?> href="<?php echo e(route("trading-center.index", [$sType, $item["identifier"], "price_up"])); ?>">价格<i
                                        class="icon iconfont icon-jiantou-up"></i></a>
                            <a <?php if($sOrder == "price_down"): ?>class="active"
                               <?php endif; ?> href="<?php echo e(route("trading-center.index", [$sType, $item["identifier"], "price_down"])); ?>">价格<i
                                        class="icon iconfont icon-jiantou-down"></i></a>
                        </div>
                        <div class="right">
                        <span class="yb-checkbox">
                            <input <?php echo e($iOnline ? "checked": ""); ?>

                                   data_url="<?php echo e(route("trading-center.index", [$sType, $item["identifier"], $sOrder])); ?>"
                                   id="chk01" type="checkbox">
                            <label for="chk01">
                                <i class="icon iconfont icon-gouxuan"></i>
                            </label>
                        </span>
                            <span class="vm"><?php echo e(___("_trading_center.show_online")); ?></span>
                        </div>
                    </div>
                    <div class="tb-wrap">
                        <table>
                            <thead>
                            <tr>
                                <th>用户昵称</th>
                                <th>成交笔数</th>
                                <th>支付方式</th>
                                <th>剩余数量</th>
                                <th>价格(CNY)</th>
                                <th class="opt">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if($oBuySellLists->total()): ?>
                                <?php $__currentLoopData = $oBuySellLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oBuySellList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                <span class="img-wrap">
                                    <img src="<?php echo e($oBuySellList->avatar); ?>" alt="<?php echo e($oBuySellList->nickname); ?>">
                                    <?php if($oBuySellList->user_online): ?>
                                        <i class="point green"></i>
                                    <?php else: ?>
                                        <i class="point"></i>

                                    <?php endif; ?>

                                </span>
                                            <span><a href="<?php echo e(route('user-center.user-info',[$oBuySellList->user_id])); ?>"><?php echo e($oBuySellList->nickname); ?></a></span>
                                        </td>
                                        <td><?php echo e($oBuySellList->total_number ? $oBuySellList->total_number : '暂无'); ?></td>
                                        <td>
                                            <?php $aPaymentMethod = explode(",", $oBuySellList->payment_method)?>
                                            <?php $__currentLoopData = $aPaymentMethod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sPaymentMethod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php switch($sPaymentMethod):

                                                case ("Alipay"): ?>
                                                <i class="icon iconfont icon-zhifubao zfb"></i>
                                                <?php break; ?>

                                                <?php case ("Wechat"): ?>
                                                <i class="icon iconfont icon-weixin-copy wx"></i>
                                                <?php break; ?>

                                                <?php case ("Bank"): ?>
                                                <i class="icon iconfont icon-bank bank"></i>
                                                <?php break; ?>

                                                <?php default: ?>
                                                <?php endswitch; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td>
                                            <?php $aQuantity = explode(".", $oBuySellList->last_quantity) ?>
                                            <?php echo e($aQuantity[0]); ?>.<span class="num-small"><?php echo e($aQuantity[1]); ?></span>BTC
                                        </td>

                                        <td>
                                            <p class="money bold"><?php echo e(number_format($oBuySellList->price,2)); ?>CNY</p>
                                            <p class="money reg"><?php echo e(number_format($oBuySellList->single_min,2)); ?>

                                                -<?php echo e(number_format($oBuySellList->single_max, 2)); ?>

                                                CNY</p>
                                        </td>
                                        <td class="opt">
                                            <?php if( $sType == "buy"): ?>
                                                <a class="yb-btn " href="javascript:;" data-type="buy"
                                                   amount-min="<?php echo e(number_format($oBuySellList->single_min,2)); ?>"
                                                   amount-max="<?php echo e(number_format($oBuySellList->single_max,2)); ?>"
                                                   quantity="<?php echo e(number_format($oBuySellList->last_quantity,8)); ?>"
                                                   price="<?php echo e(number_format($oBuySellList->price,2)); ?>"
                                                   data-id="<?php echo e($oBuySellList->id); ?>"
                                                   onclick="<?php if(Auth::check()): ?>yb.tradeWindow($(this),'<?php echo e($iOrderTimeLimit); ?>')<?php else: ?> yb.checkAuthWindow('/auth/login','/auth/register')<?php endif; ?>">买入</a>
                                            <?php else: ?>
                                                <a class="yb-btn greenBg" href="javascript:;" data-type="sell"
                                                   amount-min="<?php echo e(number_format($oBuySellList->single_min,2)); ?>"
                                                   amount-max="<?php echo e(number_format($oBuySellList->single_max,2)); ?>"
                                                   quantity="<?php echo e(number_format($oBuySellList->last_quantity,8)); ?>"
                                                   price="<?php echo e(number_format($oBuySellList->price,2)); ?>"
                                                   data-id="<?php echo e($oBuySellList->id); ?>"
                                                   onclick="<?php if(Auth::check()): ?>yb.tradeWindow($(this),'<?php echo e($iOrderTimeLimit); ?>')<?php else: ?> yb.checkAuthWindow('/auth/login','/auth/register')<?php endif; ?>">卖出</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" style="text-align: center">暂无数据</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                        <!--分页-->
                        <?php echo $__env->make('pagination.default', ['paginator' => $oBuySellLists], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make("layout.trade_window", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection("script"); ?>
    <?php echo e(script('trade')); ?>

    <script type="application/javascript">
        //显示在线
        $("#chk01").click(function () {
            var url = $(this).attr("data_url");
            if ($(this).is(":checked")) {
                window.location.href = url + "/1"
            } else {
                window.location.href = url
            }

        });

        //自动刷新页面
        function refresh() {
            window.location.reload();
        }

        var refreshTime = parseInt("<?php echo e($iOrderTimeLimit); ?>");
        setTimeout('refresh()', refreshTime * 1000); //单位:秒
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>