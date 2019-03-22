<?php if(isset($aSearchFields)): ?>
    <div class="panel panel-default">
        <div class=" panel-body">
            <form method="get" class="form-inline">
                <?php if(isset($bWithTrashed) && $bWithTrashed): ?>
                    <input type="hidden" name="_withTrashed" value="1"/>
                <?php endif; ?>
                <input type="hidden" name="is_search">
                <?php
                $i = 0;
                $sCalendarJs = '';
                foreach($aSearchFields as $sField => $aInfo):

                $aInputInfo = isset($aInfo['input_info']) ? $aInfo['input_info'] : [];
                $sNodeId = MyString::camel($sField);
                if ($aInfo['is_date']) {
                    $aInfo['type'] = 'date';
                    $oFormHelper->dateObjects[] = $sField;
                }
                if ($aInfo['type'] == 'select' && is_string($aInfo['options']) && $aInfo['options']{0} == '$') {
                    $sVarName = substr($aInfo['options'], 1);
                    $sModelName::translateArray($$sVarName);
                    $aInfo['options'] = $$sVarName;

                }
                $aInfo['div'] = false;
                $aInfo['message'] = false;
                $sLabel = $aInfo['label'];
                $aInfo['label'] = false;
                ?>
                <?php echo $oFormHelper->makeLabel($sField, ___($sLangPrev . $sLabel), false, false, false, 'form-group'); ?>
                <div class="form-group">
                    <?php echo $oFormHelper->input($sField, isset($$sField) ? $$sField : null, $aInfo, 'input-xs'); ?>
                </div>
                <?php
                endforeach;
                ?>

                <div class="form-group pull-right">
                    <button type="submit" class="btn btn-success btn-xs"><?php echo e(___('_basic.search',null,1)); ?></button>
                </div>
            </form>
        </div>
    </div>
<?php endif; ?>

<?php $__env->startSection('end'); ?>
    ##parent-placeholder-7a92f3d26362d6557d5701de77a63a01df61e57f##
    <script type="text/javascript">
        $(function () {
            $('#download').click(function () {
                $('#user_search_form').attr('action', '/users/download');
                $('#user_search_form').submit();
            });
            $('#submitForm').click(function (event) {
                $('#user_search_form').attr('action', '/users');
                $('#user_search_form').submit();
            });
        });
    </script>

<?php $__env->stopSection(); ?>