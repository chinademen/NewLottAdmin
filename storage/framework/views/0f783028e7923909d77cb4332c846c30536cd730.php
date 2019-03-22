<?php $__env->startSection('title'); ?>
##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php echo e($sPageTitle); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>
<div id="container">
    <?php echo $__env->make('w.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('w._function_title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('w.notification', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php
            if (isset($aTotalColumns)){
                $aTotals = array_fill(0, count($aColumnForList),null);
                $aTotalColumnMaps = array_flip($aColumnForList);
                if ($aTotalRateColumns){
                    foreach($aTotalRateColumns as $sRateColumn => $aRateColumnConfigs){
                        list($sNumerator, $sDenominator) = $aRateColumnConfigs;
                        $iPosOfRateColumn        = array_search($sRateColumn, $aColumnForList);
                        $iPosOfNumeratorColumn   = array_search($sNumerator, $aColumnForList);
                        $iPosOfDenominatorColumn = array_search($sDenominator, $aColumnForList);
                    }
                }
            //    pr($iPosOfRateColumn);
            //    pr($iPosOfNumeratorColumn);
            //    pr($iPosOfDenominatorColumn);
            //    exit;
            }
            else{
                $aTotalColumns = $aTotalColumnMaps = [];
            }
        ?>
        <?php $__currentLoopData = $aWidgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sWidget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make($sWidget, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if($bSequencable): ?>
            <?php echo Form::open(['url' => route($sSetOrderRoute) ]); ?>

        <?php endif; ?>
        <div class=" time-top">
            <i class="glyphicon glyphicon-time"></i><?php echo e(___('_basic.data-time') . ':' . $sDataUpdatedTime); ?>

        </div>

        <div class="panel panel-default  J-tab-chart">
            <table id="data_list">
                <thead>
                    <tr>
                        <?php if($bCheckboxForBatch): ?>
                            <th><input type="checkbox" id="allCheckbox" name="allCheckbox"></th>
                        <?php endif; ?>
                        <?php $__currentLoopData = $aColumnForList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sColumn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>　
                            <th class="text-center">
                                <?php echo e((___($sLangPrev . $sColumn, null, 3))); ?>

                                <?php if(!in_array($sColumn, $aNoOrderByColumns)): ?>
                                    <?php echo ViewHelper::orderBy($sColumn); ?>

                                <?php endif; ?>
                            </th>
                            <?php
                            if ($aTotalColumns){
                                in_array($sColumn, $aTotalColumns) or $aTotalColumnMaps[$sColumn] = null;
                            }
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <th class=" text-center"><?php echo e(___('_basic.actions')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <?php if($bCheckboxForBatch): ?>
                            <td ><input type="checkbox" name="selectFlag" value="<?php echo e($data->id); ?>"></td>
                        <?php endif; ?>
                        <?php echo ViewHelper::displayForIndex($data, $aColumnForList, $aViewSettings, $aArrayVars, $aTotalColumns, $aTotalColumnMaps, $aTotals); ?>

                        <td>
                            
                                
                            
                                <?php echo $__env->make('w.item_link', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                 <?php if($aTotalColumns): ?>
                <tfoot>
                    <tr>
                        <td><?php echo e(___('_basic.total-of-page')); ?></td>
                        <?php
                        if ($aTotalRateColumns && $aTotals[$iPosOfDenominatorColumn]){
                            $aTotals[$iPosOfRateColumn] = $aTotals[$iPosOfNumeratorColumn] / $aTotals[$iPosOfDenominatorColumn];
                        }
                        ?>
                        <?php for($i = 1; $i < count($aColumnForList); $i++): ?>
                            <?php
                                $sColumn = $aColumnForList[$i];
                                $sClass = '';
                                if (in_array($sColumn,$aWeightFields)){
                                    $sClass .= ' text-weight';
                                }
                                if (in_array($sColumn,$aClassGradeFields)){
                                    $sClass .= ' ' . ($aTotals[$i] >= 0 ? '' : 'text-red');
                                }
                                !is_numeric($aTotals[$i]) or $sClass .= ' text-right';
                            ?>
                            <td class="<?php echo e($sClass); ?>">
                                <?php
                                    if (is_null($aTotals[$i])) {
                                        echo ' ';
                                    } else {
                                         if (array_key_exists($sColumn, $aTotalRateColumns)) {
                                             echo formatNumber($aTotals[$i] * 100, 2) . '%';
                                         } else {
                                            echo number_format($aTotals[$i], (array_key_exists($aColumnForList[$i], $aNumberColumns) ? $aNumberColumns[$aColumnForList[$i]] : 2));
                                         }
                                    }
                                ?>
                            </td>
                        <?php endfor; ?>
                        <td></td>
                    </tr>
                </tfoot>
                <?php endif; ?>
            </table>
        </div>

        <div class="pull-left">
            <?php if($bSequencable): ?>
                <?php echo Form::submit(___('_basic.set-order',null,2), ['class' => 'btn btn-success btn-b btn-xs']); ?>

            <?php endif; ?>
            <?php if($bCheckboxForBatch): ?>
                <?php echo $__env->make('w.page_batch_link', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endif; ?>
        </div>
        <div class="pull-right">
            <ul class="pagination pagination-sm">
            <li>
            <span><?php echo e(___('_basic.page') . ': ' . $datas->currentPage()); ?>, <?php echo e(___('_basic.per-page') . ': ' . $datas->perPage()); ?>, <?php echo e(___('_basic.total') . ': ' . $datas->total()); ?></span>
            <?php echo $datas->appends(Input::except('page'))->render(); ?>

            </li>
            </ul>
        </div>
            <br/><br/>
        <?php if($bSequencable): ?>
            <?php echo Form::close(); ?>

        <?php endif; ?>
        <?php
        if ($bCheckboxForBatch) {
            if (isset($aLangKeysForButtons['beforeBatchDelete'])) {
                $modalData['beforeBatchDelete'] = array(
                    'id'      => 'beforeBatchDeleteModel',
                    'title'   => '系统提示',
                    'message' => ___($aLangKeysForButtons['beforeBatchDelete'], $aLangVars),
                    'footer'  =>
                        // '<form id="real-delete" method="delete">'
                        Form::open(['id' => 'real-delete', 'method' => 'DELETE'])
                        // . '<input type="hidden">'
                        . '<input type="hidden" name="id" id="beforeBatchDeleteId" value="">'
                        . '<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">取消</button>'
                        . '<button type="submit" class="btn btn-sm btn-danger">确认删除</button>'
                        // . '</form>',
                        . Form::close()
                );
            }
        }
        if ($aLangKeysForButtons) {
            $aPopupData = [];
            foreach($aLangKeysForButtons as $sFunc => $aPopupConfig){
                $aPopupData[$sFunc] = ViewHelper::compilePopupData($sFunc, $aLangVars, $aPopupConfig);
            }
        ?>
        <?php echo $__env->make('popup.makeModal', $aPopupData, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php } ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('end'); ?>
    ##parent-placeholder-7a92f3d26362d6557d5701de77a63a01df61e57f##

    <script type="text/javascript">
    $(document).ready(function(){
        $('#data_list td').click(function(event) {
            var len = $(this).parent().find('td').length,
                islen = $(this).index() + 1;
            if(len > islen){
                $(this).parent().toggleClass('tr-bg');
                return false;
            }
        });
        $(document).on('click', function(e){
            var src = e.target;
            if(src.tagName && src.tagName ==="tr") {
                return false;
            } else {
                $('tr').removeClass('tr-bg');
            }
        });
    });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('l.base', ['active' => $resource], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>