@extends('l.admin', ['active' => $resource])
@section('title')
@parent
{{ $sPageTitle }}
@stop

@section('container')
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
    @include('w.breadcrumb')
    @include('w._function_title', ['id' => $data->id , 'parent_id' => $data->parent_id])

    @include('w.notification')
    <div class="row">
        <?php
        foreach($aGroupSettings as $aGroupConfig){
            display($data, $aGroupConfig, $aBasicColumns, $aViewSettings, $aArrayVars);
        }
        ?>
    </div>
</div>
@stop

@section('end')
@parent
<script>
    function modal(href)
    {
        $('#real-delete').attr('action', href);
        $('#myModal').modal();
    }
</script>
@stop

<?php
function display($oModel, & $aGroupConfig, & $aBasicColumns, & $aViewSettings, & $aArrayVars){
    $sTitle = __($aGroupConfig['title']);
    $sClass = 'col-md-' . $aGroupConfig['width'];
    $sLabelWidth = $aGroupConfig['label-width'];
//    pr($aGroupConfig['columns']);
//    exit;
?>
        <div class="{{ $sClass }}">
            <div class="panel panel-primary">
                <div class="panel-heading">{{ $sTitle }}</div>
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
