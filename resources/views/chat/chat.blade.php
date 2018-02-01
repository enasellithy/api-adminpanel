@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Chat</div>

                    <div class="panel-body">
                        <div class="chat-box">
                            @forelse($chats as $chat)
                                <div class="alert alert-info">
                                    {{$chat->msg}}
                                </div>
                            @empty
                                No Message
                            @endforelse
                        </div>
                        <br />
                        <div class="form">
                            {!! Form::open(['url'=>'chat/add', 'id'=>'chat']) !!}
                            <input type="text" name="msg" class="form-control">
                            <input type="submit" class="btn btn-success send" value="Send">
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('chat.scripts.chat')
@endsection