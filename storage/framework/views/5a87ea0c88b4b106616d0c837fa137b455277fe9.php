<style type="text/css">
	/* 半透明的遮罩层 */
	#overlay {
		background: #000;
		filter: alpha(opacity=50); /* IE的透明度 */
		opacity: 0.5; /* 透明度 */
		display: none;
		position: absolute;
		top: 0px;
		left: 0px;
		width: 100%;
		height: 100%;
		z-index: 100; /* 此处的图层要大于页面 */
		display: none;
	}

	#blocked_box {
		z-index: 500;
		position: absolute;
		left: 30%;
		top: 30%;
		width: 40%;
		display: none;
	}
</style>
<?php
$aClass = [
    1 => 'btn-default',
    2 => 'btn-success',
    3 => 'btn-danger',
];
$aTranslateKeys = [];
foreach ($buttons['itemButtons'] as $element){
if(!$aConfig = $element->compileItemButtonHref($data)){
    continue;
}
extract($aConfig);
$onclick or $aTranslateKeys[ $element->button_onclick ] = $element->confirm_msg_key;
$sClass = 'btn '.$aClass[ $element->button_type ];
$sOnclick = $onclick ? "onclick=\"$onclick\"" : '';
?>

<?php if($element->id == 32924): ?> 
<?php if($data->blocked == 0): ?>
	<a href="<?php echo e($href); ?>" class="<?php echo e($sClass); ?>" target="<?php echo e($element->target); ?>" onclick="showTable(<?php echo e($data->id); ?>)"><?php echo e(___('_users.blocked')); ?></a>
<?php else: ?>
	<a href="<?php echo e($href); ?>" class="btn btn-success" target="<?php echo e($element->target); ?>" onclick="showTable(<?php echo e($data->id); ?>)"><?php echo e(___('_users.unblocked')); ?></a>
<?php endif; ?>
<?php else: ?>
	<a href="<?php echo e($href); ?>" class="<?php echo e($sClass); ?>" target="<?php echo e($element->target); ?>" <?php echo $sOnclick; ?>><?php echo e(___( $element->label)); ?></a>
<?php endif; ?>

<?php
}
?>
<div id="overlay" onclick="closeLay()"></div>


<div id="blocked_box" class="blocked_box<?php echo e($data->id); ?> class_box">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title" id="myModalLabel"><?php echo e($data->username); ?> -- <?php if($data->blocked == 0): ?> <?php echo e(___('_users.blocked')); ?> <?php else: ?> <?php echo e(___('_users.unblocked')); ?> <?php endif; ?></h4>
		</div>
		<form method="POST" action="<?php echo e(route('users.blocked-user',['id'=>$data->id])); ?>" accept-charset="UTF-8" id="block-user" class="form-horizontal">
			<?php echo e(csrf_field()); ?>

			<div class="modal-body">
				<?php if($data->blocked == 0): ?>
					<div class="form-group">
						<label for="blocked" class="col-sm-5 control-label"><?php echo e(___('_users.blocked_type')); ?></label>
						<div class="col-sm-5">
							<select class="form-control" name="blocked" id="blocked">
								<?php $__currentLoopData = $aBlockedTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($key!==0): ?>
										<option value="<?php echo e($key); ?>"><?php echo e($val); ?></option>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</div>
				<?php endif; ?>
				<div class="form-group">
					<label for="comment" class="col-sm-5 control-label"><?php echo e(___('_users.comment')); ?></label>
					<div class="col-sm-5"><textarea name="comment" cols="30" rows="2"></textarea></div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-default" data-dismiss="modal" onclick="closeLay()"><?php echo e(___('_users.cancel')); ?></button>
				<button type="submit" class="btn btn-sm btn-danger"><?php echo e(___('_users.ok')); ?></button>
			</div>
		</form>
	</div>
</div>
