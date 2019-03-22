<?php
//pr($aColumnSettings);
//exit;
$aAttributes = $isEdit ? $data->getAttributes() : array_combine($aOriginalColumns, array_fill(0, count($aOriginalColumns), null));
if (!$isEdit) {
    foreach ($aInitAttributes as $sColumn => $mValue) {
        $data->$sColumn = $mValue;
    }
}
//pr($data->toArray());
$oFormHelper->setErrorObject($errors);
?>
<form method="post" class="form-horizontal" action="">
<?php echo e(csrf_field()); ?>

<?php if($isEdit): ?>
    <input type="hidden" name="_method" value="PUT" />
<?php endif; ?>
<?php $__currentLoopData = $aAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sColumn => $sValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
if ($sColumn == 'id' || !isset($aColumnSettings[$sColumn])) {
    continue;
}
$bReadOnly = $aColumnSettings[$sColumn]['readonly'];
switch ($aColumnSettings[$sColumn]['form_type']) {
    case 'text':
    case 'textarea':
        $options = ['id' => $sColumn, 'class' => 'form-control'];
        !$bReadOnly or $options['readonly'] = $bReadOnly;
        $sHtml = $oFormHelper->input($sColumn, null, $options);
        break;
    case 'bool':
        $options = ['id' => $sColumn];
        !$bReadOnly or $options['readonly'] = $bReadOnly;
        $sHtml = $oFormHelper->input($sColumn, null, $options);
        break;
    case 'select':
        $options = [
            'id' => $sColumn,
            'class' => 'form-control',
            'options' => ${$aColumnSettings[$sColumn]['options']},
            'empty' => true
        ];
        !$bReadOnly or $options['readonly'] = $bReadOnly;
        $sHtml = $oFormHelper->input($sColumn, null, $options);
        break;
    case 'ignore':
        continue 2;
    case 'date':
        $options = ['id' => $sColumn, 'type' => 'datetime'];
        !$bReadOnly or $options['readonly'] = $bReadOnly;
        $sHtml = $oFormHelper->input($sColumn, null, ['id' => $sColumn, 'type' => 'datetime']);
        break;
    default:
        $options = ['id' => $sColumn, 'class' => 'form-control'];
        !$bReadOnly or $options['readonly'] = $bReadOnly;
        $sHtml = Form::input('text', $sColumn, $sValue, $options);
}
?>

<?php echo $sHtml; ?>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<div class="form-group">
    <div class="col-sm-offset-3 col-sm-5">
        <!--【修正】编辑岗位重置操作不刷新页面-->
        <button type="reset" class="btn btn-default" ><?php echo e(___('Reset')); ?></button>
        <!--
        <a class="btn btn-default" href="<?php echo e(route($resource. ($isEdit ? '.edit' : '.create'), $data->id)); ?>"><?php echo e(___('Reset')); ?></a>
        -->
        <?php echo Form::submit(___('Submit'), ['class' => 'btn btn-success']); ?>

    </div>
</div>
<?php echo Form::close(); ?>

