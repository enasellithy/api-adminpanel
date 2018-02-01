@extends('layouts.app')

@section('content')
        <h5>{{$news->title}}</h5>
        <br/>
        {!! Form::open(['url' => 'add/comment', 'class'=>'form-horizontal', 'id' => 'comment']) !!}

        {!! Form::text('comment',old('comment'),['id'=>'add_comment','class'=>'form-contol','placeholder'=>'comment']) !!}
        @if(Auth::check())
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
        @endif
        <input type="hidden" name="news_id" value="{{$news->id}}">
        {!! Form::submit('add',['class'=>'btn btn-info','id'=>'send']) !!}

        {!! Form::close() !!}
        <br/>
        <div class="alert-error">
            <center><h5></h5></center>
        </div>
        <ul class="list-comment">
            @foreach($news->comments()->get() as $comment)
                <li class="item">{{$comment->comment}}</li>
            @endforeach
        </ul>
@endsection

@section('script')
        <script>
            /*$(document).on('click','#send',function () {
                var form = $('#comment').serialize();
                var url = $('#comment').attr('action');
                console.log(form,url);
                $.ajax({
                    url:url,
                    dataType:'json',
                    data:form,
                    type:'post',
                    beforeSend:function ()
                    {
                        
                    },success: function (data)
                    {
                        $('.list-comment li').append(data);
                    },error: function (data_error,exception)
                    {
                        if(exception == 'error')
                        {
                            //$('.alert-error center h5').empty();
                            $('.alert-error center h5').html(data_error.responseJSON.message);
                            //alert(data_error.responseJSON.message);
                            $.each(data_error.responseJSON.errors,function (index,v) {
                                alert(index);
                            });
                        }
                    }
                });
                return false;
            });
             /*$(document).on('click','#send',function () {
                 var form = $('#comment').serialize();
                 var url = $('#comment').attr('action');
                 $.ajax({
                     url:url,
                     dataType: 'json',
                     data:form,
                     type:'post',
                     beforeSend:function () {
                         
                     },success:function (data) {
                         $('.list-comment').append(data);
                     },error:function (error,exception) {
                         alert(exception);
                     }
                 });
                 return false;
             });*/
        </script>
@endsection
