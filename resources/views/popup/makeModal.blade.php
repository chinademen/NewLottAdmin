@foreach($aPopupData as $func => $aPopup)
    @include('popup.formModal', $aPopup)
    <script>
        function {{ $func }}(href, id, self)
        {
            title =  $(self).html()+"操作确认";
            $('#{{ $func }}-form').attr('action', href);
            $('#{{ $func }}-data-id').html(id);
            $('#{{ $func }}').find('#myModalLabel').html(title);
            $('#{{ $func }}').modal();
        }
    </script>
@endforeach