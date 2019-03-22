<?php $__env->startSection("title"); ?>
    <title><?php echo e(___('_main.title.first_page')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>

    <div class="wrap1200 mt30" style="display: none">
        <div class="yb-breadcrumb">
            <div class="bc-wrap">
                <a href="<?php echo e(route('user-center.safe')); ?>" mk=">">个人中心</a>
                <span>我的信任列表</span>
            </div>
        </div>
    </div>

    <div class="content mt30 clearfix wrap1200">
        
        <?php echo $__env->make('layout.user_center_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="content mt10 clearfix wrap1200">
            <div class="mn">
                <div class="w-right">
                    <div class="orderManage">
                        <div class="tabs tab-title clearfix">
                            <a class="left active"
                               href="<?php echo e(route("user-center.my-cms", ["type"=>"normal"])); ?>">进行中</a>
                            <a class="left" href="<?php echo e(route("user-center.my-cms", ["type"=>"drop-off"])); ?>">以下架</a>
                        </div>
                        <div class="tabs-content mt10">
                            <div class="tb-wrap">
                                <table>
                                    <thead>
                                    <tr>
                                        <th width="100">编号</th>
                                        <th width="198">创建时间</th>
                                        <th>类型</th>
                                        <th width="">数量</th>
                                        <th>价格</th>
                                        <th width="160" class="opt">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody class="om">
                                    <?php $__currentLoopData = $oAdvertisingList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($value->id); ?></td>
                                            <td><?php echo e($value->created_at); ?></td>
                                            <td><?php echo e($value->type == "1"?"买进":"卖出"); ?></td>
                                            <td><?php echo e($value->quantity); ?></td>
                                            <td><?php echo e($value->price); ?></td>
                                            <td class="opt">
                                                <a href="javascript:" class="yb-btn blue mr10">编辑广告</a><a
                                                        href="javascript:"
                                                        class="yb-btn blue">广告下架</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <?php echo $__env->make('pagination.default', ['paginator' => $oAdvertisingList], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                            <div style="display: none">第二个</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("script"); ?>

    <script type="application/javascript">
        $("dd").eq(3).addClass("active");

        //选择框选中
        <?php if($sType == "normal"): ?>
        $(".left").eq(0).addClass("active");
        $(".left").eq(1).removeClass("active");
        <?php else: ?>
        $(".left").eq(1).addClass("active");
        $(".left").eq(0).removeClass("active");

        <?php endif; ?>

        function Delete(url) {

            //确认弹窗
            layer.open({
                title: [
                    '温馨提示',
                    'background-color:#8DCE16; color:#fff;'
                ],
                anim: 'up',
                content: '你确定删除该信任用户吗',
                btn: ['确认', '取消'],
                yes: function (index) {
                    window.location.href = url;
                    layer.close(index)
                }
            });
        }

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>