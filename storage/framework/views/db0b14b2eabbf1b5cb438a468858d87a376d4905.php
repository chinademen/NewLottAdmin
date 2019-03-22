<div class="panel panel-default">
    <div class="panel-body">
        <?php echo Form::open(array('method' => 'get', 'class' => 'form-inline', 'id'=>'project_search_form')); ?>

        <input id="download_flag" name="download_flag" value="" type="hidden"/>
        <table style="width:100%">
            <tr>
                <td>
                    <table>
                        <tr>
                            <td style="width:100px" class="text-right">商户：</td>
                            <td style="width:150px">
                                <select name="merchant_id" style="width:100%"  class="form-control input-xs">
                                    <option value=""></option>
                                    <?php $__currentLoopData = $aMerchantIds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($id); ?>" <?php echo e(@$aSearchFields['merchant_id']['value'] == $id ? 'selected' : ''); ?> ><?php echo e($value); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </td>
                            <td style="width:100px" class="text-right">注单编号：</td>
                            <td style="width:150px">
                                <input class="form-control input-xs" type="text" name="serial_number"
                                       value="<?php echo e(@$aSearchFields['serial_number']['value']); ?>">
                            </td>
                            <td style="width:100px" class="text-right">游戏时间：</td>
                            <td style="width:150px">
                                <input class="form-control input-xs boot-time" type="text" name="bought_at_from"
                                       value="<?php echo e(@$aSearchFields['bought_at_from']['value']); ?>">
                            </td>
                            <td style="width:100px" class="text-right">至：</td>
                            <td style="width:150px">
                                <input class="form-control input-xs boot-time" type="text" name="bought_at_to"
                                       value="<?php echo e(@$aSearchFields['bought_at_to']['value']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <td class="text-right">用户搜索：</td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control input-xs" type="text" name="username"
                                           value="<?php echo e(@$aSearchFields['username']['value']); ?>">
                                </div>
                            </td>
                            <td class="text-right">元角模式：</td>
                            <td>
                                <select name="coefficient" style="width:100%" class="form-control input-xs">
                                    <option value>不限</option>
                                    <?php $__currentLoopData = $aCoefficient; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($id); ?>" <?php echo e(@$aSearchFields['coefficient']['value'] == $id ? 'selected' : ''); ?> ><?php echo e($value); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </td>
                            <td class="text-right">状态：</td>
                            <td>
                                <select name="status" style="width:100%" class="form-control input-xs">
                                    <option value>不限</option>
                                    <?php $__currentLoopData = $aStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>" <?php echo e(@$aSearchFields['status']['value'] === (string)$key ? 'selected' : ''); ?>><?php echo e($value); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </td>
                            <td  class="text-right">测试用户：</td>
                            <td>
                                <select name="is_tester" style="width:100%" class="form-control input-xs">
                                    <option value>不限</option>
                                    <option value="1" <?php echo e(@$aSearchFields['is_tester']['value'] === '1' ? 'selected' : ''); ?>>
                                        是
                                    </option>
                                    <option value="0" <?php echo e(@$aSearchFields['is_tester']['value'] === '0' ? 'selected' : ''); ?>>
                                        否
                                    </option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td class="text-right">游戏名称：</td>
                            <td>
                                <select id="lottery_id" name="lottery_id" style="width:100%"  class="form-control input-xs">
                                    <option value>所有游戏</option>
                                    <?php $__currentLoopData = $aLotteries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id =>$name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($id); ?>" <?php echo e(@$aSearchFields['lottery_id']['value'] == $id ? 'selected' : ''); ?> ><?php echo e($name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </td>
                            <td class="text-right">游戏玩法：</td>
                            <td>
                                <select id="way_id" name="way_id" style="width:100%" class="form-control input-xs">
                                    <option value>所有玩法</option>
                                    <?php if(isset($aWays)): ?>
                                        <?php $__currentLoopData = $aWays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($val['id']); ?>" <?php echo e($val['id'] == $aSearchFields['way_id']['value'] ? 'selected' : ''); ?> ><?php echo e($val['name']); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </td>
                            <td class="text-right">游戏奖期：</td>
                            <td>
                                <select id="issue" name="issue" style="width:100%" class="form-control input-xs">
                                    <option value>所有奖期</option>
                                    <?php if(isset($aIssues)): ?>
                                        <?php
                                        $aNetIssues = [];
                                        ?>
                                        <?php $__currentLoopData = $aIssues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($val['name']); ?>" <?php echo e($val['name'] == $aSearchFields['issue']['value'] ? 'selected' : ''); ?> ><?php echo e($val['name']); ?></option>
                                            <?php
                                            $aNetIssues[] = $val['name'];
                                            ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(isset($aSearchFields['issue']['value']) && $aSearchFields['issue']['value'] && !in_array($aSearchFields['issue']['value'],$aNetIssues)): ?>
                                            <option value="<?php echo e($aSearchFields['issue']['value']); ?>"
                                                    selected><?php echo e($aSearchFields['issue']['value']); ?></option>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </select>
                            </td>
                            <td class="text-right">每页条数：</td>
                            <td>
                                <?php echo $__env->make('w.pagesize', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </td>
                        </tr>

                    </table>
                </td>
                <td class="text-right">
                    <input class="btn btn-success" type="submit" id="submitForm" value="搜索"/>
                    <a class="btn btn-default" id="download">下载数据报表</a>
                </td>
            </tr>
        </table>
        <?php
        echo Form::hidden('is_search');
        echo Form::close();
        ?>
    </div>
</div>
<?php $__env->startSection('end'); ?>
    ##parent-placeholder-7a92f3d26362d6557d5701de77a63a01df61e57f##
    <script type="text/javascript">
        $(function () {
            $('#download').click(function () {
                $('#project_search_form').attr('action', '/projects/download');
                $('#project_search_form').submit();
            });
            $('#submitForm').click(function (event) {
                $('#project_search_form').attr('action', '/projects');
                $('#project_search_form').submit();
            });

            function resetSelectForm(selectId, title) {
                var selectDom = $("#" + selectId);
                selectDom.html("<option value>" + title + "</option>");
            }

            function setDatatoSelectForm(selectId, title, data) {
                var selectDom = $("#" + selectId);
                resetSelectForm(selectId, title);
                var optstr = "";
                $(data).each(function () {
                    if (selectId == 'way_id') {
                        optstr += "<option value='" + this.id + "'>" + this.name + "</option>";
                    } else if (selectId == 'issue') {
                        optstr += "<option value='" + this.name + "'>" + this.name + "</option>";
                    }
                });
                selectDom.append(optstr);
            }

            $('#lottery_id').change(function () {
                var lottery_id = $("#lottery_id").val();
                if (lottery_id > 0) {
                    $.ajax({
                        url: '/projects/?action=ajax&lottery_id=' + lottery_id,
                        type: 'GET',
                    }).done(function (data) {
                        jsonObj = eval("(" + data + ")");
                        lotteryWays = jsonObj.lottery_ways;
                        setDatatoSelectForm('way_id', '所有玩法', lotteryWays);
                        issues = jsonObj.issues;
                        setDatatoSelectForm('issue', '所有奖期', issues);
                    }).fail(function (data) {
                        alert('Getl Data Failed!', 'Tip');
                    });
                } else {
                    resetSelectForm('way_id', '所有玩法');
                    resetSelectForm('issue', '所有奖期');
                }
            });
        });
    </script>

<?php $__env->stopSection(); ?>