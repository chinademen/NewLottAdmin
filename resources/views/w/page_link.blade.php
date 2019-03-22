<div class="form-inline pull-right">
@foreach ($buttons['pageButtons'] as $element)
<div class="form-group">
    <?php
    if (!$url = $element->url){
        $url = 'javascript:void(0);';
        if ($element->route_name){
            $url = $element->para_name && isset(${$element->para_name}) ? route($element->route_name, ${$element->para_name}) : route($element->route_name);
        }
    }
    ?>
    @if ($element->button_type == 3)
    <a href="javascript:void(0)" class="btn   btn-danger" onclick="modal('{{ $url  }}')">{{ ___( $element->label) }}</a>
    @elseif ($element->button_type == 2)
    <a href="{{ $url }}" class="btn   btn-success">{{ ___( $element->label) }}</a>
    @else
        <a  href="{{ $url }}" class="btn   btn-default" > {{ ___( $element->label) }}</a>
    @endif
</div>
@endforeach
</div>
