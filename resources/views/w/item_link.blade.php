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
<a href="{{ $href }}" class="{{ $sClass }}" target="{{ $element->target }}" {!! $sOnclick !!}>{{ ___( $element->label) }}</a><?php
    }
?>
