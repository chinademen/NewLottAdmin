<?php $__env->startSection("title"); ?>
    <title>交易记录</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <!--中间内容-->
    <div class="content wrap1200 mt30">
        <div class="yb-breadcrumb">
            <div class="bc-wrap">
                <a href="<?php echo e(route("cash-manage.index")); ?>" mk=">">资产管理</a>
                <span>交易记录</span>
            </div>
        </div>

        <form action="<?php echo e(route('order-manage.search-order')); ?>" method="get" id="search_form">

            <div class="orderManage mt10">
                <div class="om-search">
                    <label class="font-c666 vm">起止时间：</label>
                    <span class="date vm">
                <input id="date0" type="text" class="yb-input w150" name="start" value="<?php echo e($sStart); ?>">
                <i id="date0_btn" class="iconfont icon-riqi"></i>
            </span>
                    <span class="font-c666 vm">&nbsp;&nbsp;至&nbsp;&nbsp;</span>
                    <span class="date vm">
                <input id="date1" type="text" class="yb-input w150" name="end" value="<?php echo e($sEnd); ?>">
                <i id="date1_btn" class="iconfont icon-riqi"></i>
            </span>
                    <label class="font-c666 ml50 vm">交易类型：</label>
                    <span class="yb-select h34 vm">
                <i class="iconfont icon-xiala"></i>
                <input class="yb-input w120" readonly type="text" name="transactiontype" value="<?php echo e($sTransactionType); ?>">
                <span class="options">
                    <span class="scroll">
                        <a href="javascript:"></a>
                        <?php $__currentLoopData = $aTransactionType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sTransactionType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="javascript:"><?php echo e($sTransactionType); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </span>
                </span>
            </span>
                    <a href="javascript:;" onclick="document:search_form.submit()" class="yb-btn ml10 vm"><i
                                class="icon iconfont icon-search"></i>搜索</a>
                </div>
        </form>
        <div class="tb-wrap">
            <table>
                <thead>
                <tr>
                    <th class="opt">交易时间</th>
                    <th class="opt">订单号</th>
                    <th class="opt">交易类型</th>
                    <th class="opt">数量</th>
                    <th class="opt">价格</th>
                    <th>交易金额(元)</th>
                    <th class="opt">状态</th>
                    <th class="opt">操作</th>
                </tr>
                </thead>
                <tbody class="om">
                <?php if($paginator->count()): ?>
                    <?php $__currentLoopData = $paginator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oUserOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="opt"><?php echo e($oUserOrder->created_at); ?></td>
                            <td class="opt"><?php echo e($oUserOrder->order_number); ?></td>
                            <?php
                            if ($oUserOrder->buyer_id == Session::get('user_id')) {
                                echo '<td class="opt green">买进' . $oUserOrder->money_identifier;
                            } elseif ($oUserOrder->seller_id == Session::get('user_id')) {
                                echo '<td class="opt blue">卖出' . $oUserOrder->money_identifier;
                            } else {
                                echo '<td class="opt green">';
                            }
                            ?>
                            </td>
                            <td class="opt"><?php echo e($oUserOrder->quantity); ?></td>
                            <td class="opt"><?php echo e($oUserOrder->price); ?></td>
                            <td><?php echo e($oUserOrder->amount); ?></td>
                            <td class="opt"><?php echo e(isset($aStatus[$oUserOrder->status]) ? $aStatus[$oUserOrder->status] : ''); ?></td>
                            <td class="opt">
                                <a class="yb-btn blue"
                                   href="<?php echo e(route('order.detail', ['id'=>$oUserOrder->id])); ?>">查看详情</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" style="text-align: center">暂无数据</td>
                    </tr>
                <?php endif; ?>

                </tbody>
            </table>
            <?php echo $__env->make('pagination.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>
    <script>
        layui.use('laydate', function () {
            var laydate = layui.laydate;

            //执行一个laydate实例
            laydate.render({
                elem: '#date0'//指定元素
            });
            laydate.render({
                elem: '#date1' //指定元素
            });

        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>