<ol class="breadcrumb">
  <li><a href="{{ route('admin.dashboard') }}">首页</a></li>
  <li><a href=" @if(isset($sAction) && $sAction) {{ route($resource . '.' . $sAction)}} @else {{ route($resource . '.index') }} @endif ">{{ ___('_model.'.$resourceName) }}管理</a></li>
  <li class="active">{{ ___('_model.'.$resourceName) }}</li>
</ol>
