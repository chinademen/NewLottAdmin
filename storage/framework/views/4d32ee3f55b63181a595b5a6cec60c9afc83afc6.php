<?php $__env->startSection("title"); ?>
    <title>帐变记录</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <!--中间内容区-->
    <div class="wrap1200 mt30">
        <div class="yb-breadcrumb">
            <div class="bc-wrap">
                <a href="<?php echo e(route("cash-manage.index")); ?>" mk=">">资产管理</a>
                <span>帐变记录</span>
            </div>
        </div>
    </div>

    <div class="content mt10 clearfix wrap1200">
        <div class="w-left">
            <dl class="menu">
                <dt><i class="icon iconfont icon-zhangbian"></i><span>帐变记录</span></dt>
                <?php if($sActive=='all'): ?>
                    <dd class="active">
                <?php else: ?>
                    <dd>
                        <?php endif; ?>
                        <a class="item" href="<?php echo e(route('transaction-record.index')); ?>">全部</a>
                    </dd>

                    <?php if($sActive=='withdraw'): ?>
                        <dd class="active">
                    <?php else: ?>
                        <dd>
                            <?php endif; ?>
                            <a class="item" href="<?php echo e(route('transaction-record.withdraw')); ?>">提现</a>
                        </dd>
                        <?php if($sActive=='recharge'): ?>
                            <dd class="active">
                        <?php else: ?>
                            <dd>
                                <?php endif; ?>
                                <a class="item" href="<?php echo e(route('transaction-record.recharge')); ?>">充值</a>
                            </dd>
            </dl>
        </div>
        <div class="mn">
            <div class="w-right">
                <div class="orderManage pt10">
                    <!--<div class="om-search">
                        <input class="yb-input search" type="text" placeholder="请输入查询的订单号"><a href="javascript:" class="yb-btn"><i class="icon iconfont icon-search"></i>搜索</a>
                    </div>-->
                    <div class="tb-wrap">
                        <?php if($sActive != "withdraw"): ?>
                            <table>
                                <thead>
                                <tr>
                                    <th width="170">帐变时间</th>
                                    <th>帐变编号</th>
                                    <th>帐变类型</th>
                                    <th width="128">帐变前资产(BTC)</th>
                                    <th width="110">帐变金额(BTC)</th>
                                    <th width="110">帐变后资产(BTC)</th>
                                    <th class="opt">操作</th>
                                </tr>
                                </thead>
                                <tbody class="om">
                                <?php if($paginator->count()>0): ?>
                                    <?php $__currentLoopData = $paginator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oUserTransaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($oUserTransaction->created_at); ?></td>
                                            <td style="word-wrap: break-word"><?php echo e($oUserTransaction->serial_number); ?></td>
                                            <td>
                                                <?php echo e(isset($aType[$oUserTransaction->type]) ? $aType[$oUserTransaction->type] : ''); ?>

                                            </td>
                                            <td><?php echo e($oUserTransaction->previous_available); ?></td>
                                            <td><?php echo e($oUserTransaction->amount); ?></td>
                                            <td><?php echo e($oUserTransaction->available); ?></td>
                                            <td class="opt">
                                                <a href="<?php echo e(route('transaction-record.view',['id'=>$oUserTransaction->id],false)); ?>"
                                                   class="yb-btn blue">查看详情</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" style="text-align: center">暂无数据</td>
                                    </tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <table>
                                <thead>
                                <tr>
                                    <th width="80">提现编号</th>
                                    <th width="80">币种</th>
                                    <th width="120">提现金额(BTC)</th>
                                    <th width="120">手续费用(BTC)</th>
                                    <th width="100">状态</th>
                                    <th width="100">备注</th>
                                    <th width="120">时间</th>
                                    <th class="opt">操作</th>
                                </tr>
                                </thead>
                                <tbody class="om">
                                <?php if($paginator->count()>0): ?>
                                    <?php $__currentLoopData = $paginator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oWithdraw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td style="word-wrap: break-word"><?php echo e($oWithdraw->id); ?></td>
                                            <td style="word-wrap: break-word"><?php echo e($oWithdraw->money_identifier); ?></td>
                                            <td style="word-wrap: break-word"><?php echo e($oWithdraw->amount); ?></td>
                                            <td style="word-wrap: break-word"><?php echo e($oWithdraw->fee_amount); ?></td>
                                            <td>
                                                <?php echo e(isset($aType[$oWithdraw->status]) ? $aType[$oWithdraw->status] : ''); ?>

                                            </td>
                                            <td><?php echo e($oWithdraw->note); ?></td>
                                            <td><?php echo e($oWithdraw->created_at); ?></td>
                                            <td class="opt">
                                                <a href="<?php echo e(route('transaction-record.withdraw-detail',['id'=>$oWithdraw->id],false)); ?>"
                                                   class="yb-btn blue">查看详情</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" style="text-align: center">暂无数据</td>
                                    </tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
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