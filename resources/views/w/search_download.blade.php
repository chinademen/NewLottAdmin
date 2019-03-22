
@if (isset($aSearchFields))
<div class="panel panel-default">
      <div class=" panel-body">
        {!! Form::open(array('method' => 'get', 'class' => 'form-inline','id'=>'search_form')) !!}
      @if (isset($bWithTrashed) && $bWithTrashed)
            <input type="hidden" name="_withTrashed" value="1" />
            @endif
            <?php
            $i = 0;
            $sCalendarJs = '';
            foreach ($aSearchFields as $sField => $aInfo):
                // 商户后台用户&&$sField=merchant_id 跳过循环. 商户只能看自己的账户信息
                if(!$showFiles && $sField=='merchant_id') continue;
                $aInputInfo = isset($aInfo['input_info']) ? $aInfo['input_info'] : array();
                $sNodeId    = MyString::camel($sField);
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
                    <?php echo $oFormHelper->input($sField, isset($$sField) ? $$sField : null, $aInfo,'input-xs'); ?>
                </div>
                <?php

            endforeach;

            ?>

            <div class="form-group pull-right">
                <input class="btn btn-success btn-xs" type="submit" id="submitForm" value="搜索"/>
                <a class="btn btn-default btn-xs"  id="download">下载数据报表</a>
            </div>
            <?php
            echo Form::hidden('is_search');
            echo Form::close();
            ?>
        </div>
        </div>

        @section('end')
        @parent
            <script type="text/javascript">
                $(function () {
                    $('#download').click(function () {
                        $('#search_form').attr('action', '<?php echo route(Route::currentRouteName()) . '/download'; ?>');
                        $('#search_form').submit();
                    });
                    $('#submitForm').click(function (event) {
                        $('#search_form').attr('action', '<?php echo route(Route::currentRouteName()); ?>');
                        $('#search_form').submit();
                    });



                });
            </script>
        @stop
        @endif
