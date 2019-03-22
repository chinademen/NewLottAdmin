<!-- Modal -->
<div class="modal fade" id="{{ $modalData['beforeBatchDelete']['id'] }}" tabindex="-1" role="dialog" aria-labelledby="beforeBatchDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="beforeBatchDelete" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="beforeBatchDeleteLabel">{{ $modalData['beforeBatchDelete']['title'] }}</h4>
            </div>
            <div class="modal-body">
                <div>{{ $modalData['beforeBatchDelete']['message'] }}</div>
                <div id="delete-data-id">a</div>
            </div>
            <div class="modal-footer">
                {{ $modalData['beforeBatchDelete']['footer'] }}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    function beforeBatchDelete(href,id)
    {
//            alert(id);
        $('#real-delete').attr('action', href);
        $('#delete-data-id').html(id);
        $('#beforeBatchDeleteId').val(id);
        $('#beforeBatchDeleteModel').modal();
        return false;
    }
</script>
