<!-- Modal -->
<div class="modal fade" id="{{ $modalData['modal']['id'] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">{!! $modalData['modal']['title'] !!}</h4>
            </div>
            <div class="modal-body">
                <div>{!! $modalData['modal']['message'] !!}</div>
                <div id="data-id">a</div>
            </div>
            <div class="modal-footer">
                {!! $modalData['modal']['footer'] !!}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    function modal(href, id)
    {
//            alert(id);
        $('#real-delete').attr('action', href);
        $('#data-id').html(id);
        $('#myModal').modal();
    }
</script>
