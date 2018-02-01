<script>
$(document).on('keydown','.send',function (e) {
    var msg = $(this).val();
    var element = $(this);
    if(!msg == '' && e.keyCode == 13 && !e.shiftKey)
    {
        $.ajax({
            url:'{{url('chat/add')}}',
            type:'post',
            data:
                {
                    _token:'{{csrf_token()}}',
                    msg:msg
                },
        });
        element.val('');
    }
});
function liveChat()
{
    $.ajax({
        url:'{{url('chat')}}',
        data:
            {_token:'{{csrf_token()}}'},
        success:function (data)
        {
            $('.chat-box').append('<div class="alert alert-info">'+data['msg']+'</div>');
            setTimeout(liveChat,1000);
        },
        error:function ()
        {
            setTimeout(liveChat,5000);
        }
    });
}
</script>