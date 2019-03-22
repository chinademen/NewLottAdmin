<select name="pagesize"  class="form-control input-xs">
    <?php
    isset($aSearchFields['pagesize']['value']) or $aSearchFields['pagesize']['value'] = 20;
    foreach($aPageSizes as $iPageSize){
        $sSelected = $aSearchFields['pagesize']['value'] == $iPageSize ? ' selected' : '';
    ?>
        <option value="<?php echo e($iPageSize); ?>" <?php echo e($sSelected); ?>><?php echo e($iPageSize); ?></option>
    <?php
    }
    ?>
</select>