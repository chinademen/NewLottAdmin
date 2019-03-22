<!-- Modal -->
<div class="modal fade" id="<?php echo e($aPopup['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><?php echo $aPopup['title']; ?></h4>
            </div>
            <?php echo Form::open(['id' => $aPopup['id'] . '-form', 'method' => strtoupper($aPopup['method']), 'class' => "form-horizontal", 'target' => '_self']); ?>

                <div class="modal-body">
                    <?php echo $aPopup['message']; ?>

                </div>
                <div class="modal-footer">
                    <?php echo $aPopup['footer']; ?>

                </div>
            <?php echo Form::close(); ?>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->