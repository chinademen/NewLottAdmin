<?php $__env->startSection('title'); ?>
##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php echo e($sPageTitle); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>
<?php
$aGroupSettings =[
    'basic' => [
        'title' => '注单基本信息',
        'width' => 6,
        'label-width' => 2,
        'columns' => ['serial_number', 'terminal_id', 'trace_id', 'username', 'is_tester', 'prize_group', 'lottery_id', 'issue', 'title', 'display_bet_number', 'coefficient', 'single_count', 'multiple', 'way_total_count', 'bet_rate', 'single_amount', 'amount', 'bought_at', 'end_time'],
    ],
    'prize' => [
        'title' => '中奖信息',
        'width' => 3,
        'label-width' => 5,
        'columns' => ['winning_number', 'status', 'prize_set', 'prize', 'won_count', 'single_won_count', 'won_data'],
    ],
    'other' => [
        'title' => '其他信息',
        'width' => 3,
        'label-width' => 5,
        'columns' => ['ip', 'proxy_ip', 'canceled_by', 'canceled_at', 'prize_sent_at', 'bet_commit_time', 'created_at'],
    ],
];
?>

<div class="col-md-12">
    <?php echo $__env->make('w.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('w._function_title', ['id' => $data->id , 'parent_id' => $data->parent_id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('w.notification', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <?php
        foreach($aGroupSettings as $aGroupConfig){
            display($data, $aGroupConfig, $aBasicColumns, $aViewSettings, $aArrayVars);
        }
        ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('end'); ?>
##parent-placeholder-7a92f3d26362d6557d5701de77a63a01df61e57f##
<script>
    function modal(href)
    {
        $('#real-delete').attr('action', href);
        $('#myModal').modal();
    }
</script>
<?php $__env->stopSection(); ?>

<?php
function display($oModel, & $aGroupConfig, & $aBasicColumns, & $aViewSettings, & $aArrayVars){
    $sTitle = __($aGroupConfig['title']);
    $sClass = 'col-md-' . $aGroupConfig['width'];
    $sLabelWidth = $aGroupConfig['label-width'];
//    pr($aGroupConfig['columns']);
//    exit;
?>
        <div class="<?php echo e($sClass); ?>">
            <div class="panel panel-primary">
                <div class="panel-heading"><?php echo e($sTitle); ?></div>
                <div class=" panel-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <?php
                            ViewHelper::displayForView($oModel, $aGroupConfig['columns'], $aViewSettings, $aArrayVars, $sLabelWidth);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<?php
}
?>

<?php echo $__env->make('l.admin', ['active' => $resource], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>