@extends('l.base', ['active' => $resource])

@section('title')
@parent
{{ ___('View') . $resourceName }}
@stop

@section('container')
<div class="col-md-12">

    <div class="h2">{{ ___('View') . $resourceName }}
        <div class=" pull-right" role="toolbar" >
          @include('w.page_link', ['id' => $data->id , 'parent_id' => $data->parent_id])
        </div>
    </div>
    @include('w.breadcrumb')
    @include('w.notification')

    <table class="table table-bordered table-striped">
        <tbody>
            @if(isset($sParentTitle))

            <tr>
                <th  class="text-right col-xs-2">{{ ___('Parent') }}</th>
                <td>{{ $sParentTitle }}</td>
            </tr>

            @endif
            <?php $i = 0; ?>
            <?php
                foreach($aColumnSettings as $sColumn => $aSetting){
                    if (isset($aSetting['type'])){
                        switch($aSetting['type']){
                            case 'ignore':
                            continue 2;
                            break;
                            case 'bool':
                                $sDisplayValue = $data->$sColumn ? ___('Yes') : ___('No');
                                break;
                            case 'text':
                                $sDisplayValue = nl2br($data->$sColumn);
                                break;
                            case 'select':
                                $sDisplayValue = $data->$sColumn ? ${$aSetting['options']}[$data->$sColumn] : null;
                                break;
                            case 'numeric':
                            case 'date':
                            default:
                                $sDisplayValue = $data->$sColumn;
                        }
                    }else{
                        $sDisplayValue = $data->$sColumn;
                    }

            ?>
            <tr>
                <th  class="text-right col-xs-2">{{ ___($sColumn) }}</th>
                <td>{{ $sDisplayValue }}</td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>

@stop


