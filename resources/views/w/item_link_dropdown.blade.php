<div class="dropdown">
  <span class="dropdown-btn btn-default btn btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    操作
    <span class="caret"></span>
  </span>
    <ul class="dropdown-menu dropdown-menu-right">
        <?php
        $aClass = [
            1 => 'color:#f2f2f2;',
            2 => 'color:green;',
            3 => 'color:#FFB900;',
        ];
        $aTranslateKeys = [];
        foreach ($buttons['itemButtons'] as $element){
        if (!$aConfig = $element->compileItemButtonHref($data)) {
            continue;
        }
        extract($aConfig);

        $onclick or $aTranslateKeys[$element->button_onclick] = $element->confirm_msg_key;
        $sClass = ' ' . $aClass[$element->button_type];
        $sOnclick = $onclick ? "onclick=\"$onclick\"" : '';
        ?>
        <li><a href="{{ $href }}" style="{{$sClass}}"
               target="{{ $element->target }}" {!! $sOnclick !!}>{{ ___( $element->label) }}</a></li>
        <?php
        }
        ?>
    </ul>
</div>