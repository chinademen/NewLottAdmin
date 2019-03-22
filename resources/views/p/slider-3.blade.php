<?php
	$presenter = new Illuminate\Pagination\BootstrapPresenter($paginator);
?>
<div class="pull-right">
    <ul class="pagination pagination-sm">
        <li>
            <span>{{ ___('_basic.page') . ': ' . $datas->currentPage() }}, {{ ___('_basic.per-page') . ': ' . $datas->perPage() }}, {{ ___('_basic.total') . ': ' . $datas->total() }}</span>
        </li>
    </ul>
    {!! $datas->appends(Input::except('page'))->render() !!}
</div>
