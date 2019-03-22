<?php $__env->startSection("title"); ?>
    <title>我的订单</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <!--中间内容区-->
    <div class="content mt30 pb30 clearfix wrap1200">
        <div class="w-left">
            <dl class="menu">
                <dt><i class="icon iconfont icon-wodedingdan"></i><span>我的订单</span></dt>


                <dd <?php echo $sAction == \App\Models\Orders::STATUS_ONE ? 'class="active"' : ''; ?>>
                    <a class="item" href="<?php echo e(route('order-manage.index')); ?>">已拍下</a>
                </dd>

                <dd <?php echo $sAction == \App\Models\Orders::STATUS_THREE ? 'class=active' : ''; ?>>

                    <a class="item" href="<?php echo e(route('order-manage.order-status-three')); ?>">已付款</a>
                </dd>

                <dd <?php echo $sAction == \App\Models\Orders::STATUS_TWO ? 'class=active' : ''; ?>>

                    <a class="item" href="<?php echo e(route('order-manage.order-status-two')); ?>">已释放</a>
                </dd>

                <dd <?php echo $sAction == \App\Models\Orders::STATUS_FOUR ? 'class=active' : ''; ?>>

                    <a class="item" href="<?php echo e(route('order-manage.order-status-four')); ?>">已完成</a>
                </dd>
                <dd <?php echo $sAction == \App\Models\Orders::STATUS_FIVE ? 'class=active' : ''; ?>>

                    <a class="item" href="<?php echo e(route('order-manage.order-status-five')); ?>">已取消</a>
                </dd>

                <dd <?php echo $sAction == \App\Models\Orders::STATUS_SIX ? 'class=active' : ''; ?>>
                    <a class="item" href="<?php echo e(route('order-manage.order-status-six')); ?>">申诉中</a>
                </dd>
            </dl>
        </div>
        <div class="mn">
            <div class="w-right">
                <div class="orderManage">
                    <form action="<?php echo e(route('order-manage.search')); ?>" method="get" id="search_form">
                        <div class="om-search">
                            <input name="ordernum" class="yb-input search" type="text" placeholder="请输入查询的订单号">
                            <input name="action" type="hidden" value="<?php echo e($sAction); ?>">
                            <a href="javascript:" class="yb-btn" onclick="document:search_form.submit()">
                                <i class="icon iconfont icon-search"></i>搜索
                            </a>
                        </div>
                    </form>
                    <div class="tb-wrap">
                        <table class="ddgl">
                            <thead>
                            <tr>
                                <th width="150">订单号</th>
                                <th width="" class="opt">创建时间</th>
                                <th width="40">类型</th>
                                <th>交易对象</th>
                                <th>数量</th>
                                <th>价格</th>
                                <th>金额</th>
                                <th>手续费</th>
                                <th class="opt">附言</th>
                                <th class="opt">状态</th>
                            </tr>
                            </thead>
                            <tbody class="om">
                            <?php if($paginator->count()): ?>
                                <?php $__currentLoopData = $paginator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aUserOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a target="_blank"
                                               href="<?php echo e(route('order.detail',[$aUserOrder->id])); ?>"><?php echo e($aUserOrder->order_number); ?></a>
                                        </td>
                                        <td class="opt"><?php echo e($aUserOrder->updated_at); ?></td>
                                        <?php
                                        if ($aUserOrder->buyer_id == Session::get('user_id')) {
                                            echo '<td class="green">买进' . $aUserOrder->money_identifier;
                                            $iTradeId = $aUserOrder->seller_id;
                                        } elseif ($aUserOrder->seller_id == Session::get('user_id')) {
                                            echo '<td class="blue">卖出' . $aUserOrder->money_identifier;
                                            $iTradeId = $aUserOrder->buyer_id;
                                        } else {
                                            echo '<td class="green">' . $aUserOrder->money_identifier;
                                        }
                                        ?>
                                        </td>
                                        <td>
                                            <?php echo e(App\Models\Users::where('id', $iTradeId)->first()['nickname']); ?>

                                        </td>
                                        <td><?php echo e($aUserOrder->quantity); ?></td>
                                        <td><?php echo e($aUserOrder->price); ?></td>
                                        <td><?php echo e($aUserOrder->amount); ?></td>
                                        <td><?php echo e($aUserOrder->fee_quantity); ?></td>
                                        <td class="opt"><?php echo e($aUserOrder->postscript); ?></td>
                                        <?php if($sAction != \App\Models\Orders::STATUS_TWO): ?>
                                            <td class="opt">
                                                <?php echo e(isset($aStatus[$aUserOrder->status]) ? $aStatus[$aUserOrder->status] : ''); ?>

                                            </td>
                                        <?php else: ?>
                                            <td class="opt">
                                                <?php echo e($aUserOrder->release_status == \App\Models\Orders::RELEASE_STATUS_FAILED?"释放失败":"释放成功"); ?>

                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="10" style="text-align: center">暂无数据</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                        <?php echo $__env->make('pagination.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>